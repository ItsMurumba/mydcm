@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> Gender Entry Form </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> GEF </li>
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
                            <form method ="post" action="/gender" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Gender Name</label>
                                    <div class="col-sm-10">
                                        {{Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['placeholder' => 'Pick gender...', 'class' => 'form-control'])}}
                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                        @if(Session::has('message'))
                                            <div class="alert alert-success alert-dismissible">
                                                <a href="#" class="alert-link close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection