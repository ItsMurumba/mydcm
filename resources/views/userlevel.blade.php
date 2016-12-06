@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> Facility Level Disease Cost Report </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> FLDCR </li>
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
                            <table id="datatable" class="display nowrap">
                                <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Facility</th>
                                    <th>Age Group</th>
                                    <th>Disease</th>
                                    <th>Population</th>
                                    <th>Services Cost</th>
                                    <th>Consulation Fee</th>
                                    <th>Drugs Fee</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th colspan="8" style="text-align:right"></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Year</th>
                                    <th>Facility</th>
                                    <th>Age Group</th>
                                    <th>Disease</th>
                                    <th>Population</th>
                                    <th>Services Cost</th>
                                    <th>Consulation Fee</th>
                                    <th>Drugs Fee</th>
                                    <th>Total</th>
                                </tr>
                                </tfoot>
                            </table>
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
                ajax: 'userlevel/serverSide',


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
                            .column( 8 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                    // Total over this page
                    pageTotal = api
                            .column( 8, { page: 'current'} )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                    // Update footer
                    $( api.column( 8 ).footer() ).html(
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
@endsection