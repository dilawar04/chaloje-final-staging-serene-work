@extends(\App\Theme::template())
@section('content')

<style>
    .btn-active {
	background: linear-gradient( 169deg,rgb(255,222,0) 0%,rgb(255,140,0) 100% ) !important;
    color: #fff !important;
	cursor: pointer;
	display: inline-flex;
	font-size: 14px;
	align-items: center;
	font-weight: 600;
	letter-spacing: 0;
	line-height: 1;
	margin-bottom: 0;
	padding: 12px 23px;
	text-align: center;
	text-transform: capitalize;
	touch-action: manipulation;
	transition: all 0.3s ease 0s;
	vertical-align: middle;
	white-space: nowrap;
	font-family: 'Barlow', sans-serif;
    border: none;
    border-radius: 7px;

}
</style>
<!-- breadcrumb-area -->
<section class="breadcrumb-area breadcrumb-bg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="breadcrumb-content text-center">
                                <h2 class="title">PNR</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url("") }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Passenger Name Record (PNR)</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

<main style="padding: 40px 0px 40px 0px">

<script>
        $(document).ready(function() {
            $('#DEP').click(function() {
                $('#DEP-DATA').toggle();
                $('#ARV-DATA').toggle();
                $('#DEP').addClass('btn-active');
                $('#DEP').removeClass('btn');
                $('#ARV').removeClass('btn-active');
                $('#ARV').addClass('btn');
            });
            $('#ARV').click(function() {
                $('#ARV-DATA').toggle();
                $('#DEP-DATA').toggle();
                $('#DEP').removeClass('btn-active');     
                $('#DEP').addClass('btn');
                $('#ARV').addClass('btn-active');
                $('#ARV').removeClass('btn');
            });
        })
</script>


 @php
    //$pnr = request()->segment(2) ?? '1Q5VRG';
    $pnr = req('pnr', '1Q5VRG');
    $booking = \App\Booking::with('details')->where('pnr', $pnr)->first();
    $travelers = json_decode($booking->travelers);
    $_flight = json_decode($booking->flight_summary);
    if(isset($_flight->outbound)){
        $flight = $_flight->outbound->flight;
        $flight->baggage = $_flight->outbound->baggage;
    } else{
        $flight = $_flight->flight;
        $flight->baggage = $_flight->baggage;
    }

    $detail = $booking->details->first();
    $adults = json_decode($detail->adult);
    $childs = json_decode($detail->child);
    $infants = json_decode($detail->infant);

    $FARE = $flight->baggage->FARE_PAX_WISE;
    //dump($booking, $flight, $travelers, $detail);

    
    //dd($booking);
    //exit;

//exit;
 @endphp

