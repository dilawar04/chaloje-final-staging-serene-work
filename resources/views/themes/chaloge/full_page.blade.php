@extends(\App\Theme::template())

@section('page_banner')
    @if(!empty($page->thumbnail))
    <div class="img">
        <img src="{{ asset_url("pages/{$page->thumbnail}") }}" alt="{{ opt('site_title') }}" class="img-fluid">
    </div>
    @endif
@endsection
@section('content')
    @if($page->show_title)
        <h1>{{ $page->title }}</h1>
    @endif

    {!! do_shortcode($page->content) !!}
@endsection
{{-- Scripts --}}
@section('scripts')

@endsection
