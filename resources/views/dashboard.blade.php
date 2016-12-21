@extends('layouts.app')
@section('content')
    <div id="body-container">

        <div class="conter-wrapper">
            <div class="container-fluid home-page">
                <div class="row">
                    <div class="col-md-6 calendar-col">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Welcome Sanket!</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 calendar-wrapper">
                                        <div class="today">
                                            <h2 class="date"></h2> <span class="month"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-8 calendar-widget">
                                        <div id="calendar2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 graph-col">
                        <div class="panel panel-default line-chart">
                            <div class="panel-body">
                                <div class="line-chart-container">
                                    <canvas id="home-line-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stat panel striped-bg">
                                <div class="row">
                                    <div class="col-md-6 calendar-col">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Welcome Sanket!</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-4 calendar-wrapper">
                                                        <div class="today">
                                                            <h2 class="date"></h2> <span class="month"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 calendar-widget">
                                                        <div id="calendar2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> </div>
                        <div class="col-md-4">
                            <div class="stat panel striped-bg">
                                <div class="row">
                                    <div class="col-md-6 calendar-col">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Welcome Sanket!</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-4 calendar-wrapper">
                                                        <div class="today">
                                                            <h2 class="date"></h2> <span class="month"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 calendar-widget">
                                                        <div id="calendar2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> </div>
                        <div class="col-md-4">
                            <div class="stat panel striped-bg">
                                <div class="row">
                                    <div class="col-md-6 calendar-col">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Welcome Sanket!</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-4 calendar-wrapper">
                                                        <div class="today">
                                                            <h2 class="date"></h2> <span class="month"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 calendar-widget">
                                                        <div id="calendar2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection