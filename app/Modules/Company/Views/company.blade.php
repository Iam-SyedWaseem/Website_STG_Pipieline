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
    @include('company::hero')
    @include('company::section_01')
    @include('company::section_02')
    @include('company::section_03')
    @include('company::section_04')
@endsection
@section('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection

