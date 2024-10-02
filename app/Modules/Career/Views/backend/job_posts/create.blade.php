@extends('adminlayout::layouts.adminmain')
@section('title', 'Jobs')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <h1>Create Job Post</h1>
    <form action="{{ route('jobposts.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="title" name="title" maxlength="100" value="{{ old('title') }}">
      @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="myeditor" maxlength="5000" name="description">{{ old('description') }}</textarea>
      @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="department" class="col-sm-2 col-form-label">Department</label>
    <div class="col-sm-10">
        <select class="form-control" id="department" name="department">
            <option value="">Select Department</option>
            @foreach($departments as $department)
            <option value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
        </select>
        @error('department')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
    </div>
</div>
<div class="mb-3 row">
    <label for="job_type" class="col-sm-2 col-form-label">Job Type</label>
    <div class="col-sm-10">
        <!-- <input type="text" class="form-control" id="location" name="location"> -->
        <select class="form-control" id="job_type" name="job_type">
            <option value="Full-time" selected >Full-time</option>
            <option value="Part-time" >Part-time</option>
        </select>
        @error('job_type')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
  <div class="mb-3 row">
    <label for="location" class="col-sm-2 col-form-label">Location</label>
    <div class="col-sm-10">
      <!-- <input type="text" class="form-control" id="location" name="location"> -->
      <select class="form-control" id="location" name="location">
        <option value="Dubai" selected >Dubai</option>
      </select>
      @error('location')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="skills" class="col-sm-2 col-form-label">Skills</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="skills" value="{{ old('skills') }}" maxlength="250" name="skills">
      @error('skills')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
    </div>
  </div>
  <!-- <div class="mb-3 row">
    <label for="posted_date" class="col-sm-2 col-form-label">Posted Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="posted_date" name="posted_date">
      @error('posted_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
    </div>
  </div> -->
  <div class="mb-3 row">
    <label for="expiry_date" class="col-sm-2 col-form-label">Expiry Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="expiry_date" value="{{ old('expiry_date') }}" name="expiry_date">
      @error('expiry_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
    </div>
  </div>
  <div class="mb-3 row d-flex">

        <button type="submit" class="btn btn-success ml-2">Create</button>
    </form>
    <a href="{{ route('jobposts.index') }}" class="btn btn-secondary ml-2">Back to Job Posts</a>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script>
    $(document).ready(function() {
        // Initialize Flatpickr on the input field
        $("#expiry_date").flatpickr({
            dateFormat: "Y-m-d",  // Date format (Year-Month-Day)
            minDate: "today"      // Disable dates before today
        });

         // Clear error message on title input
    $('#title').on('input', function() {
      $('#title').next('.text-danger').remove();
    });

    // Clear error message on description textarea
    $('#description').on('input', function() {
      $('#description').next('.text-danger').remove();
    });
      // Clear error message on description textarea
      $('#department').on('input', function() {
      $('#department').next('.text-danger').remove();
    });
      // Clear error message on description textarea
      $('#location').on('input', function() {
      $('#location').next('.text-danger').remove();
    });
      // Clear error message on description textarea
      $('#skills').on('input', function() {
      $('#skills').next('.text-danger').remove();
    });

    $('#expiry_date').on('input', function() {
      $('#expiry_date').next('.text-danger').remove();
    });

    });
</script>
@endsection
