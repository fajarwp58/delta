<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-modern.min.css') }}">
  <style>
    @media print {
        #printPageButton {
            display: none;
        }
    }
</style>


<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a id="printPageButton" href="{{ route('rekammedis') }}">Back</a>
&nbsp;<button id="printPageButton" onClick="window.print();">Print</button><br>
</head>
<body>
    <tr>
        <td>
            <table>
                 <tr>
                     <td>
                        &nbsp;&nbsp;&nbsp;<span class="logo-sm">
                            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="95">
                        </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     </td>
                     <td align="left" style=" text-align: left">
                         <font size="6">
                             DELTA PETSHOP & ANIMAL MEDICAL CARE <br>
                         </font>
                         <font size="3">
                             ANIMAL CLINIC - INTENSIF CARE - BOARDING - ACCESSORIES - PET FOOD - DEPOT MEDICINES <br>
                             JL. Ujung Gurun No. 41 Padang 25114-Sumatera Barat, Indonesia
                        </font>
                     </td>
                 </tr>
            </table>
        </td>
     </tr>
    <br><br>
    <div class="form-group row mb-2">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="no" class="col-2 col-form-label">Nomor Reg</label>
        <div class="col-8">
            <input type="text" class="form-control" name="no" id="no" value="{{ $hewan->kode }}" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group row mb-2 col-md-6">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="nama_pemilik" class="col-4 col-form-label">Nama Pemilik</label>
            <div class="col-6">
                <input type="text" class="form-control" id="nama_pemilik"  value="{{ $hewan->users->nama }}" readonly >
            </div>
        </div>

        <div class="form-group row mb-2 col-md-6">
            <label for="no_hp" class="col-3 col-form-label">No HP</label>
            <div class="col-6">
                <input type="text" class="form-control" id="no_hp" value="{{ $hewan->users->phone }}" readonly >
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group row mb-2 col-md-6">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="nama_hewan" class="col-4 col-form-label">Nama Hewan</label>
            <div class="col-6">
                <input type="text" class="form-control" id="nama_hewan"  value="{{ $hewan->nama_hewan }}" readonly >
            </div>
        </div>

        <div class="form-group row mb-2 col-md-6">
            <label for="alamat" class="col-3 col-form-label">Alamat</label>
            <div class="col-6">
                <input type="text" class="form-control" id="alamat" value="{{ $hewan->users->alamat }}" readonly >
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group row mb-2 col-md-6">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="jenis_hewan" class="col-4 col-form-label">Jenis Hewan</label>
            <div class="col-6">
                <input type="text" class="form-control" id="jenis_hewan" value="{{ $hewan->jenis_hewan->nama }}" readonly >
            </div>
        </div>

        <div class="form-group row mb-2 col-md-6">
            <label for="ras_hewan" class="col-3 col-form-label">Ras Hewan</label>
            <div class="col-6">
                <input type="text" class="form-control" id="ras_hewan"  value="{{ $hewan->ket }}" readonly >
            </div>
        </div>
    </div>
    <br><br>

    <table id="trmedis" class="table" border="1" width="600px">
        <thead>
            <tr>
                <th>BB</th>
                <th>Anamnesa</th>
                <th>Clinical Sign</th>
                <th>Diagnosa</th>
                <th>Pragnosa</th>
                <th>Terapi/Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekammedis as $r)
		<tr>
			<td>{{ $r->berat_badan }}</td>
			<td>{{ $r->anamnesa }}</td>
			<td>{{ $r->clinical_sign }}</td>
            <td>{{ $r->diagnosa }}</td>
            <td>{{ $r->pragnosa }}</td>
            <td>{{ $r->terapi }}</td>
		</tr>
		@endforeach
        </tbody>
    </table>

</body>
</html>

{{-- <script>
    window.onload = function() { window.print(); }
</script> --}}
