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
                    <button class="btn btn-primary m-r-5" id="addhewan">
                        <i class="anticon anticon-plus"></i>
                        Add Hewan
                    </button>
                </h4>
            </div>

            {{--        TABEL Hewan--}}
            <div class="card-body">
                <table id="thewan" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Nama Hewan</th>
                        <th>Jenis Hewan</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
{{--    MODAL DAN FORM DATA Hewan--}}
<div id="mhewan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Data Hewan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form id="formhewan">
                    {{ csrf_field() }}

                    <div class="form-group" id="div_kode">
                        <label for="kode">Kode</label>
                        <input type="text"  class="form-control" id="kode" name="kode" readonly>
                    </div>
                    <div class="form-group" id="div_userid">
                        <label for="user_id">ID User</label>
                        <input type="text"  class="form-control" id="user_id" name="user_id" value="{{ Auth::User()->user_id }}">
                    </div>

                    <div class="form-group">
                        <label for="nama_hewan">Nama Hewan</label>
                        <input type="text"  class="form-control" id="nama_hewan" name="nama_hewan" placeholder="Nama Hewan">
                        <span class="text-danger" id="nama_hewanError"></span>
                    </div>

                    <div class="form-group" id="div_jenis">
                            <label for="jenis_hewan_id">Jenis Hewan</label>
                            <select class="form-control" id="jenis_hewan_id" name="jenis_hewan_id">
                                <option value="">Pilih jenis</option>
                            </select>
                            <span class="text-danger" id="jenis_hewan_idError"></span>
                    </div>

                    <div class="form-group" >
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="1">Jantan</option>
                            <option value="2">Betina</option>
                        </select>
                        <span class="text-danger" id="jenis_kelaminError"></span>
                    </div>

                    <div class="form-group">
                        <label for="ket">Ras Hewan</label>
                        <input type="text"  class="form-control" id="ket" name="ket" placeholder="Keterangan">
                        <span class="text-danger" id="ketError"></span>
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


{{--    MODAL DAN FORM DETAIL Hewan--}}
<div id="mdhewan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Hewan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form>

                    <div class="card">
                        <div class="card-body">
                            <table width="400">
                                <tr>
                                    <td>
                                        <a class="text-gray">Kode</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dkode"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Nama</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dnama"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Pemilik</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="duser_nama"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Jenis</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="djenis"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Jenis Kelamin</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="djenis_kelamin"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Keterangan</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dket"></a>
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
            $('#thewan').dataTable({
                "ajax": "{{ url('/hewan/data') }}",
                "columns": [
                    { "data": "nama_hewan" },
                    { "data": "jenis_hewan.nama",
                        sClass: 'text-center', },
                    { "data": "jenis_kelamin",
                        sClass: 'text-center',},
                    {
                        data: 'kode',
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
        } loadData();


        $(document).on('click', '#addhewan', function() {
            var idmodal = "{{ $idmodal }}";
            $('#mhewan').modal('show');
            document.getElementById('div_kode').style.display = 'block';
            document.getElementById('div_userid').style.display = 'none';
            $('#kode').val(idmodal).change();
            $('#formhewan').attr('action', '{{ url('hewan/create') }}');
        });

        $('#formhewan').submit(function(e) {
            e.preventDefault();
            $('#nama_hewanError').addClass('d-none');
            $('#jenis_kelaminError').addClass('d-none');
            $('#jenis_hewan_idError').addClass('d-none')
            $.ajax({
                url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                type: 'post',
                data: {
                    'kode': $('#kode').val(),
                    'user_id': $('#user_id').val(),
                    'jenis_hewan_id': $('#jenis_hewan_id').val(),
                    'nama_hewan': $('#nama_hewan').val(),
                    'jenis_kelamin': $('#jenis_kelamin').val(),
                    'ket': $('#ket').val(),

                },


                success :function (response) {
                    $('#thewan').DataTable().destroy();
                    loadData();
                    $('#mhewan').modal('hide');
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
            var data = $('#thewan').DataTable().row($(this).parents('tr')).data();
            $('#mhewan').modal('show');
            document.getElementById('div_kode').style.display = 'none';
            document.getElementById('div_userid').style.display = 'none';
            $('#nama_hewan').val(data.nama_hewan).change();
            $('#jenis_hewan_id').val(data.jenis_hewan_id).change();
            if (data.jenis_kelamin=="Jantan"){
                $('#jenis_kelamin').val(1).change();
            }
            else{
                $('#jenis_kelamin').val(2).change();
            }
            $('#ket').val(data.ket).change();
            $('#formhewan').attr('action', '{{ url('hewan/update') }}/'+data.kode);
        });

        $(document).on('click', '#detail', function() {
            var data = $('#thewan').DataTable().row($(this).parents('tr')).data();
            $('#mdhewan').modal('show');
            $('#dkode').text(data.kode);
            $('#dnama').text(data.nama_hewan);
            $('#duser_nama').text(data.users.nama);
            $('#djenis').text(data.jenis_hewan.nama);
            $('#djenis_kelamin').text(data.jenis_kelamin);
            $('#dket').text(data.ket);
        });

        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('hewan/delete') }}/"+id,

                    success :function () {

                        $('#thewan').DataTable().destroy();
                        loadData();


                    }
                })
            }
        });



        $.ajax({
            url: '{{ url('hewan/listjenis') }}',
            dataType: "json",
            success: function(data) {
                var role = jQuery.parseJSON(JSON.stringify(data));
                $.each(role, function(k, v) {
                    $('#jenis_hewan_id').append($('<option>', {value:v.jenis_hewan_id}).text(v.nama))
                })
            }
        });

        $('#mhewan').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            let hapusValidasi = document.getElementById('formhewan');
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
