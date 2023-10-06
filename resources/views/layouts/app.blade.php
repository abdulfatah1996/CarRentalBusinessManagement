<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Car Rental Business Management" name="description" />
    <meta content="SANAD JEBRAIL HAQWIE" name="author" />
    <meta content="AHMAD HASSAN ALNAMI," name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    @yield('css_custom')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- name of page -->
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body id="body">
    <!-- this is notifications -->
    @if (session('success'))
        <!--end toast-->
        <div class="toast show fixed-top ms-auto m-4 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-success">
                <i class="fa fas fa-check-circle me-1" height="20"></i>
                <h5 class="me-auto my-0">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body ">
                {{ session('success') }}
            </div>
        </div><!--end toast-->
    @endif

    @if (session('error'))
        <!--end toast-->
        <div class="toast show fixed-top ms-auto m-4 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-warning">
                <i class="fa fas fa-info-circle me-1" height="20"></i>
                <h5 class="me-auto my-0">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body ">
                {{ session('error') }}
            </div>
        </div><!--end toast-->
    @endif



    <!-- leftbar-tab-menu -->
    <div class="leftbar-tab-menu">
        <div class="main-icon-menu">
            <a href="{{ route('home') }}" class="logo logo-metrica d-block text-center">
                <span>
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                </span>
            </a>
            <div class="main-icon-menu-body">
                <div class="position-reletive h-100" data-simplebar style="overflow-x: hidden;">
                    <ul class="nav nav-tabs" role="tablist" id="tab-menu">
                        {{--  Dashboard  --}}
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard"
                            data-bs-trigger="hover">
                            <a href="#Dashboard" id="dashboard-tab" class="nav-link">
                                <i class="ti ti-smart-home menu-icon"></i>
                            </a><!--end nav-link-->
                        </li><!--end nav-item-->
                        {{--  Dashboard  --}}
                    </ul><!--end nav-->
                </div><!--end /div-->
            </div><!--end main-icon-menu-body-->
            <div class="pro-metrica-end">
                <a href="{{ route('home') }}" class="profile">
                    @if (Auth::user()->picture == null)
                        <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="profile-user"
                            class="rounded-circle thumb-sm">
                    @else
                        <img src="{{ asset(Auth::user()->picture) }}" alt="profile-user"
                            class="rounded-circle thumb-sm">
                    @endif
                </a>
            </div><!--end pro-metrica-end-->
        </div>
        <!--end main-icon-menu-->

        <div class="main-menu-inner">
            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{ route('home') }}" class="logo">
                    <span>
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large"
                            class="logo-lg logo-dark">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                    </span>
                </a><!--end logo-->
            </div><!--end topbar-left-->
            <!--end logo-->
            <div class="menu-body navbar-vertical tab-content" data-simplebar>
                {{--  Dashboard  --}}
                <div id="Dashboard" class="main-icon-menu-pane tab-pane" role="tabpanel" aria-labelledby="dasboard-tab">
                    <div class="title-box">
                        <h6 class="menu-title fw-bolder">Dashboard</h6>
                    </div>
                    <ul class="nav flex-column">
                        @if (Auth::user()->role == 'administrator')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">
                                    Users Page
                                </a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('payments.index') }}">
                                    Payments
                                </a>
                            </li><!--end nav-item-->
                        @endif
                        @if (Auth::user()->role == 'merchant')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cars.index') }}">
                                    Cars Page
                                </a>
                            </li><!--end nav-item-->
                        @endif
                        @if (Auth::user()->role == 'merchant' or Auth::user()->role == 'client')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cars.rentals') }}">
                                    Rental Applications
                                </a>
                            </li><!--end nav-item-->
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('suggestions.index') }}">
                                Suggestions
                            </a>
                        </li><!--end nav-item-->
                    </ul><!--end nav-->
                </div><!-- end Dashboards -->
                {{--  Dashboard  --}}
            </div>
            <!--end menu-body-->
        </div><!-- end main-menu-inner-->
    </div>
    <!-- end leftbar-tab-menu-->

    <!-- Top Bar Start -->
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom" id="navbar-custom">
            <ul class="list-unstyled topbar-nav float-end mb-0">
                {{--  notification  --}}
                <li class="dropdown notification-list">
                    @php
                        use App\Models\Notefaction;
                        $user_id = Auth::user()->id;
                        $notifications = Notefaction::where('user_id', '=', $user_id)
                            ->latest()
                            ->get();
                        $notifications_count = $notifications->where('status', '=', 'closed')->count();
                    @endphp
                    <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-bell"></i>
                        @if ($notifications_count > 0)
                            <span class="alert-badge"></span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">
                        <h6
                            class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                            Notifications
                            <span class="badge bg-soft-primary badge-pill">
                                {{ $notifications_count }}
                            </span>
                        </h6>
                        <div class="notification-menu" data-simplebar>
                            @foreach ($notifications as $notification)
                                <!-- item-->
                                <a href="{{ route('notefactions.show', ['notefaction' => $notification]) }}"
                                    class="dropdown-item py-3">
                                    <small class="float-end text-muted ps-2">
                                        {{ $notification->created_at->diffforhumans() }}
                                    </small>
                                    <div class="media">
                                        @if ($notification->status == 'closed')
                                            <div class="avatar-md bg-soft-danger">
                                                <i class="ti ti-bell"></i>
                                            </div>
                                        @else
                                            <div class="avatar-md bg-soft-secondary">
                                                <i class="ti ti-bell"></i>
                                            </div>
                                        @endif
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">
                                                {{ $notification->title }}
                                            </h6>
                                            <small class="text-muted mb-0">
                                                {{ $notification->notification }}
                                            </small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                            @endforeach
                        </div>
                        <!-- All-->
                        <a href="{{ route('notefactions.index') }}" class="dropdown-item text-center text-primary">
                            View all <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>
                {{--  profile & logout  --}}
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown"
                        href="{{ route('profile.edit') }}" role="button" aria-haspopup="false"
                        aria-expanded="false">
                        <div class="d-flex align-items-center">
                            @if (Auth::user()->picture == null)
                                <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="profile-user"
                                    class="rounded-circle me-2 thumb-sm" />
                            @else
                                <img src="{{ asset(Auth::user()->picture) }}" alt="profile-user"
                                    class="rounded-circle thumb-sm">
                            @endif
                            <div class="mx-1">
                                <small class="d-none d-md-block font-11 text-uppercase">
                                    {{ Auth::user()->role }}
                                </small>
                                <span class="d-none d-md-block fw-semibold font-12">
                                    {{ Auth::user()->name }}
                                    <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="ti ti-user font-16 me-1 align-text-bottom"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('settings.edit') }}">
                            <i class="ti ti-settings font-16 me-1 align-text-bottom"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider mb-0"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item fw-bolder text-danger">
                                <i class="ti ti-power font-16 me-1 align-text-bottom"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </li><!--end topbar-profile-->
            </ul><!--end topbar-nav-->

            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                        <i class="ti ti-menu-2"></i>
                    </button>
                </li>
                <li class="hide-phone app-search">
                    <span id='ct6' class="text-dark"></span>
                </li>
            </ul>
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->
    <!-- Top Bar End -->

    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content-tab">
            @yield('content')
            <!--Start Footer-->
            <!-- Footer Start -->
            <footer class="footer text-center text-sm-start">
                <script>
                    document.write(new Date().getFullYear())
                </script>
                &copy;
                CAR Rent
                <span class="text-muted d-none d-sm-inline-block float-end">
                    Crafted by SANAD HAQWIE & AHMAD ALNAMI
                </span>
            </footer>
            <!-- end Footer -->
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        function display_ct6() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
            hours = x.getHours() % 12;
            hours = hours ? hours : 12;
            var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
            x1 = x1 + " - " + hours + ":" + x.getMinutes() + ":" + x.getSeconds() + ":" + ampm;
            document.getElementById('ct6').innerHTML = x1;
            display_c6();
        }

        function display_c6() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct6()', refresh)
        }
        display_c6()
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function notefactions_all() {
                // do whatever you like here
                $.ajax({
                    type: "get",
                    url: "{{ route('notefactions.all') }}",
                    success: function(data) {
                        $(".notification-list").load(location.href + " .notification-list");
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
                setTimeout(notefactions_all, 5000);
            }

            notefactions_all();
        });
    </script>
    @yield('scripts')
</body>

</html>
