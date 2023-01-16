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
<style>
    html{
        zoom:90%
    }
    </style>
<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-150 bg-primary position-absolute w-100"></div>
    <x-aside />
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <x-nav />
       
        <!-- End Navbar -->
        <div class="container-fluid py-4">
          
            {{$slot}}
          
        </div>
 
    </main>
    <x-fixed-plugin />
    <!--   Core JS Files   -->
   
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>

<script src="{{ URL::asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/chartjs.min.js') }}"></script>
{{-- <script src="{{ URL::asset('assets/js/toast.js') }}"></script> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" rel="stylesheet">

<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>


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
<x-notification />
