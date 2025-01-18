@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
<form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="rewards">
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
                                <label for="user_id" class="col-form-label required">{{ __('User') }}:</label>
                                                <select name="user_id" id="user_id" class="form-control m-select2" >
                    <option value="">Select User</option>
                    {!! selectBox("SELECT id, first_name FROM users", old('user_id', $row->user_id)) !!}
                </select>
                                            </div>
        </div>
    <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="activity" class="col-form-label required">{{ __('Activity') }}:</label>                                 <input type="text" name="activity" id="activity" class="form-control" placeholder="{{ __('Activity') }}" value="{{ old('activity', $row->activity) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="point" class="col-form-label required">{{ __('Point') }}:</label>                                 <input type="text" name="point" id="point" class="form-control" placeholder="{{ __('Point') }}" value="{{ old('point', $row->point) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="datetime" class="col-form-label required">{{ __('Datetime') }}:</label>                                 <input type="text" name="datetime" id="datetime" class="form-control datepicker" placeholder="{{ __('Datetime') }}" value="{{ old('datetime', $row->datetime) }}" />
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

    $( "form#rewards" ).validate({
    // define validation rules
    rules: {
            'user_id': {
            required: true,
        },
            'activity': {
            required: true,
        },
            'point': {
            required: true,
        },
            'datetime': {
            required: true,
        },
        },
    /*messages: {
    'user_id' : {required: 'User is required',},'activity' : {required: 'Activity is required',},'point' : {required: 'Point is required',},'datetime' : {required: 'Datetime is required',},    },*/
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
