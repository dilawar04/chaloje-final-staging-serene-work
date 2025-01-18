@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="currencies">
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
                                <div class="col-lg-4">
                                    <label for="currency" class="col-form-label required">{{ __('Currency') }}:</label>
                                    <input type="text" name="currency" id="currency" class="form-control"
                                           placeholder="{{ __('Currency') }}"
                                           value="{{ old('currency', $row->currency) }}"/>
                                </div>
                                <div class="col-lg-3">
                                    <label for="short_name" class="col-form-label required">{{ __('Short Name') }}
                                        :</label> <input type="text" name="short_name" id="short_name"
                                                         class="form-control" placeholder="{{ __('Short Name') }}"
                                                         value="{{ old('short_name', $row->short_name) }}"/>
                                </div>
                                <div class="col-lg-2">
                                    <label for="symbol" class="col-form-label required">{{ __('Symbol') }}:</label>
                                    <input type="text" name="symbol" id="symbol" class="form-control"
                                           placeholder="{{ __('Symbol') }}" value="{{ old('symbol', $row->symbol) }}"/>
                                </div>
                                <div class="col-lg-2">
                                    <label for="symbol" class="col-form-label required">{{ __('Exchange Rate') }}:</label>
                                    <input type="text" name="rate" id="rate" class="form-control"
                                           placeholder="{{ __('Rate') }}" value="{{ old('rate', $row->rate) }}"/>
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

        $("form#currencies").validate({
            // define validation rules
            rules: {
                'currency': {
                    required: true,
                },
                'short_name': {
                    required: true,
                },
                'symbol': {
                    required: true,
                },
            },
            /*messages: {
            'currency' : {required: 'Currency is required',},'short_name' : {required: 'Short Name is required',},'symbol' : {required: 'Symbol is required',},    },*/
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
