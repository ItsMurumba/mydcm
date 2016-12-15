@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> Create/Choose DataSets </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> CCD</li>
                <li><a href="../../public/dcm"><i class="fa fa-tachometer"></i></a></li>
            </ol>
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">My Datasets</h4>
                    </div>
                    <div align="center" class="modal-body">
                        <form method ="post" action="/predictions" class="form-horizontal" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-sm-10" >
                                    <select name='home' class = 'form-control'>
                                        @foreach($home as $home)
                                            <option value="{{ $home->id }}">{{ $home->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
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
                            <form method ="post" action="/index" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">DataSet Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  name="dataset">
                                        @if ($errors->has('dataset'))
                                            <span class="help-block">
                                                <strong style="color:red">{{ $errors->first('dataset') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">County</label>
                                    <div class="col-sm-10">
                                        <select name='county' class = 'form-control' readonly = 'true'>
                                            @foreach($county as $county)
                                                <option value="{{ $county->id }}">{{ $county->county_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('county'))
                                            <span class="help-block">
                                                <strong style="color:red">{{ $errors->first('county') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Facility</label>
                                    <div class="col-sm-10">
                                        <select name='facilities' class = 'form-control' readonly = 'true'>
                                            @foreach($facilities as $facilities)
                                                <option value="{{ $facilities->id }}">{{ $facilities->facility_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('facilities'))
                                            <span class="help-block">
                                                <strong style="color:red">{{ $errors->first('facilities') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Age Group(Years)</label>
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
                                        {{ Form::select('disease', $disease, (isset($data['disease'])) ? $data['disease'] : null, array('id' => 'disease')) }}
                                        @if ($errors->has('disease'))
                                            <span class="help-block">
                                                <strong style="color:red">{{ $errors->first('disease') }}</strong>
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
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control"  name="user" value="{{ Auth::user()->id }}" placeholder="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                @if(Session::has('message'))
                                    <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="alert-link close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em>
                                    </div>
                                    @endif
                                </hr>
                                <div class="form-group">
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Select Datasets</button>

                                    <!-- Modal -->
                                    <button type="submit" class="btn btn-primary">Create DataSet</button>
                                     <a href="/MyDataSets" class="btn btn-primary"/> View My DataSets</a>
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
            $('#disease').change(function(){
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