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
                            <div class="table-responsive">
                            <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                                <label for="county" class="col-md-4 control-label"></label>
                                <div class="col-md-6">
                                    {{--{{ Form::select('diseases', $diseases, (isset($data['county'])) ? $data['county'] : null, array('id' => 'county')) }}--}}
                                    <select name='diseases' >
                                        @foreach($diseases as $diseases)
                                            <option value="{{ $diseases->id }}">{{ $diseases->disease_name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('diseases'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('diseases') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                                <table id="datatable" class="display table-striped table-bordered"  cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Facility</th>
                                    <th>Age Group</th>
                                    <th>Disease</th>
                                    <th>Population</th>
                                    <th>Salaries(Ksh)</th>
                                    <th>Services Cost(Ksh)</th>
                                    <th>Consulation Fee(Ksh)</th>
                                    <th>Drugs Fee(Ksh)</th>
                                    <th>NHIF Relief(Ksh)</th>
                                    <th>TotalNo Relief(Ksh)</th>
                                    <th>Total Relief(Ksh)</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th colspan="10" style="text-align:right"></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Year</th>
                                    <th>Facility</th>
                                    <th>Age Group</th>
                                    <th>Disease</th>
                                    <th>Population</th>
                                    <th>Salaries(Ksh)</th>
                                    <th>Services Cost(Ksh)</th>
                                    <th>Consulation Fee(Ksh)</th>
                                    <th>Drugs Fee(Ksh)</th>
                                    <th>NHIF Relief(Ksh)</th>
                                    <th>TotalNo Relief(Ksh)</th>
                                    <th>Total Relief(Ksh)</th>
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
                            .column( 10 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                    // Total over this page
                    pageTotal = api
                            .column( 10, { page: 'current'} )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                    // Update footer
                    $( api.column( 10 ).footer() ).html(
                            +pageTotal
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