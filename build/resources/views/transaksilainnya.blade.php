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
                <h4 class="card-title">
                    Kelola Transaksi
                </h4>
            </div>

            {{--        TABEL Penyakit--}}
            <div class="card-body">
                <table id="ttransaksilainnya" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>No Invoice</th>
                        <th>Nama Hewan</th>
                        <th>Tgl / Jam</th>
                        <th>Nama Layanan</th>
                        <th>Total Bayar</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
{{--    MODAL DAN FORM DATA Penyakit--}}
<div id="mtransaksilainnya" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Transaksi Lainnya</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form id="formtransaksilainnya">
                    {{ csrf_field() }}

                    <div class="form-group" id="div_kodelainnya">
                        <label for="kode_lainnya">ID</label>
                        <input type="text"  class="form-control" id="kode_lainnya" name="kode_lainnya" readonly>
                    </div>
                    <div class="form-group" id="div_kodetransaksi">
                        <label for="kode_transaksi">ID</label>
                        <input type="text"  class="form-control" id="kode_transaksi" name="kode_transaksi" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Layanan</label>
                        <input type="text"  class="form-control" id="nama" name="nama" placeholder="Nama Layanan lainnya">
                        <span class="text-danger" id="namaError"></span>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text"  class="form-control" id="harga" name="harga" placeholder="Harga layanan">
                        <span class="text-danger" id="hargaError"></span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


{{--    MODAL DAN FORM DETAIL Penyakit--}}
<div id="mdtransaksilainnya" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form>

                    <div class="card">
                        <div class="card-body">
                            <table width="400">
                                <tr>
                                    <td>
                                        <a class="text-gray">No Invoice</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dkodetransaksi"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Dokter</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dnamadokter"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Nama Hewan</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dnamahewan"></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="assets/jquery.dataTables.min.js"></script>
<script src="assets/dataTables.bootstrap.min.js"></script>

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
            $('#ttransaksilainnya').dataTable({
                "ajax": "{{ url('/transaksilainnya/data') }}",
                "columns": [
                    { "data": "kode_transaksi",
                        sClass: 'text-center' },
                    { "data": "hewan.nama_hewan",
                        sClass: 'text-center'},
                    { "data": "waktu",
                        sClass: 'text-center'},
                    { "data": "layanan",
                        sClass: 'text-center'},
                    { "data": "total_harga",
                        sClass: 'text-center'},
                    {
                        data: 'kode_transaksi',
                        sClass: 'text-center',
                        render: function(data) {
                            return'<a href="#" data-id="'+data+'" id="detail" class="btn btn-info waves-effect waves-light btn-xs" title="detail">tambah </a> &nbsp;'+
                                '<a href="#" data-id="'+data+'" id="edit" class="btn btn-warning waves-effect waves-light btn-xs" title="edit">print </a> &nbsp;'+
                                '<a href="#" data-id="'+data+'" id="delete" class="btn btn-danger waves-effect waves-light btn-xs" title="hapus">delete </a>';
                        }
                    }
                ],
                columnDefs: [
                    {
                        width: "50px",
                        targets: [0]
                    },
                    {
                        width: "100px",
                        targets: [1]
                    },
                    {
                        width: "75px",
                        targets: [2]
                    },
                    {
                        width: "150px", targets: [3],
                        render: function (data, type, full, meta) {
                            var hasil = '';
                            data.forEach((item, id)=>{
                                hasil += '- '+item.nama+'<br>';
                            });
                            return hasil;
                        }
                    },
                    {
                        width: "75px",
                        targets: [4]
                    },
                    {
                        width: "150px",
                        targets: [5]
                    },
                ],
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
            });
        } loadData();


        $(document).on('click', '#addpenyakit', function() {
            var idmodal = "{{ $idmodal }}";
            $('#mpenyakit').modal('show');
            document.getElementById('div_kodepenyakit').style.display = 'block';
            $('#kode_penyakit').val(idmodal).change();
            $('#formpenyakit').attr('action', '{{ url('penyakit/create') }}');
        });

        $('#formpenyakit').submit(function(e) {
            e.preventDefault();
            $('#namaError').addClass('d-none');
            $('#jenis_penyakit_idError').addClass('d-none');
            $.ajax({
                url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                type: 'post',
                data: {
                    'kode_penyakit': $('#kode_penyakit').val(),
                    'jenis_penyakit_id': $('#jenis_penyakit_id').val(),
                    'nama': $('#nama').val(),
                },


                success :function (response) {
                    $('#tpenyakit').DataTable().destroy();
                    loadData();
                    $('#mpenyakit').modal('hide');
                },

                error : function (data){
                    var errors = data.responseJSON;
                    if ($.isEmptyObject(errors) == false){
                        $.each(errors.errors, function (key, value){
                            var ErrorID = '#' + key + 'Error';
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value);
                        })
                    }
                },

            });
        });

        $(document).on('click', '#edit', function() {
            var data = $('#tpenyakit').DataTable().row($(this).parents('tr')).data();
            $('#mpenyakit').modal('show');
            document.getElementById('div_kodepenyakit').style.display = 'none';
            $('#nama').val(data.nama).change();
            $('#jenis_penyakit_id').val(data.jenis_penyakit_id).change();
            $('#formpenyakit').attr('action', '{{ url('penyakit/update') }}/'+data.kode_penyakit);
        });

        $(document).on('click', '#detail', function() {
            var data = $('#tpenyakit').DataTable().row($(this).parents('tr')).data();
            $('#mdpenyakit').modal('show');
            $('#dkodepenyakit').text(data.kode_penyakit);
            $('#djenispenyakit').text(data.jenis_penyakit.nama);
            $('#dnamapenyakit').text(data.nama);
        });

        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('transaksilainnya/delete') }}/"+id,

                    success :function () {

                        $('#ttransaksilainnya').DataTable().destroy();
                        loadData();


                    }
                })
            }
        });



        $.ajax({
            url: '{{ url('penyakit/listjenispenyakit') }}',
            dataType: "json",
            success: function(data) {
                var jenis_penyakit = jQuery.parseJSON(JSON.stringify(data));
                $.each(jenis_penyakit, function(k, v) {
                    $('#jenis_penyakit_id').append($('<option>', {value:v.jenis_penyakit_id}).text(v.nama))
                })
            }
        });

        $('#mpenyakit').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            let hapusValidasi = document.getElementById('formpenyakit');
            hapusValidasi.querySelectorAll('.form-control').forEach(hapusValidasi => {
                hapusValidasi.classList.remove('label');
                hapusValidasi.classList.remove('is-valid');
                hapusValidasi.classList.remove('is-invalid');
                hapusValidasi.classList.remove('required');
            });
        });

    });


</script>
@endsection
