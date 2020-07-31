@extends('layouts.main')
@extends('layouts.topbar')
@extends('layouts.sidebar')

@section('content')
<br />
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
                        <h3 class="text-dark mt-1">Rp.<span data-plugin="counterup">{{ $totaltransaksihariini }}</span>,</h3>
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
<!-- end row-->
<div class="col-lg-12">
    <div class="card-box pb-2">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Jumlah Transaksi Layanan</h5>
                <div>

                </div>
            </div>
            <div class="m-t-50" style="height: 470px">
                <canvas class="chart" id="bar-chart"></canvas>
            </div>
    </div>
</div>
{{-- <div class="col-lg-12">
    <div class="card-box pb-2">
        <div class="float-right d-none d-md-inline-block">
            <div class="btn-group mb-2">
                <button type="button" class="btn btn-xs btn-light">Today</button>
                <button type="button" class="btn btn-xs btn-light">Weekly</button>
                <button type="button" class="btn btn-xs btn-secondary">Monthly</button>
            </div>
        </div>

        <h4 class="header-title mb-3">Sales Analytics</h4>

        <div dir="ltr">
            <div id="sales-analytics" class="mt-4" data-colors="#43bfe5,#6c757d"></div>
        </div>
    </div> <!-- end card-box -->
</div> <!-- end col--> --}}
@endsection


@section('js')
    <script src="{{ asset ('assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script type="text/javascript">

        var url2 = "{{ url('/home/jenis') }}";
        var Data = new Array();
        var Labels = new Array();

        $(document).ready(function(){

            $.get(url2, function(data){

                var operasi = data.operasi
                var potong = data.potong

                var bar = document.getElementById('bar-chart').getContext('2d');
                var barchart = new Chart(bar, {

                    type: 'bar',
                    // The data for our dataset
                    data: {
                        labels: [ 'OPERASI', 'POTONG'],
                        datasets: [{
                            backgroundColor: 'rgba(31,82,165,0.99)',
                            borderWidth: 0,
                            data: [ operasi, potong],
                        }]
                    },
                    // Configuration options go here
                    options: {
                        scaleShowVerticalLines: false,
                        responsive: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                categoryPercentage: 0.45,
                                barPercentage: 0.70,
                                display: true,
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Month'
                                },
                                gridLines: false,
                                ticks: {
                                    display: true,
                                    beginAtZero: true,
                                    fontSize: 13,
                                    padding: 10
                                }
                            }],
                            yAxes: [{
                                categoryPercentage: 0.35,
                                barPercentage: 0.70,
                                display: true,
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Value'
                                },
                                gridLines: {
                                    drawBorder: false,
                                    offsetGridLines: false,
                                    drawTicks: false,
                                    borderDash: [3, 4],
                                    zeroLineWidth: 1,
                                    zeroLineBorderDash: [3, 4]
                                },
                                ticks: {
                                    max: 20,
                                    stepSize: 4,
                                    display: true,
                                    beginAtZero: true,
                                    fontSize: 13,
                                    padding: 10
                                }
                            }]
                        }
                    }
                });
            });

        });


    </script>

@endsection
