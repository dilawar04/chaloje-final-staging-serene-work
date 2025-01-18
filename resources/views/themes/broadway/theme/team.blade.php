@php
    $total_plots = \App\ProjectProperty::count();
    $dealers = \App\User::where(['user_type_id' => 6, 'status' => 'Active'])->orderByRaw('RAND()')->get();
@endphp
@if(count($dealers) > 0)
<!-- Our team start -->
<div class="our-team pt-5 pt-4 top_border">
   <div class="container">
      <!-- Main title -->
      <div class="main-title">
         <h1>Our Dealers</h1>
         <p>
         <p>{{ number_format($total_plots) }} Properties</p>
         </p>
      </div>
      <!-- Slick slider area start -->
      <div class="slick-slider-area">
         <div class="row slick-carousel" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
             @foreach($dealers as $k => $dealer)
                 <div class="slick-slide-item">
                     <div class="team-1">
                         <div class="team-thumb">
                             <a href="{{ url("dealer/account/{$dealer->id}") }}">
                                 <img src="{{ _img(asset_url("users/{$dealer->photo}"), 300, 300, env('IMG_NA_USER')) }}" alt="agent-2" class="img-fluid">
                             </a>
                             {{--<div class="team-social flex-middle">
                                 <div class="team-overlay"></div>
                                 <div class="team-social-inner">
                                     <a rel="nofollow" href="#" class="facebook">
                                         <i class="fa fa-facebook" aria-hidden="true"></i>
                                     </a>
                                     <a rel="nofollow" href="#" class="twitter">
                                         <i class="fa fa-twitter" aria-hidden="true"></i>
                                     </a>
                                     <a rel="nofollow" href="#" class="google">
                                         <i class="fa fa-google" aria-hidden="true"></i>
                                     </a>
                                     <a rel="nofollow" href="#" class="linkedin">
                                         <i class="fa fa-linkedin" aria-hidden="true"></i>
                                     </a>
                                 </div>
                             </div>--}}
                         </div>
                         <div class="team-info">
                             <h4>
                                 <a href="{{ url("dealer/account/{$dealer->id}") }}">{{ $dealer->fullname }}</a>
                             </h4>
                             <p>{{ $dealer->address }}</p>
                         </div>
                     </div>
                 </div>
             @endforeach

         </div>
      </div>
   </div>
</div>
<!-- Our team end -->
@endif
