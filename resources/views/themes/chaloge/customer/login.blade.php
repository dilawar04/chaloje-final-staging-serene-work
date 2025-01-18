@extends(\App\Theme::template())
@section('page_banner')

@endsection

@section('content')
    <div class="contact-section">
        <div class="container">
            <div class="row login-box">
                <div class="col-lg-6 align-self-center pad-0">
                    <div class="form-section align-self-center">
                        <h3>Sign into your account</h3>
                        <div class="btn-section clearfix">
                            <a href="{{ url("customer/login") }}" class="link-btn active btn-1 active-bg">Login</a>
                            <a href="{{ url("customer/registration") }}" class="link-btn btn-2 default-bg">Register</a>
                        </div>
                        <div class="clearfix"></div>
                        <form action="{{ url("customer/login") }}" method="POST">
                            @csrf
                            <div class="form-group form-box">
                                <input type="email" name="email" class="input-text" placeholder="Email Address">
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group form-box clearfix">
                                <input type="password" name="password" class="input-text" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group clearfix">
                                <button type="submit" class="btn-md btn-theme float-left">Login</button>
                                <a href="{{ url("customer/forgot") }}" class="forgot-password">Forgot Password</a>
                            </div>
                        </form>
                        <p>Don't have an account? <a href="{{ url("customer/registration") }}">Register here</a></p>
                    </div>
                </div>
                <div class="col-lg-6 bg-color-15 align-self-center pad-0 none-992 bg-img">
                    <div class="info clearfix">
                        <div class="logo-2">
                            <a href="{{ url("") }}">
                                <img src="{{ _img(asset_url('images/' . opt('logo'), 1), 190, 50, null, ['quality' => 100, 'func' => 'resize']) }}" alt="{{ opt('site_title') }}"/>
                            </a>
                        </div>
                        <h3>Welcome to {{ opt('site_title') }}</h3>
                        <div class="social-list">
                            <a href="#" class="facebook-bg">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#" class="twitter-bg">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="google-bg">
                                <i class="fa fa-google"></i>
                            </a>
                            <a href="#" class="linkedin-bg">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Scripts --}}
@section('scripts')

@endsection
