@extends(\App\Theme::template())
@section('page_banner')

@endsection

@section('content')
    <div class="contact-section">
        <div class="container">
            <div class="row login-box">
                <div class="col-lg-6 align-self-center pad-0">
                    <div class="form-section align-self-center">
                        <h3>Register into your account</h3>
                        <div class="btn-section clearfix">
                            <a href="{{ url("customer/login") }}" class="link-btn btn-1 active-bg">Login</a>
                            <a href="{{ url("customer/registration") }}" class="link-btn active btn-2 default-bg">Register</a>
                        </div>
                        <div class="clearfix"></div>
                        <form action="{{ url("customer/registration") }}" method="POST">
                            @csrf
                            <div class="form-group form-box">
                                <input type="text" name="first_name" class="input-text" placeholder="Name">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group form-box">
                                <input type="text" name="phone" class="input-text" placeholder="Phone #">
                                @error('phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
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
                                <button type="submit" class="btn-md btn-theme float-left">Register</button>
                                <a href="{{ url("customer/forgot") }}" class="forgot-password">Forgot Password</a>
                            </div>
                        </form>
                        <p>Have an account? <a href="{{ url("customer/login") }}">Login here</a></p>
                    </div>
                </div>
                <div class="col-lg-6 bg-color-15 align-self-center pad-0 none-992 bg-img">
                    @include(theme_dir('components.auth_sidebar'))
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Scripts --}}
@section('scripts')

@endsection
