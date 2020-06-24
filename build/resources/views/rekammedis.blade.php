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
                       Tambah Rekam Medis Delta Animal Medical Care
                </h4>
            </div>

            {{--        TABEL USER--}}
            <div class="card-body">
                <table id="thewan" class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Hewan</th>
                            <th>Jenis Hewan</th>
                            <th>Jenis Kelamin</th>
                            <th>+Rekam Medis</th>
                        </tr>
                    </thead>
                </table>
            </div>


<br /><br />
            <div class="card-header">
                <h4 class="card-title">
                       Kelola Data Rekam Medis Delta Animal Medical Care
                </h4>
            </div>

            {{--        TABEL USER--}}
            <div class="card-body">
                <table id="trekammedis" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Nama Hewan</th>
                            <th>Clinical Sign</th>
                            <th>Diagnosa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

{{--    MODAL DAN FORM DATA Rekammedis--}}
<div id="mrekammedis" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Rekam Medis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form id="formrekammedis">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="anamnesa" class="col-2 col-form-label">Anamnesa</label>
                            <textarea type="text"  class="form-control" id="anamnesa" name="anamnesa" placeholder="Anamnesa" required></textarea>
                        <span class="text-danger" id="anamnesaError"></span>
                    </div>
                    <div class="form-group">
                        <label for="diagnosa" class="col-2 col-form-label">Diagnosa</label>
                            <textarea type="text"  class="form-control" id="diagnosa" name="diagnosa" placeholder="Diagnosa" required></textarea>
                        <span class="text-danger" id="diagnosaError"></span>
                    </div>
                    <div class="form-group">
                        <label for="pragnosa" class="col-2 col-form-label">Pragnosa</label>
                            <textarea type="text"  class="form-control" id="pragnosa" name="pragnosa" placeholder="Pragnosa" required></textarea>
                        <span class="text-danger" id="pragnosaError"></span>
                    </div>
                    <div class="form-group">
                        <label for="terapi" class="col-2 col-form-label">Terapi</label>
                            <input type="text"  class="form-control" id="terapi" name="terapi" placeholder="Terapi (Boleh Kosong)" >
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
            $('#thewan').dataTable({
                "ajax": "{{ url('/rekammedis/datahewan') }}",
                "columns": [
                    { "data": "nama_hewan",
                        sClass: 'text-center' },
                    { "data": "jenis_hewan.nama",
                        sClass: 'text-center' },
                    { "data": "jenis_kelamin",
                        sClass: 'text-center'},
                    {
                            data: 'kode',
                            sClass: 'text-center',
                            render: function(data) {
                                return'<a href="#" data-id="'+data+'" id="addrekammedis" class="btn btn-success waves-effect waves-light btn-xs" title="tambah rekam medis"> <span class="btn-label"><i class="dripicons-document-new"></i></span>Tambah</a>';
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
                    {
                        width: "100px",
                        targets: [3]
                    },
                ],
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
            });
        } loadData();

        function loadData2() {
            $('#trekammedis').dataTable({
                "ajax": "{{ url('/rekammedis/data') }}",
                "columns": [
                    { "data": "hewan.nama_hewan",
                        sClass: 'text-center' },
                    { "data": "clinical_sign",
                        sClass: 'text-center' },
                    { "data": "diagnosa",
                        sClass: 'text-center'},
                    {
                            data: 'riwayat_pemeriksaan_id',
                            sClass: 'text-center',
                            render: function(data) {
                                return'<a href="#" data-id="'+data+'" id="detail" class="btn btn-info waves-effect waves-light btn-xs" title="detail">detail </a> &nbsp;'+
                                '<a href="#" data-id="'+data+'" id="edit" class="btn btn-warning waves-effect waves-light btn-xs" title="edit">edit </a> &nbsp;'+
                                '<a href="#" data-id="'+data+'" id="delete" class="btn btn-danger waves-effect waves-light btn-xs" title="hapus">delete </a>';
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
                    {
                        width: "100px",
                        targets: [3]
                    },
                ],
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
            });
        } loadData2();

            $(document).on('click', '#addrekammedis', function() {
                    var data = $('#thewan').DataTable().row($(this).parents('tr')).data();
                    window.location.href = '{{ url('rekammedis/addrekammedis') }}/'+data.kode ;
                });

            $('#formrekammedis').submit(function(e) {
            e.preventDefault();
            $('#anamnesaError').addClass('d-none');
            $('#diagnosaError').addClass('d-none');
            $('#pragnosaError').addClass('d-none');
            $.ajax({
                url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                type: 'post',
                data: {
                    'anamnesa': $('#anamnesa').val(),
                    'pragnosa': $('#pragnosa').val(),
                    'diagnosa': $('#diagnosa').val(),
                    'terapi': $('#terapi').val(),
                },


                success :function (response) {
                    $('#trekammedis').DataTable().destroy();
                    loadData2();
                    $('#mrekammedis').modal('hide');
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
            var data = $('#trekammedis').DataTable().row($(this).parents('tr')).data();
            $('#mrekammedis').modal('show');
            $('#anamnesa').val(data.anamnesa).change();
            $('#diagnosa').val(data.diagnosa).change();
            $('#pragnosa').val(data.pragnosa).change();
            $('#terapi').val(data.terapi).change();
            $('#formrekammedis').attr('action', '{{ url('rekammedis/update') }}/'+data.riwayat_pemeriksaan_id);
        });

        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('rekammedis/delete') }}/"+id,

                    success :function () {

                        $('#trekammedis').DataTable().destroy();
                        loadData2();


                    }
                })
            }
        });

        $('#mrekammedis').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            let hapusValidasi = document.getElementById('formrekammedis');
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
