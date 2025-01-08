@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @role('admin')
              <h3>Admin Dashboard</h3>
            @endrole
            @role('writer')
              <h3>Writer Dashboard</h3>
            @endrole
            {{-- <h1 class="m-0">{{__('Dashboard')}}</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
              <li class="breadcrumb-item active">{{__('Dashboard')}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                {{-- <h3>{{$total_new_cases}}</h3> --}}
                {{-- <h3>{{ $role }}<sup style="font-size: 20px"></sup></h3> --}}

                <p>{{__('Role')}}</p>
              </div>
              <div class="icon">
                <i class="fa fa-list"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                {{-- <h3>{{$percent_sloved_cases}}<sup style="font-size: 20px">%</sup></h3> --}}
                {{-- <h3>{{ $permission }}<sup style="font-size: 20px"></sup></h3> --}}

                <p>{{__('Permission')}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                {{-- <h3>{{$total_user_registred}}</h3> --}}
                {{-- <h3>{{ $user }}<sup style="font-size: 20px"></sup></h3> --}}

                <p>{{__('User')}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          {{-- <section class="col-lg-6">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  {{__('general.registered_grievance_number')}}
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a class="nav-link active" href="#weekly-chart" data-toggle="tab">{{__('general.weekly')}}</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#yearly-chart" data-toggle="tab">{{__('general.yearly')}}</a>
                      </li>
                    </ul>
                  </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <div class="chart tab-pane active" id="weekly-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="weekly-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                   <div class="chart tab-pane" id="yearly-chart"
                        style="position: relative; height: 300px;">
                       <canvas id="yearly-chart-canvas" height="300" style="height: 300px;"></canvas>
                    </div>
                </div>
                
                {{-- <div class="text-center mt-3">{{ __('fiscalyear.fiscalyear') }} {{$fiscalyear->name}}</div> --}}
              {{-- </div> --}}
              <!-- /.card-body -->
            {{-- </div> --}}
            <!-- /.card -->

          {{-- </section> --}}
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          {{-- <section class="col-lg-6">

            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  {{__('casedetail.destination_country')}}
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button> -->
                  {{-- <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button> --}}
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  {{-- <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">{{__('general.weekly_complaint_number')}}</div>
                  </div> --}}
                  <!-- ./col -->
                  <!-- <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div> -->
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->
          {{-- </section> --}}

          {{-- <section class="col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">
                          <i class="fas fa-chart-pie mr-1"></i>
                          {{__('casedetail.complaint_type')}}
                      </h3>
                  </div><!-- /.card-header -->
                  <div class="card-body">

                      <div class="chart" id="sales-chart" style="position: relative; height: 300px;">
                          <canvas class="bg-white py-2" id="caseconditionpie" height="300"
                              style="height: 300px;"></canvas>
                      </div>
                  </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
          </section> --}}
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('footer-scripts')
    <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
    <script src="{{asset('assets/dist/js/pages/dashboard.js')}}"></script>
@endsection
