@extends('layouts.main')
@extends('layouts.topbar')
@extends('layouts.sidebar')

@section('content')
<style>
    .jam{
        color: black;
    }
</style>
<br><br>
<div class="col-lg-12">
    <div class="card-box pb-2">
        <div class="card">
            <div class="card-header">
                <h4>Booking <span class="small">Jadwal Klinik</span></h4>
            </div>
            <div class="card-body">
                @if ($total_wb != 0)
                <div class="row">
                    @foreach ($waktu_booking as $wb)
                    <div class="col-sm-3">
                        <div class="card-box" style="background-color: rgb(236, 233, 233)">
                            <i class="fa fa-info-circle text-muted float-right" data-feather="clock" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                            <h4 class="mt-0 font-16">Tersedia</h4>
                            <h3 class="my-3 text-center" id="jam">{{ date('G:i', strtotime( $wb->jam_awal )) }} - {{ date('G:i', strtotime( $wb->jam_akhir )) }}</h3>
                            <center><a href="booking/addjadwal/{{ $wb->waktu_booking_id }}" title="pilih jadwal ini" class="btn btn-light btn-rounded waves-effect">Pilih Jadwal</a></center>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="alert alert-warning">
                    <h4>Mohon Maaf</h4>
                    Untuk sementara, tidak ada jadwal Klinik yang tersedia.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
