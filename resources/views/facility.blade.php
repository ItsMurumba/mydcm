@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> Facility Entry Form </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> FEF </li>
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
                            <form method ="post" action="/facility" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Facility Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address">
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Bed Capacity</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="bed_capacity">
                                        @if ($errors->has('bed_capacity'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('bed_capacity') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">County</label>
                                    <div class="col-sm-10">
                                        {{ Form::select('county', $county, null,  ['class' => 'form-control']) }}
                                        @if ($errors->has('county'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('county') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Level</label>
                                    <div class="col-sm-10">
                                        {{Form::select('level', $level, null,  ['class' => 'form-control'])}}
                                        @if ($errors->has('level'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('level') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                @if(Session::has('message'))
                                    <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="alert-link close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em>
                                    </div>
                                @endif
                                <hr/>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Facility</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
