@extends('layouts.app')
@section('content')
    <html lang="en">
    <!--<![endif]-->
    <head>
        <link href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">

    </head>

    <body>
    <div class="page-title clearfix">
        <div class="pull-left">
            <h1> Diseases Cost Report </h1>
        </div>
        <ol class="breadcrumb pull-right">
            <li class="active"> DCR </li>
            <li><a href="../../public/dcm"><i class="fa fa-tachometer"></i></a></li>
        </ol>
    </div><br>
    <table class="datatable">
        <thead>
        <tr>
            <th>Disease</th>
            <th>Services Cost</th>
            <th>Consulation Fee</th>
            <th>Drugs Fee</th>
            <th>Role</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Disease</th>
            <th>Services Cost</th>
            <th>Consulation Fee</th>
            <th>Drugs Fee</th>
            <th>Role</th>
        </tr>
        </tfoot>
    </table>
    </body>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'countylevel/serverSide'
            });
        });
    </script>
    </html>
@stop