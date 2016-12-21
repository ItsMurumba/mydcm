@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> My Data Sets </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> MDS </li>
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
                            <div class="table-responsive">
                            <table class="datatable">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>County</th>
                                    <th>Facility</th>
                                    <th>Disease</th>
                                    <th>Age Group</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>County</th>
                                    <th>Facility</th>
                                    <th>Disease</th>
                                    <th>Age Group</th>
                                </tr>
                                </tfoot>
                            </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'mydatasets/serverSide'
            });
        });
    </script>
@stop