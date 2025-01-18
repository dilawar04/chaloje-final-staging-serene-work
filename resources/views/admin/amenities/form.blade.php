@php $form_buttons = ['save', 'view', 'delete', 'back']; @endphp @extends('admin.layouts.admin') @section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="amenities">
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
                                <div class="col-lg-6">
                                    <label for="title" class="col-form-label required">{{ __('Title') }}:</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('Title') }}" value="{{ old('title', $row->title) }}" />
                                </div>
                                <div class="col-lg-3">
                                    <label for="code" class="col-form-label required">{{ __('Code') }}:</label>
                                    <input type="text" name="code" id="code" class="form-control" placeholder="{{ __('Code') }}" value="{{ old('code', $row->code) }}" />
                                </div>
                                <div class="col-lg-3 text-center">
                                    <label for="icon" class="col-form-label">{{ __('Icon') }}:</label><br />
                                    <input disabled type="hidden" name="icon--rm" value="{{ $row->icon }}" />

                                    @php $file_input = '<input type="file" accept="gif,jpg,jpeg,png" name="icon" id="icon" class="form-control custom-file-input" />';
                                        $thumb_url = asset_url("{$_this->module}/{$row->icon}");
                                        $delete_img_url = admin_url("ajax/delete_img/{$row->id}/icon", true);
                                        echo thumb_box($file_input, $thumb_url, $delete_img_url);

                                    @endphp

                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's</span>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row justify-content-center">
                                <div class="col-lg-3">
                                    <label for="group_id" class="col-form-label">{{ __('Group') }}:</label>
                                    <select name="group_id" id="group_id" class="form-control m_selectpicker">
                                        <option value="">Select Group</option>
                                        {!! selectBox("SELECT * FROM amenities_groups", old('group_id', $row->group_id)) !!}
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="input" class="col-form-label">{{ __('Input') }}:</label>
                                    <select name="input" id="input" class="form-control m_selectpicker">
                                        <option value="">Select Input</option>
                                        {!! selectBox(DB_enumValues('amenities', 'input'), old('input', $row->input)) !!}
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="for" class="col-form-label">{{ __('For') }}:</label>
                                    <select name="for" id="for" class="form-control m_selectpicker">
                                        <option value="">Select For</option>
                                        {!! selectBox(DB_enumValues('amenities', 'for'), old('for', $row->for)) !!}
                                    </select>
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
@endsection {{-- Scripts --}} @section('scripts')
    <script>

        $( "form#amenities" ).validate({
            // define validation rules
            rules: {
                'title': {
                    required: true,
                },
                'code': {
                    required: true,remote: '<?php echo admin_url('ajax/validate/' . $row->id, true)?>',
                },
            },
            /*messages: {
            'title' : {required: 'Title is required',},'code' : {required: 'Code is required',remote: 'This Code is already exist',},    },*/
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
