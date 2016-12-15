@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> Assign Staff To Facility</h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active">ASTF </li>
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
                            <form method ="post" action="/stafftofacility" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-md-4 control-label">Staff Category</label>
                                    <div class="col-md-6">
                                        {{ Form::select('staffcategory', $staffcategory, null,  ['class' => 'form-control']) }}
                                        @if ($errors->has('staffcategory'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('staffcategory') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
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
                                <hr/>
                                <div class="form-group">
                                    <label for="facility" class="col-md-4 control-label">Facility</label>
                                    <div class="col-md-6">
                                        <select id="facility_id" name="facility_id" class="form-control" >
                                            <option>Select a county first</option>
                                        </select>
                                        @if ($errors->has('facility_id'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('facility_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-md-4 control-label">Number Of Employees</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control"  name="no_of_employees">
                                        @if ($errors->has('no_of_employees'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('no_of_employees') }}</strong>
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
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endsection
