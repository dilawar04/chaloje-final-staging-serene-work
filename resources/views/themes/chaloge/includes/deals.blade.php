@php($deals = \App\Deal::where('status', 'Active')->whereRaw('NOW() BETWEEN date_from AND date_to')->get())
@if(count($deals) > 0)
<section class="flight-offer-area">
    <div class="container">
        <div class="row align-items-center mb-35">
            <div class="col-md-8">
                <div class="section-title">
                    <span class="sub-title">Offer Deals</span>
                    <h2 class="title">Flight Offer Deals</h2>
                </div>
            </div>
            {{--<div class="col-md-4">
                <div class="best-price text-end">
                    <a href="booking-list.html">Best Price Guarantee <i class="flaticon-check"></i></a>
                </div>
            </div>--}}
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="flight-offer-item">
                    <div class="flight-offer-thumb">
                        <img src="{{ asset_url("deals/{$deals[0]->image}") }}" alt="{{ $deals[0]->title }}">
                    </div>
                    <div class="flight-offer-content">
                        <h2 class="title">{{ $deals[0]->title }}</h2>
                        <span>{{ $d_date = \Carbon\Carbon::parse($deals[0]->date_from)->format('d M Y') }} - {{ \Carbon\Carbon::parse($deals[0]->date_to)->format('d M Y') }}</span>
                        <p>{{ $deals[0]->type }}</p>
                        <h4 class="price">{{ number_format($deals[0]->amount) }}</h4>
                    </div>
                    <div class="overlay-content">
                        <h2 class="title">{{ $deals[0]->title }}</h2>
                        <span>{{ $d_date }}</span>
                        <p>{{ $deals[0]->type }}</p>
                        <h4 class="price">{{ number_format($deals[0]->amount) }}</h4>
                        <div class="content-bottom">
                            <a href="{{ url("deals/detail/" . Str::slug($deals[0]->title)) . "-" . $deals[0]->id }}" class="btn">Booking Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($deals) > 1)
                <div class="col-lg-6 col-md-10">
                    <div class="row">
                        @foreach($deals as $k => $deal)
                            @if($k == 0)
                                @continue
                            @endif
                            <div class="col-sm-6">
                                <div class="flight-offer-item offer-item-two">
                                    <div class="flight-offer-thumb">
                                        <img src="{{ asset_url("deals/{$deal->image}") }}" alt="{{ $deal->title }}">
                                    </div>
                                    <div class="flight-offer-content">
                                        <h2 class="title">{{ $deal->title }}</h2>
                                        <span>{{ $d_date = \Carbon\Carbon::parse($deal->date_from)->format('d M Y') }} - {{ \Carbon\Carbon::parse($deal->date_to)->format('d M Y') }}</span>
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
        </div>
    </div>
</section>
@endif
