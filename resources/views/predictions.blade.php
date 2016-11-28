@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> Disease Costs Predictions </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> Predictions </li>
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
                            <form method ="post" action="/predictions2" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Disease</label>
                                    <div class="col-sm-10">
                                        {{--{{ Form::select('diseases', $diseases, null,  ['class' => 'form-control']) }}--}}
                                        <select name='diseases' class = 'form-control'>
                                            @foreach($diseases as $diseases)
                                                <option value="{{ $diseases->disease_id }}">{{ $diseases->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr/>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Growth Rate</label>
                                    <div class="col-sm-10">
                                        @foreach($growthrate as $growthrate)
                                            <input type="text" class="form-control" name="growthrate" placeholder="{{ $growthrate->rate }}">
                                        @endforeach
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Consultation Increament</label>
                                    <div class="col-sm-10">
                                        @foreach($consultationInc as $consultationInc)
                                            <input type="text" class="form-control" name="consultationInc"  placeholder="{{ $consultationInc->rate }}">
                                        @endforeach
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Inflation Rate</label>
                                    <div class="col-sm-10">
                                        @foreach($inflation as $inflation)
                                        <input type="text" class="form-control" value ="" name="inflation" placeholder="{{ $inflation->rate }}">
                                        @endforeach
                                    </div>
                                </div>
                                </hr>
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
