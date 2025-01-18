@include(theme_dir('includes.header'), ['header_cls' => 'nine'])

<section class="innar-hero pt-86">
    @yield('content')
</section>

@include(theme_dir('includes.footer'))
