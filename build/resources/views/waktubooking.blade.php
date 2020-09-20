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
                    <button class="btn btn-primary m-r-5" id="addwakbooking">
                        <i class="anticon anticon-plus"></i>
                        Add Waktu Booking
                    </button>
                </h4>
            </div>

            {{--        TABEL Waktu booking--}}
            <div class="card-body">
                <table id="twakbooking" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Jam Awal</th>
                        <th>Jam Akhir</th>
                        <th>Status Waktu </th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
{{--    MODAL DAN FORM DATA Waktu booking--}}
<div id="mwakbooking" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Waktu Booking</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form id="formwakbooking">
                    {{ csrf_field() }}

                    <div class="form-group" id="div_wakbooking_id">
                            <label for="waktu_booking_id">Waktu ID</label>
                            <input type="text"  class="form-control" id="waktu_booking_id" name="waktu_booking_id" readonly>
                    </div>
                    <div class="form-group" >
                            <label for="jam">Jam Awal</label>
                            <input type="time"  class="form-control" id="jam" name="jam" placeholder="Jam Awal" >
                            <span class="text-danger" id="jamError"></span>
                    </div>

                    <div class="form-group" >
                        <label for="jam_akhir">Jam Akhir</label>
                        <input type="time"  class="form-control" id="jam_akhir" name="jam_akhir" placeholder="Jam Akhir" >
                        <span class="text-danger" id="jam_akhirError"></span>
                    </div>

                    <div class="form-group">
                            <label for="status_waktu">Status Waktu</label>
                            <select class="form-control" id="status_waktu" name="status_waktu">
                                <option value="">Pilih Status</option>
                                <option value="1">Tersedia</option>
                                <option value="2">Tidak Tersedia</option>
                            </select>
                            <span class="text-danger" id="status_waktuError"></span>
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
            $('#twakbooking').dataTable({
                "ajax": "{{ url('/waktubooking/data') }}",
                "columns": [
                    { "data": "jam_awal",
                        sClass: 'text-center', },
                    { "data": "jam_akhir",
                        sClass: 'text-center', },
                    { "data": "status_waktu",
                        sClass: 'text-center',},
                    {
                        data: 'waktu_booking_id',
                        sClass: 'text-center',
                        render: function(data) {
                                return'<a href="#" data-id="'+data+'" id="edit" class="btn btn-warning waves-effect waves-light btn-xs" title="edit">edit </a> &nbsp;'+
                                '<a href="#" data-id="'+data+'" id="delete" class="btn btn-danger waves-effect waves-light btn-xs" title="hapus">delete </a>';
                        }
                    }
                ],
                columnDefs: [
                    {
                        width: "100px",
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
                    }
                ],
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
            });
        } loadData();


        $(document).on('click', '#addwakbooking', function() {
            var idmodal = "{{ $idmodal }}";
            $('#mwakbooking').modal('show');
            document.getElementById('div_wakbooking_id').style.display = 'block';
            $('#waktu_booking_id').val(idmodal).change();
            $('#formwakbooking').attr('action', '{{ url('waktubooking/create') }}');
        });

        $('#formwakbooking').submit(function(e) {
            e.preventDefault();
            $('#jamError').addClass('d-none');
            $('#status_waktuError').addClass('d-none');
            $.ajax({
                url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                type: 'post',
                data: {
                    'waktu_booking_id': $('#waktu_booking_id').val(),
                    'jam': $('#jam').val(),
                    'jam_akhir': $('#jam_akhir').val(),
                    'status_waktu': $('#status_waktu').val(),
                },


                success :function (response) {
                    $('#twakbooking').DataTable().destroy();
                    loadData();
                    $('#mwakbooking').modal('hide');

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
            var data = $('#twakbooking').DataTable().row($(this).parents('tr')).data();
            $('#mwakbooking').modal('show');
            document.getElementById('div_wakbooking_id').style.display = 'none';
            $('#jam').val(data.jam_awal).change();
            $('#jam_akhir').val(data.jam_akhir).change();
            if(data.status_waktu=="Tersedia"){
                $('#status_waktu').val(1).change();
            }
            else{
                $('#status_waktu').val(2).change();
            }
            $('#formwakbooking').attr('action', '{{ url('waktubooking/update') }}/'+data.waktu_booking_id);
        });

        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('waktubooking/delete') }}/"+id,

                    success :function () {

                        $('#twakbooking').DataTable().destroy();
                        loadData();


                    }
                })
            }
        });

        $('#mwakbooking').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            let hapusValidasi = document.getElementById('formwakbooking');
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
