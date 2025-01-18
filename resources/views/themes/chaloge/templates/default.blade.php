@include(theme_dir('includes.header'))

@if($page->show_title == 1)
   
<!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">{{ $page->title }}</h2>
                        {{--<nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
@endif


<section class="about-area">
    <div>
        @yield('content')
    </div>
</section>


@include(theme_dir('includes.footer'))
