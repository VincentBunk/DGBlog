<?php /* Template Name: Newest */ ?>
<?php get_header(); ?>
<style type="text/css">
	h2 {
		margin: 10px 0 5px 0;
		font-size: 22px !important;
	}
</style>
<div id="container">
    <div id="content">
	    <div class="newest_wrapper">
	    	<?php
	    		$the_query = new WP_Query(array(
	    			'category_name' => 'allgemein',
	    			'posts_per_page' => 1
	    		));
	    	?>
	    	<?php if ($the_query->have_posts()) : ?>
	    		<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
	    			<a target="_top" href="http://deinegeest.hamburg/deine-geest-blog/">
		    			<img class="attachment-post-thumbnail size-post-thumbnail wp-post-image" src="<?php echo get_template_directory_uri().'/img/PH_deinegeest_blog.jpg'; ?>" />
					</a>
					<a target="_top" href="http://deinegeest.hamburg/deine-geest-blog/">
						<h2><?php the_title(); ?></h2>
					</a>
					<div class="entry-content"><?php echo excerpt(20); ?></div>
	    		<?php endwhile; ?>
	    		<?php wp_reset_postdata(); ?>
	    	<?php else : ?>
	    			Keine neuen Beiträge
	    	<?php endif; ?>
	    </div>
    </div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>