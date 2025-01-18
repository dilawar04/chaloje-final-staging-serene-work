@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
<form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="property_types">
    @csrf
    @include('admin.layouts.inc.stickybar', compact('form_buttons'))
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <input type="hidden" name="id" class="form-control" placeholder="{{ __('ID') }}" value="{{ old('id', $row->id) }}">
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
            <div class="col-lg-6">
                                <label for="parent_id" class="col-form-label">{{ __('Parent') }}:</label>
                                                <select name="parent_id" id="parent_id" class="form-control" >
                    <option value="">Select Parent</option>
                    {!! selectBox("SELECT * FROM property_types", old('parent_id', $row->parent_id)) !!}
                </select>
                                            </div>
        </div>
    <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="type" class="col-form-label required">{{ __('Type') }}:</label>                                 <input type="text" name="type" id="type" class="form-control" placeholder="{{ __('Type') }}" value="{{ old('type', $row->type) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-2">
                                <label for="ordering" class="col-form-label">{{ __('Ordering') }}:</label>                                 <input type="text" name="ordering" id="ordering" class="form-control" placeholder="{{ __('Ordering') }}" value="{{ old('ordering', $row->ordering) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
            <div class="col-lg-2">
                                <label for="status" class="col-form-label">{{ __('Status') }}:</label>
                                                <select name="status" id="status" class="form-control m_selectpicker" >
                    <option value="">Select Status</option>
                    {!! selectBox(DB_enumValues('property_types', 'status'), old('status', $row->status)) !!}
                </select>
                                            </div>
        </div>
    <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
    <div class="form-group row">
        <div class="col-lg-2">
            <label for="image" class="col-form-label">{{ __('Image') }}:</label><br>
            <input disabled type="hidden" name="image--rm" value="{{ $row->image }}">
            
            @php
            $file_input = '<input type="file" accept="gif,jpg,jpeg,png" name="image" id="image" class="form-control custom-file-input" >';
            $thumb_url = asset_url("{$_this->module}/{$row->image}");
            $delete_img_url = admin_url("ajax/delete_img/{$row->id}/image", true);
            echo thumb_box($file_input, $thumb_url, $delete_img_url);
            @endphp

                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's</span>        </div>
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
    
    $( "form#property_types" ).validate({
    // define validation rules
    rules: {
            'type': {
            required: true,
        },
        },
    /*messages: {
    'type' : {required: 'Type is required',},    },*/
    //display error alert on form submit
    invalidHandler: function(event, validator) {
        KTUtil.scrollTop();
        //validator.errorList[0].element.focus();
    },
    submitHandler: function(form) {
        form.submit();
    }

});
</script>@endsection
