@extends('layouts.main')
@extends('layouts.topbar')
@extends('layouts.sidebar')

@section('content')

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
                <h4>Form <span class="small">Input Layanan Pasien</span></h4>
            </div>
            <div class="card-body">
                <form method="POST" id="formlayanan" action="{{ url('/dokterlayanan/create') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3 class="card-title">NO Transaksi : <b>{{ $transaksi->kode_transaksi }}</b></h3>
                <div class="form-group">
                    <div id="back">
                        <div class="form-group col-md-8">
                            <label for="kode_layanan">Pilih Jenis Layanan</label>
                            <select class="form-control layanan" id="kode_layanan" name="kode_layanan[]" required>
                                <option value="">Pilih Layanan</option>
                            </select>
                        </div>
                    </div>
                    <div class="alert alert-warning col-md-12">
                        <a href="{{ route('layanan') }}"><b>Klik disini</b></a> jika layanan yang dimaksud tidak ditemukan untuk ditambah pada form booking.
                    </div>
                    <div class="box-footer">
                        <input class="form-control" id="kode_transaksi" name="kode_transaksi" value="{{ $transaksi->kode_transaksi }}" hidden />
                        <a id="btnadd" type="button" class="btn btn-info"><span class="btn-label"><i class="dripicons-document-new"></i></span>Tambah</a>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
                <div style="display: none">
                    <div id="clone" class="form-group col-md-12">
                        <label for="kode_layanan">Pilih Jenis Layanan</label>
                        <div class="row">
                            <div class="form-group col-md-8">
                            <select class="form-control layanan" id="kode_layanan" name="kode_layanan[]" >
                                <option value="">Pilih Layanan</option>
                            </select>
                            </div>
                            <br>
                            <div class="form-group col-md-2">
                                <a id="btndelete" type="button" onclick="$(this).parents('#clone').remove();" class="btn btn-warning" > Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {

        $.ajax({
            url: '{{ url('dokterlayanan/listlayanan') }}',
            dataType: "json",
            success: function(data) {
                var layanan = jQuery.parseJSON(JSON.stringify(data));
                $.each(layanan, function(k, v) {
                    $('.layanan').append($('<option>', {value:v.kode_layanan}).text(v.nama+' '+v.penyakit.nama+' - Rp.'+v.harga+',-'))
                })
            }
        });

    });

    $('#btnadd').click(function () {
            $('#clone').clone().appendTo('#back');
        });


</script>
@endsection
