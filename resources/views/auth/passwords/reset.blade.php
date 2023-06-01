<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIDUMITA</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient" style="background-color: #eee;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="height: 100vh;">

            <div class="col-xl-9 col-lg-12 col-md-9" style="margin: auto;">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 text-center">
                                <img src="{{asset('img/dashboard.png')}}" alt="" width="350px">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-left">
                                        <strong class="text-gray-900" style="font-size: 24px;">SIDUMITA</strong>
                                        <h6 style="font-size: 14px;">Masukan password yang baru</h3>
                                    </div>
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <p>{{ $errors->first() }}</p>
                                    </div>
                                    @endif
                                    <form action="{{route('getResetRequest.store')}}" method="POST" class="user">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <input type="hidden" class="form-control form-control-user mb-2" name="token"
                                                value="{{ $token }}">
                                            <input type="email" class="form-control form-control-user mb-2" name="email"
                                                value="{{ $email }}">
                                            <input type="password" class="form-control form-control-user mb-2" name="password"
                                                placeholder="Masukan Password">
                                            <input type="password" class="form-control form-control-user mb-2" name="password_confirmation"
                                                placeholder="Masukan Password Kembali">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src=" {{ asset('admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin2/js/sb-admin-2.min.js') }}"></script>

</body>

</html>