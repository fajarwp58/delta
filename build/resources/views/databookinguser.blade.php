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
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
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
                "ajax": "{{ url('/booking/databooking/dataUser') }}",
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
                            return'<button href="#" data-id="'+data+'" id="batal" class="btn btn-danger waves-effect waves-light btn-xs" title="Batal">Batal </button>';
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
            $('#jam').val(data.jam).change();
            if (data.status=="Tidak Disetujui"){
                $('#statuss').val(1).change();
            }
            else{
                $('#statuss').val(2).change();
            }
            $('#formdatabooking').attr('action', '{{ url('booking/databooking/update') }}/'+data.waktu_booking_id);
        });

        $(document).on('click', '#detail', function() {
            var data = $('#tdatabooking').DataTable().row($(this).parents('tr')).data();
            $('#mddatabooking').modal('show');
            $('#dbookingid').text(data.booking_id);
            $('#dnama').text(data.nama);
            $('#dnamahewan').text(data.nama_hewan);
            $('#dwaktubookingid').text(data.jam);
            $('#dtanggalbooking').text(data.tanggal_booking);
            $('#dstatus').text(data.status);
        });

        $(document).on('click', '#batal', function() {

            var id = $(this).data('id');
            if (confirm("Yakin ingin membatalkan bookingan?")){
                $.ajax({
                    url : "{{ url('booking/databooking/delete') }}/"+id,

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
