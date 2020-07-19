@extends('layouts.main')
@extends('layouts.topbar')
@extends('layouts.sidebar')

@section('content')
<style>
    .box{position: relative;}
    .card{ width: 501.732pt; height: 147.402pt; }
    .kode{
       position: absolute;
       top: 110pt;
       left: 10pt;
       color: #fff;
       font-size: 15pt;
     }
     .barcode{
       position: absolute;
       top: 15pt;
       left: 280pt;
       font-size: 10pt;
     }
  </style>
<br />
<div class="row">
    <div class="col-12">
        <div style="background:#333;color:#fff;margin:5px 0;padding:10px 0">
            <marquee direction="left" scrolldelay="20" truespeed="truespeed" scrollamount="1" onmouseover="this.stop()" onmouseout="this.start()">
                Selamat Datang di Web Delta Animal Medical Care
            </marquee>
        </div>
    </div>
</div>
<br />
<div class="row">
    <div class="col-lg-9 col-xl-9">
        <div class="card-box">

            <div class="card-body">
                <form method="post" id="form-member">
                    {{ csrf_field() }}
                <table id="tuser" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        {{-- <th width="20"><input type="checkbox" value="1" id="select-all"></th> --}}
                        <th width="20"></th>
                        <th>Username</th>
                        <th>phone</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
                </form>
            </div>

            <table width="100%">

                @foreach($datamember as $data)
                <tr>
                  <td align="center">
                  <div class="box">
                    <img src="{{ asset('assets/card.png') }}" class="card">
                    <div class="kode">{{ $data->nama }}</div>
                    <div class="barcode">
                      <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG( $data->user_id, 'C39') }}" height="30" width="130">
                      <br>{{ $data->user_id }}
                    </div>
                  </div>
                  </td>
                </tr>
                @endforeach

               </table>

            <center><a onclick="printCard()" class="btn btn-info"> Cetak Kartu</a></center>

        </div> <!-- end card-box-->

    </div> <!-- end col -->

    <div class="col-lg-3 col-xl-3">
        <div class="card-box text-center">

            <h4 class="mb-0">Pasien User</h4>

            <div class="text-left mt-2">
                <p class="text-muted mb-2 font-13"><strong>Nama :</strong> <span class="ml-2">{{ Auth::User()->nama }}</span></p>

                <p class="text-muted mb-2 font-13"><strong>No Hp :</strong><span class="ml-2">{{ Auth::User()->phone }}</span></p>

                <p class="text-muted mb-2 font-13"><strong>Alamat :</strong> <span class="ml-2 ">{{ Auth::User()->alamat }}</span></p>
            </div>

        </div> <!-- end card-box -->

        <div class="card-box">
            <h4 class="header-title mb-3">List Jadwal</h4>

            <div class="text-left mt-2">
                //
            </div>

        </div> <!-- end card-box-->

    </div> <!-- end col-->


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
            $('#tuser').dataTable({
                "ajax": "{{ url('/profile/dataPasien') }}",
                "columns": [
                    { data: 'user_id',
                      render: function(data){
                        return'<input type="checkbox" name="user_id[]" value="'+data+'" checked>';
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
                            return'<a href="#" data-id="'+data+'" id="edit" class="btn btn-warning waves-effect waves-light btn-xs" title="edit">edit </a> &nbsp;';
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
                paging: false,
                info: false,
                searching : false,
            });
        } loadData();

        $('#select-all').click(function(){
            $('input[type="checkbox"]').prop('checked', this.checked);
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

                    document.location.reload();
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
            $('#formuser').attr('action', '{{ url('profile/update') }}/'+data.user_id);
        });

        $.ajax({
            url: '{{ url('profile/listrolePasien') }}',
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
                $('#form-member').attr('target', '_blank').attr('action', "profile/printCard").submit();
            }
        }


</script>

@endsection
