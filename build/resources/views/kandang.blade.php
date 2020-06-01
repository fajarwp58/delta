@extends('layouts.main')
@extends('layouts.topbar')
@extends('layouts.sidebar')

@section('content')

<br /><br />
<div class="col-lg-12">
    <div class="card-box pb-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <button class="btn btn-primary m-r-5" id="addkandang">
                        <i class="anticon anticon-plus"></i>
                        Add Kandang
                    </button>
                    <a onclick="printBarcode()" class="btn btn-info"> Cetak Barcode Kandang</a>
                </h4>
            </div>

            {{--        TABEL Waktu kandang--}}
            <div class="card-body">
                <form method="post" id="form-kandang">
                    {{ csrf_field() }}
                <table id="tkandang" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th width="20"><input type="checkbox" value="1" id="select-all"></th>
                        <th>Kode Kandang</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
                </form>
            </div>
        </div>
    </div>
</div>
{{--    MODAL DAN FORM DATA Waktu kandang--}}
<div id="mkandang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Kandang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form id="formkandang">
                    {{ csrf_field() }}

                    <div class="form-group" >
                            <label for="kode_kandang">Kode kandang</label>
                            <input type="text"  class="form-control" id="kode_kandang" name="kode_kandang">
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
            $('#tkandang').dataTable({
                "ajax": "{{ url('/kandang/data') }}",
                "columns": [
                    { data: 'id',
                          render: function(data){
                            return'<input type="checkbox" name="id[]" value="'+data+'">';
                            }
                    },
                    { "data": "kode_kandang",
                        sClass: 'text-center', },
                    {
                        data: 'id',
                        sClass: 'text-center',
                        render: function(data) {
                                return'<a href="#" data-id="'+data+'" id="delete" class="btn btn-danger waves-effect waves-light btn-xs" title="hapus">delete </a>';
                        }
                    }
                ],
                columnDefs: [
                    {
                        width: "20px",
                        targets: [0]
                    },
                    {
                        width: "100px",
                        targets: [1]
                    },
                    {
                        width: "100px",
                        targets: [2]
                    }
                ],
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
            });
        } loadData();

        $('#select-all').click(function(){
                $('input[type="checkbox"]').prop('checked', this.checked);
        });


        $(document).on('click', '#addkandang', function() {
            var idmodal = "{{ $idmodal }}";
            $('#mkandang').modal('show');
            $('#kode_kandang').val(idmodal).change();
            $('#formkandang').attr('action', '{{ url('kandang/create') }}');
        });

        $('#formkandang').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                type: 'post',
                data: {
                    'kode_kandang': $('#kode_kandang').val(),
                },


                success :function (response) {
                    $('#tkandang').DataTable().destroy();
                    loadData();
                    $('#mkandang').modal('hide');
                },

            });
        });

        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('kandang/delete') }}/"+id,

                    success :function () {

                        $('#tkandang').DataTable().destroy();
                        loadData();


                    }
                })
            }
        });

        $('#mkandang').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            let hapusValidasi = document.getElementById('formkandang');
            hapusValidasi.querySelectorAll('.form-control').forEach(hapusValidasi => {
                hapusValidasi.classList.remove('label');
                hapusValidasi.classList.remove('is-valid');
                hapusValidasi.classList.remove('is-invalid');
                hapusValidasi.classList.remove('required');
            });
        });

    });

    function printBarcode(){
            if($('input:checked').length < 1){
                alert('Pilih data yang akan dicetak!');
            }else{
                $('#form-kandang').attr('target', '_blank').attr('action', "kandang/cetak").submit();
            }
        }


</script>
@endsection
