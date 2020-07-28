@section('sidebar')
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('assets/images/users/user-6.jpg') }}" alt="user-img" title="{{ Auth::User()->username }}"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark font-weight-normal dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">{{ Auth::User()->nama }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                        <i data-feather="log-out" class="icon-dual"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">{{ Auth::User()->role->nama }}</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                @if(Auth::user()->role_id == 'R01')

                <li>
                    <a href="{{ route('home') }}" >
                        <i data-feather="airplay"></i>
                        <span> Dashboards </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarProjects" data-toggle="collapse">
                        <i data-feather="user"></i>
                        <span> Kelola User </span>
                        <i data-feather="chevron-right" class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="sidebarProjects">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('dokter') }}" >
                                    <span>Dokter </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pasien') }}" >
                                    <span>Pasien </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route('databooking') }}" >
                        <i data-feather="archive"></i>
                        <span> Kelola Data Booking </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('transaksilainnya') }}" >
                        <i data-feather="dollar-sign"></i>
                        <span> Kelola Transaksi </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>

                <li>
                    <a href="{{ route('kandang') }}" >
                        <i data-feather="lock"></i>
                        <span> Kelola Kandang </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('waktubooking') }}" >
                        <i data-feather="crosshair"></i>
                        <span> Kelola Waktu Booking </span>
                    </a>
                </li>

                @elseif(Auth::user()->role_id == 'R02')
                <li>
                    <a href="{{ route('home') }}" >
                        <i data-feather="airplay"></i>
                        <span> Dashboards </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('chat') }}" >
                        <i data-feather="message-circle"></i>
                        <span> Chats </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('rekammedis') }}" >
                        <i data-feather="book"></i>
                        <span> Rekam Medis Hewan </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaksilainnya') }}" >
                        <i data-feather="dollar-sign"></i>
                        <span> Kelola Transaksi </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>

                <li>
                    <a href="{{ route('layanan') }}" >
                        <i data-feather="filter"></i>
                        <span> Kelola Layanan </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('penyakit') }}" >
                        <i data-feather="thermometer"></i>
                        <span> Kelola Penyakit </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('obat') }}" >
                        <i data-feather="circle"></i>
                        <span> Kelola Obat </span>
                    </a>
                </li>

                @else
                <li>
                    <a href="{{ route('home') }}" >
                        <i data-feather="airplay"></i>
                        <span> Dashboards </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" >
                        <i data-feather="user"></i>
                        <span> Profile </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('chat') }}" >
                        <i data-feather="message-circle"></i>
                        <span> Chats </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('booking') }}">
                        <i data-feather="calendar"></i>
                        <span> Booking </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('historytransaksi') }}">
                        <i data-feather="book-open"></i>
                        <span> History Transaksi </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>

                <li>
                    <a href="{{ route('hewan') }}" >
                        <i data-feather="github"></i>
                        <span> Kelola Hewan </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('databookinguser') }}" >
                        <i data-feather="archive"></i>
                        <span> Kelola Data Booking </span>
                    </a>
                </li>

                @endif

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
@endsection
