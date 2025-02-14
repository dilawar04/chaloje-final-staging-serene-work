<!-- booking-area -->
<script>
 $(document).ready(function() {
   $("#new-dropdown").click(function(){
    // alert("CLICKED")
     $("#new-dropdown-menu").toggle();
        });
    $("#closer").click(function(){
        $("#new-dropdown-menu").toggle();
    });
    $("#round").click(function() {
        $("#return").attr("disabled" , false);
    });
    $("#one-way").click(function() {
        $("#return").attr("disabled" , true)
    });
    // org code disabled
//   $('.adtless , .adtadd').click(function(e) {
// 		e.preventDefault();
// 	  var $qty = $(this).closest('.inc-dec-sec1').find('.new-input'),
// 		currentVal = parseInt($qty.val()),
// 		isAdd = $(this).hasClass('adtadd');
// 	  !isNaN(currentVal) && $qty.val(
// 		isAdd ? ++currentVal : (currentVal > 0 ? --currentVal : currentVal)
// 	  );
//       let val = $('#new-input').val();
//       if (val > 1) {
//   $('#adt-less').attr('disabled', false);
  
// } else {
//   $('#adt-less').attr('disabled', true);
// }
//     //   alert(val);

//   });

    $('.adtless , .adtadd').click(function(e) {
        console.log("CLICKED");
		e.preventDefault();
	  var $qty = $(this).closest('.inc-dec-sec1').find('.new-input-adt'),
		currentVal = parseInt($qty.val()),
		isAdd = $(this).hasClass('adtadd');
	  !isNaN(currentVal) && $qty.val(
		isAdd ? ++currentVal : (currentVal > 1 ? --currentVal : currentVal)
	  );
    });
    (function () {
          let val = $('#new-input').val();
          if (val > 1) {
      $('adt-less').attr('disabled', false);
      
    } else {
      $('adt-less').attr('disabled', true);
    }
        //   alert(val);
    
     });


    $('.chdless , .chdadd').click(function(e) {
		console.log("CLICKED");
		e.preventDefault();
	  var $qty = $(this).closest('.inc-dec-sec2').find('.new-input-chd'),
		currentVal = parseInt($qty.val()),
		isAdd = $(this).hasClass('chdadd');
	  !isNaN(currentVal) && $qty.val(
		isAdd ? ++currentVal : (currentVal > 0 ? --currentVal : currentVal)
	  );
  });
  $('.infless , .infadd').click(function(e) {
		e.preventDefault();
	  var $qty = $(this).closest('.inc-dec-sec3').find('.new-input-inf'),
		currentVal = parseInt($qty.val()),
		isAdd = $(this).hasClass('infadd');
	  !isNaN(currentVal) && $qty.val(
		isAdd ? ++currentVal : (currentVal > 0 ? --currentVal : currentVal)
	  );
      console.log(currentVal);
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
})

      });
