@extends('layouts.app')
@section('content')
    <link href="/bucketadmin/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bucketadmin/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="/bucketadmin/css/bootstrap-reset.css" rel="stylesheet">
    <link href="/bucketadmin/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/bucketadmin/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="/bucketadmin/css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="/bucketadmin/js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="/bucketadmin/js/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="/bucketadmin/css/style.css" rel="stylesheet">
    <link href="/bucketadmin/css/style-responsive.css" rel="stylesheet"/>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="/bucketadmin/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!--main content start-->
    {{--<section id="main-content">--}}
        {{--<section class="wrapper">--}}

            <!--mini statistics start-->
            <div class="row">
                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel">
                                <div class="gauge-canvas">
                                    <h4 class="widget-h">Cost Of All Disease($)</h4>
                                    <canvas width=160 height=100 id="gauge"></canvas>
                                </div>
                                <ul class="gauge-meta clearfix">
                                    <li id="gauge-textfield" class="pull-left gauge-value"></li>
                                    <li class="pull-right gauge-title">Safe</li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel">
                                <div class="daily-visit">
                                    <h4 class="widget-h">System Users</h4>
                                    <div id="daily-visit-chart" style="width:100%; height: 100px; display: block">

                                    </div>
                                    <ul class="chart-meta clearfix">
                                        <li class="pull-left visit-chart-value">3233</li>
                                        <li class="pull-right visit-chart-title"><i class="fa fa-arrow-up"></i> 15%</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel">
                                <h4 class="widget-h">Top Costly Diseases</h4>
                                <div >
                                <canvas id="total-graph" width="10" height="20"></canvas>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel">
                                <h4 class="widget-h">Expenses Per County</h4>
                                <div class="bar-stats">
                                    <ul class="progress-stat-bar clearfix">
                                        <li data-percent="50%"><span class="progress-stat-percent pink"></span></li>
                                        <li data-percent="90%"><span class="progress-stat-percent"></span></li>
                                        <li data-percent="70%"><span class="progress-stat-percent yellow-b"></span></li>
                                    </ul>
                                    <ul class="bar-legend">
                                        <li><span class="bar-legend-pointer pink"></span> Vihiga</li>
                                        <li><span class="bar-legend-pointer green"></span> Kilifi</li>
                                        <li><span class="bar-legend-pointer yellow-b"></span> Nairobi</li>
                                    </ul>
                                    <div class="daily-sales-info">
                                        <span class="sales-count">1200 </span> <span class="sales-label">Products Sold</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!--mini statistics end-->
            <div class="row">
                <div class="col-md-8">
                    <!--earning graph start-->
                    <section class="panel">
                        <header class="panel-heading">
                            Projected Cost Per Disease <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
            <a href="javascript:;" class="fa fa-cog"></a>
            <a href="javascript:;" class="fa fa-times"></a>
            </span>
                        </header>
                        <div class="panel-body">

                            <div id="graph-area" class="main-chart">
                            </div>
                            <div class="region-stats">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="region-earning-stats">
                                            Total Cost <span>$68,4545,454</span>
                                        </div>
                                        <ul class="clearfix location-earning-stats">
                                            <li class="stat-divider">
                                                <span class="first-city">$734503</span>
                                                Rocky Mt,NC </li>
                                            <li class="stat-divider">
                                                <span class="second-city">$734503</span>
                                                Dallas/FW,TX </li>
                                            <li>
                                                <span class="third-city">$734503</span>
                                                Millville,NJ </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-5">
                                        <div id="world-map" class="vector-stat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--earning graph end-->
                </div>
                <div class="col-md-4">
                    <!--widget graph start-->
                    <section class="panel">
                        <div class="panel-body">
                            <div class="monthly-stats pink">
                                <div class="clearfix">
                                    <h4 class="pull-left"> January 2013</h4>
                                    <!-- Nav tabs -->
                                    <div class="btn-group pull-right stat-tab">
                                        <a href="#line-chart" class="btn stat-btn active" data-toggle="tab"><i class="ico-stats"></i></a>
                                        <a href="#bar-chart" class="btn stat-btn" data-toggle="tab"><i class="ico-bars"></i></a>
                                    </div>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="line-chart">
                                        <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-min-spot-color="false" data-max-spot-color="false" data-line-color="#ffffff" data-spot-color="#ffffff" data-fill-color="" data-highlight-line-color="#ffffff" data-highlight-spot-color="#e1b8ff" data-spot-radius="3" data-data="[100,200,459,234,600,800,345,987,675,457,765]">
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="bar-chart">
                                        <div class="sparkline" data-type="bar" data-resize="true" data-height="75" data-width="90%" data-bar-color="#d4a7f5" data-bar-width="10" data-data="[300,200,500,700,654,987,457,300,876,454,788,300,200,500,700,654,987,457,300,876,454,788]"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="circle-sat">
                                <ul>
                                    <li class="left-stat-label"><span class="sell-percent">60%</span><span>Direct Sell</span></li>
                                    <li><span class="epie-chart" data-percent="45">
                        <span class="percent"></span>
                        </span></li>
                                    <li class="right-stat-label"><span class="sell-percent">40%</span><span>Channel Sell</span></li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <!--widget graph end-->
                    <!--widget graph start-->
                    <section class="panel">
                        <div class="panel-body">
                            <ul class="clearfix prospective-spark-bar">
                                <li class="pull-left spark-bar-label">
                                    <span class="bar-label-value"> $18887</span>
                                    <span>Prospective Label</span>
                                </li>
                                <li class="pull-right">
                                    <div class="sparkline" data-type="bar" data-resize="true" data-height="40" data-width="90%" data-bar-color="#f6b0ae" data-bar-width="5" data-data="[300,200,500,700,654,987,457,300,876,454,788,300,200,500,700,654,987,457,300,876,454,788]"></div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <!--widget graph end-->
                    <!--widget weather start-->
                    <section class="weather-widget clearfix">
                        <div class="pull-left weather-icon">
                            <canvas id="icon1" width="60" height="60"></canvas>
                        </div>
                        <div>
                            <ul class="weather-info">
                                <li class="weather-city">New York <i class="ico-location"></i></li>
                                <li class="weather-cent"><span>18</span></li>
                                <li class="weather-status">Rainy Day</li>
                            </ul>
                        </div>
                    </section>
                    <!--widget weather end-->
                </div>
            </div>
            <!--mini statistics start-->
            <div class="row">
                <div class="col-md-3">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon orange"><i class="fa fa-money"></i></span>
                        <div class="mini-stat-info">
                            @foreach($salaries as $salaries)
                            <span>{{ ($salaries->Salaries)/100 }}</span>
                            @endforeach
                            Dollar Salaries
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon tar"><i class="fa fa-money"></i></span>
                        <div class="mini-stat-info">
                            @foreach($consultation as $consultation)
                                <span>{{ ($consultation->Consultation)/100 }}</span>
                            @endforeach
                            Dollar Consultation Cost
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon pink"><i class="fa fa-money"></i></span>
                        <div class="mini-stat-info">
                            @foreach($drugs as $drugs)
                                <span>{{ ($drugs->Drugs)/100 }}</span>
                            @endforeach
                            Dollar Drugs Cost
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mini-stat clearfix">
                        <span class="mini-stat-icon green"><i class="fa fa-money"></i></span>
                        <div class="mini-stat-info">
                            @foreach($services as $services)
                                <span>{{ ($services->Services)/100 }}</span>
                            @endforeach
                            Dollar Tests Cost
                        </div>
                    </div>
                </div>
            </div>
            <!--mini statistics end-->

        {{--</section>--}}
    {{--</section>--}}
    <script src="/bucketadmin/js/jquery.js"></script>
    <script src="/bucketadmin/js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
    <script src="/bucketadmin/bs3/js/bootstrap.min.js"></script>
    <script src="/bucketadmin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/bucketadmin/js/jquery.scrollTo.min.js"></script>
    <script src="/bucketadmin/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="/bucketadmin/js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="/bucketadmin/js/skycons/skycons.js"></script>
    <script src="/bucketadmin/js/jquery.scrollTo/jquery.scrollTo.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="/bucketadmin/js/calendar/clndr.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="/bucketadmin/js/calendar/moment-2.2.1.js"></script>
    <script src="/bucketadmin/js/evnt.calendar.init.js"></script>
    <script src="/bucketadmin/js/jvector-map/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/bucketadmin/js/jvector-map/jquery-jvectormap-us-lcc-en.js"></script>
    <script src="/bucketadmin/js/gauge/gauge.js"></script>
    <!--clock init-->
    <script src="/bucketadmin/js/css3clock/js/css3clock.js"></script>
    <!--Easy Pie Chart-->
    <script src="/bucketadmin/js/easypiechart/jquery.easypiechart.js"></script>
    <!--Sparkline Chart-->
    <script src="/bucketadmin/js/sparkline/jquery.sparkline.js"></script>
    <!--Morris Chart-->
    <script src="/bucketadmin/js/morris-chart/morris.js"></script>
    <script src="/bucketadmin/js/morris-chart/raphael-min.js"></script>
    <!--jQuery Flot Chart-->
    <script src="/bucketadmin/js/flot-chart/jquery.flot.js"></script>
    <script src="/bucketadmin/js/flot-chart/jquery.flot.tooltip.min.js"></script>
    <script src="/bucketadmin/js/flot-chart/jquery.flot.resize.js"></script>
    <script src="/bucketadmin/js/flot-chart/jquery.flot.pie.resize.js"></script>
    <script src="/bucketadmin/js/flot-chart/jquery.flot.animator.min.js"></script>
    <script src="/bucketadmin/js/flot-chart/jquery.flot.growraf.js"></script>
    <script src="/bucketadmin/js/dashboard.js"></script>
    <script src="/bucketadmin/js/jquery.customSelect.min.js" ></script>
    <!--common script init for all pages-->
    <script src="/bucketadmin/js/scripts.js"></script>
    <!--script for this page-->
    <script>
        $(function(){
            $.getJSON("/projects/chart/data", function (result) {

                var labels = [],data=[];
                for (var i = 0; i < result.length; i++) {
                    labels.push(result[i].year);
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
                var options={
                    title: {
                        display: true,
                        text: 'Custom Chart Title'
                    },
                };
                var buyers = document.getElementById('total-graph').getContext('2d');
                var myLine= new Chart(buyers).Doughnut(buyerData, options);

            });

        });
    </script>
@endsection