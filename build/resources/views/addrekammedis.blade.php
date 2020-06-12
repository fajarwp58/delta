@extends('layouts.main')
@extends('layouts.topbar')
@extends('layouts.sidebar')

@section('content')

<br><br>
<div class="col-lg-12">
    <div class="card-box pb-2">
        <div class="card">
            <tr>
                <td>
                    <table>
                         <tr>
                             <td>
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="75">
                                </span>
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
                <label for="no" class="col-2 col-form-label">Nomor Reg</label>
                <div class="col-9">
                    <input type="text" class="form-control" name="no" id="no" value="{{ $hewan->kode }}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group row mb-2 col-md-6">
                    <label for="nama_pemilik" class="col-4 col-form-label">Nama Pemilik</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="nama_pemilik"  value="{{ $hewan->users->nama }}" readonly >
                    </div>
                </div>

                <div class="form-group row mb-2 col-md-6">
                    <label for="no_hp" class="col-3 col-form-label">No HP</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="no_hp" value="{{ $hewan->users->phone }}" readonly >
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group row mb-2 col-md-6">
                    <label for="nama_hewan" class="col-4 col-form-label">Nama Hewan</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="nama_hewan"  value="{{ $hewan->nama_hewan }}" readonly >
                    </div>
                </div>

                <div class="form-group row mb-2 col-md-6">
                    <label for="alamat" class="col-3 col-form-label">Alamat</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="alamat" value="{{ $hewan->users->alamat }}" readonly >
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group row mb-2 col-md-6">
                    <label for="jenis_hewan" class="col-4 col-form-label">Jenis Hewan</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="jenis_hewan" value="{{ $hewan->jenis_hewan->nama }}" readonly >
                    </div>
                </div>

                <div class="form-group row mb-2 col-md-6">
                    <label for="ras_hewan" class="col-3 col-form-label">Ras Hewan</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="ras_hewan"  value="{{ $hewan->ket }}" readonly >
                    </div>
                </div>
            </div>
            <br><br>
            ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <br><br><br>
            <form id="formrekammedis" method="POST" action="{{ url('/rekammedis/create/') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group row mb-3 col-md-4">
                        <label for="suhu" class="col-3 col-form-label">Suhu</label>
                        <div class="col-8">
                            <input type="text"  class="form-control" id="suhu" name="suhu" placeholder="Suhu dalam *C" required>
                        </div>
                        <span class="text-danger" id="suhuError"></span>
                    </div>
                    <div class="form-group row mb-3 col-md-4">
                        <label for="berat_badan" class="col-4 col-form-label">Berat Badan</label>
                        <div class="col-8">
                            <input type="text"  class="form-control" id="berat_badan" name="berat_badan" placeholder="Berat Badan dalam KG" required>
                        </div>
                        <span class="text-danger" id="berat_badanError"></span>
                    </div>
                    <div class="form-group row mb-3 col-md-4">
                        <label for="clinical_sign" class="col-4 col-form-label">Clinical Sign</label>
                        <div class="col-7">
                            <input type="date"  class="form-control" id="clinical_sign" name="clinical_sign" value="{{ $now }}" required>
                        </div>
                        <span class="text-danger" id="clinical_signError"></span>
                    </div>
                </div>
                <div class="form-group row mb-1 col-md-8">
                    <label for="anamnesa" class="col-2 col-form-label">Anamnesa</label>
                    <div class="col-10">
                        <textarea type="text"  class="form-control" id="anamnesa" name="anamnesa" placeholder="Anamnesa" required></textarea>
                    </div>
                    <span class="text-danger" id="anamnesaError"></span>
                </div>
                <div class="form-group row mb-1 col-md-8">
                    <label for="diagnosa" class="col-2 col-form-label">Diagnosa</label>
                    <div class="col-10">
                        <textarea type="text"  class="form-control" id="diagnosa" name="diagnosa" placeholder="Diagnosa" required></textarea>
                    </div>
                    <span class="text-danger" id="diagnosaError"></span>
                </div>
                <div class="form-group row mb-1 col-md-8">
                    <label for="pragnosa" class="col-2 col-form-label">Pragnosa</label>
                    <div class="col-10">
                        <textarea type="text"  class="form-control" id="pragnosa" name="pragnosa" placeholder="Pragnosa" required></textarea>
                    </div>
                    <span class="text-danger" id="pragnosaError"></span>
                </div>
                <div class="form-group row mb-1 col-md-8">
                    <label for="terapi" class="col-2 col-form-label">Terapi</label>
                    <div class="col-10">
                        <input type="text"  class="form-control" id="terapi" name="terapi" placeholder="Terapi (Boleh Kosong)" >
                    </div>
                </div>
                <br><br>
                <div class="box-footer">
                    <center>
                        <input class="form-control" id="dokter_id" name="dokter_id" value="{{ Auth::User()->user_id }}" hidden />
                        <input class="form-control" id="kode_transaksi" name="kode_transaksi" value="{{ $idmodal2 }}" hidden />
                        <input class="form-control" id="riwayat_pemeriksaan_id" name="riwayat_pemeriksaan_id" value="{{ $idmodal }}" hidden />
                        <input class="form-control" id="no_reg" name="no_reg" value="{{ $hewan->kode }}" hidden />
                        <a class="btn btn-warning" href="{{ route('rekammedis') }}">Batal</a>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')

<script type="text/javascript">

</script>

@endsection
