@extends(\App\Theme::template())
@section('content')

@php
    //$pnr = request()->segment(2) ?? '1Q5VRG';
    //$pnr = req('pnr', '1Q5VRG');
    //dd($pnr);
    $OrderID = $_GET['order_id'];
    //dd($OrderID);
    //dd(\request());
    //$OrderID = $_GET['pnr'];
    //dd($OrderID);
    //$booking = \App\Booking::with('details')->where('order_id', $OrderID)->first();
    $bookings = \App\Booking::with('details')->where('order_id', $OrderID)->get();
    //dd($bookings);
    //dd($booking[0]);
    if ($bookings[1]) {
        $booking = $bookings[0];
    } else {
        $bookings = \App\Booking::with('details')->where('order_id', $OrderID)->first();
        $booking = $bookings;
    }
    //dd($booking);

    //dd($booking->id);
    $travelers = json_decode($booking->travelers);
    $_flight = json_decode($booking->flight_summary);
    if(isset($_flight->outbound)){
        $flight = $_flight->outbound->flight;
        $flight->baggage = $_flight->outbound->baggage;
    } else{
        $flight = $_flight->flight;
        $flight->baggage = $_flight->baggage;
    }
    //dd($_flight->inbound);
    $detail = $booking->details->first();
    $adults = json_decode($detail->adult);
    $childs = json_decode($detail->child);
    $infants = json_decode($detail->infant);

    $FARE = $flight->baggage->FARE_PAX_WISE;
    //dump($booking, $flight, $travelers, $detail);
@endphp

