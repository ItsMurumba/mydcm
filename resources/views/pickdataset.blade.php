@extends('layouts.app')
@section('content')


    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> DataSets </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> DataSets </li>
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
                        <form method ="post" action="/predictdiseasecosts1" class="form-horizontal" >
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
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Select Datasets</button>
                                <!-- Modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection