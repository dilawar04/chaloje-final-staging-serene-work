@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
<form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="income">
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
                                <label for="user_id" class="col-form-label required">{{ __('User ID') }}:</label>
                                                <select name="user_id" id="user_id" class="form-control" >
                    <option value="">Select User ID</option>
                    {!! selectBox("SELECT * FROM income", old('user_id', $row->user_id)) !!}
                </select>
                                            </div>
        </div>
    <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
            <div class="col-lg-6">
                                <label for="rel_id" class="col-form-label required">{{ __('Rel ID') }}:</label>
                                                <select name="rel_id" id="rel_id" class="form-control" >
                    <option value="">Select Rel ID</option>
                    {!! selectBox("SELECT * FROM orders", old('rel_id', $row->rel_id)) !!}
                </select>
                                            </div>
        </div>
    <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="title" class="col-form-label">{{ __('Title') }}:</label>                                 <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('Title') }}" value="{{ old('title', $row->title) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="income_head" class="col-form-label">{{ __('Income Head') }}:</label>                                 <input type="text" name="income_head" id="income_head" class="form-control" placeholder="{{ __('Income Head') }}" value="{{ old('income_head', $row->income_head) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="date" class="col-form-label">{{ __('Date') }}:</label>                                 <input type="text" name="date" id="date" class="form-control datepicker" placeholder="{{ __('Date') }}" value="{{ old('date', $row->date) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
                        <div class="col-lg-6">
                                <label for="amount" class="col-form-label required">{{ __('Amount') }}:</label>                                 <input type="text" name="amount" id="amount" class="form-control" placeholder="{{ __('Amount') }}" value="{{ old('amount', $row->amount) }}" />
                                            </div>
        </div>
<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
        <div class="form-group row">
            <div class="col-lg-6">
                                <label for="status" class="col-form-label">{{ __('Status') }}:</label>
                                                <select name="status" id="status" class="form-control m_selectpicker" >
                    <option value="">Select Status</option>
                    {!! selectBox(DB_enumValues('income', 'status'), old('status', $row->status)) !!}
                </select>
                                            </div>
        </div>
    <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
    <div class="form-group row">
        <div class="col-lg-10">
            <label for="note" class="col-form-label">{{ __('Note') }}:</label>
                        <textarea name="note" id="note" class="form-control" placeholder="{{ __('Note') }}"  cols="30" rows="5">{{ old('note', $row->note) }}</textarea>
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
    
    $( "form#income" ).validate({
    // define validation rules
    rules: {
            'user_id': {
            required: true,
        },
            'rel_id': {
            required: true,
        },
            'amount': {
            required: true,
        },
        },
    /*messages: {
    'user_id' : {required: 'User ID is required',},'rel_id' : {required: 'Rel ID is required',},'amount' : {required: 'Amount is required',},    },*/
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
