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
                    <button class="btn btn-primary m-r-5" id="adduser">
                        <i class="anticon anticon-plus"></i>
                        Add User
                    </button>
                    <a onclick="printCard()" class="btn btn-info"> Cetak Kartu</a>
                </h4>
            </div>

            {{--        TABEL USER--}}
            <div class="card-body">
                <form method="post" id="form-member">
                    {{ csrf_field() }}
                <table id="tuser" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th width="20"><input type="checkbox" value="1" id="select-all"></th>
                        <th>Username</th>
                        <th>phone</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
                </form>
            </div>
        </div>
    </div>
</div>
{{--    MODAL DAN FORM DATA USER--}}
<div id="muser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form id="formuser">
                    {{ csrf_field() }}

                    <div class="form-group" id="div_userid">
                        <label for="user_id">ID User</label>
                        <input type="text"  class="form-control" id="user_id" name="user_id">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text"  class="form-control" id="nama" name="nama" placeholder="Nama">
                        <span class="text-danger" id="namaError"></span>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text"  class="form-control" id="phone" name="phone" placeholder="Phone">
                        <span class="text-danger" id="phoneError"></span>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea type="text"  class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                        <span class="text-danger" id="alamatError"></span>
                    </div>

                    <div class="form-group" id="div_role">
                        <div class="form-group col-md-9">
                            <label for="Role">Role</label>
                            <select class="form-control" id="role_id" name="role_id">
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="div_username">
                        <div class="form-group col-md-12">
                            <label for="username">Username</label>
                            <input type="text"  class="form-control" id="username" name="username" placeholder="Username">
                            <span class="text-danger" id="usernameError"></span>
                        </div>
                    </div>

                    <div class="form-group" id="div_password">
                        <div class="form-group col-md-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <span class="text-danger" id="passwordError"></span>
                        </div>
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


{{--    MODAL DAN FORM DETAIL USER--}}
<div id="mduser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form>

                    <div class="card">
                        <div class="card-body">
                            <table width="400">
                                <tr>
                                    <td>
                                        <a class="text-gray">ID User</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="duser_id"></a>
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
                                        <a class="text-gray">Phone</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dphone"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Alamat</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dalamat"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Role</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="drole"></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>

                </form>
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
                language: {
                    search: '<span>Cari:</span> _INPUT_',
                    searchPlaceholder: 'Cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });
            function loadData() {
                $('#tuser').dataTable({
                    "ajax": "{{ url('/kelolauser/dataPasien') }}",
                    "columns": [
                        { data: 'user_id',
                          render: function(data){
                            return'<input type="checkbox" name="user_id[]" value="'+data+'">';
                            }
                        },
                        { "data": "username" },
                        { "data": "phone",
                            sClass: 'text-center', },
                        { "data": "role.nama",
                            sClass: 'text-center',},
                        {
                            data: 'user_id',
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
                        {
                            width: "100px",
                            targets: [4]
                        },
                    ],
                    scrollX: true,
                    scrollY: '350px',
                    scrollCollapse: true,
                });
            } loadData();

            $('#select-all').click(function(){
                $('input[type="checkbox"]').prop('checked', this.checked);
            });

            $(document).on('click', '#adduser', function() {
                var idmodal = "{{ $idmodal }}";
                $('#muser').modal('show');
                document.getElementById('div_password').style.display = 'block';
                document.getElementById('div_username').style.display = 'block';
                document.getElementById('div_userid').style.display = 'block';
                document.getElementById('div_role').style.display = 'block';
                $('#user_id').val(idmodal).change();
                $('#formuser').attr('action', '{{ url('kelolauser/create') }}');
            });

            $('#formuser').submit(function(e) {
                e.preventDefault();
                $('#namaError').addClass('d-none');
                $('#phoneError').addClass('d-none');
                $('#alamatError').addClass('d-none');
                $('#usernameError').addClass('d-none');
                $('#passwordError').addClass('d-none');
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: {
                        'user_id': $('#user_id').val(),
                        'role_id': $('#role_id').val(),
                        'nama': $('#nama').val(),
                        'phone': $('#phone').val(),
                        'alamat': $('#alamat').val(),
                        'username': $('#username').val(),
                        'password': $('#password').val(),

                    },


                    success :function (response) {
                        $('#tuser').DataTable().destroy();
                        loadData();
                        $('#muser').modal('hide');
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
                var data = $('#tuser').DataTable().row($(this).parents('tr')).data();
                $('#muser').modal('show');
                document.getElementById('div_password').style.display = 'none';
                document.getElementById('div_role').style.display = 'none';
                document.getElementById('div_username').style.display = 'none';
                document.getElementById('div_userid').style.display = 'none';
                $('#nama').val(data.nama).change();
                $('#phone').val(data.phone).change();
                $('#alamat').val(data.alamat).change();
                $('#nama').val(data.nama).change();
                $('#formuser').attr('action', '{{ url('kelolauser/update') }}/'+data.user_id);
            });

            $(document).on('click', '#detail', function() {
                var data = $('#tuser').DataTable().row($(this).parents('tr')).data();
                $('#mduser').modal('show');
                $('#duser_id').text(data.user_id);
                $('#dnama').text(data.nama);
                $('#dphone').text(data.phone);
                $('#dalamat').text(data.alamat);
                $('#drole').text(data.role.nama);
            });

            $(document).on('click', '#delete', function() {
                var id = $(this).data('id');
                if (confirm("Yakin ingin menghapus data?")){
                    $.ajax({
                        url : "{{ url('kelolauser/delete') }}/"+id,

                        success :function () {

                            $('#tuser').DataTable().destroy();
                            loadData();


                        }
                    })
                }
            });



            $.ajax({
                url: '{{ url('kelolauser/listrolePasien') }}',
                dataType: "json",
                success: function(data) {
                    var role = jQuery.parseJSON(JSON.stringify(data));
                    $.each(role, function(k, v) {
                        $('#role_id').append($('<option>', {value:v.role_id}).text(v.nama))
                    })
                }
            });

            $('#muser').on('hidden.bs.modal', function () {
                $(this).find('form').trigger('reset');
                let hapusValidasi = document.getElementById('formuser');
                hapusValidasi.querySelectorAll('.form-control').forEach(hapusValidasi => {
                    hapusValidasi.classList.remove('label');
                    hapusValidasi.classList.remove('is-valid');
                    hapusValidasi.classList.remove('is-invalid');
                    hapusValidasi.classList.remove('required');
                });
            });


        });

        function printCard(){
                if($('input:checked').length < 1){
                    alert('Pilih data yang akan dicetak!');
                }else{
                    $('#form-member').attr('target', '_blank').attr('action', "printCard").submit();
                }
            }


    </script>
@endsection

