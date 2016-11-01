@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> Staff Category </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> Staff Category </li>
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
                                        {{--<input type="text" class="form-control"  name="cadre">--}}
                                        {{Form::select('cadre', ['1' => 'Hospital Dean', '2' => 'Administrator', '3' => 'Surgeon', '4' => 'Normal Specialist', '5' => 'Silent Doctor', '6' => 'Nurse', '7' => 'Physicin Ass' , '8' => 'Intern'], null, ['placeholder' => 'Pick a cadre...', 'class' => 'form-control'])}}
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Basic Salary</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="basic_salary">
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputtext" class="col-sm-2 control-label">Allowances</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="allowances">
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputtext" class="col-sm-2 control-label">Reimbursement</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="reimbursement">

                                    </div>
                                </div>
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
