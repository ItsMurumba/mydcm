@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> County Level Disease Cost Report </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> CLDCR </li>
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
                            <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                                <label for="county" class="col-md-4 control-label"></label>

                                <div class="col-md-6">

                                    <select name='county' id="county" >
                                        @foreach($county as $county)
                                            <option value="{{ $county->id }}">{{ $county->county_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <table id="datatable" class="display nowrap">
                                <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>County</th>
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
                                    <th colspan="9" style="text-align:right"></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Year</th>
                                    <th>County</th>
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
                ajax: 'countylevel/serverSide',

                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                                typeof i === 'number' ?
                                        i : 0;
                    };

                    // Total over all pages
                    Atotal = api
                            .column(9)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                    // Total over this page
                    pageTotal = api
                            .column(9, {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                    // Update footer
                    $(api.column(9).footer()).html(
                            'Ksh ' + pageTotal + ' ( GrandTotal:Ksh ' + Atotal + ')'
                    );
                },
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function()
        {
            $('#county').change(function(){
                        $('#datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: 'countylevel/serverSide',

                            "footerCallback": function ( row, data, start, end, display ) {
                                var api = this.api(), data;

                                // Remove the formatting to get integer data for summation
                                var intVal = function (i) {
                                    return typeof i === 'string' ?
                                    i.replace(/[\$,]/g, '') * 1 :
                                            typeof i === 'number' ?
                                                    i : 0;
                                };

                                // Total over all pages
                                Atotal = api
                                        .column(9)
                                        .data()
                                        .reduce(function (a, b) {
                                            return intVal(a) + intVal(b);
                                        }, 0);

                                // Total over this page
                                pageTotal = api
                                        .column(9, {page: 'current'})
                                        .data()
                                        .reduce(function (a, b) {
                                            return intVal(a) + intVal(b);
                                        }, 0);

                                // Update footer
                                $(api.column(9).footer()).html(
                                        'Ksh ' + pageTotal + ' ( GrandTotal:Ksh ' + Atotal + ')'
                                );
                            },
                            dom: 'lBfrtip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ]
                        });
            });
        });
    </script>
    </html>
@endsection