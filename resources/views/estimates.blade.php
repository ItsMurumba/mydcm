@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> Population Estimates Entry Form </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> PEEF</li>
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
                            <form method ="post" action="/estimates" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">County</label>
                                    <div class="col-sm-10">
                                        {{ Form::select('county', $county, (isset($data['county'])) ? $data['county'] : null, array('id' => 'county')) }}
                                        @if ($errors->has('county'))
                                            <span class="help-block">
                                                <strong style="color:red">{{ $errors->first('county') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Facility</label>
                                    <div class="col-sm-10">
                                        <select id="facility_id" name="facility" class="form-control" >
                                            <option>Select a county first</option>
                                        </select>
                                        @if ($errors->has('facility'))
                                            <span class="help-block">
                                                <strong style="color:red">{{ $errors->first('facility') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Age Group</label>
                                    <div class="col-sm-10">
                                        {{ Form::select('distributions', $distributions, null,  ['class' => 'form-control']) }}
                                        @if ($errors->has('distributions'))
                                            <span class="help-block">
                                                <strong style="color:red">{{ $errors->first('distributions') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
                                    <div class="col-sm-10">
                                        {{ Form::select('gender', $gender,(isset($data['gender'])) ? $data['gender'] : null, array('id' => 'frm_duration')) }}
                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                                <strong style="color:red">{{ $errors->first('gender') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Disease</label>
                                    <div class="col-sm-10">
                                        {{ Form::select('diseases', $diseases, (isset($data['diseases'])) ? $data['diseases'] : null, array('id' => 'diseases')) }}
                                        @if ($errors->has('diseases'))
                                            <span class="help-block">
                                                <strong style="color:red">{{ $errors->first('diseases') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div id="divFrm9" class="form-group form-duration-div" >
                                    <label class="col-sm-2 control-label">Disease Type</label>
                                    <div class="col-sm-10 ">
                                        <select id="DTypeM_id" name="diseasetype" class="form-control" >
                                            <option>Select a Disease first</option>
                                        </select>
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Population</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="population">
                                        @if ($errors->has('population'))
                                            <span class="help-block">
                                                <strong style="color:red">{{ $errors->first('population') }}</strong>
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
                            <script> $(document).ready(function()
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function()
        {
            $('#diseases').change(function(){
                $.getJSON("{{ url('api/diseasetypeM')}}",
                        { optionm: $(this).val(),optiong: $("#frm_duration" ).val() },
                        function(data) {
                            var model = $('#DTypeM_id');
                            model.empty();
                            $.each(data, function(index, element) {
                                model.append("<option value='"+element.id+"'>" + element.disease_type + "</option>");
                            });
                        });
            });
        });
    </script>
@endsection
