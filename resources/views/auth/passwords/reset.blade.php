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
        <div class="authincation h-100">
            <div class="container-fluid h-100">
                <div class="row h-100">
                    <div class="col-lg-6 col-md-12 col-sm-12 mx-auto align-self-center">
                        <div class="login-form">
                            <div class="text-center">
                                <h3 class="title">PassWord Generate</h3>
                                <p>Generate Password</p>
                            </div>

                            @if ($message = Session::get('success'))
                            <div class="alert alert-primary alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                </button>
                                <strong>Success!</strong> {{ $message }}
                            </div>
                            @endif

                            @if ($message = Session::get('failed'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                </button>
                                <strong>Error!</strong> {{ $message }}
                            </div>
                            @endif

                            <form method="POST"  action="{{ route('password.update') }}" class="row g-3 needs-validation" novalidate >
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ $email }}">
                                <div class="mb-4 position-relative">
                                    <label class="mb-1 text-dark">New Password</label>
                                    <input type="password" id="dz-password" class="form-control form-control" value="" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   name="password" required>
                                    <div class="invalid-feedback">
                                        Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters
                                      </div>
                                </div>
                                <div class="mb-4 position-relative">
                                    <label class="mb-1 text-dark">Confirm Password</label>
                                    <input type="password" id="dz-password-confirm" class="form-control form-control" value="" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  name="password_confirmation" required>
                                    <div class="invalid-feedback">
                                        Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters
                                      </div>
                                </div>
                                <div class="text-center mb-4">
                                    <button type="submit" class="btn btn-primary light btn-block">Password Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="pages-left h-100">
                            <div class="login-content">
                                <a href=""><img src="{{ asset('admin/images/logo-full.png') }}" class="mb-3" alt=""></a>
                                <p>Your true value is determined by how much more you give in value than you take in payment. ...</p>
                            </div>
                            <div class="login-media text-center">
                                <img src="{{ asset('admin/images/login.png') }}" alt="">
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
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
        </script>

    </body>
</html>
