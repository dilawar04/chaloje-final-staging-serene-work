@extends(\App\Theme::template())

@section('content')
    <div class="row mt-5"></div>
    <div class="container mt-5">
        <div class="main-body">
            <div class="container">
                <h4 class="text-center pt-3">Member Profile</h4>
                <div class="row fome01">
                    <div class="col-lg-9">
                        <h4>Member Information</h4>
                        <div class="table-responsive table-data">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td width="200">Member Name</td>
                                    <td>{{ $user->fullname }}</td>
                                </tr>
                                <tr>
                                    <td width="200">Phone</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td width="200">Mobile</td>
                                    <td>{{ $user->mobile }}</td>
                                </tr>
                                <tr>
                                    <td width="200">Email Address</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td width="200">CNIC #</td>
                                    <td>{{ $user->cnic }}</td>
                                </tr>
                                {{--<tr>
                                    <td width="200">City Name</td>
                                    <td>{{ $user->city }}</td>
                                </tr>
                                <tr>
                                    <td width="200">Country</td>
                                    <td>{{ $user->country }}</td>
                                </tr>--}}
                                <tr>
                                    <td width="200">Home Address</td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <h4>Account Option</h4>
                        <div class="btn-center d-flex justify-content-center">
                            <a href="{{ url("customer/edit_profile") }}" class="login btn-theme btn-sm btn-ctm px-2"><small>EDIT PROFILE</small></a>
                            &nbsp;
                            <a href="{{ url("customer/logout") }}" class="logout btn-theme btn-sm btn-ctm px-2"><small>LOGOUT</small></a>
                        </div>
                        <div class="pt-3 text-center">
                            <img src="{{ _img(asset_url("users/{$user->photo}"), 200, 200, env('IMG_NA_USER')) }}" width="150" class="img-fluid img-thumbnail img_center" alt="">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="clearfix"></div>
                        @include(theme_dir('customer.orders'))
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
