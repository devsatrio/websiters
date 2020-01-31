<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="M_Adnan">
    <title>{{$st->web}}</title>
    <link href="{{asset('assets_user/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_user/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('assets_user/fonts/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('assets_user/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets_user/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('assets_user/css/all.min.css')}}" rel="stylesheet">
    <script src="{{asset('assets_user/js/modernizr.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div id="wrap">
        <header class="sticky">
            <div class="container">
                <div class="logo"> <a href="index.html"><img class="img-responsive" src="{{asset('logo/'.$st->logo)}}"
                            alt="" width="50%"></a> </div>
                <nav class="navbar ownmenu navbar-expand-lg" id="nav-resposive">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbarNav" data-parent="#nav-resposive">
                        <ul class="nav">
                            <li class="active"> <a href="{{url('/')}}">Home</a> </li>
                            <li> <a href="{{route('halaman-galeri')}}">Galeri</a> </li>
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
                                        <a
                                            href="{{route('subkategori',['sk'=>str_replace(' ','_',$sb->subkategori)])}}">
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
        <div id="content">
            @yield('content')
        </div>
        <footer id="footer">
            <div class="footer-wrapper">
                <div class="footer-bottom">
                    <div class="footer-bottom-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center copyright">
                                    <p>&copy; 2019 HTML5 Template. DESIGNED BY <a href="https://webicode.com/">
                                            WEBICODE</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{asset('assets_user/js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('assets_user/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets_user/js/own-menu.js')}}"></script>
    <script src="{{asset('assets_user/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets_user/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets_user/js/main.js')}}"></script>
    @yield('js')

</body>

</html>