<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add New License</title>
    <link rel="stylesheet" href="{{URL::asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/styles.min.css')}}">
    {{-- <link rel="stylesheet" href="{{URL::asset('assets/css/sb-admin.min.css')}}"> --}}

</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon"><i class="fas fa-key"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Licenses</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="{{url('home')}}"><i class="fas fa-key"></i><span>Add New License</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('show-licenses')}}"><i class="fas fa-database"></i><span>Show All Licenses</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('show-activity')}}"><i class="fas fa-database"></i><span>User Activity Log</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('settings')}}"><i class="fas fa-cog"></i><span>Settings</span></a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     <i class="fas fa-power-off"></i><span>Logout</span>
                    </a>
                    
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                    </form>
                
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <div class="container header-stats">
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="mb-0"><span class="text-primary px-1 fw-bolder">4</span>Licenses Total</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="mb-0"><span class="text-primary px-1 fw-bolder">3</span>Licenses Valid</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="mb-0"><span class="text-primary px-1 fw-bolder">1</span>Licenses Used</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="mb-0"><span class="text-primary px-1 fw-bolder">2</span>Activations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="container-fluid">
                   {{$slot}}
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright mb-1 fw-bolder"><span>Company Name ABC License Manager</span></div>
                    <div class="text-center my-auto copyright"><span>powered by automaxed.com</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="{{URL::asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/script.min.js')}}"></script>

    <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<x-notification />

</body>

</html>