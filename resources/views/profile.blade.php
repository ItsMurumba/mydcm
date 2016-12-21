@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> My Profile </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> MP </li>
                <li><a href="../../public/dcm"><i class="fa fa-tachometer"></i></a></li>
            </ol>
        </div>

        <div class="conter-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <div class="panel-control pull-right hidden">
                                    <a class="panelButton"><i class="fa fa-refresh"></i></a>
                                    <a class="panelButton"><i class="fa fa-minus"></i></a>
                                    <a class="panelButton"><i class="fa fa-remove"></i></a>
                                </div>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                            {{--<form method ="post" action="/myprofile" class="form-horizontal">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                                    {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--@foreach($MyProfile as $MyProfile)--}}
                                            {{--<input type="text" class="form-control"  name="username" placeholder="{{ $MyProfile->username }}" >--}}
                                        {{--@endforeach--}}
                                        {{--@if ($errors->has('username'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong style="color: red">{{ $errors->first('username') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                                    {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--@foreach($MyProfile2 as $MyProfile2)--}}
                                            {{--<input type="text" class="form-control"  name="email" placeholder="{{ $MyProfile2->email }}" >--}}
                                        {{--@endforeach--}}
                                        {{--@if ($errors->has('email'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong style="color: red">{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">--}}
                                    {{--<label for="password" class="col-md-4 control-label">Current Password</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--<input type="password" class="form-control"  id="current-password" name="current-password" placeholder="Password"required>--}}

                                        {{--@if ($errors->has('current-password'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong style="color: red">{{ $errors->first('current-password') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                                    {{--<label for="password" class="col-md-4 control-label">New Password</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--<input type="password" class="form-control"  id="password" name="password" placeholder="Password"required>--}}

                                        {{--@if ($errors->has('password'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong style="color: red">{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
                                    {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}

                                        {{--@if ($errors->has('password_confirmation'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong style="color: red">{{ $errors->first('password_confirmation') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--@if(Session::has('message'))--}}
                                    {{--<div class="alert alert-success alert-dismissible">--}}
                                        {{--<a href="#" class="alert-link close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                                        {{--<span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em>--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                                {{--<hr/>--}}
                                {{--<div class="form-group">--}}
                                    {{--<button type="submit" class="btn btn-primary">Save</button>--}}
                                {{--</div>--}}
                            {{--</form>--}}




                            <form enctype="multipart/form-data" action="/profile" method="POST">
                                <label>Update Profile Image</label>
                                <input type="file" name="avatar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="pull-right btn btn-sm btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection