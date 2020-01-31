@extends('layoutuser.base')

@section('content')
<section class="sub-bnr">
    <div class="container">
        <h2>{{$kategori->kategori}}</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">{{str_replace('_',' ',Request::segment(2))}}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="blog blog-pages">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach ($sub as $item)
                <article>
                    <img class="img-responsive" src="{{asset('thumbs/sampul/'.$item->foto)}}" alt="">

                    <div class="post-detail"> <a href="{{route('info',['url'=>$item->link])}}"
                            class="post-tittle">{{$item->judul}}</a>
                        <span> <i class="far fa-calendar"></i> {{$item->created_at}}</span>
                        <p>{!! $item->deskripsi !!}</p>
                    </div>
                </article>
                @endforeach
                {{$sub->links()}}
            </div>

            <div class="col-md-4">
                <div class="side-bar">
                    <h5 class="side-tittle">Latest Posts </h5>
                    <ul class="papu-post">
                        @foreach($artikel_lain as $arlain)
                        <li class="media">
                            <div class="media-left">
                                <a href="blog-single.html">
                                    <img class="media-object" src="{{asset('thumbs/sampul/'.$arlain->foto)}}" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <a class="media-heading" href="{{route('info',['url'=>$arlain->link])}}">
                                    {{ucwords($arlain->judul)}}
                                </a>
                                <p>{!! Str::words($arlain->deskripsi,15) !!} </p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <h5 class="side-tittle margin-top-50">Kategori </h5>
                    <ul class="cate">
                        @foreach($submenu as $sbm)
                        <li><a href="{{route('subkategori',['sk'=>str_replace(' ','_',$sbm->subkategori)])}}">
                                {{$sbm->subkategori}}</a></li>
                        @endforeach
                    </ul>
                    <h5 class="side-tittle margin-top-50">Galeri </h5>
                    <ul class="papu-post">
                        @foreach ($gal as $g)
                        <li class="media">
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
                                            <img src="{{asset('galeri/'.$g->nama)}}" class="img-responsive" alt=""
                                                style="max-width:100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <h5 class="side-tittle margin-top-50">Youtube</h5>
                    <ul class="papu-post">
                        @foreach ($vid as $v)
                        <li class="media">
                            <iframe src="{{$v->url}}" class="embed-responsive-item" controls=1 style="max-width:100%">
                            </iframe>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection