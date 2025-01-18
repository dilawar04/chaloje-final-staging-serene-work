<div class="section section-padding">
    <div class="container">
        <div class="row mbn-30">

            <!--Contact Information Start-->
            <div class="col-lg-4 col-12 mb-30">

                <div class="section-title section-title-left">
                    <h2 class="title">KEEP IN TOUCH</h2>
                </div>

                <!--Contact Information List Start-->
                <ul class="contact-info-list">
                    <li><i class="fa fa-map-marker"></i> {{ opt('address') }}&nbsp;</li>
                    <li><i class="fa fa-phone"></i> <a href="tel:{{ opt('phone_number') }}">{{ opt('phone_number') }}</a></li>
                    <li><i class="fa fa-envelope"></i> <a href="mailto:{{ opt('contact_email') }}">{{ opt('contact_email') }}</a></li>
                </ul>
                <!--Contact Information List End-->

                <!--Contact Socail Start-->
                <div class="footer-top-socail">
                    @php
                        $socials = json_decode(opt('social'), true);
                    @endphp
                    @foreach ($socials as $social => $social_link)
                        @if(!empty($social_link))
                            <a target="_blank" href="{{ $social_link }}" title="{{ $social}}">
                                <i class="fa fa-{{ \Str::lower($social) }}" aria-label="{{ $social }}"></i>
                            </a>
                        @endif
                    @endforeach
                </div>
                <!--Contact Socail End-->

            </div>
            <!--Contact Information End-->

            <!--Contact Form Start-->
            <div class="col-lg-8 col-12 mb-30">

                <div class="section-title section-title-left">
                    <h2 class="title">FULFIL THE FORM BELOW</h2>
                </div>

                <!--Comment Form Start-->
                <div class="contact-form">
                    <form method="post" action="{{  url("index/do_contact") }}">
                        @csrf
                        <div class="row mbn-10">
                            <div class="col-12 mb-10"><input type="text" name="name" placeholder="Your Name*"></div>
                            <div class="col-12 mb-10"><input type="email" name="email" placeholder="Your Email*"></div>
                            <div class="col-12 mb-10"><input type="text" name="phone" placeholder="Your Phone"></div>
                            <div class="col-12 mb-10"><textarea rows="10" name="message" placeholder="Case Details"></textarea></div>
                            <div class="col-12 mb-10"><input class="btn btn-primary w-100" type="submit" value="SUBMIT"></div>
                        </div>
                    </form>
                    <p class="form-message mt-15 d-none"></p>
                </div>
                <!--Comment Form End-->

            </div>
            <!--Contact Form End-->

        </div>
    </div>
</div>
