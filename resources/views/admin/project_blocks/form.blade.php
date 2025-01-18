@php $form_buttons = ['save', 'view', 'delete', 'back']; @endphp @extends('admin.layouts.admin') @section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="project_blocks">
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
                                    <label for="project_id" class="col-form-label required">{{ __('Project') }}:</label>
                                    <select name="project_id" id="project_id" class="form-control m-select2">
                                        <option value="">Select Project</option>
                                        {!! selectBox("SELECT id, title FROM projects", old('project_id', $row->project_id)) !!}
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="title" class="col-form-label required">{{ __('Block Title') }}:</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('Ex: Sector A or Block A') }}" value="{{ old('title', $row->title) }}" />
                                </div>
                                <div class="col-lg-4">
                                    <label for="area" class="col-form-label">{{ __('Area') }}:</label>
                                    <div class="input-group">
                                        <input type="text" name="area" id="area" class="form-control" placeholder="{{ __('Area') }}" value="{{ old('area', $row->area) }}" />
                                        <div class="input-group-append" style="width: 150px">
                                            <select name="area_unit" id="area_unit" class="form-control m_selectpicker">
                                                <option value="">Select Area Unit</option>
                                                {!! selectBox(DB_enumValues('project_blocks', 'area_unit'), old('area_unit', $row->area_unit)) !!}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row justify-content-center">
                                <div class="col-lg-2 text-center">
                                    <label for="floor_plan" class="col-form-label">{{ __('Floor Plan') }}:</label><br />
                                    <input disabled type="hidden" name="floor_plan--rm" value="{{ $row->floor_plan }}" />
                                    @php
                                        $file_input = '<input type="file" accept="gif,jpg,jpeg,png" name="floor_plan" id="floor_plan" class="form-control custom-file-input" />';
                                        $thumb_url = asset_url("{$_this->module}/{$row->floor_plan}");
                                        $delete_img_url = admin_url("ajax/delete_img/{$row->id}/floor_plan", true);
                                        echo thumb_box($file_input, $thumb_url, $delete_img_url);
                                    @endphp

                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's, Max File size 2 MB</span>
                                </div>


                                <div class="col-lg-2 text-center">
                                    <label for="payment_plan" class="col-form-label">{{ __('Payment Plan') }}:</label><br />
                                    <input disabled type="hidden" name="payment_plan--rm" value="{{ $row->payment_plan }}" />

                                    @php
                                        $file_input = '<input type="file" accept="gif,jpg,jpeg,png" name="payment_plan" id="payment_plan" class="form-control custom-file-input" />';
                                        $thumb_url = asset_url("{$_this->module}/{$row->payment_plan}");
                                        $delete_img_url = admin_url("ajax/delete_img/{$row->id}/payment_plan", true);
                                        echo thumb_box($file_input, $thumb_url, $delete_img_url); @endphp

                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's, Max File size 2 MB</span>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="project_id" class="col-form-label -required">{{ __('Floor plan mapping') }}:</label>
                                    <textarea name="floor_plan_mapping" id="floor_plan_mapping" class="form-control" cols="30" rows="15">{{ old('floor_plan_mapping', $row->floor_plan_mapping) }}</textarea>
                                </div>
                            </div>
                            {{--<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="project_id" class="col-form-label -required">{{ __('Floor plan JSON') }}:</label>
                                    <textarea name="floor_plan_json" id="floor_plan_json" class="form-control" cols="30" rows="15">{{ old('floor_plan_json', $row->floor_plan_json) }}</textarea>
                                </div>
                            </div>--}}

                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                            <h4>Amenities</h4>
                            <div class="form-group row">
                                @php
                                    $amenities = \App\Amenity::amenities($row->id, '', 'Block');
                                @endphp
                                @if(count($amenities) > 0)
                                    @foreach($amenities as $k => $amenity)
                                        <div class="col-lg-4">
                                            <div class="input-group m-input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        @if(!empty($amenity->icon))
                                                            <img src="{{ _img(asset_url('front/amenities/' . $amenity->icon), 28, 28) }}" alt="{{ $amenity->icon }}" class="img-fluid">&nbsp;
                                                        @else
                                                            <i style="font-size: 30px; color: black; padding-right: 10px;" class=""></i>
                                                        @endif
                                                        {{ $amenity->title }}
                                                    </span>
                                                    @if($amenity->input == 'Text')
                                                        <input type="text" name="amenities[{{ $amenity->id }}]" id="amenities" class="form-control" placeholder="{{ __($amenity->title) }}" value="{{ $amenity->value }}" />
                                                    @elseif($amenity->input == 'Yes / No')
                                                        <div> &nbsp;
                                                            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                                                <label>
                                                                    <input type="checkbox" name="amenities[{{ $amenity->id }}]" id="show_on_menu" value="Yes" {{ _checked($amenity->value, 'Yes') }}/>
                                                                    <span class="d-flex"></span>
                                                                </label>
                                                            </span> &nbsp;
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
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
        $("form#project_blocks").validate({
            // define validation rules
            rules: {
                project_id: {
                    required: true,
                },
                title: {
                    required: true,
                },
            },
            /*messages: {
        'project_id' : {required: 'Project is required',},'title' : {required: 'Title is required',},    },*/
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
