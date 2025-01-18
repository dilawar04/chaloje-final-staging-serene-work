@extends(\App\Theme::template())
@section('content')
<!-- breadcrumb-area -->
<main>
<section class="breadcrumb-area breadcrumb-bg" style="margin-bottom: 20px">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content text-center">
                                <h2 class="title">Login</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url("") }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

        <!-- NEW LOGIN FORM -->
            <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6 offset-sm-2 col-sm-8 col-12">
                    <div class="account-sign-in">
                        <div class="title text-center">
                        <a href="{{ url("") }}">
                                <img src="{{ _img(asset_url('images/' . opt('logo'), 1), 190, 50, null, ['quality' => 100, 'func' => 'resize']) }}" alt="{{ opt('site_title') }}"/>
                            </a>
                        </div>
                        <div class="login-with text-center">
                            <h6>log In With</h6>
                            <div class="login-social row">
                                <div class="col">
                                    <a class="boxes" href="fb.com">
                                        <img style="width: 30px" src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_circle_color-512.png"
                                            class="img-fluid  lazyload" alt="">
                                        <h6>facebook</h6>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="boxes" href="gmail.com">
                                        <img style="width: 30px" src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png"
                                            class="img-fluid lazyload" alt="">
                                        <h6>Google</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="divider">
                                <h6>OR</h6>
                            </div>
                        </div>
                        <form action="{{ url("customer/login") }}" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="email" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">remember me</label>
                            </div>
                            <div class="button-bottom">
                                <button type="submit" class="w-100 btn btn-solid"><span style="text-align: center; display: flex; justify-content: center;">login</span></button>
                                <div class="w-100 text-center pt-2 pb-2 " style="font-size: 18px;">
                                    <a href="{{ url("customer/forgot") }}" class="text-danger">Forgot Password</a>
									</div>
                            </div>
                                <div class="divider text-center">
                                    <h6>OR</h6>
                                </div>
                                <a href="{{ url('/register') }}" >
                                    <button type="submit" class="w-100 btn btn-solid btn-outline" style="margin-bottom: 40px; text-align: center; display: flex; justify-content: center;">create account</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- New Login form -->
</main>


@endsection
{{-- Scripts --}}
@section('scripts')

@endsection