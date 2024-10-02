<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="country" content="UAE">
    <meta name="robots" content="follow,index">
    <meta name="Language" content="en-us">
    <meta name="theme-color" content="#light">

    <!--- SEO -->
        <title> @yield('title', 'Crystawall Technologies LLC')</title>
        <meta name="description" content="@yield('description')">
        {{-- <meta name="keywords" content="@yield('keywords')"> --}}
    <!--- /SEO -->


    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-PQZ5KL28');</script>
    <!-- End Google Tag Manager -->



    <!--- OPEN GRAPH -->
        {{-- STANDARD OG --}}
        <meta property="og:url" content="https://crystawalltech.com">
        <meta property="og:type" content="website">
        <meta property="og:title" content="@yield('title')">
        <meta property="og:description" content="@yield('description')">
        <meta property="og:site_name" content="Crystawall Technologies L.L.C.">
        <meta property="og:image" content="@yield('image')">
        <meta property="og:image:width" content="@yield('img_width')">
        <meta property="og:image:height" content="@yield('img_height')">
        {{-- STANDARD OG --}}

        {{-- TWITTER OG --}}
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="@yield('title')">
        <meta name="twitter:description" content="@yield('description')">
        <meta name="twitter:image" content="@yield('image')">
        <meta name="twitter:site" content="https://x.com/CrystawallTec">
        <meta name="twitter:creator" content="@CrystawallTec">
        {{-- TWITTER OG --}}

        {{-- OTHER SOCIAL MEDIA OG  --}}
        <meta property="og:instagram" content="https://www.instagram.com/crystawall/">
        <meta property="og:linkedin" content="https://www.linkedin.com/company/crystawalltech">
        <meta property="og:pinterest" content="https://www.pinterest.com/crystawallTech/">
        <meta property="og:youtube" content="https://www.youtube.com/@CrystaWallTechnologies">
        {{-- SOCIAL MEDIA OG --}}
    <!--- /OPEN GRAPH -->

    <!--- CANONICAL -->
        @php
            // Remove UTM parameters from the URL
            $page_url = preg_replace('/(\?|&)utm_source=[^&]+/', '', request()->fullUrl());
            $page_url = preg_replace('/(\?|&)utm_id=[^&]+/', '', $page_url);
            $page_url = preg_replace('/(\?|&)utm_campaign=[^&]+/', '', $page_url);
            $page_url = preg_replace('/(\?|&)utm_medium=[^&]+/', '', $page_url);
        @endphp

        <link property="schema:url" rel="canonical" href="{{$page_url}}"> {{-- This tag defines the "canonical" URL for the current page --}}
    <!--- /CANONICAL -->

    <!-- FAVICION VARIOUS BROWSERS -->
        <link rel="icon" type="image/png" sizes="56x56" href="{{asset('assest/v2/favicon/crystawall-logo-65x65.png')}}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assest/v2/favicon/crystawall-logo-65x65.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assest/v2/favicon/crystawall-logo-65x65.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assest/v2/favicon/crystawall-logo-65x65.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assest/v2/favicon/crystawall-logo-65x65.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assest/v2/favicon/crystawall-logo-65x65.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assest/v2/favicon/crystawall-logo-65x65.png')}}">
    <!-- FAVICION VARIOUS BROWSERS -->



    <!--- JSON LINKED DATA -->
    {{-- Provide structured data about your website to search engines and other applications --}}
        {{-- This script defines information about your organization --}}
        <script type="application/ld+json">
            [
                {
                    "@context":"https://schema.org",
                    "@type":"Organization",
                    "@id":"https://crystawalltech.com",
                    "name":"Crystawall Technologies",
                    "url":"https://crystawalltech.com",
                    "sameAs":[],
                    "logo":{
                        "@type":"ImageObject",
                        "url":"https://www.crystawalltech.com/public/assest/v2/favicon/crystawall-logo-65x65.png",
                        "width":"65",
                        "height":"65"
                    }
                }
            ]
        </script>

        {{-- This script defines the structure of your website's navigation menu --}}
        <script type="application/ld+json">{
                "@context": "http://schema.org",
                "@type": "SiteNavigationElement",
                "name": [
                    "Home",
                    "About",
                    "Services",
                    "Blogs",
                    "Career",
                    "Life At Crystawall",
                ],
                "url": [
                    "https://crystawalltech.com",
                    "https://www.crystawalltech.com/en/about-us",
                    "https://www.crystawalltech.com/en/services",
                    "https://www.crystawalltech.com/en/blogs",
                    "https://www.crystawalltech.com/en/careers,
                    "https://www.crystawalltech.com/en/life-at-crystawall",
                ],
            }
        </script>
    <!--- /JSON LINKED DATA -->


    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="{{asset('assest/js/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>
    @yield('style')
</head>

<body class="">
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQZ5KL28"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('layout::partials.header')

    @yield('content')

    @include('layout::partials.footer')



    <script type="text/javascript" src="{{asset('assest/js/vendor/jquery-3.2.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

    @yield('scripts')
</body>

</html>
