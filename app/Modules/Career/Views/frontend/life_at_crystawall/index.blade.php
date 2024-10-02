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
    @include('careers::frontend.life_at_crystawall.hero')
    @include('careers::frontend.life_at_crystawall.section_01')
    @include('careers::frontend.life_at_crystawall.section_02')
    @include('careers::frontend.life_at_crystawall.section_03')
    @include('careers::frontend.life_at_crystawall.section_04')
    @include('careers::frontend.life_at_crystawall.section_05')
@endsection
@section('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
