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
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="coupons">
        @csrf
        @include('admin.layouts.inc.stickybar', compact('form_buttons'))
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <input type="hidden" name="id" class="form-control" placeholder="{{ __('ID') }}"
                   value="{{ old('id', $row->id) }}">
            <!-- begin:: Content -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
                        <div class="kt-portlet__head">
                            @include('admin.layouts.inc.portlet_head')
                            @include('admin.layouts.inc.portlet_actions')
                        </div>

                        <div class="kt-portlet__body">


                            <div class="form-group row">
                                <input type="hidden" name="coupon_type" value="Coupon">
                                {{--<div class="col-lg-2">
                                    <label for="coupon_type" class="col-form-label">{{ __('Coupon Type') }}:</label>
                                    <select name="coupon_type" id="coupon_type" class="form-control m_selectpicker">
                                        <option value="">Select Coupon Type</option>
                                        {!! selectBox(DB_enumValues('coupons', 'coupon_type'), old('coupon_type', $row->coupon_type)) !!}
                                    </select>
                                </div>--}}

                                <div class="col-lg-5 offset-lg-1">
                                    <label for="coupon_name" class="col-form-label required">{{ __('Coupon Name') }}:</label>
                                    <input type="text" name="coupon_name" id="coupon_name" class="form-control" placeholder="{{ __('Coupon Name') }}" value="{{ old('coupon_name', $row->coupon_name) }}"/>
                                </div>

                                <div class="col-lg-5">
                                    <label for="coupon_code" class="col-form-label required">{{ __('Coupon Code') }}:</label>
                                    <input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="{{ __('Coupon Code') }}" value="{{ old('coupon_code', $row->coupon_code) }}"/>
                                </div>

                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                            <div class="row form-group justify-content-center">

                                <div class="col-lg-2">
                                    <label for="discount" class="col-form-label">{{ __('Discount') }}:</label>
                                    <div class="input-group">
                                        <input type="text" name="discount" id="discount" class="form-control" placeholder="{{ __('Discount') }}" value="{{ old('discount', $row->discount) }}"/>
                                        <div class="input-group-append"><span class="input-group-text p-0 border-0" style="width: 120px;">
                                            <select name="discount_type" id="discount_type" class="form-control m_selectpicker">
                                                {!! selectBox(DB_enumValues('coupons', 'discount_type'), old('discount_type', $row->discount_type)) !!}
                                            </select>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{--<div class="col-lg-2">
                                    <label for="total_amount" class="col-form-label required">{{ __('Total amount') }}:</label>
                                    <div class="input-group">
                                        <input type="text" name="total_amount" id="total_amount" class="form-control" placeholder="{{ __('Amount') }}" value="{{ old('total_amount', $row->total_amount) }}"/>
                                        <div class="input-group-append"><span class="input-group-text">{{ opt('currency') }}</span></div>
                                    </div>
                                </div>--}}


                                <div class="col-lg-2">
                                    <label for="start_date" class="col-form-label">{{ __('Start Date') }}:</label>
                                    <input type="text" name="start_date" id="start_date" class="form-control datepicker" autocomplete="off" placeholder="{{ __('Start Date') }}" value="{{ old('start_date', $row->start_date) }}"/>
                                </div>

                                <div class="col-lg-2">
                                    <label for="end_date" class="col-form-label">{{ __('End Date') }}:</label> <input
                                        type="text" name="end_date" id="end_date" class="form-control datepicker" autocomplete="off"
                                        placeholder="{{ __('End Date') }}"
                                        value="{{ old('end_date', $row->end_date) }}"/>
                                </div>

                                {{--<div class="col-lg-3">
                                    <label for="customer_type" class="col-form-label">{{ __('Customer Type') }}:</label>
                                    <select name="customer_type" id="customer_type" class="form-control m-select2">
                                        <option value="">Select Customer Type</option>
                                        {!! selectBox("SELECT id, user_type FROM user_types", old('customer_type', $row->customer_type)) !!}
                                    </select>
                                </div>--}}

                                {{--<div class="col-lg-2">
                                    <label for="free_shipping" class="col-form-label">{{ __('Free Shipping') }}:</label>
                                    <select name="free_shipping" id="free_shipping" class="form-control m_selectpicker">
                                        <option value="">Select Free Shipping</option>
                                        {!! selectBox(DB_enumValues('coupons', 'free_shipping'), old('free_shipping', $row->free_shipping)) !!}
                                    </select>
                                </div>--}}
                            </div>

                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row justify-content-center">
                                {{--<div class="col-lg-2 offset-lg-2">
                                    <label for="usage_policy" class="col-form-label">{{ __('Usage Policy') }}:</label>
                                    <select name="usage_policy" id="usage_policy" class="form-control m_selectpicker">
                                        <option value="">Select Usage Policy</option>
                                        {!! selectBox(DB_enumValues('coupons', 'usage_policy'), old('usage_policy', $row->usage_policy)) !!}
                                    </select>
                                </div>

                                <div class="col-lg-2">
                                    <label for="usage_limit" class="col-form-label">{{ __('Usage Limit') }}:</label>
                                    <input type="text" readonly name="usage_limit" id="usage_limit" class="form-control" placeholder="{{ __('Usage Limit') }}" value="{{ old('usage_limit', $row->usage_limit) }}"/>
                                </div>--}}

                                <div class="col-lg-2">
                                    <label for="no_used" class="col-form-label">{{ __('No Used') }}:</label>
                                    <input disabled type="text" name="no_used" id="no_used" class="form-control" placeholder="{{ __('No Used') }}" value="{{ old('no_used', $row->no_used) }}"/>
                                </div>

                                <div class="col-lg-2">
                                    <label for="status" class="col-form-label">{{ __('Status') }}:</label>
                                    <select name="status" id="status" class="form-control m_selectpicker">
                                        {!! selectBox(DB_enumValues('coupons', 'status'), old('status', $row->status)) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                        </div>

                        <div class="kt-portlet__foot">
                            <div class="btn-group">
                                @php
                                    $Form_btn = new Form_btn();
                                    echo $Form_btn->buttons($form_buttons);
                                @endphp
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

        $("form#coupons").validate({
            // define validation rules
            rules: {
                'coupon_name': {
                    required: true,
                },
                'coupon_code': {
                    required: true, remote: '<?php echo admin_url('ajax/validate/' . $row->id, true)?>',
                },
                'total_amount': {
                    required: true,
                },
            },
            /*messages: {
            'coupon_name' : {required: 'Coupon Name is required',},'coupon_code' : {required: 'Coupon Code is required',remote: 'This Coupon Code is already exist',},'total_amount' : {required: 'Total Amount is required',},    },*/
            //display error alert on form submit
            invalidHandler: function (event, validator) {
                KTUtil.scrollTop();
                //validator.errorList[0].element.focus();
            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    </script>@endsection
