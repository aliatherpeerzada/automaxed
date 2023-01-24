
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>License Manager Login</title>
    <link rel="stylesheet" href="{{URL::asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/styles.min.css')}}">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h3 class="text-dark">{!!App\Models\User::pluck('companyname')->first()!!}</h3>
                               
                                <hr>
                                <p class="mb-3 text-primary fw-bold">Enter your credentials to sign in</p>
                                <hr class="mb-4">
                            </div>
                            <form class="user" action="{{route('login')}}" method="POST">
                              @csrf
                                <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Admin Username" name="username"></div>
                                <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Admin Password" name="password"></div>
                                <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword-1" placeholder="Secret Phrase" name="secret"></div>
                                <div class="mt-4"><button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/script.min.js')}}"></script>
</body>

</html>