@extends('layout::layouts.main')
@section('title', 'Job Details')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@endsection
@section('content')
     <!-- Header End -->
     <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('careers')}}">Careers</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <!-- <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;"> -->
                            <div class="text-start ps-4">
                                <h3 class="mb-3">{{strtoupper($jobDetails->title)}}</h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i> {{$jobDetails->location}}</span>
                                <!-- <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i></span> -->
                                <!-- <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span> -->
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Description</h4>
                            <p>{!!$jobDetails->description!!}</p>
                            <h4 class="mb-3">Skills</h4>
                            <p>{{$jobDetails->skills}}</p>
                            <!-- <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                            </ul> -->
                             <h4 class="mb-3">Department</h4>
                            <p>{{$jobDetails->department->name}}</p>
                          <!--  <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                            </ul> -->
                        </div>

                        <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>
                            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
                            <form enctype="multipart/form-data" method="post" action="{{route('apply')}}">
                                @csrf
                                <input type="hidden" name="job_id" value="{{encrypt($jobDetails->id)}}">

                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" id="firstName" name="firstName" class="form-control" maxlength="40"  placeholder="First Name" value="{{old('firstName')}}" required>
                                        @error('firstName')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" id="lastName" name="lastName"  maxlength="40" class="form-control" placeholder="Last Name" value="{{old('lastName')}}" required>
                                        @error('lastName')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="email" class="form-label">Your Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Your Email" required>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="email" class="form-label">Contact</label>
                                        <div class="input-group ">
                                            <select id="countryCode" name="countryCode" class=" form-control col-sm-3 " required>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country['code'] }}" @if($country['code'] == '+971') selected @endif >{{$country['name']}} ({{ $country['code'] }}) </option>
                                                @endforeach
                                                <!-- <option value="+1">+1 - US</option>
                                                <option value="+44">+44 - UK</option>
                                                <option value="+91">+91 - India</option> -->
                                            </select>

                                            <input type="number" id="phoneNumber" name="phoneNumber" maxlength="20" class="form-control col-sm-9" placeholder="Phone Number" required>
                                            @error('countryCode')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            @error('phoneNumber')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-12 ">
                                        <label for="resume" class="form-label">Upload Resume</label>
                                        <input type="file" id="resume" name="resume" required accept=".pdf, .doc, .docx"  class="form-control bg-white">
                                        <span>Upload formats:pdf,doc,docx</span>
                                        @error('resume')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="coverLetter" class="form-label">Cover Letter</label>
                                        <textarea id="coverLetter" maxlength="1000" name="coverLetter" class="form-control" rows="5" placeholder="Cover Letter" required></textarea>
                                        @error('coverLetter')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2">

                                        <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summary</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{$jobDetails->posted_date}}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Expiry Date: {{$jobDetails->expiry_date}}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location:{{$jobDetails->location}}</p>
                            <!-- <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: 01 Jan, 2045</p> -->
                        </div>
                        <!-- <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s"> -->
                            <!-- <h4 class="mb-4">Company Detail</h4>
                            <p class="m-0">Ipsum dolor ipsum accusam stet et et diam dolores, sed rebum sadipscing elitr vero dolores. Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est ipsum lorem diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p>
                        -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->


@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
       // Clear error message on title input
       $('#firstName').on('input', function() {
      $('#firstName').next('.text-danger').remove();
    });

    // Clear error message on description textarea
    $('#lastName').on('input', function() {
      $('#lastName').next('.text-danger').remove();
    });
      // Clear error message on description textarea
      $('#email').on('input', function() {
      $('#email').next('.text-danger').remove();
    });
      // Clear error message on description textarea
      $('#countryCode').on('input', function() {
      $('#countryCode').next('.text-danger').remove();
    });
      // Clear error message on description textarea
      $('#phoneNumber').on('input', function() {
      $('#phoneNumber').next('.text-danger').remove();
    });

    $('#resume').on('input', function() {
      $('#resume').next('.text-danger').remove();
    });

    $('#coverLetter').on('input', function() {
      $('#coverLetter').next('.text-danger').remove();
    });
});
</script>
@endsection
