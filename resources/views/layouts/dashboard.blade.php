<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/dashboard/style.css') }}" rel="stylesheet">
</head>

<body>
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="index.html" class="brand-logo">
            <span class="logo-abbr">M</span>
            <span class="logo-compact">Mumtaz</span>
            <span class="brand-title">Mumtaz</span>
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content float-right">
            <nav class="navbar navbar-expand">
                <form method="POST" action="{{route('logout')}}" id="logout-form">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit()"
                       style="color: red">
                        <i class="mdi mdi-logout-variant mdi-24px"></i>
                    </a>
                </form>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="quixnav">
        <div class="quixnav-scroll">
            <ul class="metismenu" id="menu">
                <li>
                    <a href="#">
                        <i class="mdi mdi-silverware-variant"></i>
                        <span class="nav-text">Meals</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="mdi mdi-format-list-checks"></i>
                        <span class="nav-text">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-account"></i>
                        <span class="nav-text">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <div class="container">
            @stack('breadcrumb')
            @include('admin.includes.alerts')
            @yield('dashboard')
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Developed by <a href="https://github.com/s-berdiyorov" target="_blank">Salokhiddin</a> 2021
            </p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

    <script src="{{ asset('js/dashboard/jquery.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/jquery.slimscroll.min.js') }}"></script>
    <!-- Here is navigation script -->
    <script src="{{ asset('js/dashboard/quixnav.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/dashboard/custom.min.js') }}"></script>
</div>
</body>

</html>
