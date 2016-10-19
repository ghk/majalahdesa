<?php /* Loop Template used for index/archive/search */ ?>
<article <?php post_class('mh-loop-item clearfix'); ?>>
	<figure class="mh-loop-thumb">
		<a href="<?php the_permalink(); ?>"><?php
			if ($_SERVER["SERVER_NAME"] == "kabar.sideka.id") {
				$thumbnail = get_post_meta($post->ID, 'thumbnail_html', true) ;
				if($thumbnail != "") {
					echo $thumbnail;
				} else {
					echo '<img class="attachment-thumbnail size-thumbnail" src="' . get_template_directory_uri() . '/images/placeholder-square.png' . '" width="150" height="150" sizes="(max-width: 150px) 100vw, 150px">';
				}
			} else if (has_post_thumbnail()) {
				the_post_thumbnail('mh-magazine-lite-medium');
			} else {
				echo '<img class="mh-image-placeholder" src="' . get_template_directory_uri() . '/images/placeholder-medium.png' . '" alt="No Picture" />';
			} ?>
			<?php if($_SERVER["SERVER_NAME"] == "kabar.sideka.id") { ?>
				<?php ?>
			<?php } ?>
		</a>
	</figure>
	<div class="mh-loop-content clearfix">
		<header class="mh-loop-header">
			<h3 class="entry-title mh-loop-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php the_title(); ?>
				</a>
			</h3>
			<div class="mh-meta mh-loop-meta">
				<?php mh_magazine_lite_loop_meta(); ?>
			</div>
		</header>
		<div class="mh-loop-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<?php  if ($_SERVER["SERVER_NAME"] == "kabar.sideka.id") {
			$blog_id = get_post_meta($post->ID, 'blogid', true) ;
			switch_to_blog($blog_id);
			$site_title = get_bloginfo( 'name' );
			$site_url = get_bloginfo('url');
			$site_description = get_bloginfo( 'description' );
			restore_current_blog();
		?>
		<div style="margin-top: 10px;">
			<a href="<?= $site_url ?>" style="text-decoration: underline;">
			<?= $site_title ?> - <?= $site_description ?>
			</a>
		</div>
		<?php } ?>

	</div>
</article>
