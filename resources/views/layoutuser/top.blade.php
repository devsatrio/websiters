<header class="header">
    <nav class="top-bar">
        <div class="overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="call-to-action">
                            <ul class="list-inline">
                                <li><a href="https://api.whatsapp.com/send?phone={{$st->telp1}}"><i class="fa fa-phone"></i>{{$st->telp1}}</a></li>
                                <li><a href="https://api.whatsapp.com/send?phone={{$st->telp2}}"><i class="fa fa-phone"></i>{{$st->telp2}}</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> {{$st->email}}</a></li>
                            </ul>
                        </div><!-- /.call-to-action -->
                    </div><!-- /.col-sm-6 -->
                    <div class="col-sm-6 hidden-xs">
                        <div class="topbar-right">                            
                            <ul class="social-links list-inline pull-right">
                                <li><a href="{{$st->fb}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$st->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$st->ig}}"><i class="fa fa-instagram"></i></a></li>                                
                            </ul>
                        </div><!-- /.social-links -->
                    </div><!-- /.col-sm-6 -->

                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.overlay-bg -->
    </nav><!-- /.top-bar -->

    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="Apa Yang Anda Cari" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container mainnav">
            <div class="navbar-header">
                <h1 class="logo"><a class="navbar-brand" href="{{route('beranda')}}"><img src="{{asset('logo/'.$st->logo)}}" height="25" alt=""></a></h1>
                <!-- offcanvas-trigger -->
                <!-- <button type="button" class="navbar-toggle collapsed pull-right">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </button> -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-collapse">
                <span class="search-button pull-right"><a href="#search"><i class="fa fa-search"></i></a></span>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Home -->
                    <li class="dropdown"><a href="{{route('beranda')}}">Home</a></li>
                    @foreach ($kt as $mn)                        
                    @php
                        $sub=DB::table('sub_kategoris')->where('idk',$mn->id)->get();
                        $ceksub=DB::table('sub_kategoris')->where('idk',$mn->id)->count();
                    @endphp                    
                    <li class="dropdown"><a href="#">{{$mn->kategori}}
                        @if ($ceksub>0)
                        <span class="fa fa-angle-down"></span>                                                    
                        @endif
                    </a> 
                    @if ($ceksub>0)                        
                    <!-- submenu-wrapper -->
                    <div class="submenu-wrapper">
                        <div class="submenu-inner">
                            <ul class="dropdown-menu">
                                @foreach ($sub as $sb)    
                                <li><a href="{{route('subkategori',['sk'=>str_replace(' ','_',$sb->subkategori)])}}">{{$sb->subkategori}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /submenu-wrapper -->
                    @endif                                              
                    </li>
                    @endforeach
                    <!-- /Home -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>