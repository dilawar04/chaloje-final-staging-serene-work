@include(theme_dir('includes.head'))
<body class="{{ join(" ", [$page->slug, "page-{$page->template}"]) }}">
@if(opt('loader') == 'Yes')
    <!-- ==========Preloader========== -->
    <div id="preloader">
        <div id="loading-center">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>
            </div>
        </div>
    </div>
    <!-- ==========Preloader========== -->
@endif
<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

<!-- header-area -->
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="header-top-left">
                        <a href="#"><i class="fa-solid fa-plane"></i> COVID-19 update & travel requirements</a>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="header-top-right">
                        <ul>
                            <li><a href="contact.html">Corporate Club</a></li>
                            <li><a href="contact.html">Miles&Smiles</a></li>
                            <li><a href="about.html"><i class="fa-solid fa-comments"></i>Feedback</a></li>
                            <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i>Search</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="menu-area transparent-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu-wrap">
                        <nav class="menu-nav">
                            <div class="logo">
                                <a href="{{ url("") }}" class="navbar-brand logo">
                                    <img src="{{ _img(asset_url('images/' . opt('logo'), 1), 200, 180, null, ['quality' => 100, 'func' => 'resize']) }}" alt="{{ opt('site_title') }}"/>
                                </a>
                            </div>

                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    @php
                                        $config['child_li_start'] = "<li id='menu-{id}' class='nav-item menu-item-{id} menu-type-{menu_type} {active_class}'>\n  <a href='{href}' class='nav-link'>{title}</a>\n";
                                        $config['parent_li_start'] = "<li id='menu-{id}' class='menu-item-{id} menu-type-{menu_type} {active_class} menu-item-has-children'>\n  <a href='{href}'>{title}{has_child}</a>";
                                        $config['active_class'] = "active";
                                        $config['child_ul_start'] = '<ul class="sub-menu">';
                                        echo getNav('Main Nav', $config);
                                    @endphp
                                </ul>
                            </div>
                            <!-- <div class="header-action d-none d-md-block">
                                <ul>
                                    {{--<li class="country"><a href="#">usd <img src="assets/img/united-states.png" alt=""></a></li>
                                    <li class="question"><a href="contact.html">?</a></li>--}}
                                    @if(\Auth::check())
                                        <li class="header-btn"><a class="btn" href="{{ url((\Auth::user()->user_type_id == 6 ? 'dealer/account' : 'customer/account')) }}">Dashboard</a></li>
                                        <li class="header-btn sign-in"><a class="btn" href="{{ url((\Auth::user()->user_type_id == 6 ? 'dealer/logout' : 'customer/logout')) }}">Logout</a></li>
                                    @else
                                        <li class="header-btn"><a href="{{ url("/register") }}" class="btn">Register</a></li>
                                        <li class="header-btn sign-in"><a href="{{ url("/login") }}" class="btn">Sign In</a></li>
                                    @endif
                                </ul>
                            </div> -->
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <nav class="menu-box">
                            <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
                            <div class="nav-logo">
                                <a href="{{ url("") }}" class="navbar-brand logo">
                                    <img src="{{ _img(asset_url('images/' . opt('logo'), 1), 200, 180, null, ['quality' => 100, 'func' => 'resize']) }}" alt="{{ opt('site_title') }}"/>
                                </a>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            @php($socials = json_decode(opt('social'), true))
                            @if(count($socials))
                            <div class="social-links">
                                <ul class="clearfix">
                                    @foreach ($socials as $social => $social_link)
                                        @if(!empty($social_link))
                                            <li>
                                                <a target="_blank" href="{{ $social_link }}" title="{{ $social}}" class="{{ \Str::lower($social) }}-bg">
                                                    <span class="fab fa-{{ \Str::lower($social) }}" aria-label="{{ $social }}"></span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->

<div class="alert-container">
    <div class="container">
        @include(theme_dir('includes.alerts'))
    </div>
</div>
