<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>AHP</title>
        <link rel="stylesheet" href="{{ URL::asset('backend_source/login_panel/css/style.css') }}">
        <link rel="shortcut icon" href="{{ URL::asset('frontend_source/images/logo.png') }}">

    </head>

    <body>

        <div class="container">
            <div class="info">
                <!-- <h1>BASA</h1> -->
                <h3>&nbsp;</h3>
            </div>
        </div>
        <div class="form">
            <div class="thumbnail"><img src="{{ URL::asset('frontend_source/images/logo.png') }}" style="width:120px; height:120px;"/></div>
            @if(Session::has('sorry'))
            <div class="alert alert-danger" style="text-align: center">  {!!Session::get('sorry')!!}</div>
            @endif

            <form class="form-horizontal login-form" role="form" method="POST" action="{{ url('/adminlogin') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>







                <button type="submit">login</button>
            <!--    <p class="message">Not registered? <a href="#">Create an account</a></p>-->
            </form>
        </div>
        <script src="{{ URL::asset('backend_source/login_panel/js/index.js') }}"></script>
    </body>
</html>
