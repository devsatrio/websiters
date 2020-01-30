<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$st->informasi}}}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index,follow">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <title>@yield('title')</title>    
    {{-- Meta For Whatsap --}}
    @yield('meta')
    {{-- Facebook comment --}}
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v5.0&appId=498330701039615&autoLogAppEvents=1"></script>
    <!-- Web Fonts -->
    <link
        href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic'
        rel='stylesheet' type='text/css'>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Flaticon CSS -->
    <link href="{{asset('front/fonts/flaticon/flaticon.css')}}" rel="stylesheet">
    <!-- font-awesome CSS -->
    <link href="{{asset('front/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Offcanvas CSS -->
    <link href="{{asset('front/css/hippo-off-canvas.css')}}" rel="stylesheet">
    <!-- animate CSS -->
    <link href="{{asset('front/css/animate.css')}}" rel="stylesheet">
    <!-- language CSS -->
    <link href="{{asset('front/css/language-select.css')}}" rel="stylesheet">
    <!-- owl.carousel CSS -->
    <link href="{{asset('front/owl.carousel/assets/owl.carousel.css')}}" rel="stylesheet">
    <!-- magnific-popup -->
    <link href="{{asset('front/css/magnific-popup.css')}}" rel="stylesheet">
    <!-- Main menu -->
    <link href="{{asset('front/css/menu.css')}}" rel="stylesheet">
    <!-- Template Common Styles -->
    <link href="{{asset('front/css/template.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
    <script src="{{asset('front/js/vendor/modernizr-2.8.1.min.js')}}"></script>
    {{-- tambahan css --}}
    <link rel="stylesheet" href="{{asset('front/galeri/lightgallery.css')}}">
<link rel="stylesheet" href="{{asset('front/css/bootstrap-social.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style>
    .bg-brown {
        background-color: #F4F6F7;
    }

    .bg-dark {
        background-color: #222222;
    }

    .bg-po {
        background-color: #4A5F89;
    }

    .bg-blue {
        background-color: #FAFAFA;
    }

    .card-img-bottom {
        color: #fff;
        height: 20rem;
        background-size: cover;
    }

    .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 50px;
        left: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
    }

    .my-float {
        margin-top: 16px;
    }
</style>

    @yield('css')
</head>

<body id="page-top">
    <div id="st-container" class="st-container">
        <div class="st-pusher">
            <div class="st-content">
                @include('layoutuser.top')
                @yield('content')
                @include('layoutuser.footer')
                @include('layoutuser.copy')
            </div>
        </div>
        @include('layoutuser.menucanvas')
    </div>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('front/js/jquery.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <!-- owl.carousel -->
    <script src="{{asset('front/owl.carousel/owl.carousel.min.js')}}"></script>
    <!-- Magnific-popup -->
    <script src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Offcanvas Menu -->
    <script src="{{asset('front/js/hippo-offcanvas.js')}}"></script>
    <!-- inview -->
    <script src="{{asset('front/js/jquery.inview.min.js')}}"></script>
    <!-- stellar -->
    <script src="{{asset('front/js/jquery.stellar.js')}}"></script>
    <!-- countTo -->
    <script src="{{asset('front/js/jquery.countTo.js')}}"></script>
    <!-- classie -->
    <script src="{{asset('front/js/classie.js')}}"></script>
    <!-- selectFx -->
    <script src="{{asset('front/js/selectFx.js')}}"></script>
    <!-- sticky kit -->
    <script src="{{asset('front/js/jquery.sticky-kit.min.js')}}"></script>
    <!-- GOGLE MAP -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <!--TWITTER FETCHER-->
    <script src="{{asset('front/js/twitterFetcher_min.js')}}"></script>
    <!-- Custom Script -->
    <script src="{{asset('front/js/scripts.js')}}"></script>
    @yield('js')
</body>

</html>