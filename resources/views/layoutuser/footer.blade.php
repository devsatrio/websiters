<!-- footer-widget-section start -->
<section class="footer-widget-section section-padding bg-dark">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 col-sm-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="footer-widget">
                            <h3>Motto {{$st->web}}</h3>
                            <p>{!! $st->motto !!}</p>
                        </div><!-- /.footer-widget -->
                    </div>
                </div>
            </div><!-- /.col-md-4 -->
            <div class="col-md-6 col-sm-6">
                <div class="panel">
                    <div class="panel-body">
                        <div class="footer-widget">
                            <h3>Tentang {{$st->web}}</h3>
                            <p>{!! $st->informasi !!}</p>
                        </div><!-- /.footer-widget -->
                    </div>
                </div>
            </div><!-- /.col-md-4 -->
            <div class="col-md-6 col-sm-6">
                <div class="panel">
                    <div class="panel-body">
                        <div class="footer-widget">
                            <h3>Temukan Kami Di Media Social</h3>
                            <span class="social-links">
                                <a href="https://api.whatsapp.com/send?phone={{$st->telp1}}"
                                    class="btn btn-social-icon btn-yahoo" style="background:lightgreen;">
                                    <span class="fa fa-whatsapp"></span>
                                </a>
                                <a href="{{$st->twitter}}" class="btn btn-social-icon btn-twitter">
                                    <span class="fa fa-twitter"></span>
                                </a>
                                <a href="{{$st->fb}}" class="btn btn-social-icon btn-facebook">
                                    <span class="fa fa-facebook"></span>
                                </a>
                                <a href="{{$st->ig}}" class="btn btn-social-icon btn-instagram">
                                    <span class="fa fa-instagram"></span>
                                </a>
                                <a href="{{$st->yt}}" class="btn btn-social-icon btn-pinterest">
                                    <span class="fa fa-youtube"></span>
                                </a>
                            </span>
                        </div><!-- /.footer-widget -->
                    </div>

                </div>

            </div><!-- /.col-md-4 -->

            <hr>
            <div class="col-md-12 col-sm-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="footer-widget">
                            {!! $st->map !!}
                        </div><!-- /.footer-widget -->
                    </div>
                </div>

            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->    
    <a href="https://api.whatsapp.com/send?phone={{$st->telp1}}"
        class="float">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
</section><!-- /.cta-section -->
<!-- footer-widget-section end -->