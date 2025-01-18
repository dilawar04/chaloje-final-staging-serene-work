@extends(\App\Theme::template())
@section('content')

 
 <!-- main-area -->
 <main>


<!-- contact-area -->
<section class="contact-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center mb-40">
                    <span class="sub-title">contact us now</span>
                    <h2 class="title">Write a Message</h2>
                </div>
                <div class="contact-form">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <input type="text" placeholder="Your Name *">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <input type="email" placeholder="Your Email *">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <input type="text" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <input type="number" placeholder="Your Mobile">
                                </div>
                            </div>
                        </div>
                        <div class="form-grp">
                            <textarea name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="submit-btn text-center">
                            <button type="submit" class="btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->

<!-- contact-map -->
<div id="contact-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14477.857384548255!2d67.0633535!3d24.882138!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf29b0864e9c83b50!2sChaloje%20Travel%20%26%20Tourism!5e0!3m2!1sen!2s!4v1672536055269!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
 </div>
<!-- contact-map-end -->
</main>
<!-- main-area-end -->


@endsection
{{-- Scripts --}}
@section('scripts')

@endsection
