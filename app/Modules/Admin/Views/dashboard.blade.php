@extends('adminlayout::layouts.adminmain')
@section('title', 'Dashboard')

@section('content')
<h2>Welcome to  dashboard!</h2>
<div class="main-panel" id="main-panel">
  <!-- Navbar -->
  <div class="content">
    <div class="row mb-10">
      <div class="col-lg-4 col-md-6">




        <div class="card card-chart">
          <div class="card-header">
            <h4 class="card-title">Enquiries</h4>  Total  : <a href="{{ route('contacts')}}">
            {{ $enquiry_count}}</a>
          </div>
          <!-- <a href="{{ route('contacts')}}">
            <div class="card-body">
            {{ $enquiry_count}} -->
              <!-- <div class="chart-area">
                <canvas id="barChartSimpleGradientsNumbers"></canvas>
              </div> -->
            <!-- </div>
          </a>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons users_single-02"></i>
            </div>
          </div> -->

        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card card-chart">
          <div class="card-header">
            <h4 class="card-title">Job Posts</h5>  Total  :   <a href="{{ route('jobposts.index')}}">
                  {{ $job_count}}
                  </a>
          </div>
          <!-- <a href="{{ route('jobposts.index')}}">
            <div class="card-body">
            {{ $job_count}}
               <div class="chart-area">
                <canvas id="barChartSimpleGradientsNumbers"></canvas>
              </div>
            </div>
          </a> -->
          <!-- <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons files_box"></i>
            </div>
          </div> -->
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card card-chart">
          <div class="card-header">
            <h4 class="card-title">Applications  </h5>
                Total  :  <a href="{{ route('job-applications')}}">
                  {{ $application_count}}
                  </a>


          </div>
            <!-- <div class="card-body"> -->
              <!-- <div class="chart-area">
                <canvas id="barChartSimpleGradientsNumbers"></canvas>
              </div> -->
            <!-- </div> -->
          <!-- <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons design_bullet-list-67"></i>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
