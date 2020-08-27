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
                    Laporan Pendapatan {{ tanggal_indonesia($awal, false) }} s/d {{ tanggal_indonesia($akhir, false) }}
                </h4>
            </div>
            <div class="box">
            <div class="box-header">
                <br>
                <a onclick="periodeForm()" class="btn btn-success" style="color: black">Ubah Periode</a>
                <a href="/delta/transaksilainnya/download/laporan/pdf/{{$awal}}/{{$akhir}}" target="_blank" class="btn btn-info">Export PDF</a>
              </div>
              <br>
              <div class="box-body">
                <table id="tlaporan" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="160">No</th>
                                <th>Tanggal</th>
                                <th>Pendapatan</th>
                            </tr>
                        </thead>
                    <tbody></tbody>
                </table>

              </div>
            </div>
        </div>
    </div>
</div>

{{-- form input jarak tanggal laporan --}}
<div id="modal-form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
       <div class="modal-content">

    <form class="form-horizontal" data-toggle="validator" method="POST" action="download">
    {{ csrf_field() }}

    <div class="modal-header">
        <h3 class="modal-title">Periode Laporan</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>

    <div class="modal-body p-4">
    <div class="form-row">
    <div class="form-group row mb-2 col-md-8">
       <label for="awal" class="col-11 col-form-label">Tanggal Awal</label>
       <div class="col-18">
          <input id="awal" type="text" class="form-control" name="awal" autofocus required>
          <span class="help-block with-errors"></span>
       </div>
    </div>

    <div class="form-group row mb-2 col-md-8">
       <label for="akhir" class="col-9 col-form-label">Tanggal Akhir</label>
       <div class="col-18">
          <input id="akhir" type="text" class="form-control" name="akhir" autofocus required>
          <span class="help-block with-errors"></span>
       </div>
    </div>
    </div>

 </div>

    <div class="modal-footer">
       <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
       <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
    </div>

    </form>

          </div>
       </div>
    </div>

@endsection

@section('js')
<script src="/delta/assets/jquery.dataTables.min.js"></script>
<script src="/delta/assets/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
var table, awal, akhir;
$(function(){
   $('#awal, #akhir').datepicker({
     format: 'yyyy-mm-dd',
     autoclose: true
   });

   table = $('#tlaporan').DataTable({
     "dom" : 'Brt',
     "bSort" : false,
     "bPaginate" : false,
     "processing" : true,
     "serverside" : true,
     "ajax" : {
       "url" : "/delta/transaksilainnya/download/laporan/data/{{ $awal }}/{{ $akhir }}",
       "type" : "GET"
     }
   });

});

function periodeForm(){
   $('#modal-form').modal('show');
}

</script>
@endsection