<div id="content_wrapper">
   <div class="container">
       <div class="row">
           @if($booking->flight_type == 'Round Trip')
           <div class="col-lg-12 text-center">
           <!--<button class="btn-active" id="DEP"><img class="mx-1" src="assets/img/icon-01.png" width="25px" height="25px" /> Outbound</button>-->
           <!--<button class="btn" id="ARV">Inbound <img class="mx-1" src="assets/img/icon-02.png" width="25px" height="25px" /></button>-->
         </div>
          <br />
          <span class="my-4" style="border: solid 1px lightgrey; width: 100%;"></span>
        @endif

           <!--DEPARTURE-->

           <div class="col-lg-12" id="DEP-DATA">
               <div class="w-100 mx-auto">
                   <div class="heading_tab_inner d-flex justify-content-between">
                       <h5>FLIGHT DETAILS</h5>
                       <h5 class="title" id="timer">Time Left: <span id="time-left" style="width: unset;font-size: 14px;font-weight: 700;font-family: Lato, sans-serif;"></span></h5>
                       <!--<h2 class="title" id="timer" style="font-size: 15px;">Time Left: <span id="time-left"></span></h2>-->
                       <span style="font-size: 15px">Order ID# {{ $booking->order_id }}</span>
                   </div>

                   <div class="tab_inner_body" style="float: left;width: 100% !important;">
                       <div class="p-2">
                           <div class="row">
                               <div class="col-lg-10 col-md-9 my-auto text-center">
                                   <div class="row">
                                       <div class="col-lg-3 col-md-3"><img
                                               src="https://s3.ap-south-1.amazonaws.com/st-airline-images/{{ $flight->AIRLINE_CODE }}.png"
                                               alt="airline image"
                                               width="100px"
                                               height="92px"></div>
                                        <!--<div class="col-lg-8 col-md-9" style="margin-left: 20px">-->
                                           <!--<h4>Destination: {{ $flight->DEST }}</h4><span>{{ $flight->ORGN }} to {{ $flight->DEST }}</span><span> {{ \Str::of($booking->flight_type)->snake(' ')->title() }} Flight</span>-->
                                        <!--</div>-->
                                       <!--TWO WAY FLIGHT DEST-->
                                       <!--<div class="col-lg-3 col-md-3" id="InBound"><img-->
                                       <!--        src="https://s3.ap-south-1.amazonaws.com/st-airline-images/{{ $flight->AIRLINE_CODE }}.png"-->
                                       <!--        alt="airline image"-->
                                       <!--        style="display: none;"-->
                                       <!--        width="100px"-->
                                       <!--        height="92px"></div>-->
                                       <!--<div class="col-lg-8 col-md-9" style="margin-left: 20px">-->
                                       <!--    <h4>{{ $flight->ORGN }}</h4><span>{{ $flight->DEST }} to {{ $flight->ORGN }}</span><span> {{ \Str::of($booking->flight_type)->snake(' ')->title() }} Flight</span>-->
                                       <!--</div>-->
                                       <!-- TWO WAY FLIGHT DEST END -->
                                   </div>
                               </div>
                               <div class="col-lg-2 col-md-3 py-2">
                                   <div class="rupees_left" style="color: #44a8d9;">
                                       <h2>{{ number_format($booking->total_amount) }} Rupees</h2>
                                       <p>Total Amount</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                        <div class="p-0 border-top-blue"><span class="flight_no">{{ $flight->AIRLINE }} [Flight No: {{ $flight->FLIGHT_NO }}]</span>
                            <div class="main_section_flight">
                                <div class="country_section_box">
                                    <p>Origin</p>
                                    <p>{{ $flight->ORGN }}</p>
                                    <h4>{{ \Carbon\Carbon::parse($flight->DEPARTURE_TIME)->format('h:i A') }}</h4>
                                    <p class="shedule_d">{{ \Carbon\Carbon::parse($flight->DEPARTURE_DATE)->format('Y-m-d') }}</p>
                                </div>
                                <div class="middle_flight_section">
                                    <h5>Total Time</h5>
                                    <p><i class="fa fa-clock-o"></i>{{ str_replace(['h', 'm'], [' hours,', ' Minutes'], $flight->DURATION) }}</p>
                                </div>
                                <div class="country_section_box">
                                    <p>Destination</p>
                                    <p>{{ $flight->DEST }}</p>
                                    <h4>{{ \Carbon\Carbon::parse($flight->ARRIVAL_TIME)->format('h:i A') }}</h4>
                                    <p class="shedule_d">{{ \Carbon\Carbon::parse($flight->DEPARTURE_DATE ?? $flight->DEPARTURE_DATE)->format('Y-m-d') }}</p>
                                </div>
                                <div class="border-top-blue">
                                    <div class="flight_details_table">
                                        <div class="table_heding_title my-3">Flight Details</div>
                                        <div class="hotel_airlines_list">
                                            <div class="airline_detail_list">
                                                <fieldset>
                                                    <ul>
                                                        <li><span class="styling-text">Airline</span><span>-</span><span>{{ $flight->AIRLINE }}</span></li>
                                                        <li><span>Flight type</span><span>-</span><span>Economy</span></li>
                                                        {{--<li><span>Fare type</span><span>-</span><span>Refundable</span></li>
                                                        <li><span>Cancellation</span><span>-</span><span>PKR 0/Person</span></li>
                                                        <li><span>Flight Change</span><span>-</span><span>PKR 0/Person</span></li>--}}
                                                    </ul>
                                                </fieldset>
                                            </div>
                                            <div class="airline_detail_list table_bold">
                                                <fieldset>
                                                    <ul>
                                                        <li><span>Baggage</span><span>-</span><span>{{ $flight->baggage->title ?? $flight->baggage->sub_class_desc }}</span></li>
                                                        <li><span>ADT Fare</span><span>-</span><span>{{number_format($FARE->ADULT->TOTAL)}} = {{number_format($travelers->ADULT)}} x {{ number_format($travelers->ADULT * $FARE->ADULT->TOTAL) }}</span></li>
                                                        @if($travelers->CHILD > 0)
                                                        <li><span>CHD Fare</span><span>-</span><span>{{number_format($FARE->CHILD->TOTAL)}} = {{number_format($travelers->CHILD)}} x {{ number_format($travelers->CHILD * $FARE->CHILD->TOTAL) }}</span></li>
                                                        @endif
                                                        @if($travelers->INFANT > 0)
                                                        <li><span>INF Fare</span><span>-</span><span>{{number_format($FARE->INFANT->TOTAL)}} = {{number_format($travelers->INFANT)}} x {{ number_format($travelers->INFANT * $FARE->INFANT->TOTAL) }}</span></li>
                                                        @endif
                                                        {{--<li><span>Tax &amp; Fees</span><span>-</span><span class="bold">3000PKR</span></li>--}}
                                                        <li><span>Total Price</span><span>-</span><span class="bold" style="font-weight: bold;">{{ number_format(($travelers->ADULT * $FARE->ADULT->TOTAL) + ($travelers->CHILD * $FARE->CHILD->TOTAL) + ($travelers->INFANT * $FARE->INFANT->TOTAL)) }} PKR</span></li>
                                                    </ul>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($_flight->inbound))
                            @php
                                $flight = $_flight->inbound->flight;
                                $flight->baggage = $_flight->inbound->baggage;
                                $FARE = $flight->baggage->FARE_PAX_WISE;
                            @endphp
                            <div class="p-0 border-top-blue"><span class="flight_no">{{ $flight->AIRLINE }} [Flight No: {{ $flight->FLIGHT_NO }}]</span>
                                <div class="main_section_flight">
                                    <div class="country_section_box">
                                        <p>Origin</p>
                                        <p>{{ $flight->ORGN }}</p>
                                        <h4>{{ \Carbon\Carbon::parse($flight->DEPARTURE_TIME)->format('h:i A') }}</h4>
                                        <p class="shedule_d">{{ \Carbon\Carbon::parse($flight->DEPARTURE_DATE)->format('Y-m-d') }}</p>
                                    </div>
                                    <div class="middle_flight_section">
                                        <h5>Total Time</h5>
                                        <p><i class="fa fa-clock-o"></i>{{ str_replace(['h', 'm'], [' hours,', ' Minutes'], $flight->DURATION) }}</p>
                                    </div>
                                    <div class="country_section_box">
                                        <p>Destination</p>
                                        <p>{{ $flight->DEST }}</p>
                                        <h4>{{ \Carbon\Carbon::parse($flight->ARRIVAL_TIME)->format('h:i A') }}</h4>
                                        <p class="shedule_d">{{ \Carbon\Carbon::parse($flight->DEPARTURE_DATE ?? $flight->DEPARTURE_DATE)->format('Y-m-d') }}</p>
                                    </div>
                                    <div class="border-top-blue">
                                        <div class="flight_details_table">
                                            <div class="table_heding_title my-3">Flight Details</div>
                                            <div class="hotel_airlines_list">
                                                <div class="airline_detail_list">
                                                    <fieldset>
                                                        <ul>
                                                            <li><span class="styling-text">Airline</span><span>-</span><span>{{ $flight->AIRLINE }}</span></li>
                                                            <li><span>Flight type</span><span>-</span><span>Economy</span></li>
                                                            {{--<li><span>Fare type</span><span>-</span><span>Refundable</span></li>
                                                            <li><span>Cancellation</span><span>-</span><span>PKR 0/Person</span></li>
                                                            <li><span>Flight Change</span><span>-</span><span>PKR 0/Person</span></li>--}}
                                                        </ul>
                                                    </fieldset>
                                                </div>
                                                <div class="airline_detail_list table_bold">
                                                    <fieldset>
                                                        <ul>
                                                            <li><span>Baggage</span><span>-</span><span>{{ $flight->baggage->title ?? $flight->baggage->sub_class_desc }}</span></li>
                                                            <li><span>ADT Fare</span><span>-</span><span>{{number_format($FARE->ADULT->TOTAL)}} = {{number_format($travelers->ADULT)}} x {{ number_format($travelers->ADULT * $FARE->ADULT->TOTAL) }}</span></li>
                                                            @if($travelers->CHILD > 0)
                                                            <li><span>CHD Fare</span><span>-</span><span>{{number_format($FARE->CHILD->TOTAL)}} = {{number_format($travelers->CHILD)}} x {{ number_format($travelers->CHILD * $FARE->CHILD->TOTAL) }}</span></li>
                                                            @endif
                                                            @if($travelers->INFANT > 0)
                                                            <li><span>INF Fare</span><span>-</span><span>{{number_format($FARE->INFANT->TOTAL)}} = {{number_format($travelers->INFANT)}} x {{ number_format($travelers->INFANT * $FARE->INFANT->TOTAL) }}</span></li>
                                                            @endif
                                                            {{--<li><span>Tax &amp; Fees</span><span>-</span><span class="bold">3000PKR</span></li>--}}
                                                            <li><span>Total Price</span><span>-</span><span class="bold" style="font-weight: bold;">{{ number_format(($travelers->ADULT * $FARE->ADULT->TOTAL) + ($travelers->CHILD * $FARE->CHILD->TOTAL) + ($travelers->INFANT * $FARE->INFANT->TOTAL)) }} PKR</span></li>
                                                        </ul>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                       <!--DESTINATIONS FOR TWO WAY-->
                        <div class="p-0 border-top-blue" style="display: none;" id="InBound"><span class="flight_no">{{ $flight->AIRLINE }} [Flight No: {{ $flight->FLIGHT_NO }}]</span>
                           <div class="main_section_flight">
                               <div class="country_section_box">
                                   <p>Origin</p>
                                   <p>{{ $flight->DEST }}</p>
                                   <h4>{{ \Carbon\Carbon::parse($flight->DEPARTURE_TIME)->format('h:i A') }}</h4>
                                   <p class="shedule_d">{{ \Carbon\Carbon::parse($flight->DEPARTURE_DATE)->format('Y-m-d') }}</p>
                               </div>
                               <div class="middle_flight_section">
                                   <h5>Total Time</h5>
                                   <p><i class="fa fa-clock-o"></i>{{ str_replace(['h', 'm'], [' hours,', ' Minutes'], $flight->DURATION) }}</p>
                               </div>
                               <div class="country_section_box">
                                   <p>Destination</p>
                                   <p>{{ $flight->ORGN }}</p>
                                   <h4>{{ \Carbon\Carbon::parse($flight->ARRIVAL_TIME)->format('h:i A') }}</h4>
                                   <p class="shedule_d">{{ \Carbon\Carbon::parse($flight->DEPARTURE_DATE ?? $flight->DEPARTURE_DATE)->format('Y-m-d') }}</p>
                               </div>
                           </div>
                        </div>
                       <!--DESTINATIONS FOR TWO WAY END-->
                        
                       <div class="inludes_section">
                           <div class="flight_details_table">
                               <div class="table_heding_title my-2">Traveller Details</div>
                               <div class="hotel_airlines_list">
                                   <div class="airline_detail_list">
                                       <fieldset>
                                           <ul>
                                               {{--[{"Firstname":"Karina","Lastname":"Mckee","Cnic":"_____-_______-_","Dob":"03-28-2022","Title":"MS","WheelChair":"No","FullName":"Karina Mckee"}]--}}
                                               @foreach($adults as $adult)
                                                   <li><span>ADT Name</span><span>-</span><span>{{ $adult->Title }} {{ trim($adult->Firstname . ' ' . $adult->Lastname) }}</span></li>
                                               @endforeach

                                               @if(count($childs) > 0)
                                                   @foreach($childs as $child)
                                                       <li><span>CHD Name</span><span>-</span><span>{{ $child->Title }} {{ trim($child->Firstname . ' ' . $child->Lastname) }}</span></li>
                                                   @endforeach
                                               @endif
                                               @if(count($infants) > 0)
                                                   @foreach($infants as $infant)
                                                       <li><span>INF Name</span><span>-</span><span>{{ $infant->Title }} {{ trim($infant->Firstname . ' ' . $infant->Lastname) }}</span></li>
                                                   @endforeach
                                               @endif
                                               <li><span>Mobile No</span><span>-</span><span>{{ $detail->mobile }}</span>
                                               </li>
                                               <li><span>CNIC</span><span>-</span><span>{{ $detail->cnic }}</span></li>
                                               <li><span>PNR No</span><span>-</span><span>{{ $booking->pnr }}</span></li>
                                           </ul>
                                       </fieldset>
                                   </div>
                                   <div class="airline_detail_list table_bold">
                                       <fieldset>
                                           <ul>
                                               <li><span>No. of Passengers</span><span>-</span><span>{{ number_format(($travelers->ADULT + $travelers->CHILD + $travelers->INFANT)) }}</span></li>
                                               <li><span>Adult</span><span>-</span><span>{{ number_format($travelers->ADULT) }}</span></li>
                                               <li><span>Infant</span><span>-</span><span>{{ number_format($travelers->INFANT) }}</span></li>
                                               <li><span>Child</span><span>-</span><span>{{ number_format($travelers->CHILD) }}</span></li>
                                           </ul>
                                       </fieldset>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <!--ARRIVAL-->

           <div class="col-lg-12" style="display: none;" id="ARV-DATA">
               <div class="w-100 mx-auto">
                   <div class="heading_tab_inner">
                       <h5>FLIGHT DETAILS(Inbound)</h5><span style="font-size: 17px">PNR# {{ $booking->pnr }}</span>
                   </div>

                   <div class="tab_inner_body" style="float: left;">
                       <div class="p-2">
                           <div class="row">
                               <div class="col-lg-10 col-md-9 my-auto text-center">
                                   <div class="row">
                                       <div class="col-lg-3 col-md-3"><img
                                               src="https://s3.ap-south-1.amazonaws.com/st-airline-images/{{ $flight->AIRLINE_CODE }}.png"
                                               alt="airline image"
                                               width="100px"
                                               height="92px"></div>
                                       <div class="col-lg-8 col-md-9" style="margin-left: 20px">
                                           <h4>Destination: {{ $flight->DEST }}</h4><span>{{ $flight->ORGN }} to {{ $flight->DEST }}</span><span> {{ \Str::of($booking->flight_type)->snake(' ')->title() }} Flight</span>
                                       </div>
                                       <!--TWO WAY FLIGHT DEST-->
                                       <!-- <div class="col-lg-3 col-md-3" id="InBound"><img
                                               src="https://s3.ap-south-1.amazonaws.com/st-airline-images/{{ $flight->AIRLINE_CODE }}.png"
                                               alt="airline image"
                                               style="display: none;"
                                               width="100px"
                                               height="92px"></div>
                                       <div class="col-lg-8 col-md-9" style="margin-left: 20px">
                                           <h4>{{ $flight->ORGN }}</h4><span>{{ $flight->DEST }} to {{ $flight->ORGN }}</span><span> {{ $flight->flight_type }}Flight</span>
                                       </div> -->
                                       <!-- TWO WAY FLIGHT DEST END -->
                                   </div>
                               </div>
                               <div class="col-lg-2 col-md-3 py-2">
                                   <div class="rupees_left" style="color: #44a8d9;">
                                       <h2>{{ number_format($booking->total_amount) }} Rupees</h2>
                                       <p>Total Amount</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                        <div class="p-0 border-top-blue"><span class="flight_no">{{ $flight->AIRLINE }} [Flight No: {{ $flight->FLIGHT_NO }}]</span>
                           <div class="main_section_flight">
                               <div class="country_section_box">
                                   <p>Origin</p>
                                   <p>{{ $flight->ORGN }}</p>
                                   <h4>{{ \Carbon\Carbon::parse($flight->DEPARTURE_TIME)->format('h:i A') }}</h4>
                                   <p class="shedule_d">{{ \Carbon\Carbon::parse($flight->DEPARTURE_DATE)->format('Y-m-d') }}</p>
                               </div>
                               <div class="middle_flight_section">
                                   <h5>Total Time</h5>
                                   <p><i class="fa fa-clock-o"></i>{{ str_replace(['h', 'm'], [' hours,', ' Minutes'], $flight->DURATION) }}</p>
                               </div>
                               <div class="country_section_box">
                                   <p>Destination</p>
                                   <p>{{ $flight->DEST }}</p>
                                   <h4>{{ \Carbon\Carbon::parse($flight->ARRIVAL_TIME)->format('h:i A') }}</h4>
                                   <p class="shedule_d">{{ \Carbon\Carbon::parse($flight->DEPARTURE_DATE ?? $flight->DEPARTURE_DATE)->format('Y-m-d') }}</p>
                               </div>
                           </div>
                        </div>
                       <!--DESTINATIONS FOR TWO WAY-->
                        <div class="p-0 border-top-blue" style="display: none;" id="InBound"><span class="flight_no">{{ $flight->AIRLINE }} [Flight No: {{ $flight->FLIGHT_NO }}]</span>
                           <div class="main_section_flight">
                               <div class="country_section_box">
                                   <p>Origin</p>
                                   <p>{{ $flight->DEST }}</p>
                                   <h4>{{ \Carbon\Carbon::parse($flight->DEPARTURE_TIME)->format('h:i A') }}</h4>
                                   <p class="shedule_d">{{ \Carbon\Carbon::parse($flight->DEPARTURE_DATE)->format('Y-m-d') }}</p>
                               </div>
                               <div class="middle_flight_section">
                                   <h5>Total Time</h5>
                                   <p><i class="fa fa-clock-o"></i>{{ str_replace(['h', 'm'], [' hours,', ' Minutes'], $flight->DURATION) }}</p>
                               </div>
                               <div class="country_section_box">
                                   <p>Destination</p>
                                   <p>{{ $flight->ORGN }}</p>
                                   <h4>{{ \Carbon\Carbon::parse($flight->ARRIVAL_TIME)->format('h:i A') }}</h4>
                                   <p class="shedule_d">{{ \Carbon\Carbon::parse($flight->DEPARTURE_DATE ?? $flight->DEPARTURE_DATE)->format('Y-m-d') }}</p>
                               </div>
                           </div>
                       </div>
                       <!--DESTINATIONS FOR TWO WAY END-->
                       <div class="inludes_section">
                           <div class="flight_details_table">
                               <div class="table_heding_title my-2">Traveller Details</div>
                               <div class="hotel_airlines_list">
                                   <div class="airline_detail_list">
                                       <fieldset>
                                           <ul>
                                               {{--[{"Firstname":"Karina","Lastname":"Mckee","Cnic":"_____-_______-_","Dob":"03-28-2022","Title":"MS","WheelChair":"No","FullName":"Karina Mckee"}]--}}
                                               @foreach($adults as $adult)
                                                   <li><span>ADT Name</span><span>-</span><span>{{ $adult->Title }} {{ trim($adult->Firstname . ' ' . $adult->Lastname) }}</span></li>
                                               @endforeach

                                               @if(count($childs) > 0)
                                                   @foreach($childs as $child)
                                                       <li><span>CHD Name</span><span>-</span><span>{{ $child->Title }} {{ trim($child->Firstname . ' ' . $child->Lastname) }}</span></li>
                                                   @endforeach
                                               @endif
                                               @if(count($infants) > 0)
                                                   @foreach($infants as $infant)
                                                       <li><span>INF Name</span><span>-</span><span>{{ $infant->Title }} {{ trim($infant->Firstname . ' ' . $infant->Lastname) }}</span></li>
                                                   @endforeach
                                               @endif
                                               <li><span>Mobile No</span><span>-</span><span>{{ $detail->mobile }}</span>
                                               </li>
                                               <li><span>CNIC</span><span>-</span><span>{{ $detail->cnic }}</span></li>
                                               <li><span>PNR No</span><span>-</span><span>{{ $booking->pnr }}</span></li>
                                           </ul>
                                       </fieldset>
                                   </div>
                                   <div class="airline_detail_list table_bold">
                                       <fieldset>
                                           <ul>
                                               <li><span>No. of Passsengers</span><span>-</span><span>{{ number_format(($travelers->ADULT + $travelers->CHILD + $travelers->INFANT)) }}</span></li>
                                               <li><span>Adult</span><span>-</span><span>{{ number_format($travelers->ADULT) }}</span></li>
                                               <li><span>Infant</span><span>-</span><span>{{ number_format($travelers->INFANT) }}</span></li>
                                               <li><span>Child</span><span>-</span><span>{{ number_format($travelers->CHILD) }}</span></li>
                                           </ul>
                                       </fieldset>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<div class="pnr-payment-btn" style="display: flex; justify-content: center; padding: 20px 0px 20px 0px">
<a href="{{ url("/payment?pnr={$pnr}") }}"><button class="btn" style="margin-right: 20px;">Proceed To Payment</button></a>
<a href="{{ url('/') }}"><button class="btn">Pay Later</button></a>
</div>

</main>



@endsection
{{-- Scripts --}}
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
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
            console.error('Error:', error);
        });
}

// Get time left and start the timer
getTimeLeftAndStartTimer();

    </script>
@endsection