</script>
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- <div class="booking-tag">
                <ul>
                    <li><a href="booking-list.html"><i class="flaticon-flight"></i>Flights</a></li>
                    <li><a href="booking-list.html"><i class="flaticon-car-1"></i>Car Rentals</a></li>
                    <li><a href="booking-list.html"><i class="flaticon-eiffel-tower"></i>Attractions</a></li>
                    <li><a href="booking-list.html"><i class="flaticon-taxi"></i>Airport Taxis</a></li>
                </ul>
            </div> -->
            <div class="booking-wrap">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="bOOKing-tab" data-bs-toggle="tab" data-bs-target="#bOOKing-tab-pane" type="button"
                                role="tab" aria-controls="bOOKing-tab-pane" aria-selected="true"><i class="flaticon-flight"></i>Air Booking</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="trips-tab" data-bs-toggle="tab" data-bs-target="#trips-tab-pane" type="button"
                                role="tab" aria-controls="trips-tab-pane" aria-selected="false"><i class="flaticon-file"></i>Find Your Booking</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="bOOKing-tab-pane" role="tabpanel" aria-labelledby="bOOKing-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-content-wrap">
                                    <div class="content-top">
                                        <ul name="flightType" aria-label="Default">
                                            <li class="{{ empty(req('ReturningOn')) ? "active" : "" }}"><a href="#" id="one-way" value="one-way">One Way Trip</a></li>
                                            <li class="{{ !empty(req('ReturningOn')) ? "active" : "" }}"><a href="#" id="round" value="round">Round Trip</a></li>
                                        </ul>
                                    </div>
                                    <form action="{{ url("flight-booking") }}"  method="GET" class="booking-form needs-validation row g-3">
                                        <ul>
                                            <li>
                                                <div class="form-grp">
                                                    <label>Departure</label>
                                                    <select class="form-select" id="validationDeparture" name="LocationDep" required="true">
                                                        <option value="">From</option>
                                                        {!! selectBox("SELECT IATA_code, airport FROM airports WHERE status='Active'", req('LocationDep')) !!}
                                                    </select>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-grp">
                                                    <label>Arrival</label>
                                                    <select class=" form-select" id="validationArrival" name="LocationArr" required="true">
                                                        <option value="">To</option>
                                                        {!! selectBox("SELECT IATA_code, airport FROM airports WHERE status='Active'", req('LocationArr')) !!}
                                                    </select>
                                                    <!-- <button class="exchange-icon"><i class="flaticon-exchange-1"></i></button> -->
                                                </div>
                                            </li>
                                            <!-- <li>
                                                <div class="form-grp select" style="display: none;">
                                                    <label for="shortBy">Trips</label>
                                                    <select id="shortBy" name="flightType" class="form-select" aria-label="Default select example">
                                                        <option value="one-way">Flight types</option>
                                                        @php
                                                        $OPT = ['one-way' => 'One-Way Trip', 'round' => 'Round Trip'];
                                                        echo selectBox($OPT, req('flightType'))
                                                        @endphp
                                                    </select>
                                                </div>
                                            </li> -->
                                            <li>
                                                <div class="form-grp date">
                                                    <ul>
                                                        <li>
                                                            <label for="shortBy">Depart Date</label>
                                                            <input type="date" name="DepartingOn" id="validationDepartDate" value="{{ req('DepartingOn') }}"  placeholder="Select Date" required>
                                                        </li>
                                                        <li>
                                                            <label for="shortBy">Return Date</label>
                                                            <!-- <input type="hidden" name="Return" value="false"> -->
                                                            <input type="date" id="return" name="ReturningOn" id="validationArrivalDeparture" value="{{ req('ReturningOn') }}" placeholder="Select Date"  {{ !empty(req('ReturningOn')) ? "" : "disabled" }} required>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <!-- @php 
                                              $number
                                            @endphp -->
                                            <li>
                                                <div class="form-grp economy">
                                                    <label for="text" style="margin-top: -10px !important;">Passenger</label>
                                                     <!-- <input type="" placeholder=""  disabled/> -->
                                                     <input id="new-dropdown" value="Adult {{ req("AdultNo", 1) }}, Child {{ req("ChildNo") }}, Infant {{ req("InfantNo") }}" />
                                                      <div id="new-dropdown-menu">
                                                      <div id="close-me"><i class="fa fa-close" id="closer"></i></div>
                                                         <!--org code hide-->
                                                         <!--<div id="new-dropdown-item-1">-->
                                                         <!--<h6>Adult: </h6>-->
                                                         <!--   <div class="inc-dec-sec1">-->
                                                         <!--   <button class="adtless" id="adt-less" disabled="true"> - </button>-->
                                                         <!--   <input class="new-input" id="new-input" type="text" name="AdultNo" value="{{ req("AdultNo", 1) }}"  readonly/>-->
                                                         <!--   <button class="adtadd"> + </button>-->
                                                         <!--   </div>-->
                                                         <!--</div>-->
                                                         <div id="new-dropdown-item-1">
                                                         <h6>Adult: </h6>
                                                            <div class="inc-dec-sec1">
                                                            <button class="adtless" style="margin-left: 3px"> - </button>
                                                            <input class="new-input new-input-adt" id="new-input" type="text" name="AdultNo" value="{{ req("AdultNo", 1) }}"  readonly/>
                                                            <button class="adtadd"> + </button>
                                                            </div>
                                                         </div>
                                                         <div id="new-dropdown-item-2">
                                                            <h6>Child: </h6>
                                                            <div class="inc-dec-sec2">
                                                            <button class="chdless" style="margin-left: 3px"> - </button>
                                                            <input class="new-input new-input-chd" id="new-input" type="text" name="ChildNo" value="{{ req("ChildNo", 0) }}"  readonly/>
                                                            <button class="chdadd"> + </button>
                                                            </div>
                                                         </div>
                                                         <div id="new-dropdown-item-3">
                                                            <h6>Infant: </h6>
                                                            <div class="inc-dec-sec3">
                                                            <button class="infless" style="margin-left: -3px"> - </button>
                                                            <input class="new-input new-input-inf" id="new-input" type="text" name="InfantNo" value="{{ req("InfantNo", 0) }}" readonly/>
                                                            <button class="infadd"> + </button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                    <!-- <input type="text" name="AdultNo" value="{{ req("AdultNo", 1) }}" id="text" placeholder="1 Passenger, Economy">
                                                    <input type="hidden" name="ChildNo" value="{{ req("ChildNo", 0) }}">
                                                    <input type="hidden" name="InfantNo" value="{{ req("InfantNo", 0) }}"> -->
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="content-bottom">
                                            <a href="#" class="promo-code">+ Add Promo code</a>
                                            <button type="submit" class="btn">Show Flights <i class="flaticon-flight-1"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="trips-tab-pane" role="tabpanel" aria-labelledby="trips-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-content-wrap">
                                    <div class="content-top">
                                        <ul>
                                            <li>Find Your Flights</li>
                                            <li><span>Only on</span>Chaloje</li>
                                        </ul>
                                    </div>
                                    <form action="#" class="flight-checker">
                                        <div class="flight-checker-form">
                                            <ul>
                                                <li>
                                                    <input class="form-control-lg" id="email" name="Email" style="width: 55vw;"  type="text" placeholder="Email">
                                                    <input class="form-control-lg" id="PNR" name="PNR" style="width: 21vw;" type="text" placeholder="#Order ID">
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                    <div class="content-bottom">
                                        <a name="create" onclick="location.href='/pnr?pnr=' + document.getElementById('PNR').value + '&email=' + document.getElementById('email').value" class="btn">Find Your Flight <i class="flaticon-flight-1"></i></a>
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
<!-- booking-area-end -->

<!-- <div class="content-bottom">
                                        <a name="create" onclick="location.href='/manage-booking?pnr=' + document.getElementById('PNR').value + '&email=' + document.getElementById('email').value" class="btn">Find Your Flight <i class="flaticon-flight-1"></i></a>
                                    </div> -->

                                    <!-- <form action="#" class="flight-checker">
                                        <div class="flight-checker-form">
                                            <ul>
                                                <li>
                                                    <input class="form-control-lg" id="email" name="Email" style="width: 55vw;"  type="text" placeholder="Email">
                                                    <input class="form-control-lg" id="PNR" name="PNR" style="width: 21vw;" type="text" placeholder="PNR#">
                                                </li>
                                            </ul>
                                        </div>
                                    </form> -->