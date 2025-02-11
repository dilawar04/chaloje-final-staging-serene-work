@extends(\App\Theme::template())
@php

    $AirSerenemarkups = \DB::table('markups')->where(['airline' => 'Air Serene','status' => 'Active'])->get();
    
    $FlyJinnahmarkups = \DB::table('markups')->where(['airline' => 'Fly Jinnah','status' => 'Active'])->get();
    
    $Airsialmarkups = \DB::table('markups')->where(['airline' => 'Airsial','status' => 'Active'])->get();
    
    $Airbluemarkups = \DB::table('markups')->where(['airline' => 'Airblue','status' => 'Active'])->get();

@endphp
@section('content')
<!-- @if($arriveLocation === $departLocation)
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="linear-gradient(169deg, rgb(255, 222, 0) 0%, rgb(255, 140, 0) 100%);">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>The Location for Arrival & Departure Cannot Be The Same!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endif -->

<!-- Script -->
<!-- <script>
</script> -->

<!-- Script End -->
<?php
// Fetching the session data
$flightStatus = session()->get('FLIGHT_Airsial_STATUS');

// Encoding the session data to JSON
$as = json_encode($flightStatus);
?>
 <main>
     <style>
         .flight-type-inbound {
             display: none;
         }
         .flight-type-inbound .booking-list-item-inner{
             background: rgba(255, 255, 0, 10%);
         }
     </style>
 <section class="breadcrumb-area breadcrumb-bg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="breadcrumb-content text-center">
                                <h2 class="title">Book A Flight</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url("") }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Book A Flight</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<!-- breadcrumb-area-end -->
<!-- booking-area -->
 <div class="booking-area booking-style-two">
    @include(theme_dir('includes.search_slider'))
</div>
<!-- booking-area-end -->
 <div class="booking-list-area">
                <div class="container">
                    <!-- <div class="row justify-content-center">
                        <div class="col-27 order-2 order-xl-0">
                            @include(theme_dir('includes.filght_filter'))
                        </div> -->

                        <div class="main-slider-div">
                            <div class="container-fluid timeline-container">
                                <div class="row" style="--bs-gutter-x: 20px !important;">
                                    <div class="col-sm-1 d-none d-sm-block">
                                        <div class="row" style="--bs-gutter-x: 20px !important;">
                                            <div class="col-12 prev-btn">
                                                <span class="fa fa-angle-left"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-10">
    <div>
        <div class="row timeline-list">
            @php
            $departLocation = req('LocationDep');
            $arriveLocation = req('LocationArr');
            $ADT = req('AdultNo');
            $CHD = req('ChildNo');
            $INF = req('InfantNo');
            $added_date = req('DepartingOn');

            if($added_date !== null) {
                $currentDate = \Carbon\Carbon::parse($added_date);
            }
            else {
                $currentDate = \Carbon\Carbon::now();
            }
            $startDate = $currentDate->copy()->subDays(3);
            $endDate = $currentDate->copy()->addDays(3);
            @endphp
            @while ($startDate->lte($endDate))
                <div class="col-3 col-sm-2 col-md-2 timeline-item @if($startDate->eq($currentDate)) active @endif">
                <a href="{{ url('flight-booking?LocationDep=' . $departLocation . '&LocationArr=' . $arriveLocation . '&DepartingOn=' . $startDate->format('Y-m-d') . '&AdultNo=' . $ADT . '&ChildNo=' . $CHD . '&InfantNo=' . $INF) }}" class="timeline-date" data-date="{{ $startDate->format('Y-m-d') }}">
                        <span class="d-block"><strong>{{ $startDate->format('D') }}</strong></span>
                        <span class="d-block">{{ $startDate->format('j M') }}</span>
                    </a>
                </div>
                @php
                // Increment the start date by one day
                $startDate->addDay();
                @endphp
            @endwhile
        </div>
    </div>
