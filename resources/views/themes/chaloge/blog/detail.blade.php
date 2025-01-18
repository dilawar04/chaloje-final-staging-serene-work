@extends(\App\Theme::template())

@section('page_banner')
    @if(!empty($page->thumbnail))
        <div class="img">
            <img src="{{ asset_url("pages/{$page->thumbnail}") }}" alt="{{ opt('site_title') }}" class="img-fluid">
        </div>
    @endif
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="blog-content-wrap mb-50">
                <img src="{{ asset_url("blog_posts/{$blog->featured_image}") }}" alt="{{ $blog->title }}" class="img-fluid">
                <h2>{{ $blog->title }}</h2>

                <ul class="list-inline post-hierarchy">
                    <li class="list-inline-item"><i class="far fa-user primary-color"></i> {{ $blog->author }}</li>
                    {{--<li class="list-inline-item"><a href="#"><i class="far fa-comment primary-color"></i> 0 Comment</a></li>--}}
                    {{--<li class="list-inline-item"><i class="far fa-folder-open primary-color"></i> Release date</li>--}}
                    <li class="list-inline-item"><i class="far fa-clock primary-color"></i> {{  \Carbon\Carbon::parse($blog->datetime)->format('M d, Y')  }}</li>
                </ul>
                {!! do_shortcode($blog->content) !!}
            </div>

        </div>
        <div class="col-md-4">
            <div class="blog-sidebar">
                @php
                $categories = \App\BlogCategory::where(['status' => 'Active'])->get();
                @endphp

                @if(count($categories) > 0)
                <div class="sidebar-item item-category mb-30">
                    <h4>Categories</h4>
                    <ul class="category-lists">
                        @foreach($categories as $category)
                            <li><a href="{{ url("blog/category/{$category->slug}") }}">{{ $category->category }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{--<div class="sidebar-item item-tag mb-30">
                    <h4>Blog Tags</h4>
                    <ul>
                        <li><a href="#">Branding</a></li>
                        <li><a href="#">UI/UX</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Corporate</a></li>
                        <li><a href="#">Website</a></li>
                    </ul>
                </div>--}}

            </div>
        </div>
    </div>

@endsection
{{-- Scripts --}}
@section('scripts')

@endsection
