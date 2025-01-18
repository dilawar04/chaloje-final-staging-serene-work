@extends(\App\Theme::template())
@section('page_banner')

@endsection

@section('content')
    <div class="contact-section">
        <div class="container">
            <div class="row login-box">
                <div class="col-lg-12 align-self-center pad-0">
                    <div class="form-section align-self-center">

                        <form action="{{ url("customer/edit_profile") }}" method="POST" class="fome01" enctype="multipart/form-data">
                            @csrf
                            <h4>Customer Information</h4>
                            <div class="row">
                                <div class="form-group form-box col-6">
                                    <input type="text" name="first_name" value="{{ $user->first_name }}" class="input-text" placeholder="Enter first name">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group form-box col-6">
                                    <input type="text" name="last_name" value="{{ $user->last_name }}" class="input-text" placeholder="Enter last name">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group form-box col-6">
                                    <input type="text" name="phone" value="{{ $user->phone }}" class="input-text" placeholder="Enter phone #">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group form-box col-6">
                                    <input type="text" name="rel[mobile]" value="{{ $user->mobile }}" class="input-text" placeholder="Enter mobile #">
                                    @error('rel.mobile')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-box col-6">
                                    <input type="file" name="photo" class="input-text">
                                    @error('photo')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group form-box col-6">
                                    <input type="email" name="email" value="{{ $user->email }}" readonly class="input-text" placeholder="Enter email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-box col-6">
                                    <input type="password" name="current_password" class="input-text" placeholder="Enter current password">
                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group form-box col-6">
                                    <input type="password" name="password" class="input-text" placeholder="Enter new password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-box col-6">
                                    <input type="text" name="rel[cnic]" value="{{ $user->cnic }}" class="input-text" placeholder="Enter cnic">
                                </div>
                                <div class="form-group form-box col-6">
                                    <input type="text" name="rel[company]" value="{{ $user->company }}" class="input-text" placeholder="Enter company">
                                </div>
                            </div>
                            <div class="form-group message">
                                <textarea name="address" class="form-control" placeholder="Enter address">{{ $user->address }}</textarea>
                            </div>


                            <div class="form-group clearfix mt-3">
                                <button type="submit" class="btn-md btn-theme">Update Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Scripts --}}
@section('scripts')

@endsection
