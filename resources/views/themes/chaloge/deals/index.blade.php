@extends(\App\Theme::template())
@section('content')
<!-- Banner -->
<section class="breadcrumb-area breadcrumb-bg" style="margin-bottom: 100px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-content text-center">
                    <h2 class="title">Deals</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url("") }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Deals</li>
                        </ol>
                    </nav>
                </div>
            </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- flight-offer-area -->
@if(count($rows) > 0)
    <div class="col-lg-6 col-md-10">
        <div class="row">
            @foreach($rows as $k => $deal)
                <div class="col-sm-6">
                    <div class="flight-offer-item offer-item-two">
                        <div class="flight-offer-thumb">
                            <img  src="{{ _img(asset_url("deals/{$deal->image}"), 260, 200) }}" alt="{{ $deal->title }}">
                        </div>
                        <div class="flight-offer-content">
                            <h2 class="title">{{ $deal->title }}</h2>
                            <span>{{ $d_date = \Carbon\Carbon::parse($deal->date_from)->format('d M Y') . " - " . \Carbon\Carbon::parse($deal->date_to)->format('d M Y') }}</span>
                            <p>{{ $deal->type }}</p>
                            <h4 class="price">{{ number_format($deal->amount) }}</h4>
                        </div>
                        <div class="overlay-content">
                            <h2 class="title">{{ $deal->title }}</h2>
                            <span>{{ $d_date }}</span>
                            <p>{{ $deal->type }}</p>
                            <h4 class="price">{{ number_format($deal->amount) }}</h4>
                            <div class="content-bottom">
                                <a href="{{ url("deals/detail/" . Str::slug($deal->title)) . "-" . $deal->id }}" class="btn">Booking Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
<!-- flight-offer-area-end -->


@endsection
{{-- Scripts --}}
@section('scripts')

@endsection