<!-- breadcrumb-area -->
<section class="breadcrumb-area breadcrumb-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-content text-center">
                    <h2 class="title">Payment</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url("") }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Payment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<div class="container">
    <div class="pt-5">
        <h1>Review Your Flight Details:</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <i class="fa fa-plane"></i>
            <h3>{{ $flight->ORGN }} <i class="fa fa-arrow-right"></i> {{ $flight->DEST }}</h3><sup>Baggage: ({{ $flight->baggage->title }})</sup>

            <div class="p-0 border-top-blue"><span class="flight_no">{{ $flight->AIRLINE }} [Flight No: {{ $flight->FLIGHT_NO }}]</span>
                <div class="main_section_flight" style="margin-top: 20px; margin-left: -50px;">
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
            
        </div>
        <div class="col-md-6">
            <p style="font-size: 18px">Price Breakdown</p>
            <div class="sec" >
                <p>{{ $travelers->ADULT }} X ADT:  </p>
                <p> PKR  {{ number_format($travelers->ADULT * $FARE->ADULT->TOTAL) }}</p>
            </div>
            @if($travelers->CHILD > 0)
                <div class="sec" >
                    <p>{{ $travelers->CHILD }} X CHD:  </p>
                    <p> PKR  {{ number_format($travelers->CHILD * $FARE->CHILD->TOTAL) }}</p>
                </div>
            @endif
            @if($travelers->INFANT > 0)
                <div class="sec" >
                    <p>{{ $travelers->INFANT }} X INF:  </p>
                    <p> PKR  {{ number_format($travelers->INFANT * $FARE->INFANT->TOTAL) }}</p>
                </div>
            @endif
            <hr style="border:solid 1px;"/>
            <div class="sec" >
                <h3>Total Charges: </h3>
                <h3> PKR  {{ number_format($_flight->outbound->baggage->TOTAL) }}</h3>
            </div>
        </div>

        @if($bookings[1] || $_flight->inbound)
            @php
                if($_flight->inbound) {
                    //dd($_flight->outbound->baggage->TOTAL);
                    //dd(json_decode($booking->flight_summary));
                    $InboundFlightDetails = $_flight->inbound;
                    //dd($InboundFlightDetails);
                    $InboundFlight = $InboundFlightDetails->flight;
                    $InboundFlight->baggage = $InboundFlightDetails->baggage;
                    $InboundFare = $InboundFlight->baggage->FARE_PAX_WISE;
                    $inboundTotalAmount = $_flight->inbound->baggage->TOTAL;
                } else {
                    $InboundFlightDetails = json_decode($bookings[1]->flight_summary);
                    $InboundFlight = $InboundFlightDetails->inbound->flight;
                    $InboundFlight->baggage = $InboundFlightDetails->inbound->baggage;
                    $InboundFare = $InboundFlight->baggage->FARE_PAX_WISE;
                    $inboundTotalAmount = $bookings[1]->total_amount;
                }
                

            @endphp
            <?php 
                // dd($InboundFlight);
            ?>
            <div class="col-md-6">
                <i class="fa fa-plane"></i>

                <h3>{{ $InboundFlight->ORGN }} <i class="fa fa-arrow-right"></i> {{ $InboundFlight->DEST }}</h3><sup>Baggage: ({{ $InboundFlight->baggage->title }})</sup>

                <div class="p-0 border-top-blue"><span class="flight_no">{{ $InboundFlight->AIRLINE }} [Flight No: {{ $InboundFlight->FLIGHT_NO }}]</span>
                    <div class="main_section_flight" style="margin-top: 20px; margin-left: -50px;">
                        <div class="country_section_box">
                            <p>Origin</p>
                            <p>{{ $InboundFlight->ORGN }}</p>
                            <h4>{{ \Carbon\Carbon::parse($InboundFlight->DEPARTURE_TIME)->format('h:i A') }}</h4>
                            <p class="shedule_d">{{ \Carbon\Carbon::parse($InboundFlight->DEPARTURE_DATE)->format('Y-m-d') }}</p>
                        </div>
                        <div class="middle_flight_section">
                            <h5>Total Time</h5>
                            <p><i class="fa fa-clock-o"></i>{{ str_replace(['h', 'm'], [' hours,', ' Minutes'], $InboundFlight->DURATION) }}</p>
                        </div>
                        <div class="country_section_box">
                            <p>Destination</p>
                            <p>{{ $InboundFlight->DEST }}</p>
                            <h4>{{ \Carbon\Carbon::parse($InboundFlight->ARRIVAL_TIME)->format('h:i A') }}</h4>
                            <p class="shedule_d">{{ \Carbon\Carbon::parse($InboundFlight->DEPARTURE_DATE ?? $InboundFlight->DEPARTURE_DATE)->format('Y-m-d') }}</p>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-md-6">
                <p style="font-size: 18px">Price Breakdown</p>
                <div class="sec" >
                    <p>{{ $travelers->ADULT }} X ADT:  </p>
                    <p> PKR  {{ number_format($travelers->ADULT * $InboundFare->ADULT->TOTAL) }}</p>
                </div>
                @if($travelers->CHILD > 0)
                    <div class="sec" >
                        <p>{{ $travelers->CHILD }} X CHD:  </p>
                        <p> PKR  {{ number_format($travelers->CHILD * $InboundFare->CHILD->TOTAL) }}</p>
                    </div>
                @endif
                @if($travelers->INFANT > 0)
                    <div class="sec" >
                        <p>{{ $travelers->INFANT }} X INF:  </p>
                        <p> PKR  {{ number_format($travelers->INFANT * $InboundFare->INFANT->TOTAL) }}</p>
                    </div>
                @endif
                <hr style="border:solid 1px;"/>
                <div class="sec" >
                    <h3>Total Charges: </h3>
                    <h3> PKR  {{ number_format($inboundTotalAmount) }}</h3>
                </div>
            </div>
        @endif


    </div>
    <hr style="border:solid 1px;"/>

    <div class="sec" >
        <h3>Grand Total Charges: </h3>
        <h3> PKR  {{ number_format($inboundTotalAmount + $_flight->outbound->baggage->TOTAL) }}</h3>
    </div>
</div>

<center>
<hr style="border:solid 1px; width: 90%;"/>
</center>

