@php $form_buttons = ['save', 'view', 'delete', 'back']; @endphp
@extends('admin.layouts.admin')
@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="orders">
        @csrf @include('admin.layouts.inc.stickybar', compact('form_buttons'))
        <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
            <input type="hidden" name="id" class="form-control" placeholder="{{ __('ID') }}" value="{{ old('id', $row->id) }}" />
            <!-- begin:: Content -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
                        <div class="kt-portlet__head">
                            @include('admin.layouts.inc.portlet_head')
                            @include('admin.layouts.inc.portlet_actions')
                        </div>

                        <div class="kt-portlet__body">
                            <div class="form-group row justify-content-center">
                                <div class="col-lg-2">
                                    <label for="order_number" class="col-form-label required">{{ __('Order Number') }}:</label>
                                    <input type="text" name="order_number" readonly id="order_number" class="form-control" placeholder="{{ __('Order Number') }}" value="{{ old('order_number', $row->order_number ?? ($row->id + 1)) }}" />
                                </div>
                                <div class="col-lg-4">
                                    <label for="customer_id" class="col-form-label">{{ __('Customer') }}:</label>
                                    <select name="customer_id" id="customer_id" class="form-control m-select2-ajax" data-data_ele="" data-url="<?php echo admin_url('profile/AJAX/users/?type=5')?>">
                                        <option value="">Select Customer</option>
                                        {!! selectBox("SELECT id, TRIM(CONCAT_WS(' ', first_name, last_name)) as name FROM users WHERE id='{$row->user_id}'", $row->user_id) !!}
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="status" class="col-form-label">{{ __('Status') }}:</label>
                                    <select name="status" id="status" class="form-control m_selectpicker">
                                        {!! selectBox("SELECT status_code, status_title FROM order_statuses", old('status', $row->status)) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row justify-content-center">
                                <div class="col-lg-2">
                                    <label for="discount" class="col-form-label">{{ __('Discount') }}:</label>
                                    <input type="text" name="discount" id="discount" class="form-control" placeholder="{{ __('Discount') }}" value="{{ old('discount', $row->discount) }}" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="other_amount" class="col-form-label">{{ __('Other Amount') }}:</label>
                                    <input type="text" name="other_amount" id="other_amount" class="form-control" placeholder="{{ __('Other Amount') }}" value="{{ old('other_amount', $row->other_amount) }}" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="payment_method" class="col-form-label">{{ __('Payment Method') }}:</label>
                                    <select name="payment_method" id="payment_method" class="form-control">
                                        <option value="">Select Payment Method</option>
                                        {!! selectBox(DB_enumValues('orders', 'payment_method'), old('payment_method', $row->payment_method)) !!}
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="payment_status" class="col-form-label">{{ __('Payment Status') }}:</label>
                                    <select name="payment_status" id="payment_status" class="form-control m_selectpicker">
                                        <option value="">Select Payment Status</option>
                                        {!! selectBox(DB_enumValues('orders', 'payment_status'), old('payment_status', $row->payment_status)) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="note" class="col-form-label">{{ __('Note') }}:</label>
                                    <textarea name="note" id="note" placeholder="{{ __('Note') }}" class="simple_editor form-control" cols="30" rows="5">{{ old('note', $row->note) }}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="kt-portlet__foot">
                            <div class="btn-group">
                                @php $Form_btn = new Form_btn(); echo $Form_btn->buttons($form_buttons); @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
@endsection {{-- Scripts --}} @section('scripts')
    <script>

        $( "form#orders" ).validate({
            // define validation rules
            rules: {
                'order_number': {
                    required: true,remote: '<?php echo admin_url('ajax/validate/' . $row->id, true)?>',
                },
            },
            /*messages: {
            'order_number' : {required: 'Order Number is required',remote: 'This Order Number is already exist',},    },*/
            //display error alert on form submit
            invalidHandler: function(event, validator) {
                KTUtil.scrollTop();
                //validator.errorList[0].element.focus();
            },
            submitHandler: function(form) {
                form.submit();
            }

        });
    </script>
@endsection
