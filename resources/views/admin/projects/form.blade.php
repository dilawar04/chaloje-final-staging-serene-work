@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')

@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="projects">
        @csrf
        @include('admin.layouts.inc.stickybar', compact('form_buttons'))
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <input type="hidden" name="id" class="form-control" placeholder="{{ __('ID') }}" value="{{ old('id', $row->id) }}">
            <!-- begin:: Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
                        <div class="kt-portlet__head">
                            @include('admin.layouts.inc.portlet_head') @include('admin.layouts.inc.portlet_actions')
                        </div>

                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="title" class="col-form-label required">{{ __('Title') }}:</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('Title') }}" value="{{ old('title', $row->title) }}" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="logo" class="col-form-label">{{ __('Logo') }}:</label><br />
                                    <input disabled type="hidden" name="logo--rm" value="{{ $row->logo }}" />

                                    @php $file_input = '<input type="file" accept="gif,jpg,jpeg,png" name="logo" id="logo" class="form-control custom-file-input" />'; $thumb_url = asset_url("{$_this->module}/{$row->logo}"); $delete_img_url =
                                    admin_url("ajax/delete_img/{$row->id}/logo", true); echo thumb_box($file_input, $thumb_url, $delete_img_url); @endphp

                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's</span>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="country" class="col-form-label required">{{ __('Country') }}:</label>
                                    <select name="country" id="country" class="form-control m-select2">
                                        <option value="">Select Country</option>
                                        @php
                                        $row->country = ($row->country == '' ? 'Pakistan' : $row->country);
                                        @endphp
                                        {!! selectBox("SELECT countryName, countryName as country  FROM countries", old('country', $row->country)) !!}
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="city_id" class="col-form-label required">{{ __('City') }}:</label>
                                    <select name="city_id" id="city_id" class="form-control m-select2">
                                        <option value="">Select City</option>
                                        {!! selectBox("SELECT id, city FROM cities", old('city_id', $row->city_id)) !!}
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="area_id" class="col-form-label">{{ __('Area Location') }}:</label>
                                    <select name="area_id" id="area_id" class="form-control m-select2-ajax" data-url="<?php echo admin_url('projects/ajax/search_area');?>" data-data_ele="#city_id">
                                        <option value="">Select Area Location</option>
                                        {!! selectBox("SELECT id, area FROM area WHERE city_id='{$row->city_id}' AND id='{$row->area_id}'", old('area_id', $row->area_id)) !!}
                                    </select>
                                    <script>
                                        $(document).ready(function () {
                                            $(document).on('change', '#city_id', function (e) {
                                                $('#area_id').val(null).trigger('change');
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="short_description" class="col-form-label">{{ __('Short Description') }}:</label>
                                    <textarea name="short_description" id="short_description" placeholder="{{ __('Description') }}" class="form-control" cols="30" rows="5">{{ old('short_description', $row->short_description) }}</textarea>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="description" class="col-form-label">{{ __('Description') }}:</label>
                                    <textarea name="description" id="description" placeholder="{{ __('Description') }}" class="editor form-control" cols="30" rows="5">{{ old('description', $row->description) }}</textarea>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label for="price_from" class="col-form-label">{{ __('Price From') }}:</label>
                                    <input type="text" name="price_from" id="price_from" class="form-control" placeholder="{{ __('Price From') }}" value="{{ old('price_from', $row->price_from) }}" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="price_to" class="col-form-label">{{ __('Price To') }}:</label>
                                    <input type="text" name="price_to" id="price_to" class="form-control" placeholder="{{ __('Price To') }}" value="{{ old('price_to', $row->price_to) }}" />
                                </div>
                                <div class="col-lg-4">
                                    <label for="developer_id" class="col-form-label">{{ __('Developer') }}:</label>
                                    <select name="developer_id" id="developer_id" class="form-control m-select2">
                                        <option value="">Select Developer</option>
                                        {!! selectBox("SELECT id, CONCAT_WS(' ', first_name, last_name) as name FROM users WHERE user_type_id IN(5,6)", old('developer_id', $row->developer_id)) !!}
                                    </select>
                                </div>
                            </div>

                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="price_to" class="col-form-label">{{ __('Map Pin URL') }}:</label>
                                    <input type="text" name="map_pin_url" id="map_pin_url" class="form-control" placeholder="{{ __('Map Pin URL') }}" value="{{ old('map_pin_url', $row->map_pin_url) }}" />
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <h4>Amenities</h4>
                                @php
                                    $amenities = \App\Amenity::amenities($row->id, '', 'Project', [], true);
                                    /*dd($amenities)*/
                                @endphp
                                @if(count($amenities) > 0)
                                    @foreach($amenities as $group => $group_amenities)
                                    <div class="form-group row">
                                        <div class="col-lg-12"><b>{{ $group }}</b></div>
                                        @foreach($group_amenities as $k => $amenity)
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
                                    </div>
                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                                    @endforeach
                                @endif

                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="master_plan" class="col-form-label">{{ __('Project Master Plan') }}:</label><br />
                                    <input disabled type="hidden" name="master_plan--rm" value="{{ $row->master_plan }}" />
                                    @php
                                        $file_input = '<input type="file" accept="gif,jpg,jpeg,png" name="master_plan" id="master_plan" class="form-control custom-file-input" />';
                                        $thumb_url = asset_url("{$_this->module}/{$row->master_plan}");
                                        $delete_img_url = admin_url("ajax/delete_img/{$row->id}/master_plan", true);
                                        echo thumb_box($file_input, $thumb_url, $delete_img_url);
                                    @endphp
                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's</span>
                                </div>
                                <div class="col-lg-6">
                                    <label for="project_map" class="col-form-label">{{ __('Project Map') }}:</label><br />
                                    <input disabled type="hidden" name="project_map--rm" value="{{ $row->project_map }}" />
                                    @php
                                        $file_input = '<input type="file" accept="gif,jpg,jpeg,png" name="project_map" id="project_map" class="form-control custom-file-input" />';
                                        $thumb_url = asset_url("{$_this->module}/{$row->project_map}");
                                        $delete_img_url = admin_url("ajax/delete_img/{$row->id}/project_map", true);
                                        echo thumb_box($file_input, $thumb_url, $delete_img_url);
                                    @endphp
                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's</span>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            {{--<div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="videos" class="col-form-label">{{ __('Videos') }}:</label>
                                    <input type="text" name="videos" id="videos" class="form-control" placeholder="{{ __('Videos') }}" value="{{ old('videos', $row->videos) }}" />
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>--}}
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
@endsection

{{-- Scripts --}}
@section('scripts')
    <script>

        $( "form#projects" ).validate({
            // define validation rules
            rules: {
                'title': {
                    required: true,
                },
                'country': {
                    required: true,
                },
                'city_id': {
                    required: true,
                },
            },
            /*messages: {
            'title' : {required: 'Title is required',},'country' : {required: 'Country is required',},'city_id' : {required: 'City is required',},    },*/
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
