<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Sistem Monitoring</title>

    {{-- Include bootstrap --}}
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    @yield('css')
</head>
</head>

<body class="sb-nav-fixed">
    @include('sweetalert::alert')

    @include('dashboard.layouts.partials.topbar')
    @include('dashboard.layouts.partials.modal-logout')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('dashboard.layouts.partials.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-3">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    @yield('js')
</body>

</html>
