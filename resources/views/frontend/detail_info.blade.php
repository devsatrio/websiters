@extends('layoutuser.app')
@section('title')
{{$st->web}}
@endsection
@section('meta')
<meta property="og:title" content="{{$ar->judul}}" />
<meta property="og:url" content="{{$ar->link}}" />
<meta property="og:description" content="{{$ar->deskripsi}}">
<meta property="og:image" content="{{asset('thumbs/sampul/'.$ar->foto)}}">
@endsection
@section('css')
<style>
    .bg-brown {
        background-color: #F4F6F7;
    }
</style>
@endsection
@section('content')
<section class="page-title-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-header-wrap">
                    <div class="page-header">
                        <h1>Informasi Dan Artikel</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li class="active">{{strtoupper(Request::segment(1))}}</li>
                        <li class="active">{{str_replace('-',' ',Request::segment(2))}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-intro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="about-intro">
                    <h2>{{$ar->judul}}</h2>
                    <hr>
                </div>
            </div>
            <div class="col-md-12 col-12">
                <p><span class="fa fa-calendar"></span> {{$ar->tgl}}</p>
                <p><span class="fa fa-user"></span> {{$ar->nama}}</p>
                <div class="text-center">
                    <img src="{{asset('thumbs/sampul/'.$ar->foto)}}" width="500" alt="" srcset="">
                </div>
                <br>
                {!! $ar->isi !!}
            </div>
        </div>
        <br>
        <hr>
        <a href="https://api.whatsapp.com/send?text=https://podomorofeedmill.com/info/{{ $ar->link }}"
            class="btn btn-social-icon btn-yahoo" style="background:lightgreen;">
            <span class="fa fa-whatsapp"> </span>
        </a>
        Share Whatsapp
        <hr>
        <h3>Isikan Komentar Anda</h3>
        <div class="text-center">
            <div class="fb-comments" data-href="https://podomorofeedmill.com/info/{{$ar->link}}" data-width="90%" data-numposts="5">
            </div>
        </div>
        <hr>
        <div class="text-center">
            <h2>Info Lain</h2>
        </div>
        <div class="service-blocks">
            <div class="row">
                @foreach ($de as $item)
                <div class="col-lg-6 col-md-6">
                    <div class="service-block clearfix">
                        <div class="service-icon">
                            <img src="{{asset('thumbs/sampul/'.$item->foto)}}" width="150" alt="" srcset="">
                        </div>
                        <div class="service-content">
                            <h3>{{$item->judul}}</h3>
                            <p>{!! Str::words($item->deskripsi,20) !!}</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{route('info',['url'=>$item->link])}}" class="btn btn-primary"> Selengkapnya</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection