@php
    $rows = \App\Testimonial::where(['status' => 'Active'])->orderBy('ordering')->get();
@endphp

@if (count($rows) > 0)
    <div class="testimonial-4 pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Main title -->
                    <div class="main-title">
                        <h1>Testimonials</h1>
                        <p>Gwadar was an overseas possession of Muscat and Oman from 1783 to 1958.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- Slick slider area start -->
                    <div class="slick-slider-area">
                        <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>

                            <!--Testimonial Start-->
                            @foreach($rows as $row)
                                <div class="slick-slide-item">
                                    <div class="testimonial-info">
                                        <div class="user-section">
                                            <div class="user-thumb">
                                                <img src="{{ _img(asset_url("testimonials/{$row->photo}"), 90, 90) }}" alt="{{ $row->name }}">
                                                <div class="icon">
                                                    <i class="fa fa-quote-right"></i>
                                                </div>
                                            </div>
                                            <div class="user-name">
                                                <h5>{{ $row->name }}</h5>
                                                <p>{{ $row->designation }}</p>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <p>{{ $row->testimonial }}</p>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
