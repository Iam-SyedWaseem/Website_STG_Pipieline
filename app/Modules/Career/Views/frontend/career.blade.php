@extends('layout::layouts.main')

@section('title', $title)
@section('description',$description)
@section('keywords',$keywords)
@section('image',$image)
@section('img_height',$imageHeight)
@section('img_width',$imageWidth)
@section('style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection
@section('content')
    @include('careers::frontend.hero')
    @include('careers::frontend.section_01')
    @include('careers::frontend.section_02')
    @include('careers::frontend.section_03')
    {{-- @include('careers::frontend.section_04') --}}
@endsection
@section('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

