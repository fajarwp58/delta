@extends('layouts.main')
@extends('layouts.topbar')
@extends('layouts.sidebar')

@section('content')

<br /><br />
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
<div class="col-lg-12">
    <div class="card-box pb-2">
        <div class="card">
            <div class="card-header">
                <h4>Form <span class="small">Input Layanan Pasien</span></h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal form-layanan" method="post">
                    {{ csrf_field() }}
                    <h3 class="card-title">NO Transaksi : <b>{{ $transaksi->kode_transaksi }}</b></h3>
                      <input type="hidden" name="kode_transaksi" value="{{ $transaksi->kode_transaksi }}">
                      <div class="form-group row mb-3 col-md-12">
                          <label for="kode_layanan" class="col-2 col-form-label">Kode Layanan</label>
                          <div class="col-5">
                            <div class="input-group">
                              <input id="kode_layanan" type="text" class="form-control" name="kode_layanan" autofocus required>
                              <span class="input-group-btn">
                                <button onclick="showLayanan()" type="button" class="btn btn-info">...</button>
                              </span>
                            </div>
                          </div>
                      </div>
                </form>
                <h5> <i data-feather="shopping-cart" class="icon-dual"></i> Cart :</h5>
                    <table id="ttransaksilayanan" class="table table-striped tabel-layanan">
                        <thead >
                        <tr>
                            <th>Nama Layanan</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tfoot align="right">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                    <form method="POST" id="formtotal" action="{{ url('/dokterlayanan/update/') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row mb- col-md-12">
                            <label for="total" class="col-8 col-form-label"></label>
                            <div class="col-4">
                                <input type="text" id="kodetransaksi" name="kodetransaksi" value="{{ $transaksi->kode_transaksi }}" hidden>
                                <input type="text" id="total" name="total" value="" hidden>
                            </div>
                        </div>
                        <center><button class="btn btn-info waves-effect waves-light" type="submit">Simpan</button></center>
                    </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-layanan" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Layanan Delta Animal Medical Care</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form-addlayanan">
                    {{ csrf_field() }}
                    <input type="hidden" name="kode_transaksi" value="{{ $transaksi->kode_transaksi }}">
                <table id="tlayanan" class="table table-striped tabel-layanan">
                    <thead style="display: none">
                        <tr>
                            <th></th>
                            <th>Kode Layanan</th>
                            <th>Nama Layanan</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                 </table>
                </form>
            </div>
            <div class="modal-footer">
                <a onclick="pilihLayanan()" class="btn btn-info"> Pilih Layanan </a>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
   </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            responsive: true,
            language: {
                search: '<span>Cari:</span> _INPUT_',
                searchPlaceholder: 'Cari...',
                lengthMenu: '<span>Tampil:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });
        function loadData() {
            $('#tlayanan').dataTable({
                "ajax": "{{ url('/dokterlayanan/dataLayanan') }}",
                "columns": [
                    { data: 'kode_layanan',
                      render: function(data){
                        return'<input type="checkbox" name="kode_layanan[]" value="'+data+'">';
                        }
                    },
                    { "data": "kode_layanan",
                        sClass: 'text-center' },
                    { "data": "nama",
                        sClass: 'text-center'},
                    { "data": "harga",
                        sClass: 'text-center'}
                ],
                columnDefs: [
                    {
                        width: "20px",
                        targets: [0]
                    },
                    {
                        width: "150px",
                        targets: [1]
                    },
                    {
                        width: "100px",
                        targets: [2]
                    },
                    {
                        width: "100px",
                        targets: [3]
                    },
                ],
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
                info: false,
            });
        } loadData();

        function loadData2() {
            $('#ttransaksilayanan').dataTable({
                "ajax": "{{ url('/dokterlayanan/dataKeranjang') }}",
                "columns": [
                    { "data": "layanan.nama",
                        sClass: 'text-center'},
                    { "data": "layanan.harga",
                        sClass: 'text-center'},
                    {
                        data: 'kode_layanan',
                        sClass: 'text-center',
                        render: function(data) {
                            return'<a href="#" data-id="'+data+'" id="delete" class="btn btn-danger waves-effect waves-light btn-xs" title="hapus">hapus </a>';
                        }
                    }
                ],
                columnDefs: [
                    {
                        width: "150px",
                        targets: [0]
                    },
                    {
                        width: "100px",
                        targets: [1]
                    },
                    {
                        width: "100px",
                        targets: [2]
                    },
                ],
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
                paging: false,
                info: false,
                searching : false,

                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    // converting to interger to find total
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                    };

                    // computing column Total of the complete result
                    var hargaTotal = api
                    .column( 1 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

                    // Update footer by showing the total with the reference of the column index
	                $( api.column( 0 ).footer() ).html('Total');
                    $( api.column( 1 ).footer() ).html(hargaTotal);
                    $('#total').val(hargaTotal).change();
                },
                "processing": true,
                "serverSide": true,
            });
        } loadData2();

        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('dokterlayanan/delete') }}/"+id,

                    success :function () {

                        $('#ttransaksilayanan').DataTable().destroy();
                        loadData2();


                    }
                })
            }
        });
    });
    function showLayanan(){
        $('#modal-layanan').modal('show');
    }

    function pilihLayanan(){
            if($('input:checked').length < 1){
                alert('Pilih layanan yang ditambahkan!');
            }else{
                $('#form-addlayanan').attr('action', "dokterlayanan/store").submit();
                $('#modal-layanan').modal('hide');
            }
        }


</script>
@endsection
