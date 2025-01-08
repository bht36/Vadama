@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 col-xxl-6">
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="mr-5 pr-xl-5">
                            <h3 class="mb-0">{{('Dashboard')}}</h3> 
                            <h6 class="box-title"> Registration Overview</h6>
                        </div>
                        <h3 class="mb-0 text-primary mt-xl-2"><b>Total Sales: Rs. </b></h2>
                    </div>
                </div>
                <div class="col-sm-4 col-xxl-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{('Dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Dashboard')}}</li>
                    </ol>
                </div>
            </div>
            <div class="box-header" style="padding:0px;">
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">

        <div class="container-fluid">
            <div class="box-body mb-3">
                <div class="row" style="background: #fff;">
                    <div class="col-md-6 col-xl-3 form-group">
                        <div id="graphPiedevice" style="height: 300px; width: 100%"></div>
                    </div>

                    <div class="col-md-6 col-xl-3 form-group">
                        <div id="graphPiecard" style="height: 300px; width: 100%"></div>
                    </div>

                    <div class="col-md-6 col-xl-3 form-group">
                        <div id="graphPieparticipanttype" style="height: 300px; width: 100%"></div>
                    </div>

                    {{-- <div class="col-md-6 col-xl-3 form-group">
                        <div id="graphPierole" style="height: 300px; width: 100%"></div>
                    </div> --}}
                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-md-4 col-6">
                    <a href="" class="small-box-footer">
                        <div class="info-box d-block p-0">
                            <div class="d-box-top">
                                <span class="d-box-icon-w"><i class="fa fa-users fa-2x"></i></span>
                                <span class="info-box-number">Participants</span>
                            </div>
                            <div class="d-box-content">
                                <div class=""><b></b> : Approved Participants</div>
                                <div class=""><b></b> : Online Participants</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-6">
                    <a href="" class="small-box-footer">
                        <div class="info-box d-block p-0">
                            <div class="d-box-top">
                                <span class="d-box-icon-w"><i class="fa fa-user-plus fa-2x"></i></span>
                                <span class="info-box-number">Applicatnts</span>
                            </div>
                            <div class="d-box-content">
                                <div class=""><b></b> : New Applicants</div>
                                <div class=""><b></b> : Suspended Applicants</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-6">
                    <a href="" class="small-box-footer">
                        <div class="info-box d-block p-0">
                            <div class="d-box-top">
                                <span class="d-box-icon-w"><i class="fa fa-user-plus fa-2x"></i></span>
                                <span class="info-box-number">Unpaid Applicants</span>
                            </div>
                            <div class="d-box-content">
                                <div class=""><b>38</b> : Applicants(whose payment is pending [except cash])</div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- <div class="col-md-4 col-6">
                    <a href="" class="small-box-footer">
                        <div class="info-box d-block p-0">
                            <div class="d-box-top">
                                <span class="d-box-icon-w"><i class="fa fa-calendar-check-o fa-2x"></i></span>
                                <span class="info-box-number">Session</span>
                            </div>
                            <div class="d-box-content">
                                <div class=""><b>0</b> : No. of Participant </div>
                                <div class=""><b>0</b> : Total Live Session </div>
                                <div class=""><b>0</b> : Current Session</div>
                                <div class=""><b>14</b> : Upcoming Session </div>
                                <div class=""><b>40</b> : Total Session</div>
                            </div>
                        </div>
                    </a>
                </div> --}}

                {{-- <div class="col-md-4 col-6">
                    <a href="" class="small-box-footer">
                        <div class="info-box d-block p-0">
                            <div class="d-box-top">
                                <span class="d-box-icon-w"><i class="fa fa-envelope fa-2x"></i></span>
                                <span class="info-box-number">Contact Messages</span>
                            </div>
                            <div class="d-box-content">
                                <div class=""><b>4</b> : New Contact Messages</div>
                                <div class=""><b>7</b> : Total Contact Messages</div>
                            </div>
                        </div>
                    </a>
                </div> --}}

                {{-- <div class="col-md-4 col-6">
                    <a href="" class="small-box-footer">
                        <div class="info-box d-block p-0">
                            <div class="d-box-top">
                                <span class="d-box-icon-w"><i class="fa fa-users fa-2x"></i></span>
                                <span class="info-box-number">Live Participants</span>
                            </div>
                            <div class="d-box-content">
                                <div class=""><b>0</b> : 5 minutes </div>
                                <div class=""><b>0</b> : 1 hour </div>
                            </div>
                        </div>
                    </a>
                </div> --}}

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection

@section('footer-scripts')
<script>
    // Build the chart
    console.log('test');
    Highcharts.chart('graphPiedevice', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Device'
        },
        exporting: false,
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.y}</b>',
                    distance: -30,
                },
                showInLegend: true
            }
        },
        series: [{
            name: '',
            colorByPoint: true,

            //format data 
            data: [{
                name: 'Web: 471',
                y: 471
            }, ]
        }]
    });

    // Build the chart
    Highcharts.chart('graphPiecard', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Total Card Printed'
        },
        exporting: false,
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.y}</b>',
                    distance: -30,
                },
                showInLegend: true
            }
        },
        series: [{
            name: '',
            colorByPoint: true,

            //format data penduduk kota
            data: [{
                    name: 'Participants: 9',
                    y: 9
                },

            ]
        }]
    });

    // Build the chart
    Highcharts.chart('graphPieparticipanttype', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Mode'
        },
        exporting: false,
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    // enabled: false
                    enabled: true,
                    format: '<b>{point.y}</b>',
                    distance: -30,
                },
                showInLegend: true
            }
        },
        series: [{
            name: '',

            colorByPoint: true,

            //format data penduduk kota
            data: [{
                    name: 'Online: 391',
                    y: 391
                },

            ]
        }]
    });

    // Build the chart
    Highcharts.chart('graphPierole', {
        accessibility: {
            point: {
                descriptionFormatter: function(point) {
                    var intersection = point.sets.join(', '),
                        name = point.name,
                        ix = point.index + 1,
                        val = point.value;
                    return ix + '. Intersection: ' + intersection + '. ' +
                        (point.sets.length > 1 ? name + '. ' : '') + 'Value ' + val + '.';
                }
            }
        },
        title: {
            text: 'Role'
        },
        exporting: true,
        credits: {
            enabled: false
        },
        tooltip: {
            formatter: function() {
                return '<b>' + this.point.name;
            }
        },
        series: [{
            type: 'venn',
            showInLegend: true,
            name: '',
            data: [

                {
                    sets: ['Participants'],
                    value: 344,
                    name: 'Participants: 344'
                },
                {
                    sets: ['Staff'],
                    value: 3,
                    name: 'Staff: 3'
                },
                {
                    sets: ['Participant Add'],
                    value: 1,
                    name: 'Participant Add: 1'
                },
            ]
        }]
    });
</script>
@endsection