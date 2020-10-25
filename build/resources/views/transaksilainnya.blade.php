@extends('layouts.main')
@extends('layouts.topbar')
@extends('layouts.sidebar')

@section('content')
@if(Auth::user()->role_id == 'R02')
<br /><br />
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="col-lg-12">
    <div class="card-box pb-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Kelola Transaksi
                </h4>
            </div>

            {{--        TABEL Penyakit--}}
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
{{--    MODAL DAN FORM DATA Penyakit--}}
<div id="mtransaksilainnya" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Transaksi Lainnya</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form id="formtransaksilainnya">
                    {{ csrf_field() }}

                    <div class="form-group" id="div_kodelainnya">
                        <label for="kode_lainnya">ID</label>
                        <input type="text"  class="form-control" id="kode_lainnya" name="kode_lainnya" readonly>
                    </div>
                    <div class="form-group" id="div_kodetransaksi">
                        <label for="kode_transaksi">ID</label>
                        <input type="text"  class="form-control" id="kode_transaksi" name="kode_transaksi" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Layanan</label>
                        <input type="text"  class="form-control" id="nama" name="nama" placeholder="Nama Layanan lainnya">
                        <span class="text-danger" id="namaError"></span>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text"  class="form-control" id="harga" name="harga" placeholder="Harga layanan">
                        <span class="text-danger" id="hargaError"></span>
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


{{--    MODAL DAN FORM DETAIL Penyakit--}}
<div id="mdtransaksilainnya" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form>

                    <div class="card">
                        <div class="card-body">
                            <table width="400">
                                <tr>
                                    <td>
                                        <a class="text-gray">No Invoice</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dkodetransaksi"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Dokter</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dnamadokter"></a>
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
                                        <a class="text-gray">Waktu</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dwaktu"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Total Transaksi</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dtotal"></a>
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

@else
<br /><br />
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="col-lg-12">
    <div class="card-box pb-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Kelola Transaksi
                </h4>
            </div>

            {{--        TABEL Penyakit--}}
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
{{--    MODAL DAN FORM DATA Penyakit--}}
<div id="mtransaksilainnya" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Transaksi Lainnya</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form id="formtransaksilainnya">
                    {{ csrf_field() }}

                    <div class="form-group" id="div_kodelainnya">
                        <label for="kode_lainnya">ID</label>
                        <input type="text"  class="form-control" id="kode_lainnya" name="kode_lainnya" readonly>
                    </div>
                    <div class="form-group" id="div_kodetransaksi">
                        <label for="kode_transaksi">ID</label>
                        <input type="text"  class="form-control" id="kode_transaksi" name="kode_transaksi" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Layanan</label>
                        <input type="text"  class="form-control" id="nama" name="nama" placeholder="Nama Layanan lainnya">
                        <span class="text-danger" id="namaError"></span>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text"  class="form-control" id="harga" name="harga" placeholder="Harga layanan">
                        <span class="text-danger" id="hargaError"></span>
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
@endif


@endsection

@section('js')
<script src="assets/jquery.dataTables.min.js"></script>
<script src="assets/dataTables.bootstrap.min.js"></script>
@if(Auth::user()->role_id == 'R02')
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
                    { "data": "transaksi_pemeriksaan_id",
                        sClass: 'text-center' },
                    { "data": "hewan.nama_hewan",
                        sClass: 'text-center'},
                    { "data": "clinical_sign",
                        sClass: 'text-center'},
                    { "data": "layanan",
                        sClass: 'text-center'},
                    { "data": "total_harga",
                        sClass: 'text-center'},
                    {
                        data: 'kode_transaksi',
                        sClass: 'text-center',
                        render: function(data) {
                            return'<a href="#" data-id="'+data+'" id="tambah" class="btn btn-info waves-effect waves-light btn-xs" title="tambah">tambah </a> &nbsp;'+
                                '<a href="#" data-id="'+data+'" id="detail" class="btn btn-warning waves-effect waves-light btn-xs" title="detail">detail </a> &nbsp;';
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


        $(document).on('click', '#tambah', function() {
            var data = $('#ttransaksilainnya').DataTable().row($(this).parents('tr')).data();
            var idmodal = "{{ $idmodal }}";
            $('#mtransaksilainnya').modal('show');
            document.getElementById('div_kodelainnya').style.display = 'none';
            //document.getElementById('div_kodepenyakit').style.display = 'block';
            $('#kode_lainnya').val(idmodal).change();
            $('#kode_transaksi').val(data.transaksi_pemeriksaan_id).change();
            $('#formtransaksilainnya').attr('action', '{{ url('transaksilainnya/create') }}');
        });

        $('#formpenyakit').submit(function(e) {
            e.preventDefault();
            $('#namaError').addClass('d-none');
            $('#jenis_penyakit_idError').addClass('d-none');
            $.ajax({
                url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                type: 'post',
                data: {
                    'kode_penyakit': $('#kode_penyakit').val(),
                    'jenis_penyakit_id': $('#jenis_penyakit_id').val(),
                    'nama': $('#nama').val(),
                },


                success :function (response) {
                    $('#tpenyakit').DataTable().destroy();
                    loadData();
                    $('#mpenyakit').modal('hide');
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

        // $(document).on('click', '#cetak', function() {
        //     var data = $('#ttransaksilainnya').DataTable().row($(this).parents('tr')).data();
        //     window.location.href = '{{ url('transaksilainnya/cetak') }}/'+data.kode_transaksi ;
        // });

        $(document).on('click', '#detail', function() {
            var data = $('#ttransaksilainnya').DataTable().row($(this).parents('tr')).data();
            $('#mdtransaksilainnya').modal('show');
            $('#dkodetransaksi').text(data.transaksi_pemeriksaan_id);
            $('#dnamadokter').text(data.users.nama);
            $('#dnamahewan').text(data.hewan.nama_hewan);
            $('#dwaktu').text(data.clinical_sign);
            $('#dtotal').text(data.total_harga);
        });

        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('transaksilainnya/delete') }}/"+id,

                    success :function () {

                        $('#ttransaksilainnya').DataTable().destroy();
                        loadData();


                    }
                })
            }
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
@else
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
                    { "data": "transaksi_pemeriksaan_id",
                        sClass: 'text-center' },
                    { "data": "hewan.nama_hewan",
                        sClass: 'text-center'},
                    { "data": "clinical_sign",
                        sClass: 'text-center'},
                    { "data": "layanan",
                        sClass: 'text-center'},
                    { "data": "total_harga",
                        sClass: 'text-center'},
                    {
                        data: 'kode_transaksi',
                        sClass: 'text-center',
                        render: function(data) {
                            return'<a href="#" data-id="'+data+'" id="tambah" class="btn btn-info waves-effect waves-light btn-xs" title="tambah">tambah </a> &nbsp;'+
                                '<a href="#" data-id="'+data+'" id="cetak" class="btn btn-warning waves-effect waves-light btn-xs" title="cetak">cetak </a> &nbsp;';
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


        $(document).on('click', '#tambah', function() {
            var data = $('#ttransaksilainnya').DataTable().row($(this).parents('tr')).data();
            var idmodal = "{{ $idmodal }}";
            $('#mtransaksilainnya').modal('show');
            document.getElementById('div_kodelainnya').style.display = 'none';
            //document.getElementById('div_kodepenyakit').style.display = 'block';
            $('#kode_lainnya').val(idmodal).change();
            $('#kode_transaksi').val(data.kode_transaksi).change();
            $('#formtransaksilainnya').attr('action', '{{ url('transaksilainnya/create') }}');
        });

        $('#formpenyakit').submit(function(e) {
            e.preventDefault();
            $('#namaError').addClass('d-none');
            $('#jenis_penyakit_idError').addClass('d-none');
            $.ajax({
                url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                type: 'post',
                data: {
                    'kode_penyakit': $('#kode_penyakit').val(),
                    'jenis_penyakit_id': $('#jenis_penyakit_id').val(),
                    'nama': $('#nama').val(),
                },


                success :function (response) {
                    $('#tpenyakit').DataTable().destroy();
                    loadData();
                    $('#mpenyakit').modal('hide');
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

        $(document).on('click', '#cetak', function() {
            var data = $('#ttransaksilainnya').DataTable().row($(this).parents('tr')).data();
            window.location.href = '{{ url('transaksilainnya/cetak') }}/'+data.transaksi_pemeriksaan_id ;
        });

        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('transaksilainnya/delete') }}/"+id,

                    success :function () {

                        $('#ttransaksilainnya').DataTable().destroy();
                        loadData();


                    }
                })
            }
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
@endif
@endsection
