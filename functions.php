<?php
	// Make theme available for translation
	load_theme_textdomain( 'deinegeestblog-theme', TEMPLATEPATH . '/languages' );

	// Get locale
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable($locale_file) )
	    require_once($locale_file);

	// Add support for modules used by theme
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );

	// Get the page number
	function get_page_number() {
	    if ( get_query_var('paged') ) {
	        print ' | ' . __( 'Page ' , 'deinegeestblog-theme') . get_query_var('paged');
	    }
	}

	// enqueue scripts and styles
	function theme_scripts() {
		wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/styles/bootstrap/css/bootstrap.min.css');
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
		wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/styles/bootstrap/js/bootstrap.min.js');
		wp_enqueue_script('custom-js', get_template_directory_uri().'/js/functions.js');
	}
	add_action('wp_enqueue_scripts', 'theme_scripts');

	// Limit post excerpt length by words
	function excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		}
		else {
			$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		return $excerpt;
	}
	
	// Register widgetized areas
	function theme_widgets_init() {
	    // Area 1
	    register_sidebar( array (
	    'name' => 'Primary Widget Area',
	    'id' => 'primary_widget_area',
	    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	    'after_widget' => "</li>",
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	  ) );

	    // Area 2
	    register_sidebar( array (
	    'name' => 'Secondary Widget Area',
	    'id' => 'secondary_widget_area',
	    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	    'after_widget' => "</li>",
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	  ) );
	} // end theme_widgets_init

	add_action( 'init', 'theme_widgets_init' );
	
	$preset_widgets = array (
	    'primary_widget_area'  => array( 'search', 'pages', 'categories', 'archives' ),
	    'secondary_widget_area'  => array( 'links', 'meta' )
	);
	if ( isset( $_GET['activated'] ) ) {
	    update_option( 'sidebars_widgets', $preset_widgets );
	}
	// update_option( 'sidebars_widgets', NULL );
	
	// Check for static widgets in widget-ready areas
	function is_sidebar_active( $index ) {
	  global $wp_registered_sidebars;

	  $widgetcolums = wp_get_sidebars_widgets();

	  if ($widgetcolums[$index]) return true;

	    return false;
	} // end is_sidebar_active
?>