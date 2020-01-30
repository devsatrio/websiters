<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="M_Adnan">
    <title>Social Networking Connecting HTML5 Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets_user/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('assets_user/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('assets_user/fonts/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('assets_user/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets_user/css/responsive.css')}}" rel="stylesheet">

    <!-- fontawesome  -->
    <link href="{{asset('assets_user/css/all.min.css')}}" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="{{asset('assets_user/js/modernizr.js')}}"></script>

    <!-- Online Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

    <!-- Wrap -->
    <div id="wrap">

        <!-- header -->
        <header class="sticky">
            <div class="container">

                <!-- Logo -->
                <div class="logo"> <a href="index.html"><img class="img-responsive" src="images/logo-dark.png"
                            alt=""></a> </div>
                <nav class="navbar ownmenu navbar-expand-lg" id="nav-resposive">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbarNav" data-parent="#nav-resposive">
                        <ul class="nav">
                            <li class="active"> <a href="{{url('/')}}">Home</a> </li>
                            @foreach ($kt as $mn)
                            @php
                            $sub=DB::table('sub_kategoris')->where('idk',$mn->id)->get();
                            $ceksub=DB::table('sub_kategoris')->where('idk',$mn->id)->count();
                            @endphp

                            @if ($ceksub>0)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$mn->kategori}}</a>
                                <ul class="dropdown-menu">
                                    @foreach ($sub as $sb)
                                    <li>
                                        <a href="{{route('subkategori',['sk'=>str_replace(' ','_',$sb->subkategori)])}}">
                                            {{$sb->subkategori}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @else
                            <li>
                                <a href="#">{{$mn->kategori}}</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="clearfix"></div>
        </header>

        <!-- Content -->
        <div id="content">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer id="footer">
            <div class="footer-wrapper">


                <!-- Footer Bottom -->
                <div class="footer-bottom">
                    <div class="footer-bottom-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 copyright">
                                    <p>&copy; 2019 HTML5 Template. DESIGNED BY <a href="https://webicode.com/">
                                            WEBICODE</a></p>
                                </div>
                                <div class="col-md-6 social-links">
                                    <ul class="right">
                                        <li><a href="#."><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#."><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#."><i class="fab fa-dribbble"></i></a></li>
                                        <li><a href="#."><i class="fab fa-behance"></i></a></li>
                                        <li><a href="#."><i class="fab fa-pinterest"></i></a></li>
                                        <li><a href="#."><i class="fab fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Footer Bottom -->
            </div>
        </footer>
        <!-- End Footer -->
    </div>
    <script src="{{asset('assets_user/js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('assets_user/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets_user/js/own-menu.js')}}"></script>
    <script src="{{asset('assets_user/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets_user/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets_user/js/main.js')}}"></script>
</body>

</html>