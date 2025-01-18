@php
$rows = \App\BlogPost::where(['status' => 'Published'])->orderBy('datetime', 'desc')->take(3)->get();
@endphp

@if(count($rows) > 0)

    <!-- Section7 - Cryptic News -->
    <div class="clearfix"></div>
    <div class="cryptic_news padding_80">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-subtile-holder wow  ">
                        <h1 class="section-title dark_title">NEWS</h1>
                        <div class="section-subtitle dark_subtitle">It’s an ever-changing business. To stay on top of the game, don’t forget to keep yourself in the know.</div>
                    </div>
                    <div class="spacer_80"></div>
                    <div class="blog-posts simple-posts blog-posts-shortcode wow fadeIn">
                        <div class="row">
                            @foreach($rows as $row)
                                <div class="col-sm-4">
                                    <article class="single-post list-view  no-padding no-margin">
                                        <div class="blog_custom">

                                            <!-- POST THUMBNAIL -->
                                            <div class="col-md-12 post-thumbnail">
                                                <a class="relative" href="{{ url("blog/{$row->slug}") }}">
                                                    <img src="{{ _img(asset_url("blog_posts/{$row->featured_image}"), 390, 310) }}" alt="{{ $row->title }}" class="img-fluid">
                                                </a>
                                                <span class="time-n-date">{{ \Carbon\Carbon::parse($row->datetime)->format('d F') }}</span>
                                            </div>

                                            <!-- POST DETAILS -->
                                            <div class="post-details col-md-12">

                                                <div class="title-n-excerpt">
                                                    <h3 class="post-name row">
                                                        <a href="{{ url("blog/{$row->slug}") }}" title="{{ $row->title }}">{{ $row->title }}</a>
                                                    </h3>
                                                    <div class="post-excerpt row">
                                                        <p>{{ \Str::limit(strip_tags($row->content)) }}</p>
                                                    </div>
                                                </div>

                                                <div class="text-element content-element">
                                                    <p class="author">Post by <b>{{ $row->author }}</b></p>
                                                    {{--<p class="comments">Comments <a href="#">1</a></p>--}}
                                                </div>

                                            </div>

                                        </div>
                                    </article>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
