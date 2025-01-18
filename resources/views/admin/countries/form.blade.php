@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
<form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="countries">
    @csrf
    @include('admin.layouts.inc.stickybar', compact('form_buttons'))
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <input type="hidden" name="idCountry" class="form-control" placeholder="{{ __('IdCountry') }}" value="{{ old('idCountry', $row->idCountry) }}">
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
                                <label for="countryCode" class="col-form-label required">{{ __('CountryCode') }}:</label>                                 <input type="text" name="countryCode" id="countryCode" class="form-control" placeholder="{{ __('CountryCode') }}" value="{{ old('countryCode', $row->countryCode) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="countryName" class="col-form-label required">{{ __('CountryName') }}:</label>                                 <input type="text" name="countryName" id="countryName" class="form-control" placeholder="{{ __('CountryName') }}" value="{{ old('countryName', $row->countryName) }}" />
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
    
    $( "form#countries" ).validate({
    // define validation rules
    rules: {
            'countryCode': {
            required: true,
        },
            'countryName': {
            required: true,
        },
        },
    /*messages: {
    'countryCode' : {required: 'CountryCode is required',},'countryName' : {required: 'CountryName is required',},    },*/
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
