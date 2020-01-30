<div class="offcanvas-menu offcanvas-effect">
    <div class="offcanvas-wrap">
        <div class="off-canvas-header">
            <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
                id="off-canvas-close-btn">&times;</button>
        </div>
        <ul id="offcanvasMenu" class="list-unstyled visible-xs visible-sm">           

            <!-- Home -->
            <li><a href="{{route('beranda')}}">Home</a></li>
            @foreach ($kt as $mn)
            @php
            $sub=DB::table('sub_kategoris')->where('idk',$mn->id)->get();
            $ceksub=DB::table('sub_kategoris')->where('idk',$mn->id)->count();
            @endphp
            <li><a href="#">{{$mn->kategori}}
                </a>
                @if ($ceksub>0)
                <!-- submenu-wrapper -->
                <ul>
                    @foreach ($sub as $sb)
                    <li><a href="{{route('subkategori',['sk'=>$sb->subkategori])}}">{{$sb->subkategori}}</a></li>
                    @endforeach
                </ul>
                <!-- /submenu-wrapper -->
                @endif
            </li>
            @endforeach
            <!-- /Home -->
        </ul>
        <div class="offcanvas-widgets hidden-sm hidden-xs">
            <div id="twitterWidget">
                <h2>Tweeter feed</h2>
                <div class="twitter-widget"></div>
            </div>
            <div class="newsletter-widget">
                <h2>Stay in Touch</h2>
                <p>Enter your email address to receive news &amp; offers from us</p>

                <form class="newsletter-form">
                    <div class="form-group">
                        <label class="sr-only" for="InputEmail1">Email address</label>
                        <input type="email" class="form-control" id="InputEmail2" placeholder="Your email address">
                        <button type="submit" class="btn">Send &nbsp;<i class="fa fa-angle-right"></i></button>
                    </div>
                </form>

            </div><!-- newsletter-widget -->
        </div>
    </div>
</div><!-- .offcanvas-menu -->