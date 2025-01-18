@extends(\App\Theme::template())
@section('content')

<!-- breadcrumb-area -->
<section class="breadcrumb-area breadcrumb-bg"  style="margin-bottom: 100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-content text-center">
                    <h2 class="title">Deal Form</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url("") }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Deal Form</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->




    <div class="container">
        <div class='row'>
        <div class="col-lg-6">
            <img width="36%" 
style="position: absolute;
       margin-top: -7px;
       height: 359px;
       border-radius: 6px;" src="https://chaloge.businessfuelprovider.com/assets/img/bg-top.jpg" alt="back-top"  />
            <img width= "85%" 
style="z-index: 2 !important;
       position: relative;
       margin-left: -26px;
       border: solid 3px #ffc600;
       border-top-width: 16px;
       border-left-width: a;
       border-bottom-width: 10px;
       border-right: none;
       border-left-width: 27px;
       border-radius: 3px;
       margin-top: -22px;
       border-bottom: none;" src="{{ _img(asset_url("deals/{$deal->image}"), 260, 200) }}" alt="{{ $deal->title }}">
        </div>
        <div class="col-lg-6">
            <h2 class="title">{{ $deal->title }}</h2>
            <span>{{ $d_date = \Carbon\Carbon::parse($deal->date_from)->format('d M Y') . " - " . \Carbon\Carbon::parse($deal->date_to)->format('d M Y') }}</span>
            <p>{{ $deal->type }}</p>
            <h4 class="price">Rs. {{ number_format($deal->amount) }}/-</h4>
        </div>
</div>
        <div class="mt-5 deal-form">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form method="post" action="{{ url("deals/request") }}">
                        @csrf
                        <input type="hidden" name="deal_id" value="{{ $deal->id }}">
                        <div class="form-group my-1">
                            <div class="form">
                                <label>Title:</label>
                                <select id="title" name="title" class="form-select" aria-label="Default select example">
                                    <option value="MR">Mr.</option>
                                    <option value="MS">Ms.</option>
                                    <option value="MRS">Mrs.</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group my-1 ">
                            <label for="title">First Name:</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First name"/>
                        </div>
                        <div class="form-group my-1 ">
                            <label for="title">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last name">
                        </div>
                        <div class="for-group my-1">
                            <label for="title">Address:</label>
                            <textarea class="form-control" name="address" placeholder="Address" id="address" cols="30" rows="3"></textarea>
                        </div>
                        <div class="form-group my-1">
                            <label>Phone#:</label>
                            <input type="text" class="form-control" name="phone" placeholder="03XX-XXXXXXX7"/>
                        </div>
                        <div class="form-group my-1">
                            <label>CNIC#:</label>
                            <input type="text" class="form-control" name="cnic" placeholder="42201-XXXXXXX-2"/>
                        </div>
                        <div class="form-group my-1">
                            <label>No. of Travellers:</label>
                            <input type="number" class="form-control" name="travellers"/>
                        </div>
                        <br/>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
{{-- Scripts --}}
@section('scripts')

@endsection
