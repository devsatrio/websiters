@extends('layoutuser.app')
@section('title')
{{$st->web}}
@endsection
@section('css')
<link rel="shortcut icon" href="{{asset('logo/'.$st->ico)}}">
<link rel="stylesheet" href="{{asset('front/galeri/lightgallery.css')}}">
<link rel="stylesheet" href="{{asset('front/css/bootstrap-social.css')}}">
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

@endsection
@section('content')
@include('layoutuser.menu')

<!-- Artikel -->
<section class="why-us-setion section-padding bg-blue">
    <div class="container">
        <div class="row text-center">
            <div class="col-xs-12">
                <h2 class="section-title">Informasi Dan Berita</h2>
                <span class="section-sub"></span>
            </div>
        </div>
        <div class="row content-row">
            @foreach ($art as $arpr)
            <div class="col-md-6">
                <div class="panel img-thumbnail">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="img-reaponsive">
                                    <img src="{{asset('thumbs/sampul/'.$arpr->foto)}}" height="270" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>{{$arpr->judul}}</h3>
                                <p>{!! Str::words($arpr->deskripsi,15) !!}</p>
                                <a href="{{route('info',['url'=>$arpr->link])}}" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- /.col-sm-4 -->
        <div class="text-center">
            {{$art->links()}}
        </div>
    </div> <!-- /.row -->
</section>
<!-- services end -->

<!-- Galeri -->
<section class="why-us-setion section-padding bg-blue">
    <div class="container text-center">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="section-title">Galeri</h2>
                <span class="section-sub"></span>
            </div>
        </div>
        <div class="row content-row">
            <div id="gal">
                @foreach ($gal as $g)
                <div class="col-sm-12 col-md-4 col-12" data-sub-html="{{str_replace('-',' ',$g->nama)}}"
                    data-src="{{asset('galeri/'.$g->nama)}}">
                    <img src="{{asset('galeri/'.$g->nama)}}" alt="" class="img-thumbnail">
                </div>
                @endforeach
            </div>
        </div> <!-- /.row -->
    </div><!-- /.container -->
</section>
<!-- youtube -->
<section class="why-us-setion section-padding bg-dark">
    <div class="container text-center">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="section-title" style="color:#fff">Video Youtube</h2>
                <span class="section-sub"></span>
            </div>
        </div>
        <div class="row content-row">
            <div id="vid">
                @foreach ($vid as $v)
                <div class="col-sm-12 col-md-4 col-12">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe src="{{$v->url}}" class="embed-responsive-item" controls=1>
                        </iframe>
                    </div>

                </div>
                @endforeach
            </div>
        </div> <!-- /.row -->
    </div><!-- /.container -->
</section>
<!-- -->


@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#gal').lightGallery();      
    });
</script>
<script src="{{asset('front/galeri/lightgallery-all.min.js')}}"></script>
<script src="{{asset('front/galeri/jquery.mousewheel.min.js')}}"></script>
@endsection