{{-- PAYMENT FORM --}}
<div class="container" style="margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h5>Please Select Your Payment Method: </h5>
            <div class="d-flex" style="margin-top: 30px; justify-content: space-around">
                <div class="form-check">
                    <input style="margin-top: 30px" class="form-check-input" type="radio" name="exampleRadios" id="hbl" value="option1" checked>
                    <label class="form-check-label" for="hbl">
                        <img
                            src="{{url('assets/chaloge/img/hblpaycheckout.png')}}" />
                    </label>
                </div>
                {{--
                <div class="form-check">
                    <input style="margin-top: 30px" class="form-check-input" type="radio" name="exampleRadios" id="paypal" value="option2">
                    <label class="form-check-label" for="paypal">
                        <img
                            width="100px"
                            height="100px"
                            src="https://cdn-images-1.medium.com/max/1200/1*Dw4-tOJ_9myFUywLd3qzjA.png" />
                    </label>
                </div>
                <div class="form-check">
                    <input style="margin-top: 30px" class="form-check-input" type="radio" name="exampleRadios" id="unionpay" value="option3">
                    <label class="form-check-label" for="unionpay">
                        <img
                            width="100px"
                            height="100px"
                            src="https://cdn-icons-png.flaticon.com/512/825/825484.png" />
                    </label>
                </div>
                --}}
            </div>
        </div>
    </div>

    <hr>
    <div class="row mb-5 justify-content-center">
        <div class="col-md-10">
            <form method="post" class=" payment-hbl">
                <input type="hidden" name="order_number" value="{{ $OrderID }}">
                <input type="hidden" name="payment_method" value="HBL">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input name="name" class="form-control" type="text" required="" value="{{ $adults[0]->Firstname }}" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="surname">Surname</label>
                        <input name="surname" class="form-control" type="text" required="" value="{{ $adults[0]->Lastname }}" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input name="email" class="form-control" type="email" required="" value="{{ $detail->email }}" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input name="phone" class="form-control" placeholder="1 (702) 123-4567" type="tel" value="{{ $detail->mobile }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="country">Country</label>
                        <select class="form-select" id="country" name="country">
                            <option>Select Country</option>
                            <option value="AF">Afghanistan</option>
                            <option value="AX">Aland Islands</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia</option>
                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, Democratic Republic of the Congo</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Cote D'Ivoire</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CW">Curacao</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands (Malvinas)</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and Mcdonald Islands</option>
                            <option value="VA">Holy See (Vatican City State)</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran, Islamic Republic of</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KP">Korea, Democratic People's Republic of</option>
                            <option value="KR">Korea, Republic of</option>
                            <option value="XK">Kosovo</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao People's Democratic Republic</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libyan Arab Jamahiriya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macao</option>
                            <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia, Federated States of</option>
                            <option value="MD">Moldova, Republic of</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="AN">Netherlands Antilles</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestinian Territory, Occupied</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Reunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="BL">Saint Barthelemy</option>
                            <option value="SH">Saint Helena</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="CS">Serbia and Montenegro</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SX">Sint Maarten</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="SS">South Sudan</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syrian Arab Republic</option>
                            <option value="TW">Taiwan, Province of China</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania, United Republic of</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Viet Nam</option>
                            <option value="VG">Virgin Islands, British</option>
                            <option value="VI">Virgin Islands, U.s.</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="postalCode">Postal Code</label>
                        <input name="postalCode" class="form-control" type="number" required="" value="" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="postalCode">City</label>
                        <input name="city" class="form-control" type="text" required="" value="" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="state">State</label>
                        <!-- <input name="state" class="form-control" type="text" placeholder="State" required="" value="" /> -->
                        <select name="state" class="form-select">
                            <option>Select State</option>
                            <option value="SD">Sindh</option>
                            <option value="PB">Punjab</option>
                            <option value="IS" >Islamabad</option>
                            <option value="BA">Balochistan</option>
                            <option value="KP">Khyber Pakhtunkhwa</option>
                            <option value="JK">Azad Jammu and Kashmir</option>
                            <option value="GB">Gilgit-Baltistan</option>
                            <option value="TA">Federally Administered Tribal Areas</option>
                        </select>
                    </div>

                    <div class="form-group col-md-8">
                        <label for="addressLine">Address</label>
                        <input name="addressLine" class="form-control" type="text" required="" value="" />
                    </div>

                    <div class="payment-btn mt-3 text-center">
                        <button type="submit" class="btn btn-solid color1">Make Payment</button>
                    </div>
                </div>

            </form>


            {{--<form>

              <h5>Please Select Your Card: </h5>
              <div class="sec">
                  <div class="form-check">
                      <input style="margin-top: 20px" class="form-check-input" type="radio" name="newexampleRadios" id="master-card" value="option1" checked>
                      <label class="form-check-label" for="master-card">
                      <img
                       width="70px"
                       height="60px"
                       src="https://cdn.freebiesupply.com/logos/large/2x/mastercard-4-logo-png-transparent.png" />
                      </label>
                    </div>
                    <div class="form-check">
                      <input style="margin-top: 20px" class="form-check-input" type="radio" name="newexampleRadios" id="visa" value="option1" checked>
                      <label class="form-check-label" for="visa">
                      <img
                       width="70px"
                       height="60px"
                       src="https://cdn.icon-icons.com/icons2/1186/PNG/512/1490135017-visa_82256.png" />
                      </label>
                    </div>
              </div>

              <div class="mb-3">
              <label class="form-label" for="full-name">Full Name*</label>
              <input class="form-control" type="text" name="full-name" placeholder="As Written On Your Card" required/>
              </div>

              <div class="mb-3">
              <label class="form-label" for="card-number">Card Number</label>
              <input class="form-control" type="text" name="card-number" placeholder="1111-2222-3333-4444" maxlength="19" required/>
              </div>
              <p style="margin: 0; font-size: 14px">Expiration Date</p>
              <div class="input-group mb-1" style="width: 30%">
                    <select class="form-select mb-3" aria-label=".form-select-sm example">
                      <option selected>Month</option>
                      <option value="1">Jan</option>
                      <option value="2">Feb</option>
                      <option value="3">Mar</option>
                      <option value="1">Apr</option>
                      <option value="2">May</option>
                      <option value="3">Jun</option>
                      <option value="1">Jul</option>
                      <option value="2">Aug</option>
                      <option value="3">Sep</option>
                      <option value="1">Oct</option>
                      <option value="2">Nov</option>
                      <option value="3">Dec</option>
                    </select>
                  <span style='font-size: 21px; padding: 0px 10px 0px 10px;' >/</span>
                  <input class="form-control" name="year" id="year" type="number" style="height: 38px" placeholder="XX" >
              </div>
              <div class="col-md-6 mb-3">
                <div style="width: 25%">
                  <label class="form-label" for="cvc-no">CVC No.*</label>
                  <input class="form-control" type="number" name="cvc-no" placeholder="CVC" required/>
                </div>
                <div>
                  <p>*Note: CVC number should be atleast 3 to 4 letters*</p>
                </div>
              </div>
              <div class="d-flex mb-5" style="justify-content: end;">
                  <button class="btn">Done</button>
              </div>
          </form>--}}
        </div>
    </div>
  {{-- <div class="col-md-6">
    <div class="sec-left">
    <img src="{{ _img(asset_url('images/' . opt('logo'), 1), 200, 180, null, ['quality' => 100, 'func' => 'resize']) }}" alt="{{ opt('site_title') }}" />
    </div>
</div> --}}
</div>

@endsection
{{-- Scripts --}}
@section('scripts')
    <script>
        $(document).on('submit', '.payment-hbl', function (e) {
            e.preventDefault();
            const form = $(this);
            const data = form.serialize();

            $.post("{{ url("api/payment_details") }}", data, function (json) {
                console.log(json);
                if(json.status){
                    window.location = json.url
                } else {
                    alert(json.error);
                }
            });
        });
    </script>
@endsection
