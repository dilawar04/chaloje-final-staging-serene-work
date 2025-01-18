@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="deals">
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
                                <div class="col-lg-5">
                                    <label for="title" class="col-form-label required">{{ __('Title') }}:</label> <input
                                        type="text" name="title" id="title" class="form-control"
                                        placeholder="{{ __('Title') }}" value="{{ old('title', $row->title) }}"/>
                                </div>
                                <div class="col-lg-5">
                                    <label for="type" class="col-form-label">{{ __('Type') }}:</label> <input
                                        type="text" name="type" id="type" class="form-control"
                                        placeholder="{{ __('Type') }}" value="{{ old('type', $row->type) }}"/>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <label for="image" class="col-form-label">{{ __('Image') }}:</label><br>
                                    <input disabled type="hidden" name="image--rm" value="{{ $row->image }}">

                                    @php
                                        $file_input = '<input type="file" accept="gif,jpg,jpeg,png" name="image" id="image" class="form-control custom-file-input" >';
                                        $thumb_url = asset_url("{$_this->module}/{$row->image}");
                                        $delete_img_url = admin_url("ajax/delete_img/{$row->id}/image", true);
                                        echo thumb_box($file_input, $thumb_url, $delete_img_url);
                                    @endphp

                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's</span>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row justify-content-center">
                                <div class="col-lg-3">
                                    <label for="date_from" class="col-form-label">{{ __('Date From') }}:</label> <input
                                        type="text" name="date_from" id="date_from" class="form-control datepicker"
                                        placeholder="{{ __('Date From') }}"
                                        value="{{ old('date_from', $row->date_from) }}"/>
                                </div>
                                <div class="col-lg-3">
                                    <label for="date_to" class="col-form-label">{{ __('Date To') }}:</label> <input
                                        type="text" name="date_to" id="date_to" class="form-control datepicker"
                                        placeholder="{{ __('Date To') }}" value="{{ old('date_to', $row->date_to) }}"/>
                                </div>
                                <div class="col-lg-3">
                                    <label for="amount" class="col-form-label">{{ __('Amount') }}:</label> <input
                                        type="text" name="amount" id="amount" class="form-control"
                                        placeholder="{{ __('Amount') }}" value="{{ old('amount', $row->amount) }}"/>
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

        $("form#deals").validate({
            // define validation rules
            rules: {
                'title': {
                    required: true,
                },
            },
            /*messages: {
            'title' : {required: 'Title is required',},    },*/
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
