@extends('layoutuser.base')

@section('title')
{{$st->web}}
@endsection

@section('css')
@endsection

@section('content')


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
                <div class="btn-center margin-top-30 text-center">
                {{$gal->links()}}
                </div>
            </div>
           </div>
</section>
@endsection

@section('js')
@endsection