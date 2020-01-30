<div id="main-carousel" class="carousel slide hero-slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach ($sl as $item)
        <li data-target="#main-carousel" data-slide-to="{{$item->id}}" @if ($item->selected=='y')
            class="active"
            @endif></li>
        @endforeach
        {{-- <li data-target="#main-carousel" data-slide-to="1"></li> --}}
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach ($sl as $it)
        <div @if ($it->selected=='y')
            class="item active"
            @else
            class="item"
            @endif>
            <img src="{{asset('slider/'.$it->nama)}}">
            <!--Slide Image-->
            <div class="container">
                <div class="carousel-caption">
                    @if ($it->deskripsi)
                    <h3 class="animated lightSpeedIn">{!! $it->deskripsi !!}</h3>
                    @endif
                    @if ($it->link)
                    <a class="btn btn-primary animated lightSpeedIn" href="{{$it->link}}">Lihat Lebih Lanjut</a>
                    @endif
                </div>
                <!--.carousel-caption-->
            </div>
            <!--.container-->
        </div>
        @endforeach       
    </div>
    <!--.carousel-inner-->

    <!-- Controls -->
    <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- #main-carousel-->