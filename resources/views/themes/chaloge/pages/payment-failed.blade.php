@extends(\App\Theme::template())
@section('content')


<!-- breadcrumb-area -->
<section class="breadcrumb-area breadcrumb-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-content text-center">
                    <h2 class="title">Payment Failed</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url("") }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thanks You For Choosing Chaloje</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->



<section class="login-main-wrapper">
    <div class="main-container">
        <div class="login-process">
            <div class="login-main-container">
                <div class="thankyou-wrapper">
                    <div class="d-flex jj" style="justify-content: center;">
                    <!-- <img style="position: absolute; margin-left: -90px" width="300px" src="/assets/img/flight.png" /> -->
                    </div>
                    <!-- <h1 style="z-index: 2 !important; position: relative;">
                        <img src="http://montco.happeningmag.com/wp-content/uploads/2014/11/thankyou.png" alt="thanks" />
                    </h1> -->
                        <p class="payment-failed">
                          @foreach($response as $key => $value)  
                          @if($key === 'message')  
                               {{$value}}
                          @endif
                          
                          {{-- @if($key === 'code')  
                          <br />  {{'code: ' . $value}}
                          @endif 
                          @if($key === 'Order_Ref_Number')  
                          <br />   {{'Order_Ref_Number: ' . $value}}
                          @endif
                          @if($key === 'status')  
                          <br />    {{'status: ' . $value}}
                          @endif --}}
                          @if($key === 'Payment_Type')  
                          <br />   {{'Payment_Type: ' . $value}}
                          @endif
                         @endforeach
                        </p>
                     <div class="d-flex mb-3" style="justify-content: center">
                      <button class="btn">
                        <a href="{{ url("") }}">Book Another Flight <i class='fas fa-plane-departure'></i></a>
                      </button>
                     </div>
                      <div class="clr"></div>
                  </div>
                  <div class="clr"></div>
              </div>
          </div>
          <div class="clr"></div>
      </div>
  </section>


@endsection
{{-- Scripts --}}
@section('scripts')

@endsection
