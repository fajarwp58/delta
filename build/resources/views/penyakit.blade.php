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
                    <button class="btn btn-primary m-r-5" id="addpenyakit">
                        <i class="anticon anticon-plus"></i>
                        Add Penyakit
                    </button>
                </h4>
            </div>

            {{--        TABEL Penyakit--}}
            <div class="card-body">
                <table id="tpenyakit" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Nama Penyakit</th>
                        <th>Jenis Penyakit</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
{{--    MODAL DAN FORM DATA Penyakit--}}
<div id="mpenyakit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Data Penyakit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form id="formpenyakit">
                    {{ csrf_field() }}

                    <div class="form-group" id="div_kodepenyakit">
                        <label for="kode_penyakit">Kode Penyakit</label>
                        <input type="text"  class="form-control" id="kode_penyakit" name="kode_penyakit" readonly>
                    </div>
                    <div class="form-group" id="div_jenispenyakit">
                        <label for="jenis_penyakit_id">Jenis Penyakit</label>
                            <select class="form-control" id="jenis_penyakit_id" name="jenis_penyakit_id">
                                <option value="">Pilih jenis penyakit</option>
                            </select>
                        <span class="text-danger" id="jenis_penyakit_idError"></span>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Penyakit</label>
                        <input type="text"  class="form-control" id="nama" name="nama" placeholder="Nama Penyakit">
                        <span class="text-danger" id="namaError"></span>
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
<div id="mdpenyakit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Penyakit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-3">
                <form>

                    <div class="card">
                        <div class="card-body">
                            <table width="400">
                                <tr>
                                    <td>
                                        <a class="text-gray">Kode Penyakit</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dkodepenyakit"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Jenis Penyakit</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="djenispenyakit"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Nama Penyakit</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dnamapenyakit"></a>
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
            $('#tpenyakit').dataTable({
                "ajax": "{{ url('/penyakit/data') }}",
                "columns": [
                    { "data": "nama",
                        sClass: 'text-center' },
                    { "data": "jenis_penyakit.nama",
                        sClass: 'text-center',},
                    {
                        data: 'kode_penyakit',
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
                ],
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
            });
        } loadData();


        $(document).on('click', '#addpenyakit', function() {
            var idmodal = "{{ $idmodal }}";
            $('#mpenyakit').modal('show');
            document.getElementById('div_kodepenyakit').style.display = 'block';
            $('#kode_penyakit').val(idmodal).change();
            $('#formpenyakit').attr('action', '{{ url('penyakit/create') }}');
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

        $(document).on('click', '#edit', function() {
            var data = $('#tpenyakit').DataTable().row($(this).parents('tr')).data();
            $('#mpenyakit').modal('show');
            document.getElementById('div_kodepenyakit').style.display = 'none';
            $('#nama').val(data.nama).change();
            $('#jenis_penyakit_id').val(data.jenis_penyakit_id).change();
            $('#formpenyakit').attr('action', '{{ url('penyakit/update') }}/'+data.kode_penyakit);
        });

        $(document).on('click', '#detail', function() {
            var data = $('#tpenyakit').DataTable().row($(this).parents('tr')).data();
            $('#mdpenyakit').modal('show');
            $('#dkodepenyakit').text(data.kode_penyakit);
            $('#djenispenyakit').text(data.jenis_penyakit.nama);
            $('#dnamapenyakit').text(data.nama);
        });

        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            if (confirm("Yakin ingin menghapus data?")){
                $.ajax({
                    url : "{{ url('penyakit/delete') }}/"+id,

                    success :function () {

                        $('#tpenyakit').DataTable().destroy();
                        loadData();


                    }
                })
            }
        });



        $.ajax({
            url: '{{ url('penyakit/listjenispenyakit') }}',
            dataType: "json",
            success: function(data) {
                var jenis_penyakit = jQuery.parseJSON(JSON.stringify(data));
                $.each(jenis_penyakit, function(k, v) {
                    $('#jenis_penyakit_id').append($('<option>', {value:v.jenis_penyakit_id}).text(v.nama))
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
@endsection
