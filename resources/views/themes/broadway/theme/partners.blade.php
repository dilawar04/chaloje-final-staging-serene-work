@php
    $rows = \App\Partner::where(['type' => 'Partner', 'status' => 'Active'])->orderByRaw('RAND()')->limit(10)->get();
@endphp

@if(count($rows) > 0)
<div class="testimonial-4 masterplan bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main-title">
                    <h1>Our Partner</h1>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="slick-slider-area">
                    <div class="row slick-carousel" data-slick='{"slidesToShow": 1, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                        @foreach($rows as $k => $row)
                        <div class="slick-slide-item">
                            <div class="testimonial-info">
                                <div class="user-section">
                                    <div class="mr-4">
                                        <a href="{{ $row->link }}">
                                            <img src="{{ _img(asset_url("partners/{$row->logo}"), 300, 300) }}" alt="{{ $row->name }}" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="user-name">
                                        <h5>{{ $row->name }}</h5>
                                        <p>{{ $row->tag_line }}</p>
                                    </div>
                                </div>
                                <div class="text">
                                    {!! do_shortcode($row->description) !!}
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
