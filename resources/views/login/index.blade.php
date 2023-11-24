<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" background-image="rumahsakit.png"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    {{-- cek login --}}
                                    @if(session()->has('loginError'))
                                        <script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error!',
                                                text: '{{ session('loginError') }}',
                                                showConfirmButton: false,
                                                timer: 2500
                                            });
                                        </script>
                                    @endif
                                    {{-- end --}}
                                    <form action="{{ route('login') }}" class="user" method="POST" >
                                        @csrf
                                        <div class="form-group">
                                            {{ __('username') }}
                                            <input type="username" name="username" class="form-control form-control-user" id="InputUsername" aria-describedby="UsernameHelp" placeholder="Enter Username" required>
                                        </div>
                                        <div class="form-group">
                                            {{ __('password') }}
                                            <input type="password" name="password" class="form-control form-control-user" id="InputPassword" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            {{ __('Login') }}
                                        </button>
                                    </form>
                                    <hr>
                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> --}}
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src='{{ asset("vendor/jquery/jquery.min.js")}}'></script>
    <script src='{{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}'></script>

    <!-- Core plugin JavaScript-->
    <script src='{{  asset("vendor/jquery-easing/jquery.easing.min.js")}}'></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset ('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
