<div class="back">
    <div class="errors col-sm-8 col-sm-offset-2">
    </div>
    <div class="login-outer">
        <div class="login-wrap">
            <div class="login-left striped-bg text-center">
                <a href="/dcm" class="logo-lg">
                    <i class="fa fa-paper-plane"></i> Dynamic Cost Model
                </a>
                <div class="slogan">A Health Costing Tool</div>
            </div>
            <div class="login-right striped-bg">
                <div class="heading">Create your Account</div>
                <div class="input">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                            <label for="county" class="col-md-4 control-label">County</label>

                            <div class="col-md-6">

                                {{ Form::select('county', $county, (isset($data['county'])) ? $data['county'] : null, array('id' => 'county')) }}

                                @if ($errors->has('county'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('county') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('facility') ? ' has-error' : '' }}">
                            <label for="facility" class="col-md-4 control-label">Facility</label>

                            <div class="col-md-6">

                                <select id="facility_id" name="facility_id" class="form-control" >
                                    <option>Select a county first</option>
                                </select>
                                @if ($errors->has('facility'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('facility') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <input id="role" type="hidden" class="form-control" name="role" value="2" required>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="rightFooter">
                    <a href="/">Already have an Account?</a>
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
    <title>Dynamic Cost Model | Signup </title>
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
   <script>
       $(document).ready(function()
    {
        $('#county').change(function(){
            $.getJSON("{{ url('api/dropdown/cities')}}",
            { option: $(this).val() },
            function(data) {
                var model = $('#facility_id');
                model.empty();
                $.each(data, function(index, element) {
                    model.append("<option value='"+element.id+"'>" + element.facility_name + "</option>");
                });
            });
        });
    });
   </script>
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