@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
<form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="booking">
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
                                <label for="airline" class="col-form-label">{{ __('Airline') }}:</label>
                                                <select name="airline" id="airline" class="form-control" >
                    <option value="">Select Airline</option>
                    {!! selectBox("SELECT * FROM booking", old('airline', $row->airline)) !!}
                </select>
                                            </div>
        </div>
    <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="pnr" class="col-form-label">{{ __('Pnr') }}:</label>                                 <input type="text" name="pnr" id="pnr" class="form-control" placeholder="{{ __('Pnr') }}" value="{{ old('pnr', $row->pnr) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="tax" class="col-form-label">{{ __('Tax') }}:</label>                                 <input type="text" name="tax" id="tax" class="form-control" placeholder="{{ __('Tax') }}" value="{{ old('tax', $row->tax) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="summary" class="col-form-label">{{ __('Summary') }}:</label>                                 <input type="text" name="summary" id="summary" class="form-control" placeholder="{{ __('Summary') }}" value="{{ old('summary', $row->summary) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="amount" class="col-form-label">{{ __('Amount') }}:</label>                                 <input type="text" name="amount" id="amount" class="form-control" placeholder="{{ __('Amount') }}" value="{{ old('amount', $row->amount) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="discount" class="col-form-label">{{ __('Discount') }}:</label>                                 <input type="text" name="discount" id="discount" class="form-control" placeholder="{{ __('Discount') }}" value="{{ old('discount', $row->discount) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="itinerary" class="col-form-label">{{ __('Itinerary') }}:</label>                                 <input type="text" name="itinerary" id="itinerary" class="form-control" placeholder="{{ __('Itinerary') }}" value="{{ old('itinerary', $row->itinerary) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="flight_type" class="col-form-label">{{ __('Flight Type') }}:</label>                                 <input type="text" name="flight_type" id="flight_type" class="form-control" placeholder="{{ __('Flight Type') }}" value="{{ old('flight_type', $row->flight_type) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="total_amount" class="col-form-label">{{ __('Total Amount') }}:</label>                                 <input type="text" name="total_amount" id="total_amount" class="form-control" placeholder="{{ __('Total Amount') }}" value="{{ old('total_amount', $row->total_amount) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="travelers" class="col-form-label">{{ __('Travelers') }}:</label>                                 <input type="text" name="travelers" id="travelers" class="form-control" placeholder="{{ __('Travelers') }}" value="{{ old('travelers', $row->travelers) }}" />
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
    
    $( "form#booking" ).validate({
    // define validation rules
    rules: {
        },
    /*messages: {
        },*/
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
