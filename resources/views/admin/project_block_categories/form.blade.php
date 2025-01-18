@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data"
          id="project_block_categories">
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
                                    <label for="category" class="col-form-label required">{{ __('Category') }}:</label>
                                    <input type="text" name="category" id="category" class="form-control" placeholder="{{ __('Category') }}" value="{{ old('category', $row->category) }}"/>
                                </div>
                                <div class="col-lg-6">
                                    <label for="block_id" class="col-form-label required">{{ __('Project Block') }}:</label>
                                    <select name="block_id" id="block_id" class="form-control m-select2">
                                        <option value="">Select Project Block</option>
                                        {!! selectBox("SELECT id, title FROM project_blocks", old('block_id', $row->block_id)) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="payment_plan" class="col-form-label">{{ __('Payment Plan') }}:</label>
                                    @include('admin.project_block_categories.payments')
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

        $("form#project_block_categories").validate({
            // define validation rules
            rules: {
                'category': {
                    required: true,
                },
                'block_id': {
                    required: true,
                },
            },
            /*messages: {
            'category' : {required: 'Category is required',},'block_id' : {required: 'Project Block is required',},    },*/
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
