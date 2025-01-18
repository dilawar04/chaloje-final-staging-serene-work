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
                                    <label for="amount" class="col-form-label">{{ __('Amount') }}:</label> <input
                                        type="number" name="amount" id="amount" class="form-control"
                                        placeholder="{{ __('Amount') }}"  min="1" max="100" value="{{ old('amount', $row->amount) }}"/>
                                </div>
                                <div class="col-lg-3">
                                    <label for="airline" class="col-form-label">{{ __('Airline') }}:</label> 
                                    <select name="airline" id="airline" class="form-control m_selectpicker">
                                    <option value="">Select Airline</option>
                                        {!! selectBox(DB_enumValues('markups', 'airline'), old('airline', $row->airline)) !!}
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="markup" class="col-form-label">{{ __('Markup') }}:</label>
                                    <select name="markup" id="markup" class="form-control m_selectpicker">
                                    <option value="">Select Markup</option>
                                        {!! selectBox(DB_enumValues('markups', 'markup'), old('markup', $row->markup)) !!}
                                    </select>
                                </div>  
                                <div class="col-lg-2">
                                    <label for="price" class="col-form-label">{{ __('Price') }}:</label>
                                    <select name="price" id="price" class="form-control m_selectpicker">
                                    <option value="">Select Price</option>
                                        {!! selectBox(DB_enumValues('markups', 'price'), old('price', $row->price)) !!}
                                    </select>
                                </div>     
                            </div>
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
        $("form#markups ").validate({
            // define validation rules
            rules: {
                'amount': {
                    required: true,
                },
            },
            invalidHandler: function (event, validator) {
                KTUtil.scrollTop();
                //validator.errorList[0].element.focus();
            },
            submitHandler: function (form) {
                form.submit();
            }

        });
</script>
    @endsection
