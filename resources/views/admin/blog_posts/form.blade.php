@php
    $form_buttons = ['save', 'view', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')
@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="blog_posts">
        @csrf @include('admin.layouts.inc.stickybar', compact('form_buttons'))
        <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
            <input type="hidden" name="id" class="form-control" placeholder="{{ __('ID') }}" value="{{ old('id', $row->id) }}" />
            <!-- begin:: Content -->

            <div class="row">
                <div class="col-lg-9">
                    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
                        <div class="kt-portlet__head">
                            @include('admin.layouts.inc.portlet_head') @include('admin.layouts.inc.portlet_actions')
                        </div>

                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-8">
                                    <label for="title" class="col-form-label required">{{ __('Title') }}:</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('Title') }}" value="{{ old('title', $row->title) }}" />
                                </div>
                                <div class="col-lg-4">
                                    <label for="author" class="col-form-label">{{ __('Author') }}:</label>
                                    <input type="text" name="author" id="author" class="form-control" placeholder="{{ __('Author') }}" value="{{ old('author', $row->author) }}" />
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="slug" class="col-form-label">{{ __('Slug') }}:</label>
                                    <div class="input-group">
                                        <div class="input-group-append"><span class="input-group-text">{{ url('blog') }}/</span></div>
                                        <input type="text" name="slug" id="slug" class="form-control" placeholder="{{ __('Slug') }}" value="{{ old('slug', $row->slug) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-2 offset-lg-3">
                                    <label for="datetime" class="col-form-label">{{ __('Datetime') }}:</label>
                                    <input type="text" name="datetime" id="datetime" class="form-control datetimepicker" style="width: 100%;" placeholder="{{ __('Datetime') }}" value="{{ old('datetime', $row->datetime) }}" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="status" class="col-form-label">{{ __('Status') }}:</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select Status</option>
                                        {!! selectBox(DB_enumValues('blog_posts', 'status'), old('status', $row->status)) !!}
                                    </select>
                                </div>
                                {{--<div class="col-lg-2">
                                    <label for="ordering" class="col-form-label">{{ __('Ordering') }}:</label>
                                    <input type="text" name="ordering" id="ordering" class="form-control" placeholder="{{ __('Ordering') }}" value="{{ old('ordering', $row->ordering) }}" />
                                </div>--}}
                                <div class="col-lg-2 text-center">
                                    <label for="featured_image" class="col-form-label">{{ __('Featured Image') }}:</label><br />
                                    <input disabled type="hidden" name="featured_image--rm" value="{{ $row->featured_image }}" />

                                    @php $file_input = '<input type="file" accept="gif,jpg,jpeg,png" name="featured_image" id="featured_image" class="form-control custom-file-input" />'; $thumb_url =
                                            asset_url("{$_this->module}/{$row->featured_image}"); $delete_img_url = admin_url("ajax/delete_img/{$row->id}/featured_image", true); echo thumb_box($file_input, $thumb_url, $delete_img_url); @endphp

                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's</span>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="content" class="col-form-label">{{ __('Content') }}:</label>
                                    <textarea name="content" id="content" placeholder="{{ __('Content') }}" class="editor form-control" cols="30" rows="5">{{ old('content', $row->content) }}</textarea>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            {{--<div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="post_name" class="col-form-label">{{ __('Post Name') }}:</label>
                                    <input type="text" name="post_name" id="post_name" class="form-control" placeholder="{{ __('Post Name') }}" value="{{ old('post_name', $row->post_name) }}" />
                                </div>
                            </div>--}}
                        </div>

                        <div class="kt-portlet__foot">
                            <div class="btn-group">
                                @php $Form_btn = new Form_btn(); echo $Form_btn->buttons($form_buttons); @endphp
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_menus-{{ $t }}">
                        <div class="kt-portlet__head kt-padding-l-15">
                            <div class="kt-portlet__head-label">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon"><i class="la la-calendar-times-o"></i></span>
                                    <h3 class="kt-portlet__head-title menu-label">Categories</h3>
                                </div>
                            </div>
                            @include('admin.layouts.inc.portlet_actions')
                        </div>

                        <div class="kt-portlet__body bg-light kt-padding-10">
                            @foreach($categories as $category)
                                <div class="-form-group kt-form__group menu-group-link f-item-{{ $category->id }}">
                                    <label class="kt-checkbox kt-checkbox--square fields-data">
                                        <input type="checkbox" name="category_ids[]" class="id-field range-checkboxes" {{ _checked($category->id, $selected_cats) }} value="{{ $category->id }}"> {{ $category->category }}
                                        <span></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
@endsection {{-- Scripts --}} @section('scripts')
    <script>

        $( "form#blog_posts" ).validate({
            // define validation rules
            rules: {
                'title': {
                    required: true,
                },
                'slug': {
                    remote: '<?php echo admin_url('ajax/validate/' . $row->id, true)?>',
                },
            },
            /*messages: {
            'title' : {required: 'Title is required',},'slug' : {remote: 'This Slug is already exist',},    },*/
            //display error alert on form submit
            invalidHandler: function(event, validator) {
                KTUtil.scrollTop();
                //validator.errorList[0].element.focus();
            },
            submitHandler: function(form) {
                form.submit();
            }

        });
    </script>
@endsection
