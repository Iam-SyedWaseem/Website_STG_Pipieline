@extends('adminlayout::layouts.adminmain')
@section('title', 'Reply Enquiries')
@section('styles')
<style>
    .section {
        margin-bottom: 20px;
    }

    .hidden {
        display: none;
    }
</style>
@endsection
@section('content')
<!-- Details Section -->

@if($action === 'view')

<div id="details-section" class="section">

    <div class="card">
        <h5 class="card-header">Enquiries Details</h5>
        <div class="card-body">
        <div class="container bg-body">
            <div class="row bg-light  ">
                <div class="col-md-2"><b>Name </b></div>
                <div class="col-md-10 bg-light">{{$data->name}}</div>

            </div>
            <div class="row bg-light">
                <div class="col-md-2"><b>Phone </b></div>
                <div class="col-md-10 bg-light">{{$data->phone_no}}</div>

            </div>
            <div class="row bg-light">
                <div class="col-md-2"><b>Email </b></div>
                <div class="col-md-10 bg-light">{{$data->email}}</div>

            </div>
            <div class="row bg-light">
                <div class="col-md-2"><b>Website </b></div>
                <div class="col-md-10 bg-light">{{$data->website}}</div>

            </div>
            <div class="row bg-light">
                <div class="col-md-2"><b>Enquiry Date </b></div>
                <div class="col-md-10 bg-light">{{$data->created_at}}</div>

            </div>
            <div class="row bg-light">
                <div class="col-md-2"><b>Message </b></div>
                <div class="col-md-10 bg-light">{{$data->message}}</div>

            </div>
            @if($data->status == 'replied')
            <div class="row bg-light">
                <div class="col-md-2"><b>Response </b></div>
                <div class="col-md-10 bg-light">{!!$data->response!!}</div>

            </div>
            @else
            <button id="reply-button" class="btn btn-primary mt-3">Reply</button>

            <a href="{{ route('contacts') }}" class="btn btn-secondary mt-3 ml-2">Back </a>
            @endif
        </div>
           
        </div>
    </div>

  

</div>
@endif
<!-- Reply Form Section -->
                    @error('response')
                        <div id="response" class="text-danger">{{ 'Sorry message not send..Please Enter a replay message!' }}</div>
                    @enderror  
<div class="section" id="reply-section" style="{{($action === 'view')?'display: none':''}}">
    <div class="card">
        <h5 class="card-header">Reply</h5>
        <div class="card-body">
            <form method="POST" action="{{route('admin.reply', ['id' => $data->id])}}">
                @csrf
                <textarea name="response" rows="5" cols="40" id="myeditor" placeholder="Your reply"></textarea>
                         
                       <button class="btn btn-success mt-3" type="submit">Submit Reply</button>
                       <a href="{{ route('contacts') }}" class="btn btn-secondary mt-3 ml-2">Back </a>

            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#reply-button').click(function() {
            $('#reply-section').show();
        });

              // Clear error message on  input
    $('#myeditor').on('input', function() {
     // Find and remove the error message associated with the textarea
     $('.text-danger').remove();
    });

    });    
</script>  
@endsection