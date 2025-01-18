<!-- footer-area -->
<footer>
    <div class="footer-area footer-bg">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <div class="footer-logo">
                            <a href="{{ url("") }}" class="navbar-brand logo">
                                    <img src="{{ _img(asset_url('images/' . opt('logo'), 1), 200, 180, null, ['quality' => 100, 'func' => 'resize']) }}" alt="{{ opt('site_title') }}"/>
                                </a>
                            </div>
                            <div class="footer-content">
                                <p>Online to make your journey even more memorable access or meet</p>
                                @php($socials = json_decode(opt('social'), true))
                                @if(count($socials))
                                    <ul class="footer-social">
                                        @foreach ($socials as $social => $social_link)
                                            @if(!empty($social_link))
                                                <li>
                                                    <a target="_blank" href="{{ $social_link }}" title="{{ $social}}" class="{{ \Str::lower($social) }}-bg">
                                                        <i class="fa-brands  fa-{{ \Str::lower($social) }}" aria-label="{{ $social }}"></i>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    @php($block = \App\Theme::block('footer-links', true))
                    @if($block->id > 0)
                    <div class="col-xl-3 col-lg-4 col-md-6 bottom-widget">
                        <div class="footer-widget">
                            <div class="fw-title">
                                <h4 class="title">{{ $block->title }}</h4>
                            </div>
                            <div class="fw-link">
                                {!! do_shortcode($block->content) !!}
                            </div>
                        </div>
                    </div>
                    @endif

                    @php($block = \App\Theme::block('privacy-links', true))
                    @if($block->id > 0)
                    <div class="col-xl-3 col-lg-4 col-md-6 bottom-widget">
                        <div class="footer-widget privacy">
                            <div class="fw-title">
                                <h4 class="title">{{ $block->title }}</h4>
                            </div>
                            <div class="fw-link">
                                {!! do_shortcode($block->content) !!}
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="col-xl-3 col-lg-4 col-sm-8 bottom-widget">
                        <div class="footer-widget">
                            <div class="fw-title">
                                <h4 class="title">Contacts</h4>
                            </div>
                            <div class="footer-contact">
                                <p>{{ opt('address') }}</p>
                                <h2 class="title">
                                    <a href="tel:{{ opt('phone_number') }}">{{ opt('phone_number') }}</a>
                                </h2>
                                <a href="mailto:{{ opt('contact_email') }}">{{ opt('contact_email') }}</a>
                                <form action="{{ url("subscribers/subscribe") }}">
                                    <input type="email" name="email" placeholder="Enter your email">
                                    <button type="submit"><i class="flaticon-send"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="copyright-text">
                            <p>{!! do_shortcode(opt('copyright')) !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="cart-img text-end">
                            <img src="assets/img/cart.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->



@if(env('APP_ENV') == 'local')
     <!--script src="{{ media_url("js/jquery-3.6.0.min.js") }}"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="{{ media_url("slick/slick/slick.min.js") }}"></script> -->
    <script src="{{ media_url("js/bootstrap.min.js") }}"></script>
    <script src="{{ media_url("js/isotope.pkgd.min.js") }}"></script>
    <script src="{{ media_url("js/imagesloaded.pkgd.min.js") }}"></script>
    <script src="{{ media_url("js/jquery.magnific-popup.min.js") }}"></script>
    <script src="{{ media_url("js/jquery.odometer.min.js") }}"></script>
    <script src="{{ media_url("js/bootstrap-datepicker.min.js") }}"></script>
    <script src="{{ media_url("js/jquery.appear.js") }}"></script>
    <script src="{{ media_url("js/slick.min.js") }}"></script>
    <script src="{{ media_url("js/jquery-ui.min.js") }}"></script>
    <script src="{{ media_url("js/wow.min.js") }}"></script>
    <script src="{{ media_url("js/main.js") }}"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <!-- Required Javascript -->
    <!-- <script src="./js/main.js" ></script> -->
    
    <!--{{-- <script src="{{media_url('js/jquery.js')}}"></script> --}}-->
    <!--<script src="{{ media_url("custom/js/bootstrap.js") }}"></script>-->
    <!--<script src="{{ media_url("custom/js/bootstrap.min.js") }}"></script>-->
    <script src="{{media_url("js/moment.js")}}"></script>
    <script src="{{media_url("js/bootstrap-datepicker.js") }}"></script>
    <script src="{{media_url("js/bootstrap-datepaginator.js") }}"></script>
    <script src="{{media_url("js/notify.min.js") }}"></script>
@else
    <script src="{{ media_url("js/app.js") }}"></script>
@endif
@yield('scripts')

<script>
    //const CSRF_TOKEN = document.getElementById('csrf_token').getAttribute('content');
    const CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        }
    });
</script>
<script>
    $(document).ready(function() {
        	$("#baggage-btn").on('click' ,function() {
			// alert("CLICKED!");
			$("#baggage-main-content").toggle();
	});
    })
</script>
</body>
</html>
