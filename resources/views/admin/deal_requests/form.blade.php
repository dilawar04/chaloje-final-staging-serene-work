@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="deal_requests">
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
                                <div class="col-lg-6">
                                    <label for="deal_id" class="col-form-label">{{ __('Deal ID') }}:</label>
                                    <select name="deal_id" id="deal_id" class="form-control m-select2">
                                        <option value="">Select Deal ID</option>
                                        {!! selectBox("SELECT id, title FROM deals", old('deal_id', $row->deal_id)) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="title" class="col-form-label">{{ __('Title') }}:</label> <input
                                        type="text" name="title" id="title" class="form-control"
                                        placeholder="{{ __('Title') }}" value="{{ old('title', $row->title) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="first_name" class="col-form-label required">{{ __('First Name') }}
                                        :</label> <input type="text" name="first_name" id="first_name"
                                                         class="form-control" placeholder="{{ __('First Name') }}"
                                                         value="{{ old('first_name', $row->first_name) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="last_name" class="col-form-label">{{ __('Last Name') }}:</label> <input
                                        type="text" name="last_name" id="last_name" class="form-control"
                                        placeholder="{{ __('Last Name') }}"
                                        value="{{ old('last_name', $row->last_name) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="address" class="col-form-label">{{ __('Address') }}:</label> <input
                                        type="text" name="address" id="address" class="form-control"
                                        placeholder="{{ __('Address') }}" value="{{ old('address', $row->address) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="phone" class="col-form-label required">{{ __('Phone') }}:</label> <input
                                        type="text" name="phone" id="phone" class="form-control"
                                        placeholder="{{ __('Phone') }}" value="{{ old('phone', $row->phone) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="email" class="col-form-label">{{ __('Email') }}:</label> <input
                                        type="text" name="email" id="email" class="form-control"
                                        placeholder="{{ __('Email') }}" value="{{ old('email', $row->email) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="cnic" class="col-form-label">{{ __('CNIC') }}:</label> <input
                                        type="text" name="cnic" id="cnic" class="form-control"
                                        placeholder="{{ __('Cnic') }}" value="{{ old('cnic', $row->cnic) }}"/>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="travellers" class="col-form-label">{{ __('Travellers') }}:</label>
                                    <input type="text" name="travellers" id="travellers" class="form-control"
                                           placeholder="{{ __('Travellers') }}"
                                           value="{{ old('travellers', $row->travellers) }}"/>
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

        $("form#deal_requests").validate({
            // define validation rules
            rules: {
                'first_name': {
                    required: true,
                },
                'phone': {
                    required: true,
                },
            },
            /*messages: {
            'first_name' : {required: 'First Name is required',},'phone' : {required: 'Phone is required',},    },*/
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
