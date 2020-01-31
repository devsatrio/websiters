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
            <p>Update Foto foto terbaru dari kami </p>
        </div>

        <!-- Companies -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($gal as $g)

                    <div class="col-sm-3">

                        <div class="com-inside">
                            <div class="img-sec"> <img src="{{asset('galeri/'.$g->nama)}}" class="img-responsive"
                                    alt="">
                                <div class="hover-over">
                                    <div class="position-center-center">
                                        <button class="btn" data-toggle="modal"
                                            data-target=".bd-example-modal-lg">Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Gambar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                <img src="{{asset('galeri/'.$g->nama)}}" class="img-responsive"
                                    alt="" style="max-width:100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="btn-center margin-top-30 text-center"> <a href="#." class="btn btn-inverse">Liha Lainya</a>
                </div>
            </div>
            <!-- Btn Center -->

        </div>
</section>

<!-- Development -->
<section class="dev-activ text-center padding-top-100 padding-bottom-50">
    <div class="container">
        <div class="heading-block">
            <h2>Video Youtube</h2>
            <p>Ikuti Chanel Kami</p>
        </div>
        <ul class="row margin-top-50 margin-bottom-50">
            @foreach ($vid as $v)
            <li class="col">
                <iframe src="{{$v->url}}" class="embed-responsive-item" controls=1 style="max-width:100%">
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
            <p>Artikel, informasi & berita terbaru dari kami </p>
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
        </section>
    </div>
</section>

<!-- WHAT OUR USERS SAY -->
<section class="bg-white padding-top-100 padding-bottom-100">
    <div class="container">
        <div class="heading-block text-center">
            <h2>Tentang Kami</h2>
            <p>{!! $st->informasi !!}</p>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 padding-0">
                <div class="contact-info"> <span class="h4">Hubungi Kami</span>
                    <ul>
                        <li> <a href="https://api.whatsapp.com/send?phone={{$st->telp1}}"
                                target="blank()">{{$st->telp1}}</a> </li>
                        <li> <a href="https://api.whatsapp.com/send?phone={{$st->telp2}}"
                                target="blank()">{{$st->telp2}}</a> </li>
                        <li>{{$st->email}}</li>
                        <li>
                            <p>{{$st->alamat}}</p>
                        </li>
                    </ul>

                    <!-- Social Icon -->
                    <div class="social-icon">
                        <a href="{{$st->fb}}" target="blank()"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$st->ig}}" target="blank()"><i class="fab fa-instagram"></i></a>
                        <a href="{{$st->yt}}" target="blank()"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="col-lg-6 padding-0">
                <div class="map-block">
                    <div sytle="max-width:100%">
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