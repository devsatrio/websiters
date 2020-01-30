@extends('layoutuser.base')

@section('title')
{{$st->web}}
@endsection

@section('css')
@endsection

@section('content')

<!-- Banner -->
<section class="bnr">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sl as $it)
            <div @if ($it->selected=='y')
                class="carousel-item active"
                @else
                class="carousel-item"
                @endif>
                <div class="carousel-caption d-none d-md-block">
                    @if ($it->deskripsi!='')
                    <h3>{!! $it->deskripsi !!}</h3>
                    @endif
                    @if ($it->link!='')
                    <a class="btn" href="{{$it->link}}">Lihat Lebih Lanjut</a>
                    <br><br><br>
                    @endif
                </div>
                <img class="d-block w-100" src="{{asset('slider/'.$it->nama)}}" alt="Second slide">

            </div>
            @endforeach
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

</section>

<!-- Intro Sec -->
<section>
    <div class="container">

        <div class="intro-sec">

            <div class="row margin-0">
                <div class="col-lg-6 padding-0">
                    <div class="intro-txt-bnr">
                        <h3></h3>
                        <p></p>
                        <h4>Motto {{$st->web}}</h4>
                        <p>{!! $st->motto !!} </p>
                    </div>
                </div>
                <div class="col-lg-6 padding-0">
                    <div class="intro-txt-bnr primary-bg text-dark">
                        <h4>Tentang {{$st->web}}</h4>
                        <p>{!! $st->informasi !!}</p>
                    </div>
                </div>
                <!-- <div class="col-lg-4 padding-0">
                    <div class="intro-txt-bnr">
                        <h4>Share what’s up with your Professionals </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue conseqaut nibbhi
                            ellit ipsum consectetur. </p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>

<!-- Papular Companies -->
<section class="padding-top-100 padding-bottom-100">
    <div class="container">

        <!-- Heading Block -->
        <div class="heading-block text-center">
            <h2>Galeri</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue conseqaut nibbhi ellit ipsum
                consectetur. </p>
        </div>

        <!-- Companies -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Company -->
                    @foreach ($gal as $g)
                    <!-- <div class="col-sm-12 col-md-4 col-12" data-sub-html="{{str_replace('-',' ',$g->nama)}}"
                    data-src="{{asset('galeri/'.$g->nama)}}">
                    <img src="{{asset('galeri/'.$g->nama)}}" alt="" class="img-thumbnail">
                </div> -->
                    <div class="col-sm-3">
                        <div class="com-inside">
                            <div class="img-sec"> <img src="{{asset('galeri/'.$g->nama)}}" class="img-responsive"
                                    alt="">
                                <div class="hover-over">
                                    <div class="position-center-center"> <a href="#" class="btn">Follow</a> <a
                                            href="companies-detail.html" class="btn">Details</a> </div>
                                </div>
                            </div>
                            <div class="txt-sec">
                                <h5><a href="companies-detail.html"> Webicode </a></h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>

<!-- Development -->
<section class="dev-activ text-center padding-top-100 padding-bottom-50">
    <div class="container">
        <div class="heading-block">
            <h2>Video Youtube</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nibh dolor, efficitur eget pharetra ac,
                cursus sed sapien. Cras posuere ligula ut blandit varius. </p>
        </div>
        <ul class="row margin-top-50 margin-bottom-50">
            @foreach ($vid as $v)
            <li class="col">
                <iframe src="{{$v->url}}" class="embed-responsive-item" controls=1>
                </iframe>
            </li>
            @endforeach
        </ul>
    </div>
</section>
<section class="padding-top-100 padding-bottom-100">
    <div class="container">
        <div class="heading-block text-center">
            <h2>Informasi Dan Berita</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue conseqaut nibbhi ellit ipsum
                consectetur. </p>
        </div>
        <section class="cd-gallery">
            <ul id="MixItUpF71E1C">
                @foreach ($art as $arpr)
                <li class="mix freelance  indui " style="display: inline-block;">
                    <div class="team-inside">
                        <div class="img-sec"> <img src="{{asset('thumbs/sampul/'.$arpr->foto)}}" class="img-responsive"
                                alt="">
                            <div class="hover-over">
                                <div class="position-center-center"><a href="{{route('info',['url'=>$arpr->link])}}"
                                        class="btn">Selengkapnya</a> </div>
                            </div>
                        </div>
                        <div class="txt-sec">
                            <h5><a href="#."> {{ucwords($arpr->judul)}} </a></h5>
                            <span>{!! Str::words($arpr->deskripsi,30) !!}</span>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="clearfix"></div>

            <!-- Btn Center -->
            <div class="btn-center margin-top-30 text-center"> <a href="#." class="btn btn-inverse">View More</a> </div>
        </section>
    </div>
</section>
<!-- ABOUT -->
<section class="bg-white">
    <!-- Right Background -->
    <div class="main-page-section half_left_layout">
        <div class="main-half-layout half_right_layout"> </div>

        <!-- Left Content -->
        <div class="main-half-layout-container half_right_layout">
            <div class="about-us-con">
                <h3>Collaborate on a project</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nibh dolor, efficitur eget pharetra
                    ac, cursus sed sapien. Cras posuere ligula ut blandit varius. </p>
                <ul class="count-info row">
                    <li class="col"> <span class="counter">5000</span><span>+</span>
                        <p>Collaboration</p>
                    </li>
                    <li class="col"> <span class="counter">750</span><span>+</span>
                        <p>Projects</p>
                    </li>
                </ul>
                <a href="#." class="btn">Find a Jobs</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>

<!-- Why Choose Us -->
<section class="why-choose padding-top-100 padding-bottom-0">
    <div class="container">

        <!-- Why Choose Us Row -->
        <div class="row">
            <div class="col-lg-8 margin-top-20 animate fadeInLeft" data-wow-delay="0.4s">
                <!-- Tittle -->
                <div class="heading-block margin-bottom-20"> <span class="margin-bottom-10">We deliver High Quality
                        Services</span>
                    <h2>Ultra Services &amp; Best Support</h2>
                </div>
                <div class="ultra-ser">
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                        deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
                        provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et
                        dolorum fuga.</p>
                </div>
                <div class="row margin-top-60">

                    <!-- Services -->
                    <div class="col-md-6 animate fadeInUp" data-wow-delay="0.4s">
                        <div
                            class="clearfix icon-box ib-style-2 i-large i-top padding-bottom-15 border-bottom-1 border-light">
                            <div class="ib-icon"> <i class="far fa-paper-plane"></i> </div>
                            <div class="ib-info">
                                <h4 class="h6">Trending</h4>
                                <p>Contrary to popular belief , Lorem Ipsum is not simply random text. It has roots in a
                                    piece</p>
                            </div>
                        </div>
                    </div>

                    <!-- Services -->
                    <div class="col-md-6 animate fadeInUp" data-wow-delay="0.6s">
                        <div
                            class="clearfix icon-box ib-style-2 i-large i-top padding-bottom-15 border-bottom-1 border-light">
                            <div class="ib-icon"> <i class="fab fa-tencent-weibo"></i> </div>
                            <div class="ib-info">
                                <h4 class="h6">Smart Setting</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem not simply random
                                    accusantium</p>
                            </div>
                        </div>
                    </div>

                    <!-- Services -->
                    <div class="col-md-6 animate fadeInUp" data-wow-delay="0.8s">
                        <div
                            class="clearfix icon-box ib-style-2 i-large i-top padding-bottom-15 border-bottom-1 border-light">
                            <div class="ib-icon"> <i class="fas fa-sliders-h"></i> </div>
                            <div class="ib-info">
                                <h4 class="h6">Powerful Admin</h4>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                    piece</p>
                            </div>
                        </div>
                    </div>

                    <!-- Services -->
                    <div class="col-md-6 animate fadeInUp" data-wow-delay="0.4s">
                        <div class="clearfix icon-box ib-style-2 i-large i-top padding-bottom-31">
                            <div class="ib-icon"> <i class="far fa-moon"></i> </div>
                            <div class="ib-info">
                                <h4 class="h6">Sleeping Mode</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- App Buttons -->
                <div class="app-btns"> <a href="#." class="margin-right-10"><img src="images/android-btn.png"
                            alt=""></a><a href="#."><img src="images/app-btn.png" alt=""></a> </div>
            </div>

            <!-- Image -->
            <div class="col-lg-4 text-right animate fadeInRight" data-wow-delay="0.4s"> <img class="img-responsive"
                    src="images/iphone-x-screen.png" alt="Why Choose Us Image" /> </div>
        </div>
    </div>
</section>

<!-- WHAT OUR USERS SAY -->
<section class="bg-white padding-top-100 padding-bottom-100">
    <div class="container">

        <!-- Heading Block -->
        <div class="heading-block text-center">
            <h2>Testimonials</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue conseqaut nibbhi ellit ipsum
                consectetur. </p>
        </div>

        <!-- Testimonial Style 4 -->
        <div class="testimonial style-4">
            <div class="testi">
                <!-- Testi Slides With Image -->
                <div class="testi-slide">

                    <!-- Slides -->
                    <div>
                        <!-- Avatar -->
                        <div class="avatar"><img class="img-circle img-responsive" src="images/testimonial-2a.png"
                                alt=" "></div>
                        <div class="text-in">
                            <p>“There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour,
                                or randomised words which don't look even slightly believable.” </p>
                            <h6>WHITE SHADOW WALKER</h6>
                            <span> CEO/FOUNDER DELL</span>
                        </div>
                    </div>

                    <!-- Slides -->
                    <div>
                        <!-- Avatar -->
                        <div class="avatar"><img class="img-circle img-responsive" src="images/testimonial-2b.png"
                                alt=" "></div>
                        <div class="text-in">
                            <p>“There are many variations but the majority have suffered alteration. but the majority
                                have suffered alteration in some form, by injected humour, or randomised words which
                                don't look even slightly believable.”</p>
                            <h6>M_ADNAN</h6>
                            <span> CEO/FOUNDER DELL</span>
                        </div>
                    </div>

                    <!-- Slides 1 -->
                    <div>
                        <!-- Avatar -->
                        <div class="avatar"><img class="img-circle img-responsive" src="images/testimonial-2c.png"
                                alt=" "></div>
                        <div class="text-in">
                            <p>“There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, Alteration in some form randomised words which don't
                                look even slightly believable.”</p>
                            <h6>DAVID WALKER</h6>
                            <span> CEO/FOUNDER DELL</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 padding-0">
                <div class="contact-info"> <span class="h4">Hubungi Kami</span>
                    <ul>
                        <li> <a href="#.">{{$st->telp1}}</a> </li>
                        <li> <a href="#.">{{$st->telp2}}</a> </li>
                        <li> <a href="#.">{{$st->email}}</a> </li>
                        <li>
                            <p>{{$st->alamat}}</p>
                        </li>
                    </ul>

                    <!-- Social Icon -->
                    <div class="social-icon"> <a href="#."><i class="fab fa-facebook-f"></i></a> <a href="#."><i
                                class="fab fa-whatsapp"></i></a> <a href="#."><i class="fab fa-instagram"></i></a> <a
                            href="#."><i class="fab fa-pinterest-p"></i></a> <a href="#."><i
                                class="fab fa-youtube"></i></a> </div>
                </div>
            </div>

            <!-- Map -->
            <div class="col-lg-6 padding-0">
                <div class="map-block">
                    <div>
                    {!! $st->map !!}
                    </div>
                    <div class="markers-wrapper addresses-block"> <a class="marker" data-rel="map-canvas"
                            data-lat="-37.814199" data-lng="144.961560" data-string="Connection Head office"></a> </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</section>
@endsection

@section('js')
@endsection