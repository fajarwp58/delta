@extends('layouts.main')
@extends('layouts.topbar')
@extends('layouts.sidebar')

@section('content')
<br />
@if(Auth::user()->role_id == 'R02')
<div class="row">
    <div class="col-12">
        <div style="background:#333;color:#fff;margin:5px 0;padding:10px 0">
            <marquee direction="left" scrolldelay="20" truespeed="truespeed" scrollamount="1" onmouseover="this.stop()" onmouseout="this.start()">
                Selamat Datang di Web Delta Animal Medical Care
            </marquee>
        </div>
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                        <i data-feather="activity" ></i>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="mt-1 text-dark"><span data-plugin="counterup">{{ $layanan }}</span> Layanan</h3>
                        <p class="text-muted mb-1 text-truncate">Total Layanan Dokter</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <i data-feather="activity" ></i>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $hewan }}</span></h3>
                        <p class="text-muted mb-1 text-truncate">Total Hewan Yang Berobat</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <i data-feather="activity" ></i>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1">Rp <span data-plugin="counterup">{{ format_uang($totaltransaksihariini) }}</span>,-</h3>
                        <p class="text-muted mb-1 text-truncate">Total Transaksi Hari Ini</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <i data-feather="activity" ></i>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{  $totalbookinghariini }}</span> Booking</h3>
                        <p class="text-muted mb-1 text-truncate">Total Booking Hari Ini</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>

<div class="col-lg-12">
    <div class="card-box pb-2">
        <div class="d-flex justify-content-between align-items-center">
            <br><br>
            <a class="btn btn-success btn-lg" href="{{ route('rekammedis') }}">Rekam Medis Baru</a>
            <br><br><br>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card-box pb-2">
            <div class="d-flex justify-content-between align-items-center">
            	<h3 class="box-title">Grafik Pendapatan {{ tanggal_indonesia($awal) }} s/d {{ tanggal_indonesia($akhir) }}</h3>
            </div>
            <div class="box-body">
            	<div class="chart">
                    <canvas id="salesChart" style="height: 250px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card-box">
            <div class="box-body">
            	<div class="chart">
                    <div  id="pie_basic" style="height: 366px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@elseif(Auth::user()->role_id == 'R03')
<div class="row">
    <div class="col-12">
        <div style="background:#333;color:#fff;margin:5px 0;padding:10px 0">
            <marquee direction="left" scrolldelay="20" truespeed="truespeed" scrollamount="1" onmouseover="this.stop()" onmouseout="this.start()">
                Selamat Datang di Web Delta Animal Medical Care
            </marquee>
        </div>
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <i data-feather="activity" ></i>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $hewan_saya }}</span></h3>
                        <p class="text-muted mb-1 text-truncate">Total Hewan Saya</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <i data-feather="activity" ></i>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{  $totalchat }}</span> Pesan</h3>
                        <p class="text-muted mb-1 text-truncate">Pesan Belum Di Baca</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>

<div class="col-lg-12">
    <div class="card-box pb-2">
        <div class="d-flex justify-content-between align-items-center">
            <br><br>
            <a class="btn btn-success btn-lg" href="{{ route('booking') }}">Booking Klinik</a>
            <br><br><br>
        </div>
    </div>
</div>

@else
<div class="row">
    <div class="col-12">
        <div style="background:#333;color:#fff;margin:5px 0;padding:10px 0">
            <marquee direction="left" scrolldelay="20" truespeed="truespeed" scrollamount="1" onmouseover="this.stop()" onmouseout="this.start()">
                Selamat Datang di Web Delta Animal Medical Care
            </marquee>
        </div>
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                        <i data-feather="activity" ></i>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="mt-1 text-dark"><span data-plugin="counterup">{{ $user }}</span> User</h3>
                        <p class="text-muted mb-1 text-truncate">Total User</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <i data-feather="activity" ></i>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $hewan }}</span></h3>
                        <p class="text-muted mb-1 text-truncate">Total Hewan Yang Berobat</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <i data-feather="activity" ></i>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1">Rp  <span data-plugin="counterup">{{ format_uang($totaltransaksihariini) }}</span>,-</h3>
                        <p class="text-muted mb-1 text-truncate">Total Transaksi Hari Ini</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <i data-feather="activity" ></i>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{  $totalbookinghariini }}</span> Booking</h3>
                        <p class="text-muted mb-1 text-truncate">Total Booking Hari Ini</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>

<div class="col-lg-12">
    <div class="card-box pb-2">
        <div class="d-flex justify-content-between align-items-center">
            <br><br>
            <a class="btn btn-success btn-lg" href="{{ route('transaksilainnya') }}">Transaksi Baru</a>
            <br><br><br>
        </div>
    </div>
</div>
<!-- end row-->
<div class="row">
    <div class="col-lg-8">
        <div class="card-box pb-2">
            <div class="d-flex justify-content-between align-items-center">
            	<h3 class="box-title">Grafik Pendapatan {{ tanggal_indonesia($awal) }} s/d {{ tanggal_indonesia($akhir) }}</h3>
            </div>
            <div class="box-body">
            	<div class="chart">
                    <canvas id="salesChart" style="height: 250px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card-box">
            <div class="box-body">
            	<div class="chart">
                    <div  id="pie_basic" style="height: 366px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

    @endif

@endsection

@section('js')
<script type="text/javascript">
var pie_basic_element = document.getElementById('pie_basic');
if (pie_basic_element) {
    var pie_basic = echarts.init(pie_basic_element);
    pie_basic.setOption({
        color: [
            '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
            '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
            '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
            '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
        ],          
        
        textStyle: {
            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
            fontSize: 13
        },

        title: {
            text: 'Hewan yang Berobat Tahun {{$now}}',
            left: 'center',
            textStyle: {
                fontSize: 14,
                fontWeight: 800
            },
            subtextStyle: {
                fontSize: 12
            }
        },

        tooltip: {
            trigger: 'item',
            backgroundColor: 'rgba(0,0,0,0.75)',
            padding: [10, 15],
            textStyle: {
                fontSize: 13,
                fontFamily: 'Roboto, sans-serif'
            },
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },

        legend: {
            orient: 'horizontal',
            bottom: '0%',
            left: 'center',                   
            data: ['Kucing', 'Anjing','Orang Hutan','Kelinci'],
            itemHeight: 8,
            itemWidth: 8
        },

        series: [{
            name: 'Product Type',
            type: 'pie',
            radius: '70%',
            center: ['50%', '50%'],
            itemStyle: {
                normal: {
                    borderWidth: 1,
                    borderColor: '#fff'
                }
            },
            data: [
                {value: {{$kucing}}, name: 'Kucing'},
                {value: {{$anjing}}, name: 'Anjing'},
                {value: {{$oranghutan}}, name: 'Orang Hutan'},
                {value: {{$kelinci}}, name: 'Kelinci'}
            ]
        }]
    });
}
$(function () {
  var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
  var salesChart = new Chart(salesChartCanvas);

  var salesChartData = {
    labels: {{ json_encode($data_tanggal) }},
    datasets: [
      {
        label: "Electronics",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgb(210, 214, 222)",
        pointColor: "rgb(210, 214, 222)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgb(220,220,220)",
        data: {{ json_encode($data_pendapatan) }}
      }
    ]
  };

  var salesChartOptions = {
    pointDot: false,
    responsive: true
  };

  //Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);
});
</script>
@endsection
