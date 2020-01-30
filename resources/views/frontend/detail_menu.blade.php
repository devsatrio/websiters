@extends('layoutuser.app')
@section('title')
{{$st->web}}
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
                        <li class="active">{{str_replace('_',' ',Request::segment(2))}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-intro-section">
    <div class="container">               
        <div class="service-blocks">
            <div class="row">
                @foreach ($sub as $item)
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