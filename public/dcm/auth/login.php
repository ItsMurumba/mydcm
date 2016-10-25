<div class="back">
<div class="errors col-sm-8 col-sm-offset-2">
</div>
<div class="login-outer">
<div class="login-wrap">
<div class="login-left striped-bg text-center">
<a href="../dcm" class="logo-lg">
<i class="fa fa-paper-plane"></i> Dashy Theme
</a>
<div class="slogan">Laravel 5 Theme</div>
</div>
<div class="login-right striped-bg">
<div class="heading">Login to your Account</div>
<div class="input">
<form class="form-horizontal" role="form" method="POST" action="auth/login">
<input type="hidden" name="_token" value="SBhVzJupMMIWJRFQYzCfSCLYhppn9UE29NdORXYl">
<div class="login-input-group">
<span class="login-input-group-addon"><i class="fa fa-at fa-fw"></i></span>
<input type="email" class="form-control" name="email" placeholder="email" value="">
</div>
<div class="login-input-group">
<span class="login-input-group-addon"><i class="fa fa-key fa-fw"></i></span>
<input type="password" class="form-control" placeholder="password" name="password">
</div>
<button type="submit" class="btn btn-default btn-lg submit">Login</button>
</form>
<div class="login-other text-right">Or Login with
<a href="javascript:;" class="m-l-sm"><i class="fa fa-facebook"></i></a>
<a href="javascript:;" class="m-l-sm"><i class="fa fa-twitter"></i></a>
<a href="javascript:;" class="m-l-sm"><i class="fa fa-google-plus gplus"></i></a>
</div>
</div>
<div class="rightFooter">
<a href="auth/register">Don't have an Account?</a>
<a href="javascript:;" class="m-l">Forgot Password?</a>



    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
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
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
<meta charset="utf-8"/>
<title>Dashy Laravel 5 Theme | Login </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta content="" name="description"/>
<meta content="" name="author"/>
<link rel="stylesheet" href="../css/vendor.css"/>
<link rel="stylesheet" href="../css/app-green.css"/>
</head>
<body class="page-header-fixed page-quick-sidebar-over-content ">
<script src="../js/vendor.js" type="text/javascript"></script>
<script src="../vendor/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="../js/app.js" type="text/javascript"></script>
<script type="text/javascript">
	$(".alert-danger").click(function(){
    $(".alert-danger").hide();
});
</script>
</body>
</html>