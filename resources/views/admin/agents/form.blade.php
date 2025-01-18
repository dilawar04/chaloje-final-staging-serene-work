@php
    /**
    * Adnan Bashir
    * E: developer.adnan@gmail.com
    * P: +92-332-3103324
    * S: developer.adnan
    */
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="users">
        @csrf
        @include('admin.layouts.inc.stickybar', compact('form_buttons'))
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <input type="hidden" name="id" class="form-control" placeholder="{{ __('ID') }}" value="{{ $row->id }}">
            <!-- begin:: Content -->


            <div class="row">
                <div class="col-lg-9">
                    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
                        <div class="kt-portlet__head">
                            @include('admin.layouts.inc.portlet_head')
                            @include('admin.layouts.inc.portlet_actions')
                        </div>

                        <div class="kt-portlet__body">
                            <div class="mt10"></div>

                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <label for="first_name" class="col-2 col-form-label required">{{ __('First Name') }}:</label>
                                <div class="col-6">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="{{ __('First Name') }}" value="{{ old('first_name', $row->first_name) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <label for="last_name" class="col-2 col-form-label">{{ __('Last Name') }}:</label>
                                <div class="col-6">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="{{  __('Last Name') }}" value="{{  old('last_name', $row->last_name) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <label for="email" class="col-2 col-form-label required">{{ __('Email') }}:</label>
                                <div class="col-6">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="{{  __('Email') }}" value="{{  old('email', $row->email) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <label for="phone" class="col-2 col-form-label">{{ __('Phone') }}:</label>
                                <div class="col-6">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="{{  __('Phone') }}" value="{{  old('phone', $row->phone) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <label for="address" class="col-2 col-form-label">{{ __('Address') }}:</label>
                                <div class="col-6">
                                    <textarea name="address" id="address" class="form-control" placeholder="{{  __('Address') }}" cols="30" rows="5">{{ old('address', $row->address) }}</textarea>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <label for="city" class="col-2 col-form-label">{{ __('City') }}:</label>
                                <div class="col-6">
                                    <input type="text" name="city" id="city" class="form-control" placeholder="{{  __('City') }}" value="{{  old('city', $row->city) }}"/>
                                </div>
                            </div>

                        </div>


                    </div>


                    {{--<div class="kt-portlet" data-ktportlet="true">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon"> <i class="flaticon-book"></i> </span>
                                    <h3 class="kt-portlet__head-title">  {{ __('Emergency Contact Person') }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="kt-portlet__body">
                            <div class="mt10"></div>

                            <div class="form-group row my-repeater">
                                <div class="col-12" data-repeater-list="">
                                    @php
                                        $row->emails = old('emails');
                                        if(empty($row->emails)){
                                            $emails = json_decode("[{}]");
                                        } else{
                                            $emails = json_decode($row->emails);
                                        }
                                    @endphp
                                    @foreach($emails as $email)
                                        <div data-repeater-item>
                                            <div class="form-group row">
                                                <div class="col-4">
                                                    <input type="text" name="emg[name]" id="emg_name" class="form-control" placeholder="{{ __('Name') }}" value="{{ ($email) }}"/>
                                                </div>
                                                <div class="col-4">
                                                    <input type="text" name="emg[email]" id="emg_name" class="form-control" placeholder="{{ __('Email') }}" value="{{ ($email) }}"/>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" name="emg[phone]" id="emg_phone" class="form-control" placeholder="{{ __('Phone') }}" value="{{ ($email) }}"/>
                                                </div>
                                                <div class="col-1">
                                                    <a href="javascript:void(0);" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-icon"><i class="la la-trash-o"></i></a>
                                                    @if($loop->first)
                                                        <a href="javascript:void(0);" data-repeater-create="" class="btn-sm btn btn-label-success btn-icon"><i class="la la-plus"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-sm"></div>
                                            <div class="form-group row">
                                                <div class="col-8">
                                                    <textarea name="emg[address]" id="emg_address" placeholder="{{ __('Address') }}" class="form-control" rows="2"></textarea>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" name="emg[relationship]" id="emg_relationship" class="form-control" placeholder="{{ __('Relationship') }}" value="{{ ($email) }}"/>
                                                </div>
                                            </div>
                                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-sm"></div>
                                            <div class="form-group row">
                                                <div class="col-11">
                                                    <textarea name="emg[comment]" id="emg_comment" placeholder="{{ __('Comment') }}" class="form-control" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-sm"></div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>--}}

                </div>

                <div class="col-lg-3">
                    <div class="kt-portlet" data-ktportlet="true">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon"> <i class="flaticon2-image-file"></i> </span>
                                    <h3 class="kt-portlet__head-title"> {{ __('Photo') }} </h3>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-12 text-center">
                                    <input disabled type="hidden" name="photo--rm" value="{{  $row->photo }}">
                                    @php
                                        $file_input = `<input type="file" name="image" accept="gif,jpg,jpeg,png" name="photo" id="photo" class="form-control custom-file-input" placeholder="{{ __('Photo') }}" value="{{ ($row->photo) }}" >`;
                                        $thumb_url = asset_url("{$_this->module}/" . $row->photo);
                                        $delete_img_url = admin_url('ajax/delete_img/' . $row->id . '/photo', true);
                                        echo thumb_box($file_input, $thumb_url, $delete_img_url);
                                    @endphp
                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="kt-portlet" data-ktportlet="true">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon"> <i class="flaticon2-lock"></i> </span>
                                    <h3 class="kt-portlet__head-title"> {{ __('Credential') }} </h3>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="username" class="-col-2 col-form-label -text-right required">{{ __('Username') }}:</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="{{  __('Username') }}" value="{{  old('username', $row->username) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="password" class="-col-2 col-form-label required">{{ __('Password') }}:</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="{{  __('Password') }}" value=""/>
                                </div>
                            </div>

                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="Commission" class="-col-2 col-form-label required">{{ __('Commission') }}:</label>
                                    <div class="input-group m-input-group">
                                        <input type="number" name="Commission" id="Commission" class="form-control" placeholder="{{  __('Commission') }}" value="{{ old('Commission', $row->Commission) }}"/>
                                        <div class="input-group-append">
                                            <span class="input-group-addon kt-padding-0">
                                                <select name="Type" id="Type" class="form-control">
                                                    {!! selectBox(DB_enumValues($_this->table, 'Type'), old('Type', $row->Type)) !!}
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
@endsection

{{-- Scripts --}}
@section('scripts')
    <script>
        $("form#users").validate({
            // define validation rules
            rules: {
                'user_type_id': {
                    required: true,
                },
                'first_name': {
                    required: true,
                },
                'email': {
                    required: true, email: true,
                },
                'username': {
                    required: true,
                },
                'password': {
                    required: true, minlength: 3, maxlength: 8,
                },
            },
            /*messages: {
            'user_type_id' : {required: 'User Type is required',},'first_name' : {required: 'First Name is required',},'email' : {required: 'Email is required',email: 'Email is not valid',},'username' : {required: 'Username is required',},'password' : {required: 'Password is required',minlength: 'Password must be at least 8 character\'s',maxlength: 'Password maximum 8 character\'s',},    },*/
            //display error alert on form submit
            invalidHandler: function (event, validator) {
                KTUtil.scrollTop();
                //validator.errorList[0].element.focus();
            },
            submitHandler: function (form) {
                form.submit();
            }

        });
        @if($row->id > 0)
        $('#password').rules('remove');
        @endif
    </script>
@endsection
