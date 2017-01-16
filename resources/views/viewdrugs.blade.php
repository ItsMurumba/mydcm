@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> All Drugs </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> AD </li>
                <li><a href="../../public/dcm"><i class="fa fa-tachometer"></i></a></li>
            </ol>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Drug</h4>
                    </div>
                    <div align="center" class="modal-body">
                        <form method ="post" action="/editdrug" class="form-horizontal" >
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="drugname" class="col-md-4 control-label">Drug Name</label>

                                <div class="col-md-6">

                                    {{ Form::select('name', $name, (isset($data['name'])) ? $data['name'] : null, array('id' => 'drugname')) }}

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('pack_size') ? ' has-error' : '' }}">
                                <label for="county" class="col-md-4 control-label">Pack Size</label>

                                <div class="col-md-6">

                                    <input type="text" class="form-control" name="pack_size" id="pack_size" placeholder="">
                                    {{--@foreach($growthrate as $growthrate)--}}
                                        {{--<input type="text" class="form-control" value="{{ $growthrate->rate }}" name="growthrate" placeholder="{{ $growthrate->rate }}" readonly = 'true'>--}}
                                    {{--@endforeach--}}

                                    @if ($errors->has('pack_size'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('pack_size') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('no_of_packs') ? ' has-error' : '' }}">
                                <label for="role" class="col-md-4 control-label">No Of Packs</label>

                                <div class="col-md-6">

                                    <input type="text" class="form-control" name="no_of_packs">

                                    @if ($errors->has('no_of_packs'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('no_of_packs') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('price_per_pack') ? ' has-error' : '' }}">
                                <label for="role" class="col-md-4 control-label">Price/Pack(Ksh)</label>

                                <div class="col-md-6">

                                    <input type="text" class="form-control" name="price_per_pack">

                                    @if ($errors->has('price_per_pack'))
                                        <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('price_per_pack') }}</strong>
                                    </span>
                                    @endif

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
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit User</button>

                            <!-- Modal -->
                            <div class="table-responsive">
                            <table id="datatable" class="display table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Drug Name</th>
                                    <th>Pack Size</th>
                                    <th>No Of Packs</th>
                                    <th>Price/Pack(Ksh)</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Drug Name</th>
                                    <th>Pack Size</th>
                                    <th>No Of Packs</th>
                                    <th>Price/Pack(Ksh)</th>

                                </tr>
                                </tfoot>
                            </table>
                                </div>
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="alert-link close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'drugs/serverSide'
            });
        });

    </script>
    <script>
        $(document).ready(function()
        {
            $('#drugname').change(function(){
                $.getJSON("{{ url('api/drugs')}}",
                        { option: $(this).val() },
                        function(data) {
                            var model = $('#pack_size');
                            model.empty();
                            $.each(data, function(index, element) {
                                model.append("<input value='"+element.id + element.name + "/>");
                            });
                        });
            });
        });
    </script>
@stop