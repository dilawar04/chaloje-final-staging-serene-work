@php($banners = \App\Banner::where(['status' => 'Active', 'type' => 'Static'])->get())

@if (count($banners) > 0)
<!-- slider-area -->
<section class="slider-area">
    <div class="slider-active">
        @foreach ($banners as $k => $banner)
        <div class="single-slider slider-bg" data-background="{{ asset_url("banners/{$banner->image}") }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10">
                        <div class="slider-content">
                            {!! do_shortcode($banner->description) !!}

                            @if(!empty($banner->link))
                                <a href="{{ $banner->link }}" class="btn btn-primary wow fadeInUp" data-wow-delay="1s">Learn More</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- slider-area-end -->
@endif