</div>
<!-- @if($arriveLocation === $departLocation)
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="linear-gradient(169deg, rgb(255, 222, 0) 0%, rgb(255, 140, 0) 100%);">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>The Location for Arrival & Departure Cannot Be The Same!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endif -->


                                    <div class="col-sm-1 d-none d-sm-block">
                                        <div class="row">
                                            <div class="col-12 next-btn">
                                                <span class="fa fa-angle-right"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 booking-lists">
                            <!-- <div class="booking-list-item">
                                <div class="booking-list-item-inner">
                                    <div class="booking-list-top">
                                        <div class="flight-airway">
                                            <div class="flight-logo">
                                                <img src="assets/img/booking_icon01.jpg" alt="">
                                                <h5 class="title">Etihad Airway</h5>
                                            </div>
                                            <span>Operated by Emirates</span>
                                        </div>
                                        <ul class="flight-info">
                                            <li>Thursday, <span>Jun 16</span></li>
                                            <li class="time"><span>12: 55</span>DAC</li>
                                            <li>22h<span>2 Stops</span></li>
                                        </ul>
                                        <div class="flight-price">
                                            <h4 class="title">US$ 1,056.40</h4>
                                            <a href="{{url('/manage-booking')}}" class="btn">Select <i class="flaticon-flight-1"></i></a>
                                        </div>
                                    </div>
                                    <div class="booking-list-bottom">
                                        <ul>
                                            <li class="detail"><i class="fa-solid fa-angle-down"></i> Flight Detail</li>
                                            <li>Price per person (incl. taxes & fees)</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="flight-detail-wrap">
                                    <div class="flight-date">
                                        <ul>
                                            <li>Thursday, Jun 16</li>
                                            <li>Thursday, Jun 16 - 23:20 <span>22h 50m</span></li>
                                            <li>Friday, Jun 17 - 03:20</li>
                                        </ul>
                                    </div>
                                    <div class="flight-detail-right">
                                        <h4 class="title">IST - Istanbul Airport, Turkish</h4>
                                        <div class="flight-detail-info">
                                            <img src="assets/img/booking_icon01.jpg" alt="">
                                            <ul>
                                                <li>Tpm Line</li>
                                                <li>Operated by Airlines</li>
                                                <li>Economy | Flight EK585 | Aircraft BOEING 777-300ER</li>
                                                <li>Adult(s): 25KG luggage free</li>
                                            </ul>
                                        </div>
                                        <h4 class="title title-two">DXB - Dubai, United Arab Emirates</h4>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- booking-list-area-end -->

        </main>
        <!-- main-area-end -->




