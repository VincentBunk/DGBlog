<?php get_header(); ?>
    <div id="container" class="container-fluid">
	    <div class="row">
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        <div id="content">
		        	<a class="backlink" href="javascript:history.back()">Zurück zur Übersicht</a>
					<?php the_post(); ?>
		            	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php
					    		if (has_post_thumbnail()) {
					    			the_post_thumbnail();
					    		}
					    		else {
					    			echo '<img class="attachment-post-thumbnail size-post-thumbnail wp-post-image" src="'.get_template_directory_uri().'/img/default_thumbnail_hamburg.png" />';
					    		}
					    	?>
					    	<h6 class="cat_hl"><?php the_category(' '); ?></h6>
					    	<h1 class="entry-title"><?php the_title(); ?></h1>
							<div class="entry-content">
								<?php the_content(); ?>
								<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'deinegeestblog-theme' ) . '&after=</div>') ?>
							</div>
							<div class="entry-utility">
							    <?php
								    printf( __( 'Dieser Beitrag wurde in der Kategorie %1$s%2$s veröffentlicht.' ),
								    get_the_category_list(', '),
								    get_the_tag_list( __( ' and tagged ', 'deinegeestblog-theme' ), ', ', '' ),
								    get_permalink(),
								    the_title_attribute('echo=0'),
								    comments_rss() )
							    ?>
							    <a class="backlink" href="javascript:history.back()">Zurück zur Übersicht</a>
								<?php edit_post_link( __( 'Edit', 'deinegeestblog-theme' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
		                	</div>           
		                	<div id="nav-below" class="navigation">
								<?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?> <span style="color: #bbb;">&#8226;</span> <?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?>
							</div>		            
		 					<?php comments_template('', true); ?>
		            	</div>
		        	</div>
	        	</div>
        	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>