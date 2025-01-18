@extends(\App\Theme::template())

@section('page_banner')
    @if(!empty($page->thumbnail))
        <div class="img">
            <img src="{{ asset_url("pages/{$page->thumbnail}") }}" alt="{{ opt('site_title') }}" class="img-fluid">
        </div>
    @endif
@endsection

@section('content')

    <section class="blog-layout-six pa-100">
        @if(count($rows) > 0)
        <div class="row">
            @foreach($rows as $row)
                <div class="col-md-4">
                    <div class="blog-item">
                        <div class="img">
                            <a href="{{ url("blog/{$row->slug}") }}">
                                <img src="{{ _img(asset_url("blog_posts/{$row->featured_image}"), 390, 310) }}" alt="{{ $row->title }}" class="img-fluid">
                            </a>
                            {{--<div class="hover">
                                <h4 class="mb-0 date primary-color">{{  \Carbon\Carbon::parse($row->datetime)->format('d')  }}</h4>
                                <p class="mb-0 day">{{ \Carbon\Carbon::parse($row->datetime)->format('M') }}</p>
                            </div>--}}
                        </div>
                        <div class="content">
                            <h4><a href="{{ url("blog/{$row->slug}") }}">{{ $row->title }}</a></h4>
                            <ul class="list-inline">
                                {{--<li class="list-inline-item">By: {{ $row->author }}</li>--}}
                                {{--<li class="list-inline-item"><a href="#">For Sale, </a> <a href="#">Rental</a></li>--}}
                            </ul>
                            <p class="mb-0">{{ \Str::limit(strip_tags($row->content)) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 pagination-container">
                {!! $rows->links() !!}
            </div>
        </div>
        @else
            <div class="alert alert-danger">Record not found!</div>

            <div class="justify-content-center">
                <a href="{{ url("blog") }}">Back</a>
            </div>
        @endif
    </section>
@endsection
{{-- Scripts --}}
@section('scripts')

@endsection
