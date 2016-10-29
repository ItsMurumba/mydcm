 <!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>Dynamic Cost Model | Welcome
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/dcm/css/vendor.css"/>
    <link rel="stylesheet" href="/dcm/css/app-green.css"/>
    <link rel="stylesheet" href="/dcm/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/dcm/css/font-awesome.css"/>
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css"/>

</head>
<body class="page-header-fixed page-quick-sidebar-over-content ">
<div id="app-container">
    <nav class="navbar navbar-inverse navbar-fixed-top striped-bg" id="top-navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="sidenav-toggle" href="#"><span class="brandbar"><i class="fa fa-bars hidd"></i></a></span>
                <a class="navbar-brand" href="/dcm"><i class="fa fa-paper-plane"></i>&nbsp;DCM</a> <div class="solution">>&nbsp;</i>A Health Costing Tool</div>
            </div>
            <div class="right-admin">
                <ul>
                    <li class="dropdown hidd">
                        <a href="#" class="dropdown-toggle admin-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img class="img-circle admin-img" src="/dcm/img/profile1.jpg" alt="">
                        </a>
                        {{--<ul class="dropdown-menu admin" role="menu">--}}
                            {{--<li role="presentation" class="dropdown-header">Admin name</li>--}}
                            {{--<li><a href="profile"><i class="fa fa-info"></i> Profile</a></li>--}}
                            {{--<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right top-nav">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle notoggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span><i class="fa fa-circle text-primary"></i></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="padder-h-xs">
                                <table class="table color-swatches-table text-center no-m-b">
                                    <tr>
                                        <td>
                                            <a href="javascript:;" data-theme="green" class="theme-picker">
                                                <i class="fa fa-circle fa-2x green-base"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-theme="blue" class="theme-picker">
                                                <i class="fa fa-circle fa-2x blue-base"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:;" data-theme="red" class="theme-picker">
                                                <i class="fa fa-circle fa-2x red-base"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-theme="orange" class="theme-picker">
                                                <i class="fa fa-circle fa-2x orange-base"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" id="boxed-layout"><i class="fa fa-expand-toggle fa-tp"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle notoggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="notification"><i class="fa fa-bell-o"></i></span>
                            <b class="badge nobadge">5</b>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg ddown" role="menu">
                            <li role="presentation" class="dropdown-header">Notification</li>
                            <li>
                                <a href="#" class="notification-wrap">
                                    <div class="notification-media">
<span class="fa-stack fa-lg">
<i class="fa fa-circle fa-stack-2x text-warning"></i>
<i class="fa fa-user fa-stack-1x fa-inverse"></i>
</span>
                                        <div><span class="label label-danger">Urgent</span></div>
                                    </div>
                                    <div class="notification-info">
                                        <div class="time-info text-muted pull-right"><small><i class="fa fa-comments"></i> 2 hours ago</small></div>
                                        <h5>Heading </h5>
                                        <p>Hey Anna! Sorry for delayed response. I've just finished reading the mail you sent couple of...</p>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" class="notification-wrap">
                                    <div class="pull-left notification-media">
<span class="fa-stack fa-lg">
<i class="fa fa-circle fa-stack-2x text-primary"></i>
<i class="fa fa-user fa-stack-1x fa-inverse"></i>
</span>
                                        <div><span class="label label-info">New</span></div>
                                    </div>
                                    <div class="notification-info">
                                        <div class="time-info text-muted pull-right"><small><i class="fa fa-comments"></i> 23rd Dec 2014</small></div>
                                        <h5>Heading </h5>
                                        <p>Hey Anna! Sorry for delayed response. I've just finished reading the mail you sent couple of...</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle admin-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img class="img-circle admin-img" src="/dcm/img/profile1.jpg" alt="">&nbsp;&nbsp;&nbsp;<span class="add">Admin&nbsp;
<i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul class="dropdown-menu admin" role="menu">
                            <li role="presentation" class="dropdown-header">Admin name</li>
                            <li><a href="/dcm//profile"><i class="fa fa-info"></i> Profile</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="striped-bg" id="sidenav">
        <div role="tabpanel" id="navTabs">
            <div class="sidebar-controllers">
                <div class="">
                    <div class="tab-content-scroller tab-content sidebar-section-wrap">
                        <div role="tabpanel" class="tab-pane active" id="menu">
                            <div class="photo-container text-center">
                                <a href="profile">
                                    <img src="/dcm/img/profile1.jpg" alt="" class="img-circle dash-profile"/>
                                </a>
                                <div class="t-p">
                                    <a href="/dcm/profile">Kumar Sanket</a>
                                </div>
                            </div>
                            <div class="section-heading">Menus</div>
                            <ul class="nav sidebar-nav ">
                                <li class=active><a href="/index"><i class="fa fa-home"></i> Home</a>
                                </li>
                                <li class="sidenav-dropdown ">
                                    <a class="subnav-toggle" href="javascript:;"><i class="fa fa-toggle-off"></i> Model Assumptions <i class="fa fa-angle-down  pull-right"></i></a>
                                    <ul class="nav sidenav-sub-menu">
                                        <li><a href="/equipments"><i class="fa fa-circle-o"></i> Equipment</a></li>
                                        <li><a href="/services"><i class="fa fa-arrows-v"></i> Service</a></li>
                                        <li><a href="/dcm/ui-element/other-elements"><i class="fa fa-flag-o"></i> Facility</a></li>
                                        <li><a href="/staffcategories"><i class="fa fa-exchange"></i> Staff Category</a></li>
                                        <li><a href="/dcm/ui-element/progressbars"><i class="fa fa-angle-double-right"></i> Drugs</a></li>
                                        <li><a href="/dcm/ui-element/alerts"><i class="fa fa-warning"></i> Diseases</a></li>
                                        <li><a href="/projecionf"><i class="fa fa-square-o"></i> Projection Factors</a></li>
                                        <li><a href="/projections"><i class="fa fa-align-justify"></i> Projections</a></li>

                                    </ul>
                                </li>
                                <li class="sidenav-dropdown ">
                                    <a class="subnav-toggle" href="#"><i class="fa fa-pencil"></i> Population <i class="fa fa-angle-down fa-angle-down  pull-right"></i></a>
                                    <ul class="nav sidenav-sub-menu">
                                        <li><a href="messages/inbox"><i class="fa fa-inbox"></i> Population Distribution</a></li>
                                        <li><a href="messages/compose"><i class="fa fa-pencil-square-o"></i> Population Estimates</a></li>
                                    </ul>
                                </li>
                                <li class="sidenav-dropdown ">
                                    <a class="subnav-toggle" href="#"><i class="fa fa-users"></i> Manage Users <i class="fa fa-angle-down fa-angle-down  pull-right"></i></a>
                                    <ul class="nav sidenav-sub-menu">
                                        <li><a href="/members"><i class="fa fa-users"></i> Users</a></li>
                                        <li><a href="/role"><i class="fa fa-user-plus"></i> Roles</a></li>
                                        <li><a href="/county"><i class="fa fa-map-marker"></i> County</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="comments">
                            <div class="section-heading">Members</div>
                            <ul class="online-members">
                                <li><a href=""><img class="img-circle chat-image" src="/dcm/img/profile1.jpg" alt="">Kumar Sanket <i class="fa fa-circle pull-right text-success"></i></a>
                                </li>
                                <li><a href=""><img class="img-circle chat-image" src="/dcm/img/user-icon.png" alt="">Kumar Pratik <i class="fa fa-circle pull-right text-success"></i></a>
                                </li>
                                <li><a href=""><img class="img-circle chat-image" src="/dcm/img/user-icon.png" alt="">Megha Kumari <i class="fa fa-circle pull-right text-success"></i></a>
                                </li>
                                <li><a href=""><img class="img-circle chat-image" src="/dcm/img/user-icon.png" alt="">Sankhadeep Roy <i class="fa fa-circle pull-right text-success"></i></a>
                                </li>
                                <li><a href=""><img class="img-circle chat-image" src="/dcm/img/profile.jpg" alt="">Suraj Ahmad Choudhury <i class="fa fa-circle pull-right text-success"></i></a>
                                </li>
                                <li><a href=""><img class="img-circle chat-image" src="/dcm/img/profile1.jpg" alt="">Kumar Sanket <i class="fa fa-circle pull-right text-warning"></i></a>
                                </li>
                                <li><a href=""><img class="img-circle chat-image" src="/dcm/img/user-icon.png" alt="">Megha Kumari <i class="fa fa-circle pull-right text-warning"></i></a>
                                </li>
                                <li><a href=""><img class="img-circle chat-image" src="/dcm/img/user-icon.png" alt="">Kumar Pratik <i class="fa fa-circle pull-right text-warning"></i></a>
                                </li>
                                <li><a href=""><img class="img-circle chat-image" src="/dcm/img/user-icon.png" alt="">Mrigank Mridul <i class="fa fa-circle pull-right text-muted"></i></a>
                                </li>
                                <li><a href=""><img class="img-circle chat-image" src="/dcm/img/user-icon.png" alt="">Amith M S <i class="fa fa-circle pull-right text-muted"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="charts">
                            <div class="section-heading">Charts</div>
                            <div class="section-content text-center">
                                <h4>Today's View</h4>
                                <div class="chart-container">
                                    <div id="sidebar-piechart"></div>
                                </div>
                                <h4>Today's Signups</h4>
                                <div class="chart-container2">
                                    <div id="sidebar-barchart"></div>
                                </div>
                                <hr class="lighter">
                                <div class="transaction">
                                    <h4 class="eft">Today's Signups</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-  " role="progressbar" aria-valuenow="67.34%" aria-valuemin="0" aria-valuemax="100" style="width: 67.34%%;">67.34%
                                        </div>
                                    </div> <div class="progress">
                                        <div class="progress-bar progress-bar-success  " role="progressbar" aria-valuenow="87.95%" aria-valuemin="0" aria-valuemax="100" style="width: 87.95%%;">87.95%
                                        </div>
                                    </div> <div class="progress">
                                        <div class="progress-bar progress-bar-warning  " role="progressbar" aria-valuenow="27.64%" aria-valuemin="0" aria-valuemax="100" style="width: 27.64%%;">27.64%
                                        </div>
                                    </div> <div class="progress">
                                        <div class="progress-bar progress-bar-danger  " role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width: 12%;">12
                                        </div>
                                    </div> </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="calendar">
                            <div class="section-heading">Today</div>
                            <ul class="today-ul">
                                <li>
                                    <a href=""> <div class="panel-here"><span class="label label-primary">7:00 AM</span>
                                        </div><div class="happened">something happened</div>
                                    </a>
                                </li>
                                <li>
                                    <a href=""> <div class="panel-here"><span class="label label-primary">8:00 AM</span>
                                        </div><div class="happened">something more happenned</div>
                                    </a>
                                </li>
                                <li>
                                    <a href=""> <div class="panel-here"><span class="label label-primary">9:00 AM</span>
                                        </div><div class="happened">lorem ipsum happened</div>
                                    </a>
                                </li>
                            </ul>
                            <div class="section-heading">7th April 2015</div>
                            <ul class="today-ul dead">
                                <li>
                                    <a href=""> <div class="panel-here"><span class="label label-primary">7:00 AM</span>
                                        </div><div class="happened">something happened</div>
                                    </a>
                                </li>
                                <li>
                                    <a href=""> <div class="panel-here"><span class="label label-primary">8:00 AM</span>
                                        </div><div class="happened">something more happenned</div>
                                    </a>
                                </li>
                                <li>
                                    <a href=""> <div class="panel-here"><span class="label label-primary">9:00 AM</span>
                                        </div><div class="happened">lorem ipsum happened</div>
                                    </a>
                                </li>
                            </ul>
                            <div class="section-heading">9th April 2015</div>
                            <ul class="today-ul dead">
                                <li>
                                    <a href=""> <div class="panel-here"><span class="label label-primary">7:00 AM</span>
                                        </div><div class="happened">something happened</div>
                                    </a>
                                </li>
                                <li>
                                    <a href=""> <div class="panel-here"><span class="label label-primary">8:00 AM</span>
                                        </div><div class="happened">something more happenned</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="notification">
                            <div class="section-heading">Notifications</div>
                            <div class="notification-info">
                                <ul class="notif-ul">
                                    <li>
                                        <a href="" class="notification-wrap">
                                            <div class="notification-media">
<span class="fa-stack fa-lg">
<i class="fa fa-circle fa-stack-2x text-warning"></i>
<i class="fa fa-user fa-stack-1x fa-inverse"></i>
</span>
                                                <div><span class="label label-danger">Urgent</span></div>
                                            </div>
                                            <div class="notification-info">
                                                <div class="time-info"><small><i class="fa fa-comments"></i> 2 hours ago</small></div>
                                                <h5>Heading </h5>
                                                <p>Hey Anna! Sorry for delayed response. I've just finished reading the mail you sent couple of...</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li><a href="" class="notification-wrap">
                                            <div class="pull-left notification-media">
<span class="fa-stack fa-lg">
<i class="fa fa-circle fa-stack-2x text-primary"></i>
<i class="fa fa-user fa-stack-1x fa-inverse"></i>
</span>
                                                <div><span class="label label-info">New</span></div>
                                            </div>
                                            <div class="notification-info">
                                                <div class="time-info"><small><i class="fa fa-comments"></i> 23rd Dec 2014</small></div>
                                                <h5>Heading </h5>
                                                <p>Hey Anna! Sorry for delayed response. I've just finished reading the mail you sent couple of...</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="body-container">
        @yield('content')
        <div id="footer-wrap" class="footer">
            Copyright © 2015 DCM
<span class="pull-right">
<a href="javascript:;"><i class="fa fa-facebook-square"></i></a>
<a href="javascript:;">&nbsp;<i class="fa fa-twitter-square"></i></a>
</span>
        </div>
    </div>
</div>
<script src="/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="/js/bootstrap.min.js"></script>
<script src="/dcm/js/vendor.js" type="text/javascript"></script>
<script src="/dcm/vendor/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="/dcm/js/app.js" type="text/javascript"></script>
<script type="text/javascript">


    $(function(){

        // Sidebar Charts

        // Pie Chart
        var chart3 = c3.generate({
            bindto: '#sidebar-piechart',
            data: {

                // iris data from R
                columns: [
                    ['1', 36],
                    ['2', 54],
                    ['3', 12],
                ],
                type : 'pie',
                onclick: function (d, i) { console.log("onclick", d, i); },
                onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                onmouseout: function (d, i) { console.log("onmouseout", d, i); }
            },
            color: {
                pattern: ['#06c5ac','#3faae3','#ee634c','#6bbd95','#f4cc0b','#9b59b6','#16a085','#c0392b']
            },
            pie: {
                expand: true
            },
            size: {
                width: 140,
                height: 140
            },
            tooltip: {
                show: false
            }

        });



        // Bar Chart
        var chart6 = c3.generate({
            bindto: '#sidebar-barchart',
            data: {
                columns: [
                    ['data1', 30, 200, 100, 400, 250, 310, 90, 125, 50]
                ],
                type: 'bar'
            },
            bar: {
                width: {
                    ratio: 0.8
                }
            },
            size: {
                width: 200,
                height: 120
            },
            tooltip: {
                show: false
            },
            color: {
                pattern: ['#06c5ac','#3faae3','#ee634c','#6bbd95','#f4cc0b','#9b59b6','#16a085','#c0392b']
            },
            axis: {
                y: {
                    show: false,
                    color: '#ffffff'
                }
            }
        });


        // Sidebar Tabs
        $('#navTabs .sidebar-top-nav a').click(function (e) {
            e.preventDefault()
            $(this).tab('show');

            setTimeout(function(){
                $('.tab-content-scroller').perfectScrollbar('update');
            }, 10);

        });



        $('.subnav-toggle').click(function() {
            $(this).parent('.sidenav-dropdown').toggleClass('show-subnav');
            $(this).find('.fa-angle-down').toggleClass('fa-flip-vertical');

            setTimeout(function(){
                $('.tab-content-scroller').perfectScrollbar('update');
            }, 500);

        });

        $('.sidenav-toggle').click(function() {
            $('#app-container').toggleClass('push-right');

            setTimeout(function(){
                $('.tab-content-scroller').perfectScrollbar('update');
            }, 500);

        });


        // Boxed Layout Toggle
        $('#boxed-layout').click(function() {

            $('body').toggleClass('box-section');

            var hasClass = $('body').hasClass('box-section');

            $.get('/api/change-layout?layout='+ (hasClass ? 'boxed': 'fluid'));

        });



        $('.tab-content-scroller').perfectScrollbar();

        $('.theme-picker').click(function() {
            changeTheme($(this).attr('data-theme'));
        });


    });

    function changeTheme(theme) {

        $('<link>')
                .appendTo('head')
                .attr({type : 'text/css', rel : 'stylesheet'})
                .attr('href', '/css/app-'+theme+'.css');

        $.get('api/change-theme?theme='+theme);

    }


</script>
<script>

    $(function(){


        // Activate Calendar

        $('#calendar2').fullCalendar({
        });




        // Line chart
        var lineChartData1 = {
            labels : ["","","","","","","","","","","",""],
            datasets : [
                {
                    label: "My First dataset",
                    fillColor : "rgba(6, 197, 172, 0.5)",
                    strokeColor : "rgba(6, 197, 172, 1)",
                    pointColor : "rgba(6, 197, 172, 1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(6, 197, 172, 1)",
                    data : [65,59,80,81,56,55,40,74,36,65,33,55]
                },
                {
                    label: "My Second dataset",
                    fillColor : "rgba(244, 204, 11, 0.5)",
                    strokeColor : "rgba(244, 204, 11, 1)",
                    pointColor : "rgba(244, 204, 11, 1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(244, 204, 11, 1)",
                    data : [28,48,40,29,86,27,60,45,27,59,68,38]
                }
            ]

        };


        var homeLineChart = document.getElementById("home-line-chart").getContext("2d");

        var chartCurves = new Chart(homeLineChart).Line(lineChartData1, {
            responsive: true,
            scaleShowLabels:false,
            scaleShowGridLines : false,
            scaleShowHorizontalLines: false,
            scaleShowVerticalLines: false,
            pointDot: false
        });

        // Set the date
        $('.today .date').text((new Date).getDate());

        var months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];

        $('.today .month').text(months[(new Date).getMonth()]);

    });

</script>
</body>
</html>
