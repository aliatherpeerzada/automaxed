<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ URL::asset('assets/img/favicon.png') }}">
    <title>
        Automaxed
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ URL::asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ URL::asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ URL::asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-150 bg-primary position-absolute w-100"></div>
    <x-aside />
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <x-nav />
        <!-- End Navbar -->
        <div class="container-fluid py-4">
          
            {{$slot}}
            <x-footer />
 
        </div>
 
    </main>
    <x-fixed-plugin />
    <!--   Core JS Files   -->
    <script src="{{ URL::asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script src="{{ URL::asset('assets/js/argon-dashboard.min.js') }}"></script>
</body>

</html>
