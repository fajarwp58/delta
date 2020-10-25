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
                    History Transaksi
                </h4>
            </div>
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
                "order": [[ 2, "desc" ]],
                "columns": [
<<<<<<< HEAD
                    { "data": "transaksi_pemeriksaan_id",
                        sClass: 'text-center' },
                    { "data": "hewan.nama_hewan",
                        sClass: 'text-center'},
                    { "data": "clinical_sign",
=======
                    { "data": "kode_transaksi",
                        sClass: 'text-center' },
                    { "data": "hewan.nama_hewan",
                        sClass: 'text-center'},
                    { "data": "waktu",
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
                        sClass: 'text-center'},
                    { "data": "layanan",
                        sClass: 'text-center'},
                    { "data": "total_harga",
                        sClass: 'text-center'},
                    {
<<<<<<< HEAD
                        data: 'transaksi_pemeriksaan_id',
=======
                        data: 'kode_transaksi',
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
                        sClass: 'text-center',
                        render: function(data) {
                            return'<a href="#" data-id="'+data+'" id="cetak" class="btn btn-warning waves-effect waves-light btn-xs" title="cetak">cetak </a> &nbsp;';
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
                        width: "70px",
                        targets: [2]
                    },
                    {
                        width: "125px", targets: [3],
                        render: function (data, type, full, meta) {
                            var hasil = '';
                            data.forEach((item, id)=>{
                                hasil += '- '+item.nama+'<br>';
                            });
                            return hasil;
                        }
                    },
                    {
                        width: "70px",
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

        $(document).on('click', '#cetak', function() {
            var data = $('#ttransaksilainnya').DataTable().row($(this).parents('tr')).data();
<<<<<<< HEAD
            window.location.href = '{{ url('transaksilainnya/cetak') }}/'+data.transaksi_pemeriksaan_id ;
=======
            window.location.href = '{{ url('transaksilainnya/cetak') }}/'+data.kode_transaksi ;
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
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
