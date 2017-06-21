<?php get_header(); ?>
 
        <div id="container">
            <div id="content">
 
<?php the_post(); ?>
 
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
<?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>
                    </div>
                </div><?php the_ID(); ?>           
 
<?php if ( get_post_custom_values('comments') ) comments_template() ?>
 
            </div>
			<?php get_sidebar(); ?>
        </div>
 
<?php get_footer(); ?>