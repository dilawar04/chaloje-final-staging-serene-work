@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="order_statuses">
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
                                <div class="col-lg-8">
                                    <label for="status_title" class="col-form-label">{{ __('Status Title') }}:</label>
                                    <input type="text" name="status_title" id="status_title" class="form-control" placeholder="{{ __('Status Title') }}" value="{{ old('status_title', $row->status_title) }}"/>
                                </div>
                                <div class="col-lg-4">
                                    <label for="status_code" class="col-form-label">{{ __('Status Code') }}:</label>
                                    <input type="text" name="status_code" id="status_code" class="form-control" placeholder="{{ __('Status Code') }}" value="{{ old('status_code', $row->status_code) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row justify-content-center">
                                <div class="col-lg-6">
                                    <label for="email_template" class="col-form-label">{{ __('Email Template') }}
                                        :</label>
                                    <select name="email_template" id="email_template" class="form-control m-select2">
                                        <option value="">Select Email Template</option>
                                        {!! selectBox("SELECT name, name as _name FROM email_templates", old('email_template', $row->email_template)) !!}
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

        $("form#order_statuses").validate({
            // define validation rules
            rules: {},
            /*messages: {
                },*/
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
