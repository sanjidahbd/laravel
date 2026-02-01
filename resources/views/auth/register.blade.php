<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminBite - Register</title>
    
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    
    <style>
        /* Backdrop background image support */
        .auth-wrapper {
            background: url({{ asset('assets/images/big/auth-bg.jpg') }}) no-repeat center center;
            background-size: cover;
        }
        .error-msg {
            color: #fc4b6c;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
            <div class="auth-box">
                <div>
                    <div class="logo">
                        <span class="db"><img src="{{ asset('assets/images/logo-icon.png') }}" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Create New Account</h5>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Full Name" value="{{ old('name') }}" required autofocus>
                                </div>
                                @error('name') <p class="error-msg">{{ $message }}</p> @enderror

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email Address" value="{{ old('email') }}" required>
                                </div>
                                @error('email') <p class="error-msg">{{ $message }}</p> @enderror

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                                </div>
                                @error('password') <p class="error-msg">{{ $message }}</p> @enderror

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm Password" required>
                                </div>

                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Register</button>
                                    </div>
                                </div>

                                <div class="form-group m-b-0 m-t-10">
                                    <div class="col-sm-12 text-center">
                                        Already registered? <a href="{{ route('login') }}" class="text-info m-l-5"><b>Log In</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
    </script>
</body>
</html>