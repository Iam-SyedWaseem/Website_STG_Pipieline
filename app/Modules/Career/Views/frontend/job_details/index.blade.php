@extends('layout::layouts.main')
@section('title', 'Job Listing')
@section('description', "Dubai's premier digital innovation hub, empowering small and medium businesses on Mobile application development, Web development, UI/UX design and software consultation.")
@section('keywords',"software, IT solutions, crystawall technologies, software company in dubai, software in dubai, IT solutions in dubai, web design, mobile development, ui & ux design, graphic design, sotware consultation, dubai, ")
@section('image', '')
@section('img_height', '')
@section('img_width', '')

@section('style')

@endsection
@section('content')
    @include('careers::frontend.job_details.hero')
    {{-- @include('careers::frontend.job_details.section_01') --}}
    @include('careers::frontend.job_details.section_02')
    @include('careers::frontend.job_details.section_03')
@endsection
