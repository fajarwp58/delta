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
                    <div class="avatar-lg rounded-circle bg-soft-pink border-pink border">
                        <i class="fe-heart font-22 avatar-title text-pink"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="mt-1 text-dark">$<span data-plugin="counterup">58,947</span></h3>
                        <p class="text-muted mb-1 text-truncate">Total Revenue</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                        <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span></h3>
                        <p class="text-muted mb-1 text-truncate">Today's Sales</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                        <i class="fe-bar-chart-line- font-22 avatar-title text-success"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">0.58</span>%</h3>
                        <p class="text-muted mb-1 text-truncate">Conversion</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                        <i class="fe-eye font-22 avatar-title text-warning"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">78.41</span>k</h3>
                        <p class="text-muted mb-1 text-truncate">Today's Visits</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>
<!-- end row-->
<div class="col-lg-12">
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
</div> <!-- end col-->
@endsection
