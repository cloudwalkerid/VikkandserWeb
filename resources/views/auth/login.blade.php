<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <link rel="icon" href="{{ URL::asset('assets/img/sketch.png')}}">

    <!-- Core stylesheet files. REQUIRED -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.css')}}">

    <!-- Font Awesome -->
    <!-- WARNING: Font Awesome doesn't work if you view the page via file:// -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/font-awesome/css/font-awesome.css')}}">

    <!-- animate.css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/animate.css/animate.css')}}">
    <!-- END: core stylesheet files -->
    <!-- Theme main stlesheet files. REQUIRED -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/chl.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/theme-peter-river.css')}}">
    <!-- END: theme main stylesheet files -->

    <style media="screen">
        .app {
            background-image: url("{{ URL::asset('assets/img/backgroundLogin2.jpg')}}");
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>
</head>

<body class="bg-clouds">
    <div class="app">
        <div class="app-login">
            <div class="text-center box shadow-5 animated fadeInLeft b-r-4 p-a-20">
                <h1 class="f-4 m-a-0">Vikkand</h1>
                <h4>Survei Biaya Konstruksi</h4>
                <form class="text-left" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('nip') ? ' has-error' : '' }}">
                        <input class="form-control" placeholder="NIP" type="text" name="nip">
                        <span class="form-control-feedback">
                            <i class="fa fa-fw fa-envelope"></i>
                        </span>
                        @if ($errors->has('nip'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nip') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input class="form-control" placeholder="Password" type="password" name="password">
                        <span class="form-control-feedback">
                            <i class="fa fa-fw fa-key"></i>
                        </span>
                        @if ($errors->has('nip'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block m-b-15">Login</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Core javascript files. REQUIRED -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ URL::asset('assets/vendor/jquery/jquery.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
</body>

</html>
