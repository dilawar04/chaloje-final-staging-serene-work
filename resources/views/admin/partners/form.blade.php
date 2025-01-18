@php $form_buttons = ['save', 'view', 'delete', 'back']; @endphp @extends('admin.layouts.admin') @section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="partners">
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
                                <div class="col-lg-6">
                                    <label for="tag_line" class="col-form-label required">{{ __('Tag Line') }}:</label>
                                    <input type="text" name="tag_line" id="tag_line" class="form-control" placeholder="{{ __('Tag Line') }}" value="{{ old('tag_line', $row->tag_line) }}" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="logo" class="col-form-label">{{ __('Logo') }}:</label><br />
                                    <input disabled type="hidden" name="logo--rm" value="{{ $row->logo }}" />

                                    @php $file_input = '<input type="file" accept="gif,jpg,jpeg,png" name="logo" id="logo" class="form-control custom-file-input" />'; $thumb_url = asset_url("{$_this->module}/{$row->logo}"); $delete_img_url =
                                admin_url("ajax/delete_img/{$row->id}/logo", true); echo thumb_box($file_input, $thumb_url, $delete_img_url); @endphp

                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's</span>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label for="type" class="col-form-label required">{{ __('Type') }}:</label>
                                    <select name="type" id="type" class="form-control m_selectpicker">
                                        {!! selectBox(DB_enumValues('partners', 'type'), old('type', $row->type)) !!}
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="link" class="col-form-label">{{ __('Link') }}:</label> <input type="text" name="link" id="link" class="form-control" placeholder="{{ __('Link') }}" value="{{ old('link', $row->link) }}" />
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-10">
                                    <label for="description" class="col-form-label">{{ __('Description') }}:</label>
                                    <textarea name="description" id="description" placeholder="{{ __('Description') }}" class="editor form-control" cols="30" rows="5">{{ old('description', $row->description) }}</textarea>
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
        $("form#partners").validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                },
                tag_line: {
                    required: true,
                },
                type: {
                    required: true,
                },
            },
            /*messages: {
        'name' : {required: 'Name is required',},'tag_line' : {required: 'Tag Line is required',},'type' : {required: 'Type is required',},    },*/
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
