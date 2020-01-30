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
                        <h1>Detail Produk</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li class="active">{{strtoupper(Request::segment(1))}}</li>
                        <li class="active">{{Request::segment(2)}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-intro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-6">
                <div class="about-intro">
                    <h2>{{$prod->produk}}</h2>
                    <hr>
                    <h4><span class="fa fa-file"></span> Harga {{$prod->paket.' Rp.'.number_format($prod->harg_pcs)}}
                    </h4>
                    <h4><span class="fa fa-inbox"></span> Harga
                        {{$prod->jenis_berat.' Rp.'.number_format($prod->harg_pack)}}</h4>
                    <hr>
                    <h3>Deskripsi</h3>
                    <p>{!! $prod->deskripsi !!}</p>
                    <hr>
                    <h3>Keunggulan</h3>
                    <p>{!! $prod->keunggulan !!}</p>
                    <hr>
                    <h3>Penggunaan</h3>
                    <p>{!! $prod->penggunaan !!}</p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                @php
                $im=DB::table('imgbarangs')->where('idb',$prod->idb)->get();
                @endphp
                <div id="gal">                    
                    @foreach ($im as $itm)
                    <div class="col-md-12 col-lg-12" data-sub-html="{{str_replace('-',' ',$itm->nama)}}"
                        data-src="{{asset('produk_img/'.$itm->nama)}}">
                        <img src="{{asset('produk_img/'.$itm->nama)}}" class="img-thumbnail">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <h2>Produk Lain</h2>
        </div>
        <div class="service-blocks">
            <div class="row">
                @foreach ($rpd as $rd)
                <div class="col-lg-4 col-md-4">
                    <div class="service-block clearfix">
                        <div class="service-icon">
                            @php
                            $im=DB::table('imgbarangs')->where('idb',$rd->idb)->first();
                            @endphp
                            <img src="{{asset('produk_img/'.$im->nama)}}" width="150">
                        </div>
                        <div class="service-content">
                            <h3><a href="air.html">{{$rd->produk}}</a></h3>
                            <h4><span class="fa fa-file"></span> Harga
                                {!! $rd->paket.':<br> Rp.'.number_format($rd->harg_pcs) !!}
                            </h4>
                            <h4><span class="fa fa-inbox"></span> Harga
                                {!! $rd->jenis_berat.':<br> Rp.'.number_format($rd->harg_pack) !!}</h4>
                        </div>
                    </div><!-- /.service-block -->
                    <div class="text-center">
                        <a href="{{route('info.detail.produk',['kode'=>$rd->kode])}}" class="btn btn-primary btn-sm">Lihat Produk</a>
                    </div>
                </div><!-- /.col-sm-4 -->
                @endforeach
            </div><!-- /.row -->
        </div>
    </div>
</section>
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