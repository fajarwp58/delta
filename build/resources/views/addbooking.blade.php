@extends('layouts.main')
@extends('layouts.topbar')
@extends('layouts.sidebar')

@section('content')

<br><br>
<div class="col-lg-12">
    <div class="card-box pb-2">
        <div class="card">
            <div class="card-header">
                <h4>Form <span class="small">Data Booking Klinik</span></h4>
            </div>
            <div class="card-body">
                <form method="POST" id="formbooking" action="{{ url('/booking/create/') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <h3 class="card-title">Booking Jam <b>{{ date('G:i', strtotime( $waktu_booking->jam_awal )) }} sampai {{ date('G:i', strtotime( $waktu_booking->jam_akhir )) }} </b></h3><br>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>#Booking ID</label>
                        <input type="text" class="form-control" id="booking_id" name="booking_id"  value="{{$idmodal}}" readonly >
                        <br>
                        <div class="alert alert-info">
							<h4>Waktu Booking : {{ date('G:i', strtotime( $waktu_booking->jam_awal )) }}</h4>
							<ul class="list-unstyled">
								<li>Batas tenggang keterlambatan : <br> <b>15 Menit</b></li>
							</ul>
						</div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="kode_hewan">Pilih Hewan yg sakit</label>
                        <select class="form-control" id="kode_hewan" name="kode_hewan" required>
                            <option value="">Pilih Hewan</option>
                        </select>
                        <span class="text-danger" id="jenis_hewan_idError"></span>
                        <br>
                        <div class="alert alert-warning">
							<a href="{{ route('hewan') }}"><b>Klik disini</b></a> jika hewan yang dimaksud tidak ditemukan untuk ditambah pada form booking.
						</div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
							<label>Tanggal / Waktu Booking</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control text-center" id="datepicker" name="tanggal_booking" value="{{ $now }}" />
								</div>
								<div class="col-sm-3">
                                    <input class="form-control text-center" name="waktu_awal" value="{{ date('G:i', strtotime( $waktu_booking->jam_awal )) }}" hidden />
                                    <input class="form-control text-center" name="waktu_akhir" value="{{ date('G:i', strtotime( $waktu_booking->jam_akhir )) }}" hidden />
								</div>
							</div>
						</div>
                    </div>
                    <div class="box-footer">
                        <input class="form-control" id="waktu_booking_id" name="waktu_booking_id" value="{{ $waktu_booking->waktu_booking_id }}" hidden />
                        <input class="form-control" id="status" name="status" value="1" hidden />
                        <input class="form-control" id="status_waktu" name="status_waktu" value="2" hidden />
                        <button class="btn btn-success" type="submit">Booking</button>
                        <a class="btn btn-warning" href="{{ route('booking') }}">Batal</a>
                    </div>
                    </form>
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
            url: '{{ url('booking/listhewan') }}',
            dataType: "json",
            success: function(data) {
                var hewan = jQuery.parseJSON(JSON.stringify(data));
                $.each(hewan, function(k, v) {
                    $('#kode_hewan').append($('<option>', {value:v.kode}).text(v.nama_hewan))
                })
            }
        });

        // function notify(response){
        //     $.each(response, function(key, val) {
        //         new swal({
        //             title: 'Oops!',
        //             text: val,
        //             type: 'info'
        //         });
        //     });

        // }
        $( "#datepicker" ).datepicker({                  
            minDate: moment().add('d', 0).toDate(),
        });

    });


</script>
@endsection
