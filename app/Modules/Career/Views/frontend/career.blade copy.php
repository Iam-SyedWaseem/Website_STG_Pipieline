@extends('layout::layouts.main')
@section('title', 'Careers')
@section('style')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->

@endsection
@section('content')
<div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">CAREERS</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                        <li class="breadcrumb-item text-white active" aria-current="page">Careers</li>
                    </ol>
                </nav>
            </div>
        </div>

          <!-- Jobs Start -->
          <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Career Oppurtunity</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <!-- <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <h6 class="mt-n1 mb-0">Featured</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <h6 class="mt-n1 mb-0">Full Time</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <h6 class="mt-n1 mb-0">Part Time</h6>
                            </a>
                        </li>
                    </ul> -->
                    <div class="tab-content">
                        <!-- <div id="tab-1" class="tab-pane fade show p-0 active"> -->
                            @if(count($jobOpenings)>0)
                             @foreach ($jobOpenings as $job)
                            <div class="job-item p-4 mb-4 career-box">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{strtoupper($job->title)}}</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker text-primary me-2"></i>{{$job->location}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <!-- <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a> -->
                                            <a class="btn btn-primary color-white" href="{{route('job-details',['job_id'=>$job->id])}}">Apply Now</a>
                                        </div>
                                        <small class="text-truncate"><i class="fa fa-calendar text-primary me-2"></i>Posted At: {{$job->posted_date}}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p>No oppurtunities at the moment</p>
                            @endif


                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->
@endsection
@section('scripts')

@endsection
