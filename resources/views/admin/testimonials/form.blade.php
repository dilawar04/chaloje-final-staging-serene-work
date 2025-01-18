@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="testimonials">
        @csrf @include('admin.layouts.inc.stickybar', compact('form_buttons'))
        <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
            <input type="hidden" name="id" class="form-control" placeholder="{{ __('ID') }}" value="{{ old('id', $row->id) }}" />
            <!-- begin:: Content -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
                        <div class="kt-portlet__head">
                            @include('admin.layouts.inc.portlet_head') @include('admin.layouts.inc.portlet_actions')
                        </div>

                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="name" class="col-form-label required">{{ __('Name') }}:</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name', $row->name) }}" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="designation" class="col-form-label required">{{ __('Designation') }}:</label>
                                    <input type="text" name="designation" id="designation" class="form-control" placeholder="{{ __('Designation') }}" value="{{ old('designation', $row->designation) }}" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="photo" class="col-form-label">{{ __('Photo') }}:</label><br />
                                    <input disabled type="hidden" name="photo--rm" value="{{ $row->photo }}" />

                                    @php
                                    $file_input = '<input type="file" accept="gif,jpg,jpeg,png" name="photo" id="photo" class="form-control custom-file-input" />';
                                    $thumb_url = asset_url("{$_this->module}/{$row->photo}");
                                    $delete_img_url = admin_url("ajax/delete_img/{$row->id}/photo", true);
                                    echo thumb_box($file_input, $thumb_url, $delete_img_url);
                                    @endphp

                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's</span>
                                </div>
                                <div class="col-lg-2">
                                    <label for="ordering" class="col-form-label">{{ __('Ordering') }}:</label>
                                    <input type="text" name="ordering" id="ordering" class="form-control" placeholder="{{ __('Ordering') }}" value="{{ old('ordering', $row->ordering) }}" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="status" class="col-form-label">{{ __('Status') }}:</label>
                                    <select name="status" id="status" class="form-control m_selectpicker">
                                        {!! selectBox(DB_enumValues('testimonials', 'status'), old('status', $row->status)) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="testimonial" class="col-form-label">{{ __('Testimonial') }}:</label>
                                    <textarea name="testimonial" id="testimonial" class="form-control" placeholder="{{ __('Testimonial') }}" cols="30" rows="5">{{ old('testimonial', $row->testimonial) }}</textarea>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
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
@endsection

{{-- Scripts --}}
@section('scripts')
    <script>
        $("form#testimonials").validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                },
            },
            /*messages: {
        'name' : {required: 'Name is required',},    },*/
            //display error alert on form submit
            invalidHandler: function (event, validator) {
                KTUtil.scrollTop();
                //validator.errorList[0].element.focus();
            },
            submitHandler: function (form) {
                form.submit();
            },
        });
    </script>
@endsection
