<style>
	.block-search > .project_search {
		position: unset;
	}
</style>
<section class="projects_b jarallax pb0">
    <div class="head_block mb-5">
        <h2 class="lax" data-lax-preset_large="zoomIn-0.9">Book Now</h2>
        <p class="mt-3" data-lax-preset_large="fadeInOut-10 crazy-10">
            Select from a large selection of plots of various sizes and categories on first come first pick
            basis</p>
    </div>
    <div class="block-search">
        @include(theme_dir("includes.search_slider"))
    </div>
    <div class="block_standart_width_full reviews">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-sm-12 col-md-12 -bg_blk -text-center">
                    <h2 class="mb-3 text-center"><i>Master Plan</i> Amenities</h2>

                    @php
                    $project_id = $row->id;
                    @endphp
                    @include(theme_dir('theme.amenities'))
                </div>
            </div>
        </div>
    </div>
</section>