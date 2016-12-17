@extends('layouts.app')
@section('content')
    <div id="body-container">
        <div class="page-title clearfix">
            <div class="pull-left">
                <h1> Projected Cost Against Disease Chart </h1>
            </div>
            <ol class="breadcrumb pull-right">
                <li class="active"> PCADC </li>
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
                            <canvas id="total-graph" width="1400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $.getJSON("/projects/chart4/data", function (result) {

                var labels = [],data=[];
                for (var i = 0; i < result.length; i++) {
                    labels.push(result[i].disease_name);
                    data.push(result[i].total);
                }

                var buyerData = {
                    labels : labels,
                    datasets : [
                        {
                            fillColor : "rgba(240, 127, 110, 0.3)",
                            strokeColor : "#f56954",
                            pointColor : "#A62121",
                            pointStrokeColor : "#741F1F",
                            data : data
                        }
                    ]
                };
                var buyers = document.getElementById('total-graph').getContext('2d');
                new Chart(buyers).Line(buyerData, {

                });

            });

        });
    </script>
@endsection
