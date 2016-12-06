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
            <h1> My Data Sets </h1>
        </div>
        <ol class="breadcrumb pull-right">
            <li class="active"> MDS </li>
            <li><a href="../../public/dcm"><i class="fa fa-tachometer"></i></a></li>
        </ol>
    </div><br>
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
    </body>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'mydatasets/serverSide'
            });
        });
    </script>
    </html>
@stop