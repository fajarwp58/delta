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
                    <button class="btn btn-primary m-r-5" id="addlayanan">
                        <i class="anticon anticon-plus"></i>
                        Add Layanan
                    </button>
                </h4>
            </div>

            {{--        TABEL Obat--}}
            <div class="card-body">
                <table id="tlayanan" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Nama Layanan</th>
                        <th>Nama Penyakit</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
{{--    MODAL DAN FORM DATA Obat--}}
<div id="mlayanan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Data Layanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form id="formlayanan">
                    {{ csrf_field() }}

                    <div class="form-group" id="div_kodelayanan">
                        <label for="kode_layanan">Kode Layanan</label>
                        <input type="text"  class="form-control" id="kode_layanan" name="kode_layanan" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Layanan</label>
                        <input type="text"  class="form-control" id="nama" name="nama" placeholder="Nama Layanan">
                        <span class="text-danger" id="namaError"></span>
                    </div>

                    <div class="form-group">
                        <label for="kode_penyakit">Nama Penyakit</label>
                            <select class="form-control" id="kode_penyakit" name="kode_penyakit">
                                <option value="">Pilih penyakit</option>
                            </select>
                        <span class="text-danger" id="kode_penyakitError"></span>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number"  class="form-control" id="harga" name="harga" placeholder="Harga Layanan">
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


{{--    MODAL DAN FORM DETAIL Obat--}}
<div id="mdlayanan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Layanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form>

                    <div class="card">
                        <div class="card-body">
                            <table width="400">
                                <tr>
                                    <td>
                                        <a class="text-gray">Kode Layanan</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dkodelayanan"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Nama Layanan</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dnama"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Nama Penyakit</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dkodepenyakit"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Harga</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dharga"></a>
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
            $('#tlayanan').dataTable({
                "ajax": "{{ url('/layanan/data') }}",
                "columns": [
                    { "data": "nama",
                        sClass: 'text-center' },
                    { "data": "penyakit.nama",
                        sClass: 'text-center' },
                    { "data": "harga",
                        sClass: 'text-center',},
                    {
                        data: 'kode_layanan',
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


        $(document).on('click', '#addlayanan', function() {
            var idmodal = "{{ $idmodal }}";
            $('#mlayanan').modal('show');
            document.getElementById('div_kodelayanan').style.display = 'block';
            $('#kode_layanan').val(idmodal).change();
            $('#formlayanan').attr('action', '{{ url('layanan/create') }}');
        });

        $('#formlayanan').submit(function(e) {
            e.preventDefault();
            $('#kode_penyakitError').addClass('d-none');
            $('#namaError').addClass('d-none');
            $('#hargaError').addClass('d-none');
            $.ajax({
                url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                type: 'post',
                data: {
                    'kode_layanan': $('#kode_layanan').val(),
                    'kode_penyakit': $('#kode_penyakit').val(),
                    'nama': $('#nama').val(),
                    'harga': $('#harga').val(),
                },


                success :function (response) {
                    $('#tlayanan').DataTable().destroy();
                    loadData();
                    $('#mlayanan').modal('hide');
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
            var data = $('#tlayanan').DataTable().row($(this).parents('tr')).data();
            $('#mlayanan').modal('show');
            document.getElementById('div_kodelayanan').style.display = 'none';
            $('#kode_penyakit').val(data.kode_penyakit).change();
            $('#nama').val(data.nama).change();
            $('#harga').val(data.harga).change();
            $('#formlayanan').attr('action', '{{ url('layanan/update') }}/'+data.kode_layanan);
        });

        $(document).on('click', '#detail', function() {
            var data = $('#tlayanan').DataTable().row($(this).parents('tr')).data();
            $('#mdlayanan').modal('show');
            $('#dkodelayanan').text(data.kode_layanan);
            $('#dkodepenyakit').text(data.penyakit.nama);
            $('#dnama').text(data.nama);
            $('#dharga').text(data.harga);
        });

        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('layanan/delete') }}/"+id,

                    success :function () {

                        $('#tlayanan').DataTable().destroy();
                        loadData();


                    }
                })
            }
        });

        $.ajax({
            url: '{{ url('layanan/listpenyakit') }}',
            dataType: "json",
            success: function(data) {
                var penyakit = jQuery.parseJSON(JSON.stringify(data));
                $.each(penyakit, function(k, v) {
                    $('#kode_penyakit').append($('<option>', {value:v.kode_penyakit}).text(v.nama))
                })
            }
        });

        $('#mlayanan').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            let hapusValidasi = document.getElementById('formlayanan');
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
