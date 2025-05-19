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
            <!-- Small boxes (Stat box) -->
            <div class="row">

            <div class="container mt-4">
            <div class="row g-3">
    <!-- Total Users -->
    <div class="col-md-4 col-6">
    <div class="card text-center shadow-sm">
        <div class="card-body">
            <i class="fa fa-users fa-3x text-primary"></i>
            <h5 class="card-title mt-2">Total Users</h5>
            <p><strong>{{ $totalUsers }}</strong> : Registered Users</p>
            <p><strong>{{ $verifiedUsers }}</strong> : Verified Users</p>
        </div>
    </div>
</div>


    <!-- Active Listings -->
   <div class="col-md-4 col-6">
    <div class="card text-center shadow-sm">
        <div class="card-body">
            <i class="fa fa-building fa-3x text-success"></i>
            <h5 class="card-title mt-2">Active Listings</h5>
            <p><strong>{{ $availableProperties }}</strong> : Available Properties</p>
            <p><strong>{{ $bookedProperties }}</strong> : Booked Properties</p>
        </div>
    </div>
</div>


    <!-- Subscriptions -->
    {{-- <div class="col-md-4 col-6">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <i class="fa fa-credit-card fa-3x text-success"></i>
                <h5 class="card-title mt-2">Subscriptions</h5>
                <p><strong>80</strong> : Active Subscriptions</p>
                <p><strong>20</strong> : Expired Subscriptions</p>
            </div>
        </div>
    </div> --}}

    <!-- Bookings -->
    <div class="col-md-4 col-6">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <i class="fa fa-calendar-check fa-3x text-danger"></i>
                <h5 class="card-title mt-2">Bookings</h5>
                <p><strong>{{ $approvedRental }}</strong> : Completed Bookings</p>
                <p><strong>{{ $pendingRental }}</strong> : Pending Bookings</p>
            </div>
        </div>
    </div>

    <!-- Revenue -->
   <div class="col-md-4 col-6">
    <div class="card text-center shadow-sm">
        <div class="card-body">
            <i class="fa fa-dollar-sign fa-3x text-warning"></i>
            <h5 class="card-title mt-2">Revenue</h5>
            <p><strong>Rs. {{ number_format($totalRevenue, 2) }}</strong> : Total Revenue</p>
            <p><strong>Rs. {{ number_format($thisMonthRevenue, 2) }}</strong> : This Month</p>
        </div>
    </div>
</div>


    <!-- Support Tickets -->
    {{-- <div class="col-md-4 col-6">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <i class="fa fa-ticket-alt fa-3x text-info"></i>
                <h5 class="card-title mt-2">Support Tickets</h5>
                <p><strong>5</strong> : Open Tickets</p>
                <p><strong>20</strong> : Resolved Tickets</p>
            </div>
        </div>
    </div> --}}

    

    <!-- Pending Rent Payments -->
    <div class="col-md-4 col-6">
    <div class="card text-center shadow-sm">
        <div class="card-body">
            <i class="fa fa-money-bill-wave fa-3x text-danger"></i>
            <h5 class="card-title mt-2">Pending Rent Payments</h5>
            <p><strong>{{ $pendingPayments }}</strong> : Pending Payments</p>
            <p><strong>Rs. {{ number_format($totalPendingAmount, 2) }}</strong> : Total Pending</p>
        </div>
    </div>
</div>

<!-- System Status -->
    <div class="col-md-4 col-6">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <i class="fa fa-server fa-3x text-dark"></i>
                <h5 class="card-title mt-2">System Status</h5>
                <p><strong>99.9%</strong> : Uptime</p>
                <p><strong>1</strong> : Active Maintenance</p>
            </div>
        </div>
    </div>

</div>

</div>



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