@endsection
{{-- Scripts --}}
@section('scripts')
    <script>
        $(document).ready(function () {
            var AirSerenemarkups = <?php echo json_encode($AirSerenemarkups); ?>;
            var FlyJinnahmarkups = <?php echo json_encode($FlyJinnahmarkups); ?>;
            var Airsialmarkups = <?php echo json_encode($Airsialmarkups); ?>;
            var Airbluemarkups = <?php echo json_encode($Airbluemarkups); ?>;

            AirSerenemarkups = AirSerenemarkups === undefined ? '' : AirSerenemarkups;
            FlyJinnahmarkups = FlyJinnahmarkups === undefined ? '' : FlyJinnahmarkups;
            Airsialmarkups = Airsialmarkups === undefined ? '' : Airsialmarkups;
            Airbluemarkups = Airbluemarkups === undefined ? '' : Airbluemarkups;

            let loader = `<div class="loader-new">
                        <iframe src="https://lottie.host/?file=82a46bfe-6f92-4fd9-b776-b371bb903cd6/Fb85yZHDtz.json"></iframe>
                        </div>`;
            $('.booking-lists').html(loader);

            let flightType = 'One Way';
            const form = $('.booking-form');
            const formData = form.serialize();
            // console.log(formData);


            if($("[name=ReturningOn]", form).val() !== ''){
                flightType = 'Round Trip';
            }
            // console.log(flightType);

            for (let i = 0; i < 5; i++) {
                var URL = '';

                if (i ==  0) {
                    // $('.booking-lists').html(loader);
                    URL = 'api/GetFlightsFlyJinnah';
                }
                if (i ==  1) {
                    // $('.booking-lists').html(loader);
                    URL = 'api/GetFlightsAirsial';
                }
                if (i ==  2) {
                    // $('.booking-lists').html(loader);
                    URL = 'api/GetFlightsAirserene';
                }
                if (i ==  3) {
                    // $('.booking-lists').html(loader);
                     URL = 'api/GetFlightsAirblue';
                }
                if (i ==  4) {
                    // $('.booking-lists').html(loader);
                     URL = 'api/GetAllFlights';
                }

                $.ajax({
                    method: "GET",
                    url: URL,
                    // url: "{{ url("api/getFlights") }}",
                    //url: "https://chaloge.businessfuelprovider.com/api/getFlights",
                    data: formData
                }).done(function(json) {
                    
                    if(json.code === '564'){
                        let ifSameError = json.data.split(" ");
                    var data = ifSameError[2] + ' ' + ifSameError[3] + ' ' + ifSameError[4] + ' ' + ifSameError[5] + ' ' + ifSameError[6]
                        console.log(data);        
                    }
                    // console.log('json');
                    // console.log(json);
                    // console.log(json?.outbound);

                    // console.log('json.code');
                    // console.log(json?.outbound);
                    if(json?.outbound){
                        // console.log(json?.outbound.length);
                        //const flights = {...json.outbound, ...json.inbound};
                        const flights = json.outbound.concat(json.inbound);
                        // console.log('flights-as');
                        // console.log(flights);
                        let HTML = ''; // Initialize an empty string to store the HTML
                        $.each(flights, function( index, flight ) {
                            // console.log(1232);
                            // console.log('flight', flight);
                            if(flight){

                                    HTML += `
                                    <div class="booking-list-item flight-type-${flight.TYPE} airline-${flight.AIRLINE.replace(' ', '-').toLowerCase()}">
                                        <div class="booking-list-item-inner">
                                        <!-- TOP DEPARTURE TEXT -->
                                        <div class="departure-arrival-top">
                                            <img src="assets/img/icon-01.png" style="margin-top: -5px" width="25px" height="25px" /><span>${(flight.TYPE === 'outbound' ? "Departure" : "Arrival")}</span>
                                        </div>
                                        <!-- TOP DEPARTURE TEXT END -->
                                            <div class="booking-list-top">
                                                <div class="flight-airway">
                                                    <div class="flight-logo">
                                                        <img src="https://s3.ap-south-1.amazonaws.com/st-airline-images/${flight.AIRLINE_CODE}.png" alt="" width="80">
                                                        <h5 class="title">${flight.AIRLINE}</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 left-border-flight">
                                                    <h5><i class="fa fa-light fa-globe text-muted"></i> ${flight.ORGN} <i class="fa fa-plane" aria-hidden="true"></i> ${flight.DEST}</h5>
                                                    <h6>Flight Number: <b>${flight.FLIGHT_NO}</b> <i class="fa fa-plane-departure" style="color: #808080cc;"></i></h6>`;
                                                    
                                                    if(flight.AIRLINE == 'Air Serene'){
                                                        HTML += `<h6>Baggage: <i class="fa fa-suitcase-rolling" style="color: #808080cc;"></i>${flight.BAGGAGE_FARE !== undefined && flight.BAGGAGE_FARE.length > 0   ? `<b> ${flight.BAGGAGE_FARE[0].weight}</b> Kg Checked Baggage` : 'Flight Is Completely Booked' }</h6>`;
                                                    }else{
                                                        HTML += `<h6>Baggage: <i class="fa fa-suitcase-rolling" style="color: #808080cc;"></i>${flight.BAGGAGE_FARE !== undefined && flight.BAGGAGE_FARE.length > 0   ? `<b> ${flight.BAGGAGE_FARE[0].no_of_bags} of ${flight.BAGGAGE_FARE[0].weight}</b>` : 'Flight Is Completely Booked' }</h6>`;
                                                    }
                                                    
                                                    HTML += `${flight.STATUS === "DELAYED" ? `<h6>Status: <i class="fas fa-shield-check"></i><b>${flight.STATUS}</b> </h6>` : ''}
                                                    <h6><u>${flight.TYPE.toUpperCase()}</u>:</h6>
                                                    <ul class="flight-info" style="font-size: 12px;">
                                                        <li>${moment(flight.DEPARTURE_DATE).format('DD')}, ${moment(flight.DEPARTURE_DATE).format("MM-YYYY")}</li>
                                                        <li class="time"><span>${flight.DEPARTURE_TIME}</span></li>
                                                        <li>${flight.DURATION}<span>${flight.STOPS} Stops</span></li>
                                                    </ul>
                                                </div>
                                                <div class="flight-price">
                                                ${flight.BAGGAGE_FARE.length > 0 
                                                    ?
                                                    `<h4 class="title">${flight.CURRENCY} ${numeral(flight.BAGGAGE_FARE[0]?.TOTAL).format('0,0')}</h4>`
                                                    : 
                                                    '<button class="btn btn-secondary" disabled id="baggage-btn">Booked<i class="flaticon-flight-1"></i></button>' }
                                                    
                                                </div>
                                            </div>`;

                                            if(flight.BAGGAGE_FARE.length > 0){
                                                HTML += `<div class="baggage-main" id="baggage-main">
                                                <div class="animate__fadeInDown baggage-main-content" id="style-1">`;
                                                $.each(flight.BAGGAGE_FARE, function( index, bag ) {
                                                if(bag.description){
                                                    const des = bag.description;
                                                    var meal = des.Meal;
                                                    var cancel = des.Cancellation;
                                                    var seat = des.Seat
                                                    // console.log(flight.AIRLINE);
                                                    // console.log(bag);
                                                }
                                                    HTML += `<div class="bag-val">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4>${bag.title}</h4>
                                                        <p>No free checked baggage allowance for Adult & Child</p>`;
                                                        if(flight.AIRLINE !== 'Airsial' && flight.AIRLINE !== 'Air Serene'){
                                                        
                                                            HTML += `<p>${flight.AIRLINE !== 'Fly Jinnah' ? 'Meals: Included' : ''}</p>`;
                                                        
                                                        }
                                                        if(flight.AIRLINE !== 'Fly Jinnah'){
                                                            HTML += `<p><span>Bags:</span> ${bag.no_of_bags} Bag</p>`;
                                                        }
                                                        if(flight.AIRLINE == 'Fly Jinnah' && bag.weight == null){
                                                            HTML += `<p><span>Weight:</span> 0</p>`;
                                                        }else{
                                                            HTML += `<p><span>Weight:</span> ${bag.weight}</p>`;
                                                        }
                                                        HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL).format('0,0')}</p>
                                                        ${meal !== undefined ? `<p><span>Meal:</span> ${meal}</p>` : ''}
                                                            ${seat !== undefined ? `<p><span>Seat:</span> ${seat}</p>` : ''}
                                                            ${cancel !== undefined ? `<p><span>Cancel:</span> ${cancel}</p>` : ''}
                                                        <button class="select-me select-ticket" data-index='${index}' data-airline='${flight.AIRLINE.replace(' ', '-').toLowerCase()}' data-type='${flight.TYPE}' data-flight='${JSON.stringify(flight)}' data-baggage='${JSON.stringify(bag)}' data-travelers='@json(request()->all())'>Baggage</button>
                                                    </div>`;
                                                    if(flight.AIRLINE == 'Fly Jinnah' && bag.title == 'Value' || bag.title == 'Value Flex' || bag.title == 'Ultimate'){
                                                        HTML += `<div class="col-md-6"><img src="/assets/img/bag/1.png" alt="1 Bag" /></div>`;
                                                    }else{
                                                        HTML += `<div class="col-md-6"><img src="/assets/img/bag/${bag.no_of_bags}.png" alt="${bag.no_of_bags} Bag" /></div>`;
                                                    }
                                                HTML += `</div>
                                            </div>`;
                                                })
                                                //<p><span>Price:</span> ${numeral(bag.FARE_PAX_WISE.ADULT.TOTAL).format('0,0')}</p>
                                                //<p><span>Price:</span> ${bag.amount}</p>
                                                HTML += `</div> </div>`;
                                                }
                                                    if(flight.BAGGAGE_FARE.length > 0 && flight.BAGGAGE_FARE[0].description){           
                                                    const desc = flight.BAGGAGE_FARE[0].description;
                                                    var meal = desc.Meal;
                                                    var cancel = desc.Cancellation;
                                                    var seat = desc.Seat
                                                // console.log(desc);
                                                }
                                                HTML += `<div class="booking-list-bottom">
                                                <ul>
                                                    <li class="detail"><i class="fa-solid fa-angle-down"></i> Flight Detail</li>
                                                    <li>Price per person (incl. taxes & fees)</li>

                                                </ul>
                                            </div>
                                            <div class="booking-list-bottom">
                                                <ul>
                                                    <li class="baggage-detail"><i class="fa-solid fa-angle-down"></i> Select Baggage</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="flight-detail-wrap" style="display: none;">
                                            <div class="flight-date">
                                                <ul>
                                                    <li>${moment(flight.DEPARTURE_DATE).format("DD, MM YY")} - ${flight.DEPARTURE_TIME} <span>${flight.DURATION}</span></li>
                                                </ul>
                                            </div>
                                            <div class="flight-detail-right">
                                                <h4 class="title">${flight.ORGN} - ${json.origin.airport}, ${json.origin.country}</h4>
                                                <div class="flight-detail-info">
                                                    <img src="https://s3.ap-south-1.amazonaws.com/st-airline-images/${flight.AIRLINE_CODE}.png" alt="${flight.AIRLINE_CODE}" width="80">
                                                    <ul>
                                                        <li>Operated by ${flight.AIRLINE}</li>
                                                        <li>Economy | Flight ${flight.FLIGHT_NO} | Aircraft ${flight.FLIGHT_NO}</li>`;
                                                        
                                                        if(flight.AIRLINE == 'Air Serene') {
                                                            HTML += `
                                                            ${flight.BAGGAGE_FARE.length > 0 
                                                            ?
                                                                `<li>Bag(s): ${flight.BAGGAGE_FARE[0].weight} Checked Baggage Luggage</li>
                                                            ${meal !== undefined ? `<li>Meal : ${meal}</li>` : ''}
                                                            ${seat !== undefined ? `<li>Seat : ${seat}</li>` : ''}
                                                            ${cancel !== undefined ? `<li>Cancellation : ${cancel}</li>` : ''}` 
                                                            :
                                                            "Flight is Completely Booked"
                                                            }`;
                                                        } else {
                                                            HTML += `
                                                            ${flight.BAGGAGE_FARE.length > 0 
                                                            ?
                                                                `<li>Bag(s): ${flight.BAGGAGE_FARE[0].no_of_bags} of ${flight.BAGGAGE_FARE[0].weight} Luggage</li>
                                                            ${meal !== undefined ? `<li>Meal : ${meal}</li>` : ''}
                                                            ${seat !== undefined ? `<li>Seat : ${seat}</li>` : ''}
                                                            ${cancel !== undefined ? `<li>Cancellation : ${cancel}</li>` : ''}` 
                                                            :
                                                            "Flight is Completely Booked"
                                                            }`;
                                                        }
                                                           
                                                    HTML += `</ul>
                                                </div>
                                                <h4 class="title title-two">${flight.DEST} - ${json.destination.airport}, ${json.destination.country}</h4>
                                            </div>
                                        </div>

                                        <div class="baggage-detail-wrap" style="display: none;">`;
                                            
                                        if(flight.BAGGAGE_FARE.length > 0){
                                            NoOfBaggages = flight.BAGGAGE_FARE.length;
                                            if(NoOfBaggages  >= 4){
                                                col = 3;
                                            }else{
                                                col = 4;
                                            }
                                            $.each(flight.BAGGAGE_FARE, function( index, bag ) {
                                                // console.log('asdasdasdsadas');
                                                // console.log(bag);
                                                // console.log(bag.title);
                                                if(bag.description){
                                                    const des = bag.description;
                                                    var meal = des.Meal;
                                                    var cancel = des.Cancellation;
                                                    var seat = des.Seat
                                                }
                                                HTML += `<div class="col-sm-${col} col-md-${col} select-baggage" style="">
                                                    <div class="">
                                                        <h4 class="title">${bag.title}</h4>`;
                                                        if(flight.AIRLINE !== 'Airsial' && flight.AIRLINE !== 'Air Serene'){
                                                            HTML += `<p>${flight.AIRLINE !== 'Fly Jinnah' ? 'Meals: Included' : ''}</p>`;                                                    
                                                        }
                                                        if(flight.AIRLINE !== 'Fly Jinnah' && flight.AIRLINE !== 'Air Serene'){
                                                            HTML += `<p><span>Bags:</span> ${bag.no_of_bags} Bag</p>`;
                                                        }
                                                        if(flight.AIRLINE == 'Fly Jinnah' && bag.weight == null){
                                                            HTML += `<p><span>Weight:</span> 0</p>`;
                                                        }else if(flight.AIRLINE == 'Air Serene'){
                                                            HTML += `<p><span>Weight:</span> ${bag.weight} Kg Checked Baggage</p>`;
                                                        } else{
                                                            HTML += `<p><span>Weight:</span> ${bag.weight}</p>`;
                                                        }
                                                        var Discount = 0;
                                                        if(flight.AIRLINE == 'Air Serene'){
                                                            if(AirSerenemarkups[0]){
                                                                if(AirSerenemarkups[0]['markup'] == 'Discount'){
                                                                    if(AirSerenemarkups[0]['price'] == 'Percent'){
                                                                        var Discount = bag.TOTAL_BASIC_FARE * AirSerenemarkups[0]['amount'] / 100;
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE - Discount).format('0,0')} <del> ${numeral(bag.TOTAL_BASIC_FARE).format('0,0')}</del> <b>${AirSerenemarkups[0]['amount']}% Off</b></p>`;
                                                                    } else if(AirSerenemarkups[0]['price'] == 'Fixed'){
                                                                        var Discount = AirSerenemarkups[0]['amount'];
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE - Discount).format('0,0')} <del> ${numeral(bag.TOTAL_BASIC_FARE).format('0,0')}</del> <b>${AirSerenemarkups[0]['amount']} Off</b></p>`;
                                                                    }
                                                                }else if(AirSerenemarkups[0]['markup'] == 'UnDiscount'){
                                                                    if(AirSerenemarkups[0]['price'] == 'Percent'){
                                                                        var Discount = bag.TOTAL_BASIC_FARE * AirSerenemarkups[0]['amount'] / 100;
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE + Discount).format('0,0')}</p>`;
                                                                    } else if(AirSerenemarkups[0]['price'] == 'Fixed'){
                                                                        var Discount = AirSerenemarkups[0]['amount'];
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE + Discount).format('0,0')}</p>`;
                                                                    }
                                                                }   
                                                            } else{
                                                                HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE).format('0,0')}</p>`;
                                                            }
                                                            if(AirSerenemarkups[0]){
                                                                if(AirSerenemarkups[0]['markup'] == 'Discount'){
                                                                    HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL - Discount).format('0,0')} <b></b></p>`;
                                                                } else if(AirSerenemarkups[0]['markup'] == 'UnDiscount'){
                                                                    HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL + Discount).format('0,0')} <b></b></p>`;
                                                                }
                                                            }else {
                                                                HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL).format('0,0')} <b></b></p>`;
                                                            }
                                                        }

                                                        if(flight.AIRLINE == 'Fly Jinnah'){
                                                            if(FlyJinnahmarkups[0]){
                                                                if(FlyJinnahmarkups[0]['markup'] == 'Discount'){
                                                                    if(FlyJinnahmarkups[0]['price'] == 'Percent'){
                                                                        var Discount = bag.TOTAL_BASIC_FARE * FlyJinnahmarkups[0]['amount'] / 100;
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE - Discount).format('0,0')} <del> ${numeral(bag.TOTAL_BASIC_FARE).format('0,0')}</del> <b>${FlyJinnahmarkups[0]['amount']}% Off</b></p>`;
                                                                    } else if(FlyJinnahmarkups[0]['price'] == 'Fixed'){
                                                                        var Discount = FlyJinnahmarkups[0]['amount'];
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE - Discount).format('0,0')} <del> ${numeral(bag.TOTAL_BASIC_FARE).format('0,0')}</del> <b>${FlyJinnahmarkups[0]['amount']} Off</b></p>`;
                                                                    }
                                                                }else if(FlyJinnahmarkups[0]['markup'] == 'UnDiscount'){
                                                                    if(FlyJinnahmarkups[0]['price'] == 'Percent'){
                                                                        var Discount = bag.TOTAL_BASIC_FARE * FlyJinnahmarkups[0]['amount'] / 100;
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE + Discount).format('0,0')}</p>`;
                                                                    } else if(FlyJinnahmarkups[0]['price'] == 'Fixed'){
                                                                        var Discount = FlyJinnahmarkups[0]['amount'];
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE + Discount).format('0,0')}</p>`;
                                                                    }
                                                                }   
                                                            } else{
                                                                HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE).format('0,0')}</p>`;
                                                            }
                                                            if(FlyJinnahmarkups[0]){
                                                                if(FlyJinnahmarkups[0]['markup'] == 'Discount'){
                                                                    HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL - Discount).format('0,0')} <b></b></p>`;
                                                                } else if(FlyJinnahmarkups[0]['markup'] == 'UnDiscount'){
                                                                    HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL + Discount).format('0,0')} <b></b></p>`;
                                                                }
                                                            }else {
                                                                HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL).format('0,0')} <b></b></p>`;
                                                            }
                                                        }
                                                        

                                                        if(flight.AIRLINE == 'Airsial'){
                                                            if(Airsialmarkups[0]){
                                                                if(Airsialmarkups[0]['markup'] == 'Discount'){
                                                                    if(Airsialmarkups[0]['price'] == 'Percent'){
                                                                        var Discount = bag.TOTAL_BASIC_FARE * Airsialmarkups[0]['amount'] / 100;
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE - Discount).format('0,0')} <del> ${numeral(bag.TOTAL_BASIC_FARE).format('0,0')}</del> <b>${Airsialmarkups[0]['amount']}% Off</b></p>`;
                                                                    } else if(Airsialmarkups[0]['price'] == 'Fixed'){
                                                                        var Discount = Airsialmarkups[0]['amount'];
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE - Discount).format('0,0')} <del> ${numeral(bag.TOTAL_BASIC_FARE).format('0,0')}</del> <b>${Airsialmarkups[0]['amount']} Off</b></p>`;
                                                                    }
                                                                }else if(Airsialmarkups[0]['markup'] == 'UnDiscount'){
                                                                    if(Airsialmarkups[0]['price'] == 'Percent'){
                                                                        var Discount = bag.TOTAL_BASIC_FARE * Airsialmarkups[0]['amount'] / 100;
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE + Discount).format('0,0')}</p>`;
                                                                    } else if(Airsialmarkups[0]['price'] == 'Fixed'){
                                                                        var Discount = Airsialmarkups[0]['amount'];
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE + Discount).format('0,0')}</p>`;
                                                                    }
                                                                }   
                                                            } else{
                                                                HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE).format('0,0')}</p>`;
                                                            }
                                                            if(Airsialmarkups[0]){
                                                                if(Airsialmarkups[0]['markup'] == 'Discount'){
                                                                    HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL - Discount).format('0,0')} <b></b></p>`;
                                                                } else if(Airsialmarkups[0]['markup'] == 'UnDiscount'){
                                                                    HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL + Discount).format('0,0')} <b></b></p>`;
                                                                }
                                                            }else {
                                                                HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL).format('0,0')} <b></b></p>`;
                                                            }
                                                        }


                                                        if(flight.AIRLINE == 'Airblue'){
                                                            if(Airbluemarkups[0]){
                                                                if(Airbluemarkups[0]['markup'] == 'Discount'){
                                                                    if(Airbluemarkups[0]['price'] == 'Percent'){
                                                                        var Discount = bag.TOTAL_BASIC_FARE * Airbluemarkups[0]['amount'] / 100;
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE - Discount).format('0,0')} <del> ${numeral(bag.TOTAL_BASIC_FARE).format('0,0')}</del> <b>${Airbluemarkups[0]['amount']}% Off</b></p>`;
                                                                    } else if(Airbluemarkups[0]['price'] == 'Fixed'){
                                                                        var Discount = Airbluemarkups[0]['amount'];
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE - Discount).format('0,0')} <del> ${numeral(bag.TOTAL_BASIC_FARE).format('0,0')}</del> <b>${Airbluemarkups[0]['amount']} Off</b></p>`;
                                                                    }
                                                                }else if(Airbluemarkups[0]['markup'] == 'UnDiscount'){
                                                                    if(Airbluemarkups[0]['price'] == 'Percent'){
                                                                        var Discount = bag.TOTAL_BASIC_FARE * Airbluemarkups[0]['amount'] / 100;
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE + Discount).format('0,0')}</p>`;
                                                                    } else if(Airbluemarkups[0]['price'] == 'Fixed'){
                                                                        var Discount = Airbluemarkups[0]['amount'];
                                                                        HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE + Discount).format('0,0')}</p>`;
                                                                    }
                                                                }   
                                                            } else{
                                                                HTML += `<p><span>Base Fare: </span>${numeral(bag.TOTAL_BASIC_FARE).format('0,0')}</p>`;
                                                            }
                                                            if(Airbluemarkups[0]){
                                                                if(Airbluemarkups[0]['markup'] == 'Discount'){
                                                                    HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL - Discount).format('0,0')} <b></b></p>`;
                                                                } else if(Airbluemarkups[0]['markup'] == 'UnDiscount'){
                                                                    HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL + Discount).format('0,0')} <b></b></p>`;
                                                                }
                                                            }else {
                                                                HTML += `<p><span>Price:</span> ${numeral(bag.TOTAL).format('0,0')} <b></b></p>`;
                                                            }
                                                        }
                                                        
                                                        HTML += `
                                                        ${meal !== undefined ? `<p><span>Meal:</span> ${meal}</p>` : ''}
                                                        ${seat !== undefined ? `<p><span>Seat:</span> ${seat}</p>` : ''}
                                                        ${cancel !== undefined ? `<p><span>Cancel:</span> ${cancel}</p>` : ''}

                                                    </div>`; 
                                                    HTML += `<div class="d-flex">`;
                                                        if(flight.AIRLINE == 'Fly Jinnah' && bag.title == 'Value' || bag.title == 'Value Flex' || bag.title == 'Ultimate'){
                                                            HTML += `<div class="flight-detail-info">
                                                                <img src="/assets/img/bag/1.png" alt="0 Bag" style="width: 100%;">
                                                            </div> `;
                                                        }else{
                                                            HTML += `<div class="flight-detail-info">
                                                                <img src="/assets/img/bag/${bag.no_of_bags}.png" alt="${bag.no_of_bags} Bag" style="width: 100%;"/>
                                                            </div>`;
                                                        }

                                                        HTML += `<div class="flight-price select-baggage-flight-price" style="">
                                                        <button class="select-me select-ticket" data-index='${index}' data-airline='${flight.AIRLINE.replace(' ', '-').toLowerCase()}' data-type='${flight.TYPE}' data-flight='${JSON.stringify(flight)}' data-baggage='${JSON.stringify(bag)}' data-travelers='@json(request()->all())'>SELECT<i class="flaticon-flight-1"></i></button>
                                                        </div>
                                                    </div>
                                                </div>`;
                                            })
                                        }
                                        HTML += `</div>
                                        </div>`;
                            }

                        });

                        $('.booking-lists').before(HTML);

                    } else {
                        // console.log(json.GetFlightsAirserene.FLIGHT_AirSerene_STATUS[0]);
                        // console.log(json.GetFlightsAirsial.FLIGHT_Airsial_STATUS[0]);
                        // console.log(json.GetFlightsFlyJinnah.FLIGHT_FlyJinnah_STATUS);
                        // console.log(json.GetFlightsAirblue.FLIGHT_Airblue_STATUS[0]);
                        if(json.GetFlightsAirserene.FLIGHT_AirSerene_STATUS[0] == 'UnSuccess' && json.GetFlightsAirsial.FLIGHT_Airsial_STATUS[0] == 'UnSuccess' && json.GetFlightsFlyJinnah.FLIGHT_FlyJinnah_STATUS == 'UnSuccess' && json.GetFlightsAirblue.FLIGHT_Airblue_STATUS[0] == 'UnSuccess'){
                            $('.loader-new').remove();
                            $('.booking-lists').html(`
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-center">
                                        ${json.code !== undefined
                                            ?
                                            '<img src="{{ media_url("img/cross.gif") }}"  />' 
                                            :
                                            '<iframe src="https://lottie.host/?file=3cf38ce8-331c-485e-b120-b15ed7194839/KROk68QwZg.json" width="900px"></iframe>'}
                                        </div>
                                        ${json.code !== undefined ? `<h2 class="text-center">${data ? data : json.data}</h2>` : '<h2 class="text-center">No Flights Found!</h2>'}
                                    
                                    </div>
                                </div>  
                            </div>`);
                        }   
                    }
                // console.log(json);
                    if(json.GetFlightsAirserene.FLIGHT_AirSerene_STATUS[0] && json.GetFlightsAirsial.FLIGHT_Airsial_STATUS[0] && json.GetFlightsFlyJinnah.FLIGHT_FlyJinnah_STATUS && json.GetFlightsAirblue.FLIGHT_Airblue_STATUS[0]){
                        $('.loader-new').remove();
                    }

                });
                if (i == 4) {
                    // console.log(json);
                    // $(document).ready(function() {
                        // function checkAndRemoveLoader() {
                            // if ($('.booking-list-item.flight-type-outbound.airline-airblue').length > 0 || $('.booking-list-item.flight-type-outbound.airline-air-serene').length > 0 || $('.booking-list-item.flight-type-outbound.airline-airsial').length > 0 || $('.booking-list-item.flight-type-outbound.airline-flyjinnah').length > 0) {
                                // if(json.GetFlightsAirserene.FLIGHT_AirSerene_STATUS[0] == 'Success' && json.GetFlightsAirblue.FLIGHT_Airblue_STATUS[0] == 'Success'){
                                //     $('.loader-new').remove();
                                // }
                            // }
                        // }
                        // setInterval(checkAndRemoveLoader, 8000);
                        // checkAndRemoveLoader(); 
                    // });

                    break;
                }
            }


            //$(".baggage-main-content").hide();
            $(document).on('click','.baggage-btn',function(e) {
                const parent = $(this).closest('.booking-list-item');
                if($('.baggage-main-content', parent).hasClass('show-content')){
                    $('.baggage-main-content', parent).toggleClass('show-content');
                } else {
                    $('.baggage-main-content').not($(this)).removeClass('show-content');
                    $('.baggage-main-content', parent).toggleClass('show-content');
                }
                //$('.show-content').toggle();
            });

             $(document).on('click', '.select-ticket', function (e) {
                 const _data = $(this).data();
                 //localStorage.setItem("selectedFlight", JSON.stringify(_data));
                 console.log(flightType, _data.type)
                 $.post('{{ url('flight/checkFlight') }}', {flight: JSON.stringify(_data), type: _data.type}, function (json) {
                     if((flightType === 'Round Trip' && _data.type === 'inbound') || flightType === 'One Way'){
                         window.location = '{!! url('manage-booking?' . http_build_query(request()->all())) !!}';
                     } else {
                         $('.flight-type-outbound').hide();
                         //$('.flight-type-inbound.airline-' + _data.airline).show();
                         $('.flight-type-inbound').show();
                     }
                 });
             })
        })

        window.scroll({
            top: 500, 
            left: 0, 
            behavior: 'smooth'
        });
    </script>
@endsection





