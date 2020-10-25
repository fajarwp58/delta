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
                    <button class="btn btn-primary m-r-5" id="addobat">
                        <i class="anticon anticon-plus"></i>
                        Add Obat
                    </button>
                </h4>
            </div>

            {{--        TABEL Obat--}}
            <div class="card-body">
                <table id="tobat" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Jenis</th>
                        <th>jumlah/Pack</th>
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
<div id="mobat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Data Obat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form id="formobat">
                    {{ csrf_field() }}

                    <div class="form-group" id="div_kodeobat">
                        <label for="kode_obat">Kode Obat</label>
                        <input type="text"  class="form-control" id="kode_obat" name="kode_obat" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Obat</label>
                        <input type="text"  class="form-control" id="nama" name="nama" placeholder="Nama Obat">
                        <span class="text-danger" id="namaError"></span>
                    </div>

                    <div class="form-group">
                        <label for="jenis">Jenis Obat</label>
                        <select class="form-control" id="jenis" name="jenis">
                            <option value="">Pilih Jenis Obat</option>
<<<<<<< HEAD
                            <option value="Vaksin">Vaksin</option>
                            <option value="Antibiotik">Antibiotik</option>
                            <option value="Antiparasit">Antiparasit</option>
                            <option value="Vitamin & Mineral">Vitamin & Mineral</option>
                            <option value="Hormon">Hormon</option>
                            <option value="Anastesi">Anastesi</option>
                            <option value="Lain-lain">Lain-lain</option>
=======
                            <option value="Tablet">Tablet</option>
                            <option value="Kapsul">Kapsul</option>
                            <option value="Sirup">Sirup</option>
>>>>>>> 472800579a9eea82fa5da9437a7217f686dc5c02
                        </select>
                        <span class="text-danger" id="jenisError"></span>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah/Pack</label>
                        <input type="text"  class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Obat">
                        <span class="text-danger" id="jumlahError"></span>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number"  class="form-control" id="harga" name="harga" placeholder="Harga Obat">
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
<div id="mdobat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Obat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form>

                    <div class="card">
                        <div class="card-body">
                            <table width="400">
                                <tr>
                                    <td>
                                        <a class="text-gray">Kode Obat</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dkodeobat"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Nama Obat</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dnama"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Jenis Obat</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="djenis"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Jumlah/Pack</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="djumlah"></a>
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
            $('#tobat').dataTable({
                "ajax": "{{ url('/obat/data') }}",
                "columns": [
                    { "data": "nama",
                        sClass: 'text-center' },
                    { "data": "jenis",
                        sClass: 'text-center' },
                    { "data": "jumlah",
                        sClass: 'text-center' },
                    { "data": "harga",
                        sClass: 'text-center',},
                    {
                        data: 'kode_obat',
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


        $(document).on('click', '#addobat', function() {
            var idmodal = "{{ $idmodal }}";
            $('#mobat').modal('show');
            document.getElementById('div_kodeobat').style.display = 'block';
            $('#kode_obat').val(idmodal).change();
            $('#formobat').attr('action', '{{ url('obat/create') }}');
        });

        $('#formobat').submit(function(e) {
            e.preventDefault();
            $('#namaError').addClass('d-none');
            $('#jenisError').addClass('d-none');
            $('#jumlahError').addClass('d-none');
            $('#hargaError').addClass('d-none');
            $.ajax({
                url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                type: 'post',
                data: {
                    'kode_obat': $('#kode_obat').val(),
                    'nama': $('#nama').val(),
                    'jenis': $('#jenis').val(),
                    'jumlah': $('#jumlah').val(),
                    'harga': $('#harga').val(),
                },


                success :function (response) {
                    $('#tobat').DataTable().destroy();
                    loadData();
                    $('#mobat').modal('hide');
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
            var data = $('#tobat').DataTable().row($(this).parents('tr')).data();
            $('#mobat').modal('show');
            document.getElementById('div_kodeobat').style.display = 'none';
            $('#nama').val(data.nama).change();
            $('#harga').val(data.harga).change();
            $('#jenis').val(data.jenis).change();
            $('#jumlah').val(data.jumlah).change();
            $('#formobat').attr('action', '{{ url('obat/update') }}/'+data.kode_obat);
        });

        $(document).on('click', '#detail', function() {
            var data = $('#tobat').DataTable().row($(this).parents('tr')).data();
            $('#mdobat').modal('show');
            $('#dkodeobat').text(data.kode_obat);
            $('#dnama').text(data.nama);
            $('#djenis').text(data.jenis);
            $('#djumlah').text(data.jumlah);
            $('#dharga').text(data.harga);
        });

        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('obat/delete') }}/"+id,

                    success :function () {

                        $('#tobat').DataTable().destroy();
                        loadData();


                    }
                })
            }
        });

        $('#mobat').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            let hapusValidasi = document.getElementById('formobat');
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
