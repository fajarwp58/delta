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
                    Data Booking Delta Animal Medical Care
                </h4>
            </div>

            {{--        TABEL Hewan--}}
            <div class="card-body">
                <table id="tdatabooking" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Waktu Booking</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
{{--    MODAL DAN FORM DATA Hewan--}}
<div id="mdatabooking" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Booking</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form id="formdatabooking">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="waktu_booking_id">Tanggal / Waktu Booking</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input class="form-control text-center" name="tanggal_booking" value="{{ $now }}" readonly />
                            </div>
                            <div class="col-sm-6">
                                <input type="time" class="form-control text-center" id="jam" name="jam" value="" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="statuss">Status</label>
                        <select class="form-control" id="statuss" name="statuss" required>
                            <option value="">Pilih Status</option>
                            <option value="1">Belum Disetujui</option>
                            <option value="2">Disetujui</option>
                            <option value="3">Datang</option>
                            <option value="4">tidak datang / Dibatalkan</option>
                        </select>
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
<div id="mddatabooking" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Booking</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form>

                    <div class="card">
                        <div class="card-body">
                            <table width="400">
                                <tr>
                                    <td>
                                        <a class="text-gray">Booking ID</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dbookingid"></a>
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
                                        <a class="text-gray">Nama Hewan</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dnamahewan"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Jam Booking</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dwaktubookingid"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Tanggal Booking</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dtanggalbooking"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Status</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dstatus"></a>
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
            $('#tdatabooking').dataTable({
                "ajax": "{{ url('/booking/databooking/data') }}",
                "order": [[ 2, "desc" ]],
                "columns": [
                    { "data": "jam_awal",
                        sClass: 'text-center' },
                    { "data": "nama",
                        sClass: 'text-center' },
                    { "data": "tanggal_booking",
                        sClass: 'text-center'},
                    { "data": "status",
                        sClass: 'text-center'},
                    {
                        data: 'booking_id',
                        sClass: 'text-center',
                        render: function(data) {
                            return'<a href="#" data-id="'+data+'" id="detail" class="btn btn-info waves-effect waves-light btn-xs" title="detail">detail </a> &nbsp;'+
                                '<a href="#" data-id="'+data+'" id="edit" class="btn btn-warning waves-effect waves-light btn-xs" title="edit">edit </a> &nbsp;'+
                                '<a href="#" data-id="'+data+'" id="delete2" class="btn btn-danger waves-effect waves-light btn-xs" title="hapus">delete </a>';
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
                        width: "50px",
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

        $('#formdatabooking').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                type: 'post',
                data: {
                    'statuss': $('#statuss').val(),
                },


                success :function (response) {
                    $('#tdatabooking').DataTable().destroy();
                    loadData();
                    $('#mdatabooking').modal('hide');
                },

            });
        });

        $(document).on('click', '#edit', function() {
            var data = $('#tdatabooking').DataTable().row($(this).parents('tr')).data();
            $('#mdatabooking').modal('show');
            $('#jam').val(data.jam_awal).change();
            if (data.status=="Tidak Disetujui"){
                $('#statuss').val(1).change();
            }
            else{
                $('#statuss').val(2).change();
            }
            $('#formdatabooking').attr('action', '{{ url('booking/databooking/update') }}/'+data.booking_id);
        });

        $(document).on('click', '#detail', function() {
            var data = $('#tdatabooking').DataTable().row($(this).parents('tr')).data();
            $('#mddatabooking').modal('show');
            $('#dbookingid').text(data.booking_id);
            $('#dnama').text(data.nama);
            $('#dnamahewan').text(data.nama_hewan);
<<<<<<< HEAD
            $('#dwaktubookingid').text(data.jam_awal);
=======
            $('#dwaktubookingid').text(data.jam);
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
            $('#dtanggalbooking').text(data.tanggal_booking);
            $('#dstatus').text(data.status);
        });

        $(document).on('click', '#delete2', function() {
            var id = $(this).data('id');
            if (confirm("Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('booking/databooking/delete2') }}/"+id,

                    success :function () {

                        $('#tdatabooking').DataTable().destroy();
                        loadData();


                    }
                })
            }
        });



        $.ajax({
            url: '{{ url('booking/databooking/listwaktu') }}',
            dataType: "json",
            success: function(data) {
                var waktu_booking = jQuery.parseJSON(JSON.stringify(data));
                $.each(waktu_booking, function(k, v) {
                    $('#waktu_booking_id').append($('<option>', {value:v.waktu_booking_id}).text(v.jam))
                })
            }
        });

        $('#mdatabooking').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            let hapusValidasi = document.getElementById('formdatabooking');
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
