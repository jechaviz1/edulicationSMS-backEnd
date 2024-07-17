<!DOCTYPE html>
<html lang="en" class="h-100">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="robots" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="W3Admin:Dashboard Bootstrap 5 Template">
        <meta property="og:title" content="W3Admin:Dashboard Bootstrap 5 Template">
        <meta property="og:description" content="W3Admin:Dashboard Bootstrap 5 Template">
        <meta property="og:image" content="https://w3admin.dexignzone.com/xhtml/social-image.png">
        <meta name="format-detection" content="telephone=no">

        <!-- PAGE TITLE HERE -->
        <title>W3Admin - Modern-Admin-Dashboard</title>

        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="images/favicon.png">
        <!--<link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">-->
        <link href="{{ URL::asset('/admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" />
        <!--<link href="./css/style.css" rel="stylesheet">-->
        <link href="{{ URL::asset('/admin/css/style.css') }}" rel="stylesheet" />

    </head>

    <body class="vh-100">
        @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
            </button>
            <strong>Success!</strong> {{ $message }}
        </div>
        @endif
        <div class="authincation h-100">
            <div class="container-fluid h-100">
                <div class="row h-100">
                    <div class="col-lg-6 col-md-12 col-sm-12 mx-auto align-self-center">
                        <div class="login-form">
                            <div class="text-center">
                                <h3 class="title">Forgot Password</h3>
                                <p>Forgot Password</p>
                            </div>
                            @if ($message = Session::get('failed'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                </button>
                                <strong>Error!</strong> {{ $message }}
                            </div>
                            @endif
                            <form action="{{ route('forget.password.post') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="mb-1 text-dark">Email</label>
                                    <input type="email"   id="email_address" class="form-control form-control" value="" name="email" required >
                                </div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                                <div class="text-center mb-4">
                                    <button type="submit" class="btn btn-primary light btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="pages-left h-100">
                            <div class="login-content">
                                <a href="index.html"><img src="images/logo-full.png" class="mb-3" alt=""></a>
                                <p>Your true value is determined by how much more you give in value than you take in payment. ...</p>
                            </div>
                            <div class="login-media text-center">
                                <img src="images/login.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--**********************************
                Scripts
        ***********************************-->
        <!-- Required vendors -->
        <!--<script src="./vendor/global/global.min.js"></script>-->
        <script src="{{ asset('admin/vendor/global/global.min.js')}}"></script>
      <!--<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>-->
        <script src="{{ asset('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
      <!--<script src="js/deznav-init.js"></script>-->
        <script src="{{ asset('admin/js/deznav-init.js')}}"></script>
      <!--<script src="./js/custom.js"></script>-->
        <script src="{{ asset('admin/js/custom.js')}}"></script>

    </body>
</html>