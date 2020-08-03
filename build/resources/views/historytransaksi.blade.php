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
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $t)
		                <tr>
		                	<td>{{ $t->kode_transaksi }}</td>
		                	<td>{{ $t->nama_hewan }}</td>
		                	<td>{{ $t->waktu }}</td>
		                	<td>Rp  {{ format_uang($t->total_harga) }},-</td>
		                </tr>
		                @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
