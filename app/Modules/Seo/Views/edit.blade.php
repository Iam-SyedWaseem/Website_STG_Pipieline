@extends('adminlayout::layouts.adminmain')
@section('title', 'Pages-Edit')

@section('content')

<h1>Edit Page</h1>
<form action="{{ route('pages.update', $page['id']) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3 row">
        <label for="page_name" class="col-sm-2 col-form-label">Page Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="page_name" maxlength="200" name="page_name" value="{{ $page['page_name'] }}">
            @error('page_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="page_title" maxlength="200" name="page_title" value="{{ $page['page_title'] }}">
            @error('page_title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" id="page_description" maxlength="500" name="page_description">{{ $page['page_description'] }}</textarea>
            @error('page_description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="department" class="col-sm-2 col-form-label">keywords</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" id="page_keyword" maxlength="1000" name="page_keyword">{{$page['page_keyword'] }}</textarea>

            @error('page_keyword')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Slug</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="slug" maxlength="50" name="slug" value="{{ $page['slug'] }}">
            @error('slug')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="skills" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="page_image"  accept=".jpg,.webp,.jpeg,.png,.bmp,.tiff" value="{{$page['page_image']}}" name="page_image">
            @error('page_image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="mb-3 row">
        <label for="posted_date" class="col-sm-2 col-form-label">Image Width</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="image_width" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" value="{{ $page['image_width'] }}" name="image_width">
            @error('image_width')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="expiry_date" class="col-sm-2 col-form-label">Image Height</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="image_height" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" value="{{ $page['image_height'] }}" name="image_height">
            @error('image_height')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row d-flex">

        <button type="submit" class="btn btn-success ml-2">Update</button>
</form>
<a href="{{ route('pages.index') }}" class="btn btn-secondary ml-2">Back </a>
</div>

@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        $('#page_title').on('input', function() {
            $('#page_title').next('.text-danger').remove();
        });

        $('#page_description').on('input', function() {
            $('#page_description').next('.text-danger').remove();
        });

        $('#page_keyword').on('input', function() {
            $('#page_keyword').next('.text-danger').remove();
        });

         $('#slug').on('input', function() {
            $('#slug').next('.text-danger').remove();
        });

        $('#page_image').on('input', function() {
            $('#page_image').next('.text-danger').remove();
        });

        $('#image_height').on('input', function() {
            $('#image_height').next('.text-danger').remove();
        });

        $('#image_width').on('input', function() {
            $('#image_width').next('.text-danger').remove();
        });
    });
</script>
@endsection
