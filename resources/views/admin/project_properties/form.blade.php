@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="project_properties">
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
                                <div class="col-lg-4">
                                    <label for="project_id" class="col-form-label">{{ __('Project') }}:</label>
                                    <select name="project_id" id="project_id" class="form-control m-select2" >
                                        <option value="">Select Project</option>
                                        {!! selectBox("SELECT id, title FROM projects", old('project_id', $row->project_id)) !!}
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="type_id" class="col-form-label required">{{ __('Block') }}:</label>
                                    <select name="type_id" id="type_id" class="form-control" >
                                        <option value="">Select Block</option>
                                        {!! selectBox("SELECT id, title FROM project_blocks", old('type_id', $row->type_id)) !!}
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="type_id" class="col-form-label required">{{ __('Type') }}:</label>
                                    <select name="type_id" id="type_id" class="form-control" >
                                        <option value="">Select Type</option>
                                        {!! selectBox("SELECT id, type FROM property_types", old('type_id', $row->type_id)) !!}
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="title" class="col-form-label required">{{ __('Title') }}:</label>                                 <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('Title') }}" value="{{ old('title', $row->title) }}" />
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row justify-content-center">
                                <div class="col-lg-2">
                                    <label for="plot" class="col-form-label">{{ __('Plot #') }}:</label>
                                    <input type="number" name="plot" id="plot" class="form-control" placeholder="{{ __('Plot #') }}" value="{{ old('plot', $row->plot) }}" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="bathrooms" class="col-form-label">{{ __('Street #') }}:</label>
                                    <input type="text" name="street" id="street" class="form-control" placeholder="{{ __('Street #') }}" value="{{ old('street', $row->street) }}" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="category" class="col-form-label">{{ __('Category Type') }}:</label>
                                    <select name="category" id="category" class="form-control m-select2" >
                                        <option value="">Select Category</option>
                                        {!! selectBox("SELECT category, category as cat FROM project_block_categories GROUP BY category ORDER BY category", old('category', $row->category)) !!}
                                    </select>

                                    {{--<input type="text" name="category" id="category" class="form-control" placeholder="{{ __('Ex: 125, 250, 500') }}" value="{{ old('category', $row->category) }}" />--}}
                                </div>

                                <div class="col-lg-3">
                                    <label for="area" class="col-form-label">{{ __('Area') }}:</label>
                                    <div class="input-group">
                                        <input type="text" name="area" id="area" class="form-control" placeholder="{{ __('Area') }}" value="{{ old('area', $row->area) }}" />
                                        <div class="input-group-append" style="width: 150px">
                                            <select name="area_unit" id="area_unit" class="form-control m_selectpicker" >
                                                <option value="">Select Area Unit</option>
                                                {!! selectBox(DB_enumValues('project_properties', 'area_unit'), old('area_unit', $row->area_unit)) !!}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="col-lg-2">
                                    <label for="square_meter" class="col-form-label required">{{ __('Square Meter') }}:</label>
                                    <input type="text" name="square_meter" id="square_meter" class="form-control" placeholder="{{ __('Square Meter') }}" value="{{ old('square_meter', $row->square_meter) }}" />
                                </div>--}}
                                <div class="col-lg-2">
                                    <label for="price" class="col-form-label">{{ __('Price') }}:</label><br>
                                    <div class="input-group">
                                        <input type="text" name="price" id="price" class="form-control" placeholder="{{ __('Price') }}" value="{{ old('price', $row->price) }}" />
                                        <div class="input-group-append" style="width: 150px">
                                            <select name="currency" id="currency" class="form-control m_selectpicker" >
                                                {!! selectBox(DB_enumValues('project_properties', 'currency'), old('currency', $row->currency)) !!}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="col-lg-2">
                                    <label for="bedrooms" class="col-form-label">{{ __('Bedrooms') }}:</label>
                                    <input type="text" name="bedrooms" id="bedrooms" class="form-control" placeholder="{{ __('Bedrooms') }}" value="{{ old('bedrooms', $row->bedrooms) }}" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="bathrooms" class="col-form-label">{{ __('Bathrooms') }}:</label>
                                    <input type="text" name="bathrooms" id="bathrooms" class="form-control" placeholder="{{ __('Bathrooms') }}" value="{{ old('bathrooms', $row->bathrooms) }}" />
                                </div>--}}
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                            <h4>Features</h4>
                            <div class="row">
                                @php
                                    $features = \App\Feature::all();
                                    if($row->id > 0){
                                        $featureValue = \App\ProjectProperty::featuers($row->id);
                                    }
                                @endphp
                                @if(count($features) > 0)
                                    @foreach($features as $k => $feature)
                                        <div class="col-lg-3 mb-3">
                                            <label>{{ $feature->feature }}</label>
                                            <div class="input-group ">
                                                <input type="text" name="features[{{ $feature->id }}][amount]" value="{{ $featureValue[$feature->id]['amount'] }}" class="form-control" placeholder="Extra chargers">
                                                <div class="input-group-append" style="width: 150px">
                                                    <select name="features[{{ $feature->id }}][type]" id="" class="form-control m_selectpicker">
                                                        {!! selectBox(DB_enumValues('property_features', 'type'), $featureValue[$feature->id]['type'] ?? 'Percentage') !!}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                            <h4>Amenities</h4>
                            <div class="form-group row amenities">
                                @php
                                    $amenities = \App\Amenity::amenities($row->id, '', 'Property');
                                @endphp
                                @if(count($amenities) > 0)
                                    @foreach($amenities as $k => $amenity)
                                        <div class="col-lg-4 mb-2">
                                            <div class="d-flex">
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
                                    @endforeach
                                @endif
                            </div>

                            {{--<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="floor_plans" class="col-form-label">{{ __('Floor Plans') }}:</label>

                                    <?php
                                    $files = json_decode($row->floor_plans);
                                    if (count($files) > 0) {
                                    echo '<div class="form-group row sortable-ordering">';
                                    foreach ($files as $k => $file) {

                                    //$file_dir = asset_dir("{$_this->module}/{$file}");
                                    //$thumb_file = _img(file_icon($file_dir, true), 200, 200);//zoomCrop
                                    $file_dir = asset_url("{$_this->module}/{$file}");
                                    $thumb_file = _img($file_dir, 200, 200);
                                    ?>
                                    <div class="col-lg-2 col-sm-12 img-row sortable-row">
                                        <div class="thumbnail thumbnail-boxed">
                                            <img src="{{ $thumb_file }}" alt="{{ $file }}" class="img-fluid">
                                            <div class="thumb-options">
                                    <span>
                                        <a rel="group" title="{{ $file }}" href="{{ $file_dir }}" class="btn btn-primary btn-sm btn-icon btn-circle lightbox"><i class="flaticon-visible"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm btn-icon btn-circle" remove-el="parent.img-row" data-rm-name="floor_plans_remove[]" data-rm-value="{{ $file }}"><i class="la la-trash"></i></a>
                                        <!--<a class="btn btn-warning btn-sm btn-icon btn-circle sortable-move"><i class="la la-arrows"></i></a>-->
                                    </span>
                                            </div>
                                            <div class="img-input-fields">
                                                <input type="hidden" class="form-control" name="floor_plans[]" value="{{ $file }}">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    echo '</div>';
                                    }
                                    ?>
                                    <div class="kt-dropzone dropzone kt-dropzone--success"  action="{{ admin_url('/file_upload', true) }}" id="kt-floorplans-dropzone">
                                        <div class="m-dropzone__msg dz-message needsclick">
                                            <h3 class="m-dropzone__msg-title">Drop "Floor Plans" here or click to upload.</h3>
                                            <span class="m-dropzone__msg-desc">Only "gif|jpg|jpeg|png" files extension's are allowed for upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="payment_plan" class="col-form-label">{{ __('Payment Plan') }}:</label>

                                    <?php
                                    $files = json_decode($row->payment_plan);
                                    if (count($files) > 0) {
                                    echo '<div class="form-group row sortable-ordering">';
                                    foreach ($files as $k => $file) {

                                    //$file_dir = asset_dir("{$_this->module}/{$file}");
                                    //$thumb_file = _img(file_icon($file_dir, true), 200, 200);//zoomCrop
                                    $file_dir = asset_url("{$_this->module}/{$file}");
                                    $thumb_file = _img($file_dir, 200, 200);
                                    ?>
                                    <div class="col-lg-2 col-sm-12 img-row sortable-row">
                                        <div class="thumbnail thumbnail-boxed">
                                            <img src="{{ $thumb_file }}" alt="{{ $file }}" class="img-fluid">
                                            <div class="thumb-options">
                                    <span>
                                        <a rel="group" title="{{ $file }}" href="{{ $file_dir }}" class="btn btn-primary btn-sm btn-icon btn-circle lightbox"><i class="flaticon-visible"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm btn-icon btn-circle" remove-el="parent.img-row" data-rm-name="payment_plan_remove[]" data-rm-value="{{ $file }}"><i class="la la-trash"></i></a>
                                        <!--<a class="btn btn-warning btn-sm btn-icon btn-circle sortable-move"><i class="la la-arrows"></i></a>-->
                                    </span>
                                            </div>
                                            <div class="img-input-fields">
                                                <input type="hidden" class="form-control" name="payment_plan[]" value="{{ $file }}">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    echo '</div>';
                                    }
                                    ?>
                                    <div class="kt-dropzone dropzone kt-dropzone--success"  action="{{ admin_url('/file_upload', true) }}" id="kt-paymentplan-dropzone">
                                        <div class="m-dropzone__msg dz-message needsclick">
                                            <h3 class="m-dropzone__msg-title">Drop "Payment Plan" here or click to upload.</h3>
                                            <span class="m-dropzone__msg-desc">Only "gif|jpg|jpeg|png" files extension's are allowed for upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
--}}
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

    <script !src="">
        Dropzone.options.ktfloorplansDropzone= {
            paramName:"file",
            //maxFiles:10,
            //maxFilesize: 10, // MB
            addRemoveLinks:!0,
            acceptedFiles:".", /* Update: ./l6/app/project_properties.php*/
            thumbnailWidth: 150,
            thumbnailHeight: 150,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(file, response) {
                if (response.file.error) {
                    toastr.error(response.file.filename + '' + response.file.error);
                } else {
                    let previewEl = file.previewElement;

                    $('.dz-image img', previewEl).attr('src', response.file.thumb_url);
                    $('.dz-image', previewEl).append('<input type="hidden" name="floor_plans[]" value="' + response.file.filename + '">');
                    $('.dz-filename', previewEl).append('<input type="text" placeholder="title" class="form-control" name="files_data[title][]" value="' + response.file.title + '">');
                }
            }
        }
    </script>
    <script !src="">
        Dropzone.options.ktpaymentplanDropzone= {
            paramName:"file",
            //maxFiles:10,
            //maxFilesize: 10, // MB
            addRemoveLinks:!0,
            acceptedFiles:".", /* Update: ./l6/app/project_properties.php*/
            thumbnailWidth: 150,
            thumbnailHeight: 150,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(file, response) {
                if (response.file.error) {
                    toastr.error(response.file.filename + '' + response.file.error);
                } else {
                    let previewEl = file.previewElement;

                    $('.dz-image img', previewEl).attr('src', response.file.thumb_url);
                    $('.dz-image', previewEl).append('<input type="hidden" name="payment_plan[]" value="' + response.file.filename + '">');
                    $('.dz-filename', previewEl).append('<input type="text" placeholder="title" class="form-control" name="files_data[title][]" value="' + response.file.title + '">');
                }
            }
        }
    </script>
    <script>

        $( "form#project_properties" ).validate({
            // define validation rules
            rules: {
                'type_id': {
                    required: true,
                },
                'title': {
                    required: true,
                }
            },
            /*messages: {
            'type_id' : {required: 'Type is required',},'title' : {required: 'Title is required',},'square_meter' : {required: 'Square Meter is required',},    },*/
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
