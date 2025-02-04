@extends(\App\Theme::template())
@section('content')

@php
    $outbound_session = session()->get('outbound');
    $inbound_session = session()->get('inbound');

    $flight = json_decode($outbound_session);
    $inbound_flight = json_decode($inbound_session);
    //dd($inbound_flight);
    $currency = 'PKR';
    $origin = \App\Airport::where('IATA_code', $flight->travelers->LocationDep)->select('IATA_code', 'airport', 'city', 'country')->first();
    $destination = \App\Airport::where('IATA_code', $flight->travelers->LocationArr)->select('IATA_code', 'airport', 'city', 'country')->first();

    $AirSerenemarkups = \DB::table('markups')->where(['airline' => 'Air Serene','status' => 'Active'])->get();

    $FlyJinnahmarkups = \DB::table('markups')->where(['airline' => 'Fly Jinnah','status' => 'Active'])->get();

    $Airsialmarkups = \DB::table('markups')->where(['airline' => 'Airsial','status' => 'Active'])->get();

    $Airbluemarkups = \DB::table('markups')->where(['airline' => 'Airblue','status' => 'Active'])->get();

    $FlightMarkups = $AirSerenemarkups->merge($FlyJinnahmarkups)->merge($Airsialmarkups)->merge($Airbluemarkups);

@endphp
  <!-- main-area -->
  <main>

  <!-- VALIDATIONS  -->
<!-- <script>
$(document).ready(function() {
    // Add a submit event handler to the form
    $(".passengers").submit(function(event) {
        // Validate NIC (National Identity Card) number
        var nicValue = $("input[class="form-control" name='adult[Cnic][]']").val();
        var nicPattern = /^[0-9]{5}-[0-9]{7}-[0-9]$/;

        if (!nicPattern.test(nicValue)) {
            alert("NIC format is invalid. Please use the format '44444-4444444-4'.");
            event.preventDefault();
            return;
        }

        // Validate Email
        var emailValue = $("#email").val();
        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailPattern.test(emailValue)) {
            alert("Invalid email format. Please enter a valid email address.");
            event.preventDefault();
            return;
        }

        // Validate Phone Number
        var phoneNumberValue = $("input[class="form-control" name='mobile']").val();
        var phoneNumberPattern = /^[0-9]{11}$/;

        if (!phoneNumberPattern.test(phoneNumberValue)) {
            alert("Invalid phone number format. Please enter a valid 11-digit phone number.");
            event.preventDefault();
            return;
        }
    });
});
</script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script> -->

<!-- breadcrumb-area -->


<section class="breadcrumb-area breadcrumb-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-content text-center">
                    <h2 class="title">Booking Details</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url("") }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- customer-details-area -->
<section class="customer-details-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="customer-details-content">
                    <div class="icon">
                        <img src="https://s3.ap-south-1.amazonaws.com/st-airline-images/<?php echo $flight->flight->AIRLINE_CODE;?>.png" alt="<?php echo $flight->flight->AIRLINE_CODE;?>" height="115">
                    </div>
                    <?php if($inbound_flight->flight->AIRLINE_CODE){ ?>
                    <div class="icon">
                        <img src="https://s3.ap-south-1.amazonaws.com/st-airline-images/<?php echo $inbound_flight->flight->AIRLINE_CODE;?>.png" alt="<?php echo $flight->flight->AIRLINE_CODE;?>" height="115">
                    </div>
                    <?php } ?>
                    <div class="content">

                        <h2 class="title">Customer Details: Please fill in with valid information.</h2>
                        <div class="customer-progress-wrap">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="customer-progress-step">
                                <ul>
                                    <li>
                                        <span>1</span>
                                        <p>Guest Information</p>
                                    </li>
                                    <li>
                                        <span>2</span>
                                        <p>Payment</p>
                                    </li>
                                    <li>
                                        <span>3</span>
                                        <p>Confirmation</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .seat-available-flyjinnah{
        background-color: rgb(211, 173, 247);
        width: 34px;
        height: 34px;
        border-radius: 4px;
        display: block;
    }
    .seat-unavailable-flyjinnah{
        background-color: rgb(189 182 194);
        width: 34px;
        height: 34px;
        border-radius: 4px;
        display: block;
    }
    .number-of-count-seat-flyjinnah{
        font-size: 15px;
        position: absolute;
        width: 3%;
        font-weight: 400;
        margin-left: 46%;
    }
    .number-of-count-relative{
        position: relative;
    }
    .available-seat-show,.unavailable-seat-show,.selected-seat-show{
        background-color: rgb(211, 173, 247);
        height: 34px;
        /*border-radius: 4px;*/
        display: block;
        margin-bottom: 25px;
        letter-spacing: 3px;
        padding: 5px;
    }
    .unavailable-seat-show{
        background-color: rgb(189 182 194);
    }
    .selected-seat-show{
        background-color: #ffa903;
    }
    .seat-available-flyjinnah.selected{
        background: #ffa903;
    }
    .container.scrool {
        max-height: 250px;
        overflow-y: auto;
        direction: ltr;
        scrollbar-color: #d4aa70 #e4e4e4;
        scrollbar-width: thin;
        overflow-x: hidden !important;
        margin:5px;
    }
    .container.scrool::-webkit-scrollbar {
        width: 15px;
    }

    .container.scrool::-webkit-scrollbar-track {
        background-color: #e4e4e4;
        border-radius: 100px;
    }
    .container.scrool::-webkit-scrollbar-thumb {
        border-radius: 100px;
        background-image: linear-gradient(180deg, #d0368a 0%, #708ad4 99%);
        box-shadow: inset 2px 2px 5px 0 rgba(#fff, 0.5);
    }
    .flyjinnah-meal-img{
        float: left;
        height: 110px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        background-color: #fff;
    }
    .passenger-seat.col-sm-2.col-md-2 {
        margin: 5px;
    }

    /* assign meal */
    p.assign-meal {
        text-align: center;
        font-size: 20px;
        font-weight: 500;
    }
    .meal-modal {
        justify-content: space-between;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .meal-modal-btn {
        width: 15%;
        justify-content: center;
    }
    .meal-modal-btn:hover {
        background:-webkit-linear-gradient(top, #fc7c44 0%,#cf480d 100%);
        color:#fff;
    }

    .meal-modal-btn.selected{
        background: #fff1f0 !important;
        color: #f5222d !important;
    }

    .popover-body {
        overflow-y: scroll;
        height: 200px;
    }

    /* modal */
    /* The Modal (background) */
.modal {
  margin-top:35px;
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
    /* .selected-this-meal{
        zoom: 85%;
        border: 1px solid #000;
        border-radius: 10px;
        margin: 15px 0px;
        padding: 10px 0px;
    } */
    /* flyjinnah outbound inbound btn css */
    button.flyjinnahoutboundancillary,button.flyjinnahinboundancillary {
        background: linear-gradient(169deg, rgb(255 222 0 / 58%) 0%, rgb(255 140 0 / 77%) 100%);
        border-radius: 4px;
        margin-bottom: 0px;
        padding: 5px;
        font-weight: 500;
        color: #fff;
        width: 100px;
        border: none;
    }
    button.flyjinnahinboundancillary.added,button.flyjinnahoutboundancillary.added{
        background: linear-gradient(169deg, rgb(255, 222, 0) 0%, rgb(255, 140, 0) 100%) !important;
        padding: 7px !important;
    }
    .passenger-seat{
        background-color: rgb(211, 173, 247);
        border-radius: 4px;
        margin-bottom: 0px;
        padding: 5px;
        font-weight: 500;
        color: rgb(255, 255, 255);
    }
    .passenger-seat.selected{
        background-color: rgb(87, 17, 47);
    }
</style>
<!-- customer-details-area-end -->
<!-- booking-details-area -->

<!-- test start -->
<?php
// if(){
//     echo 'adasdsadas';
//     exit;
// }
// dd(session()->get('outboundflyjinnahseatavailablity'));




?>
<div class="container text-end">
    @if(session()->get($flight->type.'flyjinnahseatavailablity') && session()->get($inbound_flight->type.'flyjinnahseatavailablity'))
    <button type="button" class="flyjinnahoutboundancillary flight-dest added" data-dep-arr="{{$flight->travelers->LocationDep}}-{{$flight->travelers->LocationArr}}">{{$flight->travelers->LocationDep}} to {{$flight->travelers->LocationArr}}</button>
    <button type="button" class="flyjinnahinboundancillary flight-dest" data-dep-arr="{{$flight->travelers->LocationArr}}-{{$flight->travelers->LocationDep}}">{{$flight->travelers->LocationArr}} to {{$flight->travelers->LocationDep}}</button>
    @elseif(session()->get($flight->type.'flyjinnahseatavailablity'))
    <button type="button" class="flyjinnahoutboundancillary flight-dest added" data-dep-arr="{{$flight->travelers->LocationDep}}-{{$flight->travelers->LocationArr}}">{{$flight->travelers->LocationDep}} to {{$flight->travelers->LocationArr}}</button>
    @elseif(session()->get($inbound_flight->type.'flyjinnahseatavailablity'))
    <button type="button" class="flyjinnahinboundancillary flight-dest added" data-dep-arr="{{$flight->travelers->LocationArr}}-{{$flight->travelers->LocationDep}}">{{$flight->travelers->LocationArr}} to {{$flight->travelers->LocationDep}}</button>
    @endif
</div>
@if($flight->airline == 'fly-jinnah')

@php
$seatavailablity = session()->get($flight->type.'flyjinnahseatavailablity');
$AirRow = $seatavailablity->Body->OTA_AirSeatMapRS->SeatMapResponses->SeatMapResponse->SeatMapDetails->CabinClass->AirRows->AirRow;

$Mealavailablity = session()->get($flight->type.'flyjinnahMealavailablity');
$mealavail = $Mealavailablity->Body->AA_OTA_AirMealDetailsRS->MealDetailsResponses->MealDetailsResponse->Meal;
@endphp

<section class="booking-details-area flyjinnahoutboundancillary" data-dep-arr="{{$flight->travelers->LocationDep}}-{{$flight->travelers->LocationArr}}">
    <div class="container">
        <div class="row justify-content-center">


            <!-- seats -->
            <div class="col-sm-12 col-md-12">
                <div class="primary-contact justify-content-between">
                    <div class="d-flex">
                        <img src="https://cdn-user-icons.flaticon.com/123215/123215648/1704094536962.svg?token=exp=1704095473~hmac=e449ba793d80fabbb606c25ffc9fddc1" height="30">
                        <h2 class="title">Select passenger from the list below</h2>
                    </div>
                </div>
                <div class="booking-details-wrap">
                    <div class="container">
                        <div class="row d-flex justify-content-around text-center">
                            @php
                                $adults = intval(request()->AdultNo);
                                $InfantNos = intval(request()->InfantNo);
                                $ChildNos = intval(request()->ChildNo);

                                $dest = "{$flight->travelers->LocationDep}-{$flight->travelers->LocationArr}";
                            @endphp
                            @for ($i = 1; $i <= $adults; $i++)
                                @if($i <= $adults)
                                <div class='passenger-seat col-sm-2 col-md-2 {{ ($i == 1 ? 'selected' : '') }}' data-passenger="adult" data-passenger_id="{{$i}}" data-no-passenger="adult-{{$i}}" data-seat_number="" data-dep-arr="{{ $dest }}" data-toggle='tooltip' data-placement='top' title='Adult'>
                                <span class="seat-booking" >Adult {{$i}}</span></div>
                                @else(!($i <= $InfantNos))
                                <div class='passenger-seat col-sm-2 col-md-2' data-passenger="adult-with-infant" data-passenger_id="{{$i}}" data-no-passenger="adult-with-infant-{{$i}}" data-seat_number="" data-dep-arr="{{ $dest }}" data-toggle='tooltip' data-placement='top' title='Adult with Infant'>
                                <span class="seat-booking">Adult  With Infant</span></div>
                                @endif
                            @endfor
                            @for ($i = 1; $i <= $ChildNos; $i++)
                                <div class='passenger-seat col-sm-2 col-md-2' data-passenger="child" data-passenger_id="{{$i}}" data-no-passenger="child-{{$i}}" data-seat_number="" data-dep-arr="{{ $dest }}" data-toggle='tooltip' data-placement='top' title='Child'>
                                <span class="seat-booking">Child {{$i}}</span></div>
                            @endfor
                        </div>
                    </div>

                    <div class="container scrool">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- end seats -->




            <div class="col-sm-6 col-md-6">
                <div class="primary-contact justify-content-between">
                    <div class="d-flex">
                        <image src="https://cdn-user-icons.flaticon.com/123215/123215648/1704094536962.svg?token=exp=1704095473~hmac=e449ba793d80fabbb606c25ffc9fddc1" height="30px">
                        <h2 class="title">Select seats for your trip</h2>
                    </div>
                </div>
                <div class="booking-details-wrap">
                    <div class="container">
                        <div class="row d-flex justify-content-around text-center">
                            <div class="col-sm-4 col-md-4 available-seat-show" data-toggle="tooltip" data-placement="top" title="Availables Seat">
                            Availables Seat</div>
                            <div class="col-sm-4 col-md-4 unavailable-seat-show" data-toggle="tooltip" data-placement="top" title="Occupied">
                            Occupied</div>
                            <div class="col-sm-4 col-md-4 selected-seat-show" data-toggle="tooltip" data-placement="top" title="Selected Seat">
                            Selected Seat</div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="row text-center">
                                    <div class="col-sm-2 col-md-2">
                                        A
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        B
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        C
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        D
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        E
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        F
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container scrool">
                        <div class="row">
                            @foreach($AirRow as $AirRowkey => $AirRow)
                            @if($flight->baggage->title == 'Value')
                                @if($AirRowkey > 6)
                                    @php
                                        $freeseat = 'free';
                                    @endphp
                                @endif
                                @if($AirRowkey == 10 || $AirRowkey == 11)
                                    @php
                                        $freeseat = '';
                                    @endphp
                                @endif
                            @endif
                            @if($flight->baggage->title == 'Ultimate')
                                @php 
                                    $freeseat = 'free'; 
                                @endphp 
                            @endif

                            @php
                                $AirRowkey++;
                                $AirSeat = $AirRow->AirSeats->AirSeat;

                                $dest = "{$flight->travelers->LocationDep}-{$flight->travelers->LocationArr}";
                            @endphp
                            <div class="col-sm-12 col-md-12 p-2">
                                <div class="row d-flex justify-content-around">
                                    <div class="number-of-count-relative">
                                        <span class="number-of-count-seat-flyjinnah">{{$AirRowkey}}<span>
                                    </div>
                                    @foreach($AirSeat as $key => $AirSeat)
                                        @foreach($AirSeat as $key => $AirSeat)
                                            @if(request()->InfantNo && $AirRowkey == 1 && $AirSeat->SeatNumber == 'A')
                                            <div class="col-sm-2 col-md-2 seat-unavailable-flyjinnah" data-toggle="tooltip" data-placement="top" title="Already Reserved" seat-number="{{$AirRowkey.$AirSeat->SeatNumber}}" data-dep-arr="{{ $dest }}">
                                            </div>
                                            @else
                                            <div class="col-sm-2 col-md-2 <?= $AirSeat->SeatAvailability == 'VAC' ? 'seat-available-flyjinnah' : 'seat-unavailable-flyjinnah' ?>" data-toggle="tooltip" data-placement="top" title="<?php if($freeseat){echo $freeseat;}else{echo $AirSeat->SeatAvailability == 'VAC' ? $AirSeat->SeatCharacteristics : 'Already Reserved';} ?>" seat-number="{{$AirRowkey.$AirSeat->SeatNumber}}" data-no-passenger="" data-dep-arr="{{ $dest }}" data-amount="{{ $AirSeat->SeatCharacteristics }}">
                                            </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="primary-contact justify-content-between">
                    <div class="d-flex">
                        <image src="https://cdn-user-icons.flaticon.com/123215/123215648/1704095299865.svg?token=exp=1704096204~hmac=9caa34073f20b2bd7fdbf3bd2055d03a" height="30px" style="margin-right: 10px;">
                        <h2 class="title">Select meals for your trip</h2>
                    </div>
                </div>
                <div class="booking-details-wrap">

                    <div id="mealModal-{{ $dest }}" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">


                            <div>
                                <span class="close">&times;</span>
                                <p class="assign-meal" data-assign-meal="">Assign meal</p>
                            </div>


                            @for ($i = 1; $i <= $adults; $i++)
                                @if($i <= $adults)
                                <div class="d-flex meal-modal">
                                    <p data-meal-passenger="Adult {{$i}}" data-meal-booking="adult-{{$i}}" data-dep-arr="{{ $dest }}">Adult {{$i}} </p>
                                    <button type="button" class="btn btn-primary meal-modal-btn">Select</button>
                                </div>
                                @else(!($i <= $InfantNos))
                                <div class="d-flex meal-modal">
                                    <p data-meal-passenger="Adult {{$i}}" data-meal-booking="adult-{{$i}}" data-dep-arr="{{ $dest }}">Adult with Infant{{$i}} </p>
                                    <button type="button" class="btn btn-primary meal-modal-btn">Select</button>
                                </div>
                                @endif
                            @endfor
                            @for ($i = 1; $i <= $ChildNos; $i++)
                                <div class="d-flex meal-modal">
                                    <p data-meal-passenger="Child {{$i}}" data-meal-booking="child-{{$i}}" data-dep-arr="{{ $dest }}">Child {{$i}} </p>
                                    <button type="button" class="btn btn-primary meal-modal-btn">Select</button>
                                </div>

                            @endfor




                        </div>

                    </div>

                    <div class="container scrool meal-scroll" style="max-height: 333px !important;">
                        @foreach($mealavail as $key => $mealavail)

                        <div class="row">
                            <div class="col-md-4">
                                @if(isset($mealavail->mealImageLink) && strpos($mealavail->mealImageLink, 'https://objectstorage') === 0)
                                <img class="flyjinnah-meal-img" src="{{$mealavail->mealImageLink}}" alt="{{$mealavail->mealImageLink}}">
                                @else
                                    <img class="flyjinnah-meal-img" src="{{ asset_url('images/Meal_Iconf_optimized.png') }}" alt="{{$mealavail->mealImageLink}}">
                                @endif
                            </div>
                            <div class="col-md-5">
                                {{$mealavail->mealName}}
                                <span><br>PKR {{$mealavail->mealCharge}}</span>
                            </div>
                            <div class="col-md-3">
                                <input type="number" placeholder="quantity" class="form-control num" data-meal-code="{{$mealavail->mealCode}}" data-meal-title="{{$mealavail->mealName}}" data-meal-price="{{$mealavail->mealCharge}}" name="meal_limit" max="1">
                                <button type="button" class="form-control meal-btn meal-popover {{$mealavail->mealCode}}" style="font-size: 8px;font-weight: 700;" id="">Select This Meal</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if($inbound_flight->airline == 'fly-jinnah')

@php
$seatavailablity = session()->get($inbound_flight->type.'flyjinnahseatavailablity');
$AirRow = $seatavailablity->Body->OTA_AirSeatMapRS->SeatMapResponses->SeatMapResponse->SeatMapDetails->CabinClass->AirRows->AirRow;

$Mealavailablity = session()->get($inbound_flight->type.'flyjinnahMealavailablity');
$mealavail = $Mealavailablity->Body->AA_OTA_AirMealDetailsRS->MealDetailsResponses->MealDetailsResponse->Meal;
@endphp

<section class="booking-details-area flyjinnahinboundancillary" data-dep-arr="{{$flight->travelers->LocationArr}}-{{$flight->travelers->LocationDep}}">
    <div class="container">
        <div class="row justify-content-center">


            <!-- seats -->
            <div class="col-sm-12 col-md-12">
                <div class="primary-contact justify-content-between">
                    <div class="d-flex">
                        <image src="https://cdn-user-icons.flaticon.com/123215/123215648/1704094536962.svg?token=exp=1704095473~hmac=e449ba793d80fabbb606c25ffc9fddc1" height="30px">
                        <h2 class="title">Select passenger from the list below</h2>
                    </div>
                </div>
                <div class="booking-details-wrap">
                    <div class="container">
                        <div class="row d-flex justify-content-around text-center">
                            @php
                                $adults = intval(request()->AdultNo);
                                $InfantNos = intval(request()->InfantNo);
                                $ChildNos = intval(request()->ChildNo);

                                $dest = "{$flight->travelers->LocationArr}-{$flight->travelers->LocationDep}";
                            @endphp
                            @for ($i = 1; $i <= $adults; $i++)
                                @if($i <= $adults)
                                    <div class='passenger-seat col-sm-2 col-md-2 {{ ($i == 1 ? 'selected' : '') }}' data-passenger="adult" data-passenger_id="{{$i}}" data-no-passenger="adult-{{$i}}" data-seat_number="" data-dep-arr="{{ $dest }}" data-toggle='tooltip' data-placement='top' title='Adult'>
                                        <span class="seat-booking" >Adult {{$i}}</span></div>
                                @else(!($i <= $InfantNos))
                                    <div class='passenger-seat col-sm-2 col-md-2' data-passenger="adult-with-infant" data-passenger_id="{{$i}}" data-no-passenger="adult-with-infant-{{$i}}" data-seat_number="" data-dep-arr="{{ $dest }}" data-toggle='tooltip' data-placement='top' title='Adult with Infant'>
                                        <span class="seat-booking">Adult  With Infant</span></div>
                                @endif
                            @endfor
                            @for ($i = 1; $i <= $ChildNos; $i++)
                                <div class='passenger-seat col-sm-2 col-md-2' data-passenger="child" data-passenger_id="{{$i}}" data-no-passenger="child-{{$i}}" data-seat_number="" data-dep-arr="{{ $dest }}" data-toggle='tooltip' data-placement='top' title='Child'>
                                    <span class="seat-booking">Child {{$i}}</span></div>
                            @endfor
                        </div>
                    </div>

                    <div class="container scrool">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- end seats -->




            <div class="col-sm-6 col-md-6">
                <div class="primary-contact justify-content-between">
                    <div class="d-flex">
                        <image src="https://cdn-user-icons.flaticon.com/123215/123215648/1704094536962.svg?token=exp=1704095473~hmac=e449ba793d80fabbb606c25ffc9fddc1" height="30px">
                        <h2 class="title">Select seats for your trip</h2>
                    </div>
                </div>
                <div class="booking-details-wrap">
                    <div class="container">
                        <div class="row d-flex justify-content-around text-center">
                            <div class="col-sm-4 col-md-4 available-seat-show" data-toggle="tooltip" data-placement="top" title="Availables Seat">
                            Availables Seat</div>
                            <div class="col-sm-4 col-md-4 unavailable-seat-show" data-toggle="tooltip" data-placement="top" title="Occupied">
                            Occupied</div>
                            <div class="col-sm-4 col-md-4 selected-seat-show" data-toggle="tooltip" data-placement="top" title="Selected Seat">
                            Selected Seat</div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="row text-center">
                                    <div class="col-sm-2 col-md-2">
                                        A
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        B
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        C
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        D
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        E
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        F
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container scrool">
                        <div class="row">
                            @foreach($AirRow as $AirRowkey => $AirRow)
                            @php
                                $AirRowkey++;
                                $AirSeat = $AirRow->AirSeats->AirSeat;

                                $dest = "{$flight->travelers->LocationArr}-{$flight->travelers->LocationDep}";
                            @endphp
                            <div class="col-sm-12 col-md-12 p-2">
                                <div class="row d-flex justify-content-around">
                                    <div class="number-of-count-relative">
                                        <span class="number-of-count-seat-flyjinnah">{{$AirRowkey}}<span>
                                    </div>
                                    @foreach($AirSeat as $key => $AirSeat)
                                        @foreach($AirSeat as $key => $AirSeat)
                                            @if(request()->InfantNo && $AirRowkey == 1 && $AirSeat->SeatNumber == 'A')
                                            <div class="col-sm-2 col-md-2 seat-unavailable-flyjinnah" data-toggle="tooltip" data-placement="top" title="Already Reserved" seat="" seat-number="{{$AirRowkey.$AirSeat->SeatNumber}}" data-dep-arr="{{ $dest }}">
                                            </div>
                                            @else
                                            <div class="col-sm-2 col-md-2 <?= $AirSeat->SeatAvailability == 'VAC' ? 'seat-available-flyjinnah' : 'seat-unavailable-flyjinnah' ?>" data-toggle="tooltip" data-placement="top" title="<?= $AirSeat->SeatAvailability == 'VAC' ? $AirSeat->SeatCharacteristics : 'Already Reserved' ?>" seat="" seat-number="{{$AirRowkey.$AirSeat->SeatNumber}}" data-no-passenger="" data-dep-arr="{{ $dest }}" data-amount="{{ $AirSeat->SeatCharacteristics }}">
                                            </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="primary-contact justify-content-between">
                    <div class="d-flex">
                        <image src="https://cdn-user-icons.flaticon.com/123215/123215648/1704095299865.svg?token=exp=1704096204~hmac=9caa34073f20b2bd7fdbf3bd2055d03a" height="30px" style="margin-right: 10px;">
                        <h2 class="title">Select meals for your trip</h2>
                    </div>
                </div>
                <div class="booking-details-wrap">

                    <div id="mealModal-{{ $dest }}" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">


                            <div>
                                <span class="close">&times;</span>
                                <p class="assign-meal" data-assign-meal="">Assign meal</p>
                            </div>


                            @for ($i = 1; $i <= $adults; $i++)
                                @if($i <= $adults)
                                <div class="d-flex meal-modal">
                                    <p data-meal-passenger="Adult {{$i}}" data-meal-booking="adult-{{$i}}" data-dep-arr="{{ $dest }}">Adult {{$i}} </p>
                                    <button type="button" class="btn btn-primary meal-modal-btn">Select</button>
                                </div>
                                @else(!($i <= $InfantNos))
                                <div class="d-flex meal-modal">
                                    <p data-meal-passenger="Adult {{$i}}" data-meal-booking="adult-{{$i}}" data-dep-arr="{{ $dest }}">Adult with Infant{{$i}} </p>
                                    <button type="button" class="btn btn-primary meal-modal-btn">Select</button>
                                </div>
                                @endif
                            @endfor
                            @for ($i = 1; $i <= $ChildNos; $i++)
                                <div class="d-flex meal-modal">
                                    <p data-meal-passenger="Child {{$i}}" data-meal-booking="child-{{$i}}" data-dep-arr="{{ $dest }}">Child {{$i}} </p>
                                    <button type="button" class="btn btn-primary meal-modal-btn">Select</button>
                                </div>

                            @endfor




                        </div>

                    </div>

                    <div class="container scrool meal-scroll" style="max-height: 333px !important;">
                        @foreach($mealavail as $key => $mealavail)

                        <div class="row">
                            <div class="col-md-4">
                                @if(isset($mealavail->mealImageLink) && strpos($mealavail->mealImageLink, 'https://objectstorage') === 0)
                                    <img class="flyjinnah-meal-img" src="{{$mealavail->mealImageLink}}" alt="{{$mealavail->mealImageLink}}">
                                @else
                                    <img class="flyjinnah-meal-img" src="{{ asset_url('images/Meal_Iconf_optimized.png') }}" alt="{{$mealavail->mealImageLink}}">
                                @endif
                            </div>
                            <div class="col-md-5">
                                {{$mealavail->mealName}}
                                <span><br>PKR {{$mealavail->mealCharge}}</span>
                            </div>
                            <div class="col-md-3">
                                <input type="number" placeholder="quantity" class="form-control num" data-meal-code="{{$mealavail->mealCode}}" data-meal-title="{{$mealavail->mealName}}" data-meal-price="{{$mealavail->mealCharge}}" name="meal_limit" max="1">
                                <button type="button" class="form-control meal-btn meal-popover {{$mealavail->mealCode}}" style="font-size: 8px;font-weight: 700;" id="">Select This Meal</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12 text-center mb-5">
                  <button class="btn btn-success next-to-calc">Next</button>
              </div>
          </div>
      </div>
<!-- test end -->

<section class="booking-details-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-73">
                <div class="primary-contact justify-content-between">
                    <div class="d-flex">
                        <i class="fa-regular fa-user"></i>
                        <h2 class="title">Passenger 1: Ms (Primary Contact)</h2>
                    </div>
                    <h2 class="title" id="timer" style="font-size: 15px;">Time Left: <span id="time-left"></span></h2>
                </div>
                <div class="booking-details-wrap">
                    <form action="#" method="post" class="row g-3 needs-validation passengers" novalidate>
                        <input type="hidden" name="outboundBundlerServiceId" value="{{session()->get('outboundBundlerServiceId')}}">
                        <input type="hidden" name="inboundBundlerServiceId" value="{{session()->get('inboundBundlerServiceId')}}">

                        <input type="hidden" name="totalseatbooking" id="totalseatbooking">
                        <input type="hidden" name="totalmealbooking" id="totalmealbooking">
                        <div id="seat_meal_inputs"></div>

                        @for($i = 1; $i <= request('AdultNo'); $i++)
                        <div class="form-heading">
                            <h3><i class="fa-sharp fa-solid fa-circle-user"></i> Adult: {{ $i }}</h3>
                        </div>
                        <ul>
                            <li>
                                <div class="form-grp">
                                    <div class="icon">
                                        <i class="flaticon-user-1"></i>
                                    </div>
                                    <div class="form">
                                        <select id="title" id="validationTitle" class="form-control" name="adult[Title][]" class="form-select" aria-label="Default select example">
                                            @if($flight->airline == 'airblue')
                                                <option value="Mr">Mr.</option>
                                                <option value="Mrs">Mrs.</option>
                                                <option value="Ms">Ms.</option>
                                            @else
                                                <option value="MR">Mr.</option>
                                                <option value="MRS">Mrs.</option>
                                                <option value="MS">Ms.</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-grp">
                                <input type="text" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" id="validationFirstName" class="form-control" name="adult[Firstname][]" placeholder="First Name" required />
                                </div>
                            </li>
                            <li>
                                <div class="form-grp">
                                    <input type="text" pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Please enter on alphabets only. ')" id="validationLastName" class="form-control" name="adult[Lastname][]" placeholder="Last Name *" required />
                                </div>
                            </li>
                        </ul>

                        <div class="gender-select">
                            <h2 class="title">Confirm Your Personal Info*</h2>
                            <ul>
                                <li class="active"><i class="flaticon-little-kid"></i> Male</li>
                                <li><i class="flaticon-little-girl"></i> Female</li>
                            </ul>
                        </div>
                       <div class="form-grp">
    <div class="icon">
        <i class="flaticon-globe-1"></i>
    </div>
    <div class="form" style="border: none;">
        <label for="email">Your NIC NO.</label>
        <input id="validationNic" type="text" class="form-control" name="adult[Cnic][]" data-inputmask="'mask': '99999-9999999-9'" placeholder="44444-4444444-4" required />
    </div>
</div>
                        <div class="form-grp">
                            <div class="icon">
                                <i class="flaticon-calendar"></i>
                            </div>
                            <div class="form">
                                <label for="shortBy">Date of Birth</label>
                                <input id="validationDOB" type="date" class="form-control validationDOBAdult" name="adult[Dob][]" class="date" placeholder="Select Date" required />
                            </div>
                        </div>
                        <hr style="border: solid 1px grey;" />
                        @endfor

                        @for($i = 1; $i <= request('ChildNo'); $i++)
                            <div class="form-heading">
                                <h3><i class="fa-solid fa-child"></i> Child: {{ $i }}</h3>
                            </div>
                            <ul>
                                <li>
                                    <div class="form-grp">
                                        <div class="icon">
                                            <i class="flaticon-user-1"></i>
                                        </div>
                                        <div class="form">
                                            <select id="validationTitle" id="title" class="form-control" name="child[Title][]" class="form-select" aria-label="Default select example">
                                            @if($flight->airline == 'air-serene')
                                                <option value="MR">Mr.</option>
                                                <option value="MISS">Miss.</option>
                                            @elseif($flight->airline == 'airsial')
                                                <option value="MR">Mstr.</option>
                                                <option value="MISS">Miss.</option>
                                            @else
                                                <option value="MSTR">Mstr.</option>
                                                <option value="MISS">Miss.</option>
                                            @endif
                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-grp">
                                        <input type="text" id="validationFirstName" class="form-control" name="child[Firstname][]" placeholder="First Name" required/>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-grp">
                                        <input type="text" id="validationLastName" class="form-control" name="child[Lastname][]" placeholder="Last Name *" required />
                                    </div>
                                </li>
                            </ul>
                            <div class="gender-select">
                                <h2 class="title">Confirm Gender*</h2>
                                <ul>
                                    <li class="active"><i class="flaticon-little-kid"></i> Male</li>
                                    <li><i class="flaticon-little-girl"></i> Female</li>
                                </ul>
                            </div>
                            <div class="form-grp">
                                <div class="icon">
                                    <i class="flaticon-calendar"></i>
                                </div>
                                <div class="form">
                                    <label for="shortBy">Date of Birth</label>
                                    <input id="validationDOB" type="date" class="form-control validationDOBChild" name="child[Dob][]" class="date" placeholder="Select Date" required />
                                </div>
                            </div>
                            <hr style="border: solid 1px grey;" />
                        @endfor

                        @for($i = 1; $i <= request('InfantNo'); $i++)
                            <div class="form-heading">
                                <h3><i class="fa-solid fa-baby-carriage"></i> Infant: {{ $i }}</h3>
                            </div>
                            <ul>
                                <li>
                                    <div class="form-grp">
                                        <div class="icon">
                                            <i class="flaticon-user-1"></i>
                                        </div>
                                        <div class="form">
                                            <select id="title" id="validationTitle" class="form-control" name="infant[Title][]" class="form-select" aria-label="Default select example">
                                            @if($flight->airline == 'air-serene')
                                                <option value="MR">Mr.</option>
                                                <option value="MISS">Miss.</option>
                                            @elseif($flight->airline == 'airsial')
                                                <option value="MR">Mstr.</option>
                                                <option value="MISS">Miss.</option>
                                            @else
                                                <option value="MSTR">Mstr.</option>
                                                <option value="MISS">Miss.</option>
                                            @endif
                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-grp">
                                        <input type="text" id="validationFirstName" class="form-control" name="infant[Firstname][]" placeholder="First Name" required />
                                    </div>
                                </li>
                                <li>
                                    <div class="form-grp">
                                        <input type="text" id="validationLastName" class="form-control" name="infant[Lastname][]" placeholder="Last Name *" required />
                                    </div>
                                </li>
                            </ul>
                            <div class="gender-select">
                                <h2 class="title">Confirm Gender*</h2>
                                <ul>
                                    <li class="active"><i class="flaticon-little-kid"></i> Male</li>
                                    <li><i class="flaticon-little-girl"></i> Female</li>
                                </ul>
                            </div>
                            <div class="form-grp">
                                <div class="icon">
                                    <i class="flaticon-calendar"></i>
                                </div>
                                <div class="form">
                                    <label for="shortBy">Date of Birth</label>
                                    <input id="validationDOB" type="date" class="form-control validationDOBInfant" name="infant[Dob][]" class="date" placeholder="Select Date" required />
                                </div>
                            </div>
                            <hr style="border: solid 1px grey;" />
                        @endfor


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <div class="icon">
                                        <i class="flaticon-telephone-call"></i>
                                    </div>
                                    <div class="form">
                                        <input id="validationNumber" data-inputmask="'mask': '0399-9999999'" type="text" class="form-control" name="mobile" placeholder="Mobile Number *" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <div class="icon">
                                        <i class="flaticon-arroba"></i>
                                    </div>
                                    <div class="form">
                                        <label for="email">Your Email</label>
                                        <input id="validationEmail" type="email" class="form-control" name="email" id="email" placeholder="email@mail.com" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--<div class="optional-item">-->
                        <!--    <div class="form-grp">-->
                        <!--        <div class="form">-->
                        <!--            <select id="optional" class="form-control" name="select" class="form-select" aria-label="Default select example">-->
                        <!--                <option value="">Select meal type ( optional )</option>-->
                        <!--                <option>Select meal type ( optional )</option>-->
                        <!--                <option>Select meal type ( optional )</option>-->
                        <!--                <option>Select meal type ( optional )</option>-->
                        <!--            </select>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="form-grp">-->
                        <!--        <div class="form">-->
                        <!--            <select id="optionalTwo" class="form-control" name="select" class="form-select" aria-label="Default select example">-->
                        <!--                <option value="">Request wheelchair ( optional )</option>-->
                        <!--                <option>Request wheelchair ( optional )</option>-->
                        <!--                <option>Select meal type ( optional )</option>-->
                        <!--                <option>Select meal type ( optional )</option>-->
                        <!--            </select>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="form-grp checkbox-grp">-->
                        <!--    <input type="checkbox" id="checkbox">-->
                        <!--    <label for="checkbox">Add this person to passenger quick pick list</label>-->
                        <!--</div>-->
                    </form>
                </div>
            </div>
            <div class="col-27">

                <aside class="booking-sidebar">
                    <h2 class="main-title">Booking Info</h2>
                    <div class="widget">
                        <ul class="flight-info">
                            <li>
                                <img src="assets/img/sidebar_flight_icon.jpg" alt="">
                                <p>{{ \Carbon\Carbon::parse("{$flight->flight->DEPARTURE_DATE} {$flight->flight->DEPARTURE_TIME}")->format('H:i') }} ({{ $origin->IATA_code }}) <span>{{ $origin->city }}</span></p>
                            </li>
                            <li><p>{{ \Carbon\Carbon::parse("{$flight->flight->ARRIVAL_DATE} {$flight->flight->ARRIVAL_TIME}")->format('H:i') }} ({{ $destination->IATA_code }}) <span>{{ $destination->city }}</span></p></li>
                        </ul>
                        @if(isset($inbound_flight))
                            <hr style="border: solid 1px black"/>
                            <p>TWO WAY FLIGHT DATE</p>
                            <ul class="flight-info">
                                <li>
                                    <img src="assets/img/sidebar_flight_icon.jpg" alt="">
                                    <p>{{ \Carbon\Carbon::parse("{$inbound_flight->flight->DEPARTURE_DATE} {$inbound_flight->flight->DEPARTURE_TIME}")->format('H:i') }} ({{ $destination->IATA_code }}) <span>{{ $destination->city }}</span></p>
                                </li>
                                <li><p>{{ \Carbon\Carbon::parse("{$inbound_flight->flight->ARRIVAL_DATE} {$inbound_flight->flight->ARRIVAL_TIME}")->format('H:i') }} ({{ $origin->IATA_code }}) <span>{{ $origin->IATA_code }}</span></p></li>
                            </ul>
                        @endif
                    </div>

                    <div class="widget">
                        <h2 class="widget-title">Your price summary</h2>
                        <div class="price-summary-top">
                            <ul>
                                <li>Details</li>
                                <li>Amount</li>
                            </ul>
                        </div>
                        <div class="price-summary-detail">
                            @php
                                $FARE = $flight->baggage->FARE_PAX_WISE;
                                $ADULT_FARE = $flight->travelers->AdultNo * $FARE->ADULT->TOTAL;
                                $CHILD_FARE = $flight->travelers->ChildNo * $FARE->CHILD->TOTAL;
                                $INFANT_FARE = $flight->travelers->InfantNo * $FARE->INFANT->TOTAL;
                                $SURCHARGE = ($flight->travelers->AdultNo * $FARE->ADULT->SURCHARGE) + ($flight->travelers->ChildNo * $FARE->CHILD->SURCHARGE);
                                $TAX = ($flight->travelers->AdultNo * $FARE->ADULT->TAX) + ($flight->travelers->ChildNo * $FARE->CHILD->TAX) + ($flight->travelers->InfantNo * $FARE->INFANT->TAX);
                                $BASIC_FARE = ($flight->travelers->AdultNo * $FARE->ADULT->BASIC_FARE) + ($flight->travelers->ChildNo * $FARE->CHILD->BASIC_FARE) + ($flight->travelers->InfantNo * $FARE->INFANT->BASIC_FARE);
                                $TOTAL = ($flight->travelers->AdultNo * $FARE->ADULT->TOTAL) + ($flight->travelers->ChildNo * $FARE->CHILD->TOTAL) + ($flight->travelers->InfantNo * $FARE->INFANT->TOTAL);
                                $baggage_TOTAL = $flight->baggage->TOTAL;
                                if(isset($inbound_flight)){
                                    $FARE = $inbound_flight->baggage->FARE_PAX_WISE;
                                    $ADULT_FARE += $inbound_flight->travelers->AdultNo * $FARE->ADULT->TOTAL;
                                    $CHILD_FARE += $inbound_flight->travelers->ChildNo * $FARE->CHILD->TOTAL;
                                    $INFANT_FARE += $inbound_flight->travelers->InfantNo * $FARE->INFANT->TOTAL;
                                    $SURCHARGE += ($inbound_flight->travelers->AdultNo * $FARE->ADULT->SURCHARGE) + ($inbound_flight->travelers->ChildNo * $FARE->CHILD->SURCHARGE);
                                    $TAX += ($inbound_flight->travelers->AdultNo * $FARE->ADULT->TAX) + ($inbound_flight->travelers->ChildNo * $FARE->CHILD->TAX) + ($inbound_flight->travelers->InfantNo * $FARE->INFANT->TAX);
                                    $INBOUND_BASIC_FARE = ($inbound_flight->travelers->AdultNo * $FARE->ADULT->BASIC_FARE) + ($inbound_flight->travelers->ChildNo * $FARE->CHILD->BASIC_FARE) + ($inbound_flight->travelers->InfantNo * $FARE->INFANT->BASIC_FARE);
                                    $TOTAL += ($inbound_flight->travelers->AdultNo * $FARE->ADULT->TOTAL) + ($inbound_flight->travelers->ChildNo * $FARE->CHILD->TOTAL) + ($inbound_flight->travelers->InfantNo * $FARE->INFANT->TOTAL);
                                    $INBOUND_baggage_TOTAL = $inbound_flight->baggage->TOTAL;
                                }
                            @endphp
                            <ul>
                                <li>Adult x {{ $flight->travelers->AdultNo }} <span>{{ number_format($ADULT_FARE) }} {{ $currency }}</span></li>
                                <li>Child x {{ $flight->travelers->ChildNo }} <span>{{ number_format($CHILD_FARE) }} {{ $currency }}</span></li>
                                <li>Infant x {{ $flight->travelers->InfantNo }} <span>{{ number_format($INFANT_FARE) }} {{ $currency }}</span></li>
                                <li>Tax <span>{{ number_format($TAX) }} {{ $currency }}</span></li>
                                @foreach($FlightMarkups as $FlightMarkup)
                                    @if($flight->flight->AIRLINE == $FlightMarkup->airline)
                                        @if($FlightMarkup->price == 'Percent')
                                            @php $DISCOUNT_BASIC_FARE = $BASIC_FARE * $FlightMarkup->amount / 100; @endphp
                                        @elseif($FlightMarkup->price == 'Fixed')
                                            @php $DISCOUNT_BASIC_FARE = $FlightMarkup->amount; @endphp
                                        @endif

                                        @if($FlightMarkup->markup == 'Discount')
                                            @php $BASIC_FARE = $BASIC_FARE - $DISCOUNT_BASIC_FARE; @endphp
                                            @php $baggage_TOTAL = $baggage_TOTAL - $DISCOUNT_BASIC_FARE; @endphp
                                        @else
                                            @php $BASIC_FARE = $BASIC_FARE + $DISCOUNT_BASIC_FARE; @endphp
                                            @php $baggage_TOTAL = $baggage_TOTAL + $DISCOUNT_BASIC_FARE; @endphp
                                        @endif
                                    @endif
                                    @if($inbound_flight->flight->AIRLINE == $FlightMarkup->airline)
                                        @if($FlightMarkup->price == 'Percent')
                                            @php $INBOUND_DISCOUNT_BASIC_FARE = $INBOUND_BASIC_FARE * $FlightMarkup->amount / 100; @endphp
                                        @elseif($FlightMarkup->price == 'Fixed')
                                            @php $INBOUND_DISCOUNT_BASIC_FARE = $FlightMarkup->amount; @endphp
                                        @endif

                                        @if($FlightMarkup->markup == 'Discount')
                                            @php $INBOUND_BASIC_FARE = $INBOUND_BASIC_FARE - $INBOUND_DISCOUNT_BASIC_FARE; @endphp
                                            @php $INBOUND_baggage_TOTAL = $INBOUND_baggage_TOTAL - $INBOUND_DISCOUNT_BASIC_FARE; @endphp
                                        @else
                                            @php $INBOUND_BASIC_FARE = $INBOUND_BASIC_FARE + $INBOUND_DISCOUNT_BASIC_FARE; @endphp
                                            @php $INBOUND_baggage_TOTAL = $INBOUND_baggage_TOTAL + $INBOUND_DISCOUNT_BASIC_FARE; @endphp
                                        @endif
                                    @endif
                                @endforeach
                                <li>Base fare: <span>{{ number_format($BASIC_FARE + $INBOUND_BASIC_FARE) }} {{ $currency }}</span></li>
                                <li>SurCharges: <span>{{ number_format($SURCHARGE) }} {{ $currency }}</span></li>
                                <li>Discount<span>- (---)</span></li>
                                <li>Total Payable<span>{{ number_format($baggage_TOTAL + $INBOUND_baggage_TOTAL) }} {{ $currency }}</span></li>
                            </ul>
                            {{--<a href="#" class="btn rounded-2 pay-btn" data-pay="now">Pay now</a>
                            <br />--}}
                            <a href="#" class="btn rounded-2 pay-btn" data-pay="later">Proceed to pay</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>



<!-- booking-details-area-end -->

</main>
<!-- main-area-end -->

@endsection
{{-- Scripts --}}
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $(".num").keypress(function() {
        if ($(this).val().length == $(this).attr("maxlength")) {
            return false;
        }
    });

    function startTimer(duration, display) {
        let timer = duration;
        const interval = setInterval(function () {
            const hours = Math.floor(timer / (1000 * 60 * 60));
            const minutes = Math.floor((timer % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timer % (1000 * 60)) / 1000);

            const formattedHours = (hours < 10) ? "0" + hours : hours;
            const formattedMinutes = (minutes < 10) ? "0" + minutes : minutes;
            const formattedSeconds = (seconds < 10) ? "0" + seconds : seconds;

            display.textContent = formattedHours + ":" + formattedMinutes + ":" + formattedSeconds;

            if (timer <= 0) {
                clearInterval(interval);
                display.textContent = "Order Closed";
            }

            timer -= 1000; // Decrease timer by 1 second
        }, 1000);
    }

function getTimeLeftAndStartTimer() {
    axios.get('/getTimeLeft')
        .then(response => {
            const timeLeft = response.data.timeLeft;

            // Split the timeLeft string to get hours, minutes, seconds
            const timeParts = timeLeft.split(":");
            const hours = parseInt(timeParts[0]);
            const minutes = parseInt(timeParts[1]);
            const seconds = parseInt(timeParts[2]);

            // Calculate the total remaining time in milliseconds
            const totalRemainingTime = ((hours * 60 + minutes) * 60 + seconds) * 1000;

            const display = document.querySelector('#time-left');
            startTimer(totalRemainingTime, display);
        })
        .catch(error => {
            // console.error('Error:', error);
        });
}

// Get time left and start the timer
getTimeLeftAndStartTimer();

    </script>

<script>

    $(document).ready(function () {
        $(":input").inputmask();

        $.fn.serializeObject = function () {
            var o = {};
            var a = this.serializeArray();
            $.each(a, function () {
                if (o[this.name]) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };

        $(document).on('click', '.pay-btn', function (e) {
            e.preventDefault();
            //$(this).attr('disabled', true).css('background', '#a38290');
            const data = $('.passengers').serializeObject();
            data.flight = "{{ base64_encode($outbound_session) }}";
            @if(!empty($inbound_session))
                data.inboundFlight = "{{ base64_encode($inbound_session) }}";
            @endif
                data.pay = $(this).data('pay');
            //data.passenger = $('.passengers').serialize();
            $.post("{{ url("api/bookSeat") }}", data, function (json) {
                if (json?.PNR?.length > 0) {
                    window.location = '{{ url('pnr?pnr=') }}' + json.PNR + '&order_id=' + json.order_id
                } else {
                    alert(json.message);
                }
            }).fail(function () {
                $(this).attr('disabled', false).css('background', '#57112f');
            });
        });
    });

    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                $(document).on('click', '.pay-btn', function (e) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        $(window).scrollTop(0);
                    }

                    form.classList.add('was-validated')
                });
            });
    })();

    // Infant and child
    var today = new Date();

    // Define date range for Adult (1095 days in the past to 1095 days in the future)
    var maxDateAdult = new Date(today);
    maxDateAdult.setDate(today.getDate() + 365);
    var minDateInfant = new Date(today);
    minDateInfant.setDate(today.getDate() - 1095);
    var maxDateInfant = new Date(today);
    maxDateInfant.setDate(today.getDate() + 365);
    // Define date range for children (365 days in the past to 365 days in the future)
    var minDateChild = new Date(today);
    minDateChild.setDate(today.getDate() - 4015);
    var maxDateChild = new Date(today);
    maxDateChild.setDate(today.getDate() + 365);
    // Format the dates as strings in ISO format (YYYY-MM-DD)
    var maxDateStrAdult = maxDateAdult.toISOString().split('T')[0];
    var minDateStrInfant = minDateInfant.toISOString().split('T')[0];
    var maxDateStrInfant = maxDateInfant.toISOString().split('T')[0];
    var minDateStrChild = minDateChild.toISOString().split('T')[0];
    var maxDateStrChild = maxDateChild.toISOString().split('T')[0];
    // Set the min and max attributes of the date inputs for adult
    var dateInputsAdult = document.getElementsByClassName("validationDOBAdult");
    for (var a = 0; a < dateInputsAdult.length; a++) {
        dateInputsAdult[a].setAttribute("max", maxDateStrAdult);
    }
    // Set the min and max attributes of the date inputs for infants
    var dateInputsInfant = document.getElementsByClassName("validationDOBInfant");
    for (var i = 0; i < dateInputsInfant.length; i++) {
        dateInputsInfant[i].setAttribute("min", minDateStrInfant);
        dateInputsInfant[i].setAttribute("max", maxDateStrInfant);
    }
    // Set the min and max attributes of the date inputs for children
    var dateInputsChild = document.getElementsByClassName("validationDOBChild");
    for (var j = 0; j < dateInputsChild.length; j++) {
        dateInputsChild[j].setAttribute("min", minDateStrChild);
        dateInputsChild[j].setAttribute("max", maxDateStrChild);
    }
</script>

<script>

    var FLIGHT_DEP_ARR = null;
    $(document).ready(function () {
        FLIGHT_DEP_ARR = $('.flight-dest.added').data('dep-arr');
        $('.flight-dest.added').trigger('click');
    })
    $(".passenger-seat").click(function () {
        const _this = $(this);
        $(".passenger-seat[data-dep-arr='" + FLIGHT_DEP_ARR + "']").removeClass('selected');
        _this.addClass('selected');
    });

    let avalible_seats = ["2A", "2B", "2C", "4A", "4B", "4C", "6A", "6B", "6C", "8A", "8B", "8C", "10A", "10B", "10C", "11A", "11B", "11C", "11D", "11E", "11F", "12A", "12B", "12C", "12D", "12E", "12F", "14A", "14B", "14C", "16A", "16B", "16C", "18A", "18B", "18C", "20A", "20B", "20C", "22A", "22B", "22C", "24A", "24B", "24C", "26A", "26B", "26C", "28A", "28B", "28C"];
    let adult_seats = ["11A", "11B", "11C", "11D", "11E", "11F", "12A", "12B", "12C", "12D", "12E", "12F"];

    let _seats = new Map();
    let _seats_data = new Map();
    $('.seat-available-flyjinnah').on('click', function () {
        const _this = $(this);
        if (_this.hasClass('selected')) {
            $.notify("This seat is already selected!", "error");
            return;
        }
        const seat_number = _this.attr('seat-number');
        const seat_amount = _this.data('amount');

        const DEP_ARR_el = $('.flight-dest.added');
        const DEP_ARR = DEP_ARR_el.data('dep-arr');

        const selectedPassengerEle = $('.passenger-seat.selected[data-dep-arr="' + DEP_ARR + '"]');
        const selectedPassenger = selectedPassengerEle.data();

        const passenger_id = selectedPassenger.passenger_id;
        const passenger_type_w_id = selectedPassenger.noPassenger;
        const passenger = selectedPassenger.passenger;

        if (avalible_seats.includes(seat_number) && passenger === 'adult-with-infant') {
            $.notify('Cannot assign passenger with infant', "error");
        } else if (adult_seats.includes(seat_number) && passenger === 'child') {
            $.notify('Cannot assign child', "error");
        } else {
            _seats.set(passenger_type_w_id, {
                "seat_number": seat_number,
                "seat_amount": seat_amount,
                "passenger_id": passenger_id,
                "passenger": passenger
            })
            const seats = Object.fromEntries(_seats);
            _seats_data.set(DEP_ARR, seats)

            selectedPassengerEle.data('seat_number', seat_number)
            _this.attr('data-no-passenger', passenger_type_w_id)

            $('.seat-available-flyjinnah.selected[data-no-passenger="' + passenger_type_w_id + '"][data-dep-arr="' + DEP_ARR + '"]').removeClass('selected')
            $('.seat-available-flyjinnah.selected:empty').removeClass('selected')
            _this.addClass('selected')

            console.log(Object.fromEntries(_seats_data), 'seats_data')
        }
    })


    $('.meal-btn').on('click', function () {
        const _this = $(this);
        const qty_input = _this.closest('.row').find('.form-control.num');
        const qty = parseInt(qty_input.val());
        const _data = qty_input.data();

        if (qty <= 0) {
            $.notify("Please Select Number of Meals", "error");
        } else {
            const assign_meal = $(".assign-meal");
            assign_meal.text(FLIGHT_DEP_ARR + " - Assign Meal - " + _data.mealTitle);
            assign_meal.data({
                'assign-meal': _data.mealTitle,
                'assign-meal-code': _data.mealCode,
                'assign-meal-price': _data.mealPrice
            })

            var modal = $("#mealModal-" + FLIGHT_DEP_ARR);
            var span = $(".close").first();

            modal.show();

            span.on('click', function () {
                modal.hide();
            });

            $(window).on('click', function (event) {
                if ($(event.target).is(modal)) {
                    modal.hide();
                }
            });
        }
    });

    let _meals = new Map();
    let _meals_data = new Map();
    $('.meal-modal-btn').on('click', function () {
        const _this = $(this);
        let _meal = _this.siblings("p").data();

        let heading_ele = _this.closest('.modal-content').find('.assign-meal');
        let meal_data = heading_ele.data();

        if (_this.hasClass('selected')) {
            _this.text("Select").removeClass('selected');
            _this.siblings("p").text(_meal.mealPassenger);

        } else {
            _this.text("Remove").addClass('selected');

            _meals.set(_meal.mealBooking, {
                "passenger": _meal.mealBooking,
                "passenger_id": parseInt(_meal.mealBooking.split('-')[1]),
                "mealCode": meal_data.assignMealCode,
                "mealPrice": meal_data.assignMealPrice,
                "meal": meal_data.assignMeal
            })
            const meals = Object.fromEntries(_meals);
            _meals_data.set(_meal.depArr, meals)

            _this.siblings("p").text(_meal.mealPassenger + " - " + meal_data.assignMeal);
        }

        //console.log(Object.fromEntries(_meals_data), '_meals_data')
        //console.log(JSON.stringify(Object.fromEntries(_meals_data)), '_meals_data')

    });

    $('button.flight-dest').on('click', function () {
        const _this = $(this);
        const _data = _this.data();

        FLIGHT_DEP_ARR = _data.depArr;
        $('button.flight-dest').removeClass('added')
        _this.addClass('added')

        //$('section.booking-details-area[data-dep-arr]').hide(0);
        $('section.booking-details-area').hide(0);
        $('section.booking-details-area[data-dep-arr="' + _data.depArr + '"]').show();
    })

    $('.next-to-calc').on('click', function () {
        const meal_inputs = $('#seat_meal_inputs');
        meal_inputs.html('');

        const _amount = {seats: 0, meals: 0};
        const seats = Object.fromEntries(_seats_data);
        $.each(seats, function(DEP_ARR, items) {
            $.each(items, function(key, item) {
                _amount.seats += parseFloat(item.seat_amount);
                // meal_inputs.append('<input type="hidden" name="seatbooking['+DEP_ARR+']['+key+']['+item.seat_number+']" value="'+item.seat_amount+'"/>')
                meal_inputs.append('<input type="hidden" name="seatbooking['+DEP_ARR+']['+key+'][]" value="'+item.seat_number+'"/>')
            })
        });

        const meals = Object.fromEntries(_meals_data);
        $.each(meals, function(DEP_ARR, items) {
            $.each(items, function(key, item) {
                _amount.meals += parseFloat(item.mealPrice);
                // meal_inputs.append('<input type="hidden" name="mealbooking['+DEP_ARR+']['+key+']['+item.mealCode+']" value="'+item.mealPrice+'"/>')
                meal_inputs.append('<input type="hidden" name="mealbooking['+DEP_ARR+']['+key+'][]" value="'+item.mealCode+'"/>')
            })
        });
        $('#totalseatbooking').val(_amount.seats)
        $('#totalmealbooking').val(_amount.meals)
        console.log(_amount, '_amount')

        $('section.booking-details-area[data-dep-arr]').hide(0);
        $('section.booking-details-area').not('[data-dep-arr]').show();
    })

</script>
@endsection
