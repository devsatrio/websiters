@extends('layoutuser.base')

@section('content')
<section class="blog blog-pages">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article>
                    <img class="img-responsive" src="{{asset('thumbs/sampul/'.$ar->foto)}}" alt="">
                    <div class="post-detail">
                        <h5 class="font-normal">{{$ar->judul}}</a> <span>{{$ar->nama}} / {{$ar->tgl}}</h5>
                        <br>
                        {!! $ar->isi !!}
                        <ul class="tags margin-bottom-20">
                            <li>
                                <a href="https://api.whatsapp.com/send?text=https://podomorofeedmill.com/info/{{ $ar->link }}"
                                    class="btn btn-social-icon btn-yahoo" style="background:lightgreen;">
                                    <span class="fa fa-whatsapp"> </span>
                                </a>
                                Share Whatsapp
                            </li>
                        </ul>
                        <img class="img-responsive" src="images/share-img.jpg" alt="">
                    </div>
                </article>
                <div class="comments margin-top-80">
                    <h5 class="font-normal margin-bottom-40">Comments</h5>
                    <div class="fb-comments" data-href="https://podomorofeedmill.com/info/{{$ar->link}}"
                        data-width="90%" data-numposts="5">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="side-bar">
                    <h5 class="side-tittle">Artikel Lain </h5>
                    <ul class="papu-post">
                        @foreach ($de as $item)
                        <li class="media">
                            <div class="media-left"> <a href="{{route('info',['url'=>$item->link])}}"> <img
                                        class="media-object" src="{{asset('thumbs/sampul/'.$item->foto)}}" alt=""></a>
                            </div>
                            <div class="media-body"> <a class="media-heading"
                                    href="{{route('info',['url'=>$item->link])}}">{{$item->judul}}</a>
                                <p>{!! Str::words($item->deskripsi,20) !!} </p>
                            </div>
                        </li>
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