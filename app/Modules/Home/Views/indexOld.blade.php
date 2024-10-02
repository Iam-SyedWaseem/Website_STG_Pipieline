@extends('layout::layouts.main')
@section('title', 'Home Page')

@section('content')

    <!-----  Main Section ----->
    <div class="banner_area banner1 d-flex align-items-center pt-120 pb-150" style="background-image:url({{asset('assest/images/banner.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 wow fadeInUp animated"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="single_banner">
                            <div class="single_banner_content">
                                <div class="banner_text_content">
                                    <h1>Leading new</h1>
                                    <h1>Technology with</h1>
                                    <h1 class="cd-headline clip is-full-width">
                                        <span class="cd-words-wrapper">
                                            <b class="is-visible swipe">Android App</b>
                                            <b class="swipe">iOS App</b>
                                            <b class="swipe">Flutter</b>
                                            <b class="swipe">Website</b>
                                            <b class="swipe">UI/UX Design</b>
                                        </span>
                                    </h1>
                                </div>
                                <div class="banner_content_text pt-30">
                                    <p class="text-white">We believe in mobility and interoperability. We believe that the future is of
                                        smartphones and we help you build services for the same.</p>
                                </div>
                                <!-- <div class="slider_button pt-25 d-flex">
                                    <div class="button">
                                        <a  class="button-text-home" href="#">GET STARTED</a>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp "
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <!--div class="single_banner_thumb">
                            <div class="banner_shape">
                                <div class="banner_shape_inner1 bounce-animate5">
                                    <img src="{{asset('assest/images/shape/2.png')}}" alt=""/>
                                </div>
                                <div class="banner_shape_inner2 bounce-animate">
                                    <img src="{{asset('assest/images/shape/3.png')}}" alt=""/>
                                </div>
                                <div class="banner_shape_inner4 bounce-animate3">
                                    <img src="{{asset('assest/images/shape/text1.png')}}" alt=""/>
                                </div>
                                <div class="banner_shape_inner5 bounce-animate2">
                                    <img src="{{asset('assest/images/shape/text2.png')}}" alt=""/>
                                </div>
                                <div class="banner_shape_inner6 bounce-animate3">
                                    <img src="{{asset('assest/images/shape/text3.png')}}" alt=""/>
                                </div>
                                <div class="banner_shape_inner7 rotateme">
                                    <img src="{{asset('assest/images/shape/circle.png')}}" alt=""/>
                                </div>
                            </div>
                            <div class="single_banner_thumb_inner">
                                <img src="{{asset('assest/images/shape/1.png')}}" alt=""/>
                            </div>

                        </div-->
                    </div>
                </div>
            </div>
        </div>

        <!-----  Services - desktop ----->
        @desktop
        <div class="service_area bg_color1 pb-50 pt-30 mobile-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title text_center mb-55 wow fadeInUp ">
                            <div class="section_sub_title uppercase mb-3">
                                <h6>Our Services</h6>
                            </div>
                            <div class="section_main_title">
                                <h1>We provide</h1>
                                <h1>Professional <span>Services</span></h1>
                            </div>
                            <div class="em_bar">
                                <div class="em_bar_bg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="main_box">
                    <div class="box_1 col-12 col-lg-3 justify-content-center mt-1">
                        <img src="{{asset('assest/images/our-services/android.png')}}" alt="Android">
                        <h6 class="text_1">Android</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/ios.png')}}" alt="">
                        <h6 class="text_1">ios</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/unity.png')}}" alt="">
                        <h6 class="text_1">Unity</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/flutter.png')}}" alt="">
                        <h6 class="text_1">Flutter</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/rectnative.png')}}" alt="">
                        <h6 class="text_1">React</h6>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="main_box">
                    <div class="box_1 col-12 col-lg-3 justify-content-center mt-1">
                        <img src="{{asset('assest/images/our-services/laravel.png')}}" alt="">
                        <h6 class="text_1">Laravel</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/wordpress.png')}}" alt="">
                        <h6 class="text_1">Wordpress</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/nodejs.png')}}" alt="">
                        <h6 class="text_1">Node js</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/php.png')}}" alt="">
                        <h6 class="text_1">PHP</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center mb-1">
                        <img src="{{asset('assest/images/our-services/2D,3DDesign.png')}}" alt="">
                        <h6 class="text_1"> Design</h6>
                    </div>
                </div>
            </div>
        </div>
        @enddesktop
            </div>
        </div>

        <!-----  Services - mobile ----->
        @mobile
        <div class="service_area bg_color1 pb-50 desktop-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title text_center mb-55 wow fadeInUp ">
                            <div class="section_sub_title uppercase mb-3">
                                <h6>Our Services</h6>
                            </div>
                            <div class="section_main_title">
                                <h1>We provide</h1>
                                <h1>Professional <span>Services</span></h1>
                            </div>
                            <div class="em_bar">
                                <div class="em_bar_bg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid d-flex justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="main_box">
                    <div class="box_1 col-12 col-lg-3 justify-content-center mt-1">
                        <img src="{{asset('assest/images/our-services/android.png')}}" alt="">
                        <h6 class="text_1">Android</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/ios.png')}}" alt="">
                        <h6 class="text_1">ios</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/unity.png')}}" alt="">
                        <h6 class="text_1">Unity</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/flutter.png')}}" alt="">
                        <h6 class="text_1">Flutter</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/rectnative.png')}}" alt="">
                        <h6 class="text_1">React</h6>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="main_box">
                    <div class="box_1 col-12 col-lg-3 justify-content-center mt-1">
                        <img src="{{asset('assest/images/our-services/laravel.png')}}" alt="">
                        <h6 class="text_1">Laravel</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/wordpress.png')}}" alt="">
                        <h6 class="text_1">Wordpress</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/nodejs.png')}}" alt="">
                        <h6 class="text_1">Node js</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center">
                        <img src="{{asset('assest/images/our-services/php.png')}}" alt="">
                        <h6 class="text_1">PHP</h6>
                    </div>
                    <div class="box_1 col-12 col-lg-3 justify-content-center mb-1">
                        <img src="{{asset('assest/images/our-services/2D,3DDesign.png')}}" alt="">
                        <h6 class="text_1"> Design</h6>
                    </div>
                </div>
            </div>
        </div>
        @endmobile
            </div>
        </div>

        <!-----  Process ----->
        <div class="process_area bg_color2 pt-90 pb-70">
            <div class="container">
                <div class="row">
                    <!-- Start Section Tile -->
                    <div class="col-lg-12 ">
                        <div class="section_title text-center mb-50 wow fadeInDown " data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">
                            <div class="section_sub_title uppercase mb-3">
                                <h6>Our Working Process</h6>
                            </div>
                            <div class="section_main_title">
                                <!-- <h1>Software Testing Process</h1>
                                <h1>For <span>Company</span></h1> -->
                            </div>
                            <div class="em_bar">
                                <div class="em_bar_bg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="process_style_two text-center mb-30 wow fadeInUp " data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <div class="process_style_two_thumb">
                                <img src="{{asset('assest/images/search.svg')}}" alt=""
                                    class="bounce-animate3 img-responsive">

                            </div>
                            <div class="process_style_two_content">
                                <div class="process_style_two_content_title pt-10">
                                    <h5>Research</h5>
                                </div>
                                <div class="process_style_two_content_text">
                                    <p>We dive deep into problem/project industry to learn and understand with research and
                                        planning, how to achieve goals.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="process_style_two text-center mb-30 wow fadeInUp " data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <div class="process_style_two_thumb">
                                <img src="{{asset('assest/images/build.svg')}}" alt="">

                            </div>
                            <div class="process_style_two_content">
                                <div class="process_style_two_content_title">
                                    <h5>Build,Test &amp; Marketing</h5>
                                </div>
                                <div class="process_style_two_content_text  pt-10">
                                    <p>Lateral thinking leads to the most befitting design, seeking a solution and building
                                        it.</p>
                                </div>
                                <!-- <div class="process_style_two_content_button">
                                    <a href="#">Read More</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="process_style_two text-center mb-30 wow fadeInUp " data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <div class="process_style_two_thumb">
                                <img src="{{asset('assest/images/launch.svg')}}" alt=""
                                    class="bounce-animate3" Style="max-width:304px;">
                            </div>
                            <div class="process_style_two_content">
                                <div class="process_style_two_content_title">
                                    <h5>Launch</h5>
                                </div>
                                <div class="process_style_two_content_text pt-10">
                                    <p>Delivering a successful product to launch with seamless support & rigorous
                                        promotion.</p>
                                </div>
                                <!-- <div class="process_style_two_content_button">
                                    <a href="#">Read More</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-----  Portfolio  ----->
        <div class="portfolio_area style_three pb-70 pt-100" id="portfolio" style="display:none">
            <div class="container">
                <div class="row">
                    <!-- Start Section Tile -->
                    <div class="col-lg-12">
                        <div class="section_title text_center mb-50 mt-3 wow fadeInUp">
                            <div class="section_sub_title uppercase mb-3">
                                <h6>PORTFOLIO</h6>
                            </div>
                            <div class="section_main_title">
                                <h1>Our Latest Works For</h1>
                                <h1>Your Business</h1>
                            </div>
                            <div class="em_bar">
                                <div class="em_bar_bg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portfolio_nav">
                            <div class="portfolio_menu">
                                <ul class="menu-filtering">
                                    <li class="current_menu_item wow fadeInUp" data-wow-delay="0.1s" data-filter="*">All
                                        Works
                                    </li>
                                    <li data-filter=".application" class="wow fadeInUp" data-wow-delay="0.2s">Mobile Application
                                    </li>
                                    <li data-filter=".web" class="wow fadeInUp" data-wow-delay="0.3s">Web Development</li>
                                    <li data-filter=".uiux" class="wow fadeInUp" data-wow-delay="0.4s">Ui/Ux Design</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row image_load" style="position: relative; height: 876.656px;">

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-4 grid-item application"
                        style="position: absolute; left: 0px; top: 0px;">
                        <div class="single_portfolio wow fadeInUp">
                            <div class="single_portfolio_inner">
                                <div class="single_portfolio_thumb">
                                    <a href="javascript:void(0)"><img
                                                src="{{asset('assest/images/port/Group 8.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="single_portfolio_content">
                                <div class="single_portfolio_icon">
                                    <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio"
                                    href="{{asset('assest/images/port/Group 8.png')}}"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a class="portfolio-icon"
                                    href="#"
                                    target="_new"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="single_portfolio_content_inner">

                                </div>
                            </div>
                        </div>
                        <p class="heading_portfolio">Santel Easy</p>
                        <p class="title_portfolio"><a href="#">Android, ios</a></p>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 mt-4 grid-item web"
                        style="position: absolute; left: 760px; top: 304px;">
                        <div class="single_portfolio admin wow fadeInUp">
                            <div class="single_portfolio_inner">
                                <div class="single_portfolio_thumb">
                                    <a href="javascript:void(0)"><img
                                                src="{{asset('assest/images/port/Group 56.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="single_portfolio_content">
                                <div class="single_portfolio_icon">
                                    <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio"
                                    href="{{asset('assest/images/port/Group 56.png')}}"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a class="portfolio-icon"
                                    href="#"
                                    target="_new"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="single_portfolio_content_inner">
                                </div>
                            </div>
                        </div>
                        <p class="heading_portfolio">Which Pump</p>
                        <p class="title_portfolio"><a href="#">web, Angular</a></p>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-4 grid-item application"
                        style="position: absolute; left: 380px; top: 0px;">
                        <div class="single_portfolio wow fadeInUp">
                            <div class="single_portfolio_inner">
                                <div class="single_portfolio_thumb">
                                    <a href="javascript:void(0)"><img
                                                src="{{asset('assest/images/port/Group 16.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="single_portfolio_content">
                                <div class="single_portfolio_icon">
                                    <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio"
                                    href="{{asset('assest/images/port/Group 16.png')}}"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a class="portfolio-icon"
                                    href="#"
                                    target="_new"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="single_portfolio_content_inner">
                                </div>
                            </div>
                        </div>
                        <p class="heading_portfolio">Rec Ball</p>
                        <p class="title_portfolio"><a href="#">Android, ios</a></p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-4 grid-item application"
                        style="position: absolute; left: 760px; top: 0px;">
                        <div class="single_portfolio wow fadeInUp">
                            <div class="single_portfolio_inner">
                                <div class="single_portfolio_thumb">
                                    <a href="javascript:void(0)"><img
                                                src="{{asset('assest/images/port/Group 27.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="single_portfolio_content">
                                <div class="single_portfolio_icon">
                                    <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio"
                                    href="{{asset('assest/images/port/Group 27.png')}}"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a class="portfolio-icon"
                                    href="#"
                                    target="_new"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="single_portfolio_content_inner">
                                </div>
                            </div>
                        </div>
                        <p class="heading_portfolio">Pip Camera</p>
                        <p class="title_portfolio"><a href="#">ios</a></p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-4 grid-item application"
                        style="position: absolute; left: 0px; top: 304px;">
                        <div class="single_portfolio wow fadeInUp">
                            <div class="single_portfolio_inner">
                                <div class="single_portfolio_thumb">
                                    <a href="javascript:void(0)"><img
                                                src="{{asset('assest/images/port/Group 38.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="single_portfolio_content">
                                <div class="single_portfolio_icon">
                                    <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio"
                                    href="{{asset('assest/images/port/Group 38.png')}}"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a class="portfolio-icon"
                                    href="#"
                                    target="_new"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="single_portfolio_content_inner">
                                </div>
                            </div>
                        </div>
                        <p class="heading_portfolio">Gym Workout</p>
                        <p class="title_portfolio"><a href="#">ios</a></p>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 mt-4 grid-item application"
                        style="position: absolute; left: 380px; top: 304px;">
                        <div class="single_portfolio admin wow fadeInUp">
                            <div class="single_portfolio_inner">
                                <div class="single_portfolio_thumb">
                                    <a href="javascript:void(0)"><img
                                                src="{{asset('assest/images/port/Group 39.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="single_portfolio_content">
                                <div class="single_portfolio_icon">
                                    <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio"
                                    href="{{asset('assest/images/port/Group 39.png')}}"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a class="portfolio-icon"
                                    href="#"
                                    target="_new"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="single_portfolio_content_inner">
                                </div>
                            </div>
                        </div>
                        <p class="heading_portfolio">Guess Country</p>
                        <p class="title_portfolio"><a href="#">ios</a></p>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 mt-4 grid-item application"
                        style="position: absolute; left: 760px; top: 304px;">
                        <div class="single_portfolio admin wow fadeInUp">
                            <div class="single_portfolio_inner">
                                <div class="single_portfolio_thumb">
                                    <a href="javascript:void(0)"><img
                                                src="{{asset('assest/images/port/Group 41.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="single_portfolio_content">
                                <div class="single_portfolio_icon">
                                    <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio"
                                    href="{{asset('assest/images/port/Group 41.png')}}"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a class="portfolio-icon"
                                    href="#"
                                    target="_new"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="single_portfolio_content_inner">
                                </div>
                            </div>
                        </div>
                        <p class="heading_portfolio">Collage Maker</p>
                        <p class="title_portfolio"><a href="#">ios</a></p>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 mt-4 grid-item application"
                        style="position: absolute; left: 760px; top: 304px;">
                        <div class="single_portfolio admin wow fadeInUp">
                            <div class="single_portfolio_inner">
                                <div class="single_portfolio_thumb">
                                    <a href="javascript:void(0)"><img
                                                src="{{asset('assest/images/port/Group 42.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="single_portfolio_content">
                                <div class="single_portfolio_icon">
                                    <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio"
                                    href="{{asset('assest/images/port/Group 42.png')}}"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a class="portfolio-icon"
                                    href="#"
                                    target="_new"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="single_portfolio_content_inner">
                                </div>
                            </div>
                        </div>
                        <p class="heading_portfolio">Mirror Photo</p>
                        <p class="title_portfolio"><a href="#">ios</a></p>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 mt-4 grid-item application"
                        style="position: absolute; left: 760px; top: 304px;">
                        <div class="single_portfolio admin wow fadeInUp">
                            <div class="single_portfolio_inner">
                                <div class="single_portfolio_thumb">
                                    <a href="javascript:void(0)"><img
                                                src="{{asset('assest/images/port/Group 43.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="single_portfolio_content">
                                <div class="single_portfolio_icon">
                                    <a class="portfolio-icon venobox vbox-item" data-gall="myportfolio"
                                    href="{{asset('assest/images/port/Group 43.png')}}"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a class="portfolio-icon"
                                    href="#"
                                    target="_new"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="single_portfolio_content_inner">
                                </div>
                            </div>
                        </div>
                        <p class="heading_portfolio">Photo Calculator</p>
                        <p class="title_portfolio"><a href="#">ios</a></p>
                    </div>

                </div>
            </div>
        </div>


        <!-- TESTIMONIAL -->

        <!--Get In Touch-->
        <div class="main_contact_area style_three pt-80 pb-90">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section_title text_left mb-50 mt-3 wow fadeInLeft ">
                            <div class="section_sub_title uppercase mb-3">
                                <h6>Contact Info</h6>
                            </div>
                            <div class="section_main_title">
                                <h1>Get in Touch</h1>
                            </div>
                            <div class="section_title_text pt-2">
                                <p>We Would love to answer any questions.</p>
                            </div>
                            <div class="em_bar">
                                <div class="em_bar_bg"></div>
                            </div>
                        </div>
                        <div class="img">
                            <img src="{{asset('assest/images/contact-us.svg')}}" class="img-responsive mb-4" style="max-width:180px">
                        </div>
                        <div class="contact_address wow fadeInLeft " data-wow-delay="0.2s">
                            <div class="contact_address_company mb-3">
                                <ul>
                                    <li><i class="fa fa fa-envelope-o"></i><span><a
                                                    href="mailto:contact@crystawalltech.com">contact@crystawalltech.com</a></span></li>
                                    <li style="display:none"><i class="fa fa-mobile"></i><span>+971 50 457 3144</span></li>
                                    <li><i class="fa fa-map-marker" style="float:left;"></i>
                                        <p class="pt-3">1901 Westburry office tower, Business Bay, Dubai</p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                                            <div class="contact_from wow fadeInRight ">
                            <div class="contact_from_box">
                                <div class="contact_title pb-4">
                                    <h3>Send Message </h3>
                                </div>

                                <form id="contact_form" action="{{route('contact.contactFormSubmit')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form_box mb-30">
                                                <input type="text" name="name" id="name" placeholder="Name">
                                                @error('name')
                                                <div class="input-error">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form_box mb-30">
                                                <input type="email" name="email" id="email" placeholder="Email Address">
                                                @error('email')
                                                <div class="input-error">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form_box mb-30">
                                                <input type="text" name="phone_no" id="phone_no" placeholder="Phone Number">
                                                    @error('phone_no')
                                                <div class="input-error">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form_box mb-30">
                                                <textarea name="message" id="write_msg" cols="30" rows="10"
                                                        placeholder="Write a Message"></textarea>
                                                        @error('message')
                                                <div class="input-error">{{ $message }}</div>
                                            @enderror
                                            </div>
                                            <div class="quote_btn">
                                                <button class="btn" type="submit">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-message"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mCustomScrollbar">
        <div class="popup right-menu">
            <div class="right-menu-wrap">
                <div class="user-menu-close js-close-aside">
                    <a href="#" class="user-menu-content  js-clode-aside">
                        <span></span>
                        <span></span>
                    </a>
                </div>
                <div class="logo">
                    <a href="{{route('home.index')}}" class="full-block-link"></a>
                    <img loading="lazy" src="{{asset('assest/images/logo-final.png')}}" height="70px" alt="Crystawall Technologies LLC">


                </div>


            </div>

            <div class="widget contacts mt-15">
                <h4 class="contacts-title">Get In Touch</h4>
                <p class="contacts-text">We are here for you. Feel free to contact us! </p>
                <div class="contacts-item">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="content">
                        <a href="#" class="title">CrystalWall Technologies LLC </a>
                        <p class="sub-title akash-custom">1901 Westburry office tower, Business Bay, Dubai</p>
                    </div>
                </div>
                <div class="contacts-item pt-10">
                    <div class="icon">
                        <i class="fa fa-envelope" style="font-size: 0.80em;"></i>
                    </div>

                    <div class="content">
                        <a href="#" class="title">Email</a>
                        <p class="sub-title"><a class="akash-custom" href="mailto:contact@crystawalltech.com">contact@crystawalltech.com</a></p>
                    </div>
                </div>
                <div class="contacts-item" style="">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="content" style="">
                        <a href="#" class="title">Contact</a>
                        <p class="sub-title akash-custom"><a class="akash-custom" href="tel:+97145531572">+971 455 31572</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('assest/js/home/form.js') }}"></script>
@endsection
