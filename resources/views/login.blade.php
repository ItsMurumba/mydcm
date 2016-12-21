<div class="back">
    <div class="errors col-sm-8 col-sm-offset-2">
    </div>
    <div class="login-outer">
        <div class="login-wrap">
            <div class="login-left striped-bg text-center">
                <a href="../dcm" class="logo-lg">
                    <i class="fa fa-paper-plane"></i> Dynamic Cost Model
                </a>
                <div class="slogan">A Health Costing Tool</div>
            </div>
            <div class="login-right striped-bg">
                <div class="heading">Login to your Account</div>
                <div class="input">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" >
                                    Login
                                </button>

                                {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">--}}
                                    {{--Forgot Your Password?--}}
                                {{--</a>--}}
                            </div>
                        </div>
                    </form></br></br>
                    {{--<div class="login-other text-right">Or Login with--}}
                        {{--<a href="javascript:;" class="m-l-sm"><i class="fa fa-facebook"></i></a>--}}
                        {{--<a href="javascript:;" class="m-l-sm"><i class="fa fa-twitter"></i></a>--}}
                        {{--<a href="javascript:;" class="m-l-sm"><i class="fa fa-google-plus gplus"></i></a>--}}
                    {{--</div>--}}
                </div>
                <div class="rightFooter">
                    <a href="/registers">Don't have an Account?</a>
                    <a href="{{ url('/password/reset') }}" class="m-l">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <script src="/dcm/js/jquery.min.js"></script>
    <meta charset="utf-8"/>
    <title>Dynamic Cost Model | Login </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link rel="stylesheet" href="/dcm/css/vendor.css"/>
    <link rel="stylesheet" href="/dcm/css/app-green.css"/>

<style>
    .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('/dcm/img/loading.gif') 50% 50% no-repeat rgb(249,249,249);
    }
</style>

</head>
<body class="page-header-fixed page-quick-sidebar-over-content ">
<div class="loader">
<script src="/dcm/js/vendor.js" type="text/javascript"></script>
<script src="/dcm/vendor/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="/dcm/js/app.js" type="text/javascript"></script>
<script type="text/javascript">
    $(".alert-danger").click(function(){
        $(".alert-danger").hide();
    });
</script>
    {{--gif script--}}

    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        })
    </script>

</body>
</html>