<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/ubold/layouts/modern/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 May 2020 23:15:35 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Delta Animal Medical Care</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="https://coderthemes.com/ubold/layouts/assets/images/favicon.ico">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!-- Plugins css -->
        <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap-modern.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{ asset('assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

        <link href="{{ asset('assets/css/bootstrap-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
        <link href="{{ asset('assets/css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

        <!-- icons -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body data-layout-mode="detached" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
                @yield('topbar')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                @yield('sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        @yield('content')

                    </div>
                </div>

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2020 - <script>2020</script> &copy; Website by <a href="#">Fajar Wirya Putra</a>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('assets/js/chartjs/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/js/chartjs/echarts.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/datepicker/bootstrap-datepicker.js') }}"></script>

        <script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>

        <!-- App js-->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>

        <script src="https://momentjs.com/downloads/moment.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        @yield('js')
    </body>

<!-- Mirrored from coderthemes.com/ubold/layouts/modern/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 May 2020 23:16:14 GMT -->
</html>
