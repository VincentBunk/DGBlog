<?php get_header(); ?>
<div id="container" class="container-fluid">
    <div id="content">
    	<div class="row">
    		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    			<h1 class="slight_margin_left"><span style="font-size: 24px;">Deine-Geest-Blog</span><br />Neues zur Landschaftsachse Horner Geest</h1>
    		</div>
    	</div>
		<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
		<?php } ?>
		<?php while ( have_posts() ) : the_post() ?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="post_control">
						<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
						   		<div class="entry-thumbnail">
						    		<a href="<?php the_permalink(); ?>">
							    		<?php
							    			if (has_post_thumbnail()) {
							    				the_post_thumbnail();
							    			}
							    			else {
							    				echo '<img class="attachment-post-thumbnail size-post-thumbnail wp-post-image" src="'.get_template_directory_uri().'/img/default_thumbnail_hamburg.png" />';
							    			}
							    		?>
						    		</a>
						    	</div>
							</div>
							<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
								<h6 class="cat_hl"><?php the_category(' '); ?></h6>
						    	<h2 class="entry-title">
						        	<a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'deinegeestblog-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a>
						    	</h2>
						    	<div class="entry-meta">
						            <span class="meta-prep meta-prep-author"><?php _e('By ', 'deinegeestblog-theme'); ?></span>
						            <span class="author vcard">
						            	<a style="color: #646262; cursor: default;" class="url fn n" href="" title="<?php printf( __( 'View all posts by %s', 'deinegeestblog-theme' ), $authordata->display_name ); ?>"><?php the_author(); ?></a>
						            </span>
						            <span class="meta-sep"> | </span>
						            <span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'deinegeestblog-theme'); ?></span>
						            <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>           
						    	</div>
						    	<div class="entry-content">
									<?php echo excerpt(20); ?>
									<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'deinegeestblog-theme' ) . '&after=</div>') ?>
						    	</div><br />
						    	<div class="entry-utility">
						            <span class="cat-links">
						            	<span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Kategorie: ', 'deinegeestblog-theme' ); ?></span><?php echo get_the_category_list(', '); ?>
						            </span>
						    	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php wp_pagenavi(); ?>
		<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
			<div id="nav-below" class="navigation">
				<?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'deinegeestblog-theme' )) ?> <span style="color: #BBB;">&#8226;</span> <?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'deinegeestblog-theme' )) ?>
			</div>
		<?php } ?>
	</div>
</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>