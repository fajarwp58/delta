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
                "ajax": "{{ url('/transaksilainnya/dataHistory') }}",
                "order": [[ 2, "desc" ]],
                "columns": [
                    { "data": "transaksi_pemeriksaan_id",
                        sClass: 'text-center' },
                    { "data": "nama_hewan",
                        sClass: 'text-center'},
                    { "data": "clinical_sign",
                        sClass: 'text-center'},
                    { "data": "total_harga",
                        sClass: 'text-center'},
                    {
                        data: 'transaksi_pemeriksaan_id',
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
                        width: "70px",
                        targets: [3]
                    },
                    {
                        width: "150px",
                        targets: [4]
                    },
                ],
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
            });
        } loadData();

        $(document).on('click', '#cetak', function() {
            var data = $('#ttransaksilainnya').DataTable().row($(this).parents('tr')).data();
            window.location.href = '{{ url('transaksilainnya/cetak') }}/'+data.transaksi_pemeriksaan_id ;
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
