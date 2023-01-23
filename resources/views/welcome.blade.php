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
    <script src="//unpkg.com/alpinejs" defer></script>

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

<body class="">
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-3"></div>
            <div class="col-md-6 mt-4 d-flex flex-column mx-lg-0 mx-auto">
                <div class="card card-plain">
                  <div class="card-header pb-0 text-start">
                    <h4 class="font-weight-bolder text-center">{{strip_tags(App\Models\User::pluck('companyname')->first())}}</h4>
                    <p class="mb-0 text-center">Enter your Credentials to sign in</p>
                  </div>
                  <div class="card-body">
                    <form role="form" action="{{route('login')}}" method="POST">
                      <div class="mb-3">
                        <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" name="username" placeholder="User Name..." aria-label="username">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror      
                    </div>
@csrf
                      <div class="mb-3">
                        <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"  placeholder="Password" aria-label="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                    </div>
                      <div class="mb-3">
                        <input type="text" class="form-control form-control-lg @error('secret') is-invalid @enderror"  name="secret" placeholder="Secret Phrase..." aria-label="secret">
                        @error('secret')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                    </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                      </div>
                      <x-message />
                    </form>
                  </div>
                 </div>
              </div>
            </div>
            <div class="col-md-3"></div>

        </div>
 
    </main>
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
