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
            <h1> Projected Diseases Cost Report </h1>
        </div>
        <ol class="breadcrumb pull-right">
            <li class="active"> DCR </li>
            <li><a href="../../public/dcm"><i class="fa fa-tachometer"></i></a></li>
        </ol>
    </div><br>
    <table id="datatable" class="display nowrap">
        <thead>
        <tr>
            <th>Facility</th>
            <th>Age Group</th>
            <th>Disease</th>
            <th>Projected Population</th>
            <th>Services Cost</th>
            <th>Consulation Fee</th>
            <th>Drugs Fee</th>
            <th>Total</th>
            <th>Year</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th colspan="6" style="text-align:right"></th>
            <th></th>
        </tr>
        <tr>
            <th>Facility</th>
            <th>Age Group</th>
            <th>Disease</th>
            <th>Projected Population</th>
            <th>Services Cost</th>
            <th>Consulation Fee</th>
            <th>Drugs Fee</th>
            <th>Total</th>
            <th>Year</th>
        </tr>
        </tfoot>
    </table>
    </body>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css"></script>
    <script>
        $(document).ready(function(){
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'puserlevel/serverSide',


                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                        i : 0;
                    };

                    // Total over all pages
                    total = api
                            .column( 6 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                    // Total over this page
                    pageTotal = api
                            .column( 6, { page: 'current'} )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                    // Update footer
                    $( api.column( 6 ).footer() ).html(
                            'Ksh '+pageTotal +' ( GrandTotal:Ksh '+ total +')'
                    );

                },
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    </html>
@endsection