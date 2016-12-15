@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> Staff Category Entry Form</h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> SCEF </li>
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
                            <form method ="post" action="/staffcategories" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Cadre</label>
                                    <div class="col-sm-10">
                                        {{Form::select('cadre', ['Hospital Dean' => 'Hospital Dean', 'Administrator' => 'Administrator', 'Surgeon' => 'Surgeon', 'Normal Specialist' => 'Normal Specialist', 'Silent Doctor' => 'Silent Doctor', 'Nurse' => 'Nurse', 'Physicin Ass' => 'Physicin Ass' , 'Intern' => 'Intern'], null, ['placeholder' => 'Pick a cadre...', 'class' => 'form-control'])}}
                                        @if ($errors->has('cadre'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('cadre') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Basic Salary</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="basic_salary">
                                        @if ($errors->has('basic_salary'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('basic_salary') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputtext" class="col-sm-2 control-label">Allowances</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="allowances">
                                        @if ($errors->has('allowances'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('allowances') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputtext" class="col-sm-2 control-label">Reimbursement</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="reimbursement">
                                        @if ($errors->has('reimbursement'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('reimbursement') }}</strong>
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
                                    <button type="submit" class="btn btn-primary">Add Staff Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
