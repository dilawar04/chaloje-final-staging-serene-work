@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="airports">
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


                            <div class="form-group row justify-content-center">
                                <div class="col-lg-2">
                                    <label for="IATA_code" class="col-form-label required">{{ __('IATA Code') }}:</label>
                                    <input type="text" name="IATA_code" id="IATA_code" class="form-control" placeholder="{{ __('IATA Code') }}" value="{{ old('IATA_code', $row->IATA_code) }}"/>
                                </div>
                                <div class="col-lg-5">
                                    <label for="airport" class="col-form-label required">{{ __('Airport') }}:</label>
                                    <input type="text" name="airport" id="airport" class="form-control" placeholder="{{ __('Airport') }}" value="{{ old('airport', $row->airport) }}"/>
                                </div>
                                <div class="col-lg-3">
                                    <label for="city" class="col-form-label required">{{ __('City') }}:</label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="{{ __('City') }}" value="{{ old('city', $row->city) }}"/>
                                </div>
                                <div class="col-lg-2">
                                    <label for="status" class="col-form-label">{{ __('Status') }}:</label>
                                    <select name="status" id="status" class="form-control m_selectpicker">
                                        {!! selectBox(DB_enumValues('airports', 'status'), old('status', $row->status)) !!}
                                    </select>
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

        $("form#airports").validate({
            // define validation rules
            rules: {
                'IATA_code': {
                    required: true, remote: '<?php echo admin_url('ajax/validate/' . $row->id, true)?>',
                },
                'airport': {
                    required: true,
                },
            },
            /*messages: {
            'IATA_code' : {required: 'IATA Code is required',remote: 'This IATA Code is already exist',},'airport' : {required: 'Airport is required',},    },*/
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
