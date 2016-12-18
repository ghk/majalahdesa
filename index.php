<?php get_header(); ?>
<?php if($_SERVER["SERVER_NAME"] == "kabar.sideka.id") { ?> 
<style>
@media screen and (max-width: 767px)
{
	.js .slicknav_menu {
	    display: none;
	}
	.js .mh-main-nav {
	    display: block;
	}
}
</style>
<?php } ?>
<div class="mh-wrapper clearfix">
	<div id="main-content" class="mh-loop mh-content" role="main" <?php if($_SERVER["SERVER_NAME"] == "kabar.sideka.id") { ?> style="width: 100%;" <?php } ?> ><?php
		mh_before_page_content();
		if (have_posts()) {
			if (is_home() && !is_front_page()) { ?>
				<header class="page-header">
					<h1 class="page-title">
						<?php single_post_title(); ?>
					</h1>
				</header><?php
			}
			while (have_posts()) : the_post();
				get_template_part('content', 'loop');
			endwhile;
			mh_magazine_lite_pagination();
		} else {
			get_template_part('content', 'none');
		} ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
