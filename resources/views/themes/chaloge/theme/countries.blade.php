@php
    $total_plots = \App\ProjectProperty::count();
    $sold_plots = \App\OrderDetail::count();
    $total_dealers = \App\User::where(['user_type_id' => 6, 'status' => 'Active'])->count();
@endphp
<!-- Counters strat -->
    <div class="counters-1 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 border-l border-r">
                    <div class="counter-box-1">
                        <div class="icon">
                            <i class="flaticon-sale"></i>
                        </div>
                        <h1 class="counter">{{ ($total_plots) }}</h1><p>Total Plots</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 border-r">
                    <div class="counter-box-1">
                        <div class="icon">
                            <i class="flaticon-rent"></i>
                        </div>
                        <h1 class="counter">{{ ($sold_plots) }}</h1>
                        <p>Plots Sold</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 border-r">
                    <div class="counter-box-1">
                        <div class="icon">
                            <i class="flaticon-user"></i>
                        </div>
                        <h1 class="counter">{{ ($total_plots - $sold_plots) }}</h1>
                        <p>Available for Sale</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 border-r">
                    <div class="counter-box-1">
                        <div class="icon">
                            <i class="flaticon-broker"></i>
                        </div>
                        <h1 class="counter">{{ ($total_dealers) }}</h1>
                        <p>Authorized Dealers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counters end -->
