<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 * */
?>

<?php

    // This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'pioneer' ),
		'secondary' => __( 'Secondary menu in the footer', 'pioneer' )
	) );
    
    
    // load JQuery and CSS files
    function load_myfiles() { // load external file  
        wp_deregister_script( 'jquery' );
        
        // load all css files
        wp_register_style( 'bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
        wp_register_style( 'bootstrap-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
        wp_register_style( 'stylesheet', get_stylesheet_uri() );
        
        // load all js files
        wp_register_script( 'jquery', 'http://code.jquery.com/jquery-latest.min.js' );
        wp_register_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js' );
        
        wp_enqueue_style('bootstrap-style');
        wp_enqueue_style('bootstrap-fa');
		wp_enqueue_style('stylesheet');
        
        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap-js');
    }
    add_action( 'wp_enqueue_scripts', 'load_myfiles' );
	
	
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );		// Enabling Support for Post Thumbnails
		//set_post_thumbnail_size( 200, 200, true ); // default Post Thumbnail dimensions (cropped)
	
		// additional image sizes
		// delete the next line if you do not need additional image sizes
		//add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	}
    
	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	
	/**
	* Generate custom search form
	*
	* @param string $form Form HTML.
	* @return string Modified form HTML.
	*/ 
//   function wpdocs_my_search_form( $form ) {
//	   $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
//	   <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
//	   <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search here..." />
//	   <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
//	   </div>
//	   </form>';
//	
//	   return $form;
//   }
//   add_filter( 'get_search_form', 'wpdocs_my_search_form' );
    
    // Add login/Logout button to the primary nav bar
    add_filter( 'wp_nav_menu_items', 'loginout_menu_link', 10, 2 );
    
    function loginout_menu_link( $items, $args ) {
       if ($args->theme_location == 'primary') {
             $items .= '<li class="menu-item"><a href="'. home_url() .'">Home</a></li>';
       }
       return $items;
    }
    
    // Redirect users to index page after Login
    function redirect_to_front() {
        global $redirect_to;
        $redirect_to = get_option('siteurl');
    }
    add_action( 'login_form', 'redirect_to_front' );
    
    
    
    // Theme customization Settings
    function mytheme_register_theme_customizer( $wp_customize ) {
		
		// logo_part start
		$wp_customize->add_section( 'mytheme_logo_section' , array(
			'title'       => __( 'Logo', 'mytheme' ),
			'priority'    => 30,
			'description' => 'Upload a logo to replace the default site name and description in the header',
		) );
		$wp_customize->add_setting( 'mytheme_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mytheme_logo', array(
			'label'    => __( 'Logo', 'mytheme' ),
			'section'  => 'mytheme_logo_section',
			'settings' => 'mytheme_logo',
		) ) );
		// logo_part end
		
		
        $wp_customize->add_setting( /* Body background-color setting */
            'body_background_color',
            array(
                'default'   => '#fff',
				'transport'	=> 'postMessage'
            )
        );
        $wp_customize->add_setting( /* Body text-color setting */
            'body_text_color',
            array(
                'default'   => '#1a1a1a',
				'transport'	=> 'postMessage'
            )
        );
        $wp_customize->add_setting( /* All link color setting */
            'all_link',
            array(
                'default'   => 'blue',
				'transport'	=> 'postMessage'
            )
        );
        $wp_customize->add_setting( /* header background-color setting */
            'header_background_color',
            array(
                'default'   => '#1a1a1a',
				'transport'	=> 'postMessage'
            )
        );
        $wp_customize->add_setting( /* header menu color setting */
            'header_menu_color',
            array(
                'default'   => '#fff',
				'transport'	=> 'postMessage'
            )
        );
        $wp_customize->add_setting( /* Post link color setting */
            'post_link',
            array(
                'default'   => 'purple',
				'transport'	=> 'postMessage'
            )
        );
        $wp_customize->add_setting( /* Post background-color setting */
            'front_page_post_background_color',
            array(
                'default'   => '#ccc',
				'transport'	=> 'postMessage'
            )
        );
        $wp_customize->add_setting( /* Sidebar header color setting */
            'sidebar_header_text_color',
            array(
                'default'   => '#809300',
				'transport'	=> 'postMessage'
            )
        );
        $wp_customize->add_setting( /* Sidebar list item ling color setting */
            'sidebar_list_item_link_color',
            array(
                'default'   => '#1a1a1a',
				'transport'	=> 'postMessage'
            )
        );
        
     
        $wp_customize->add_control( /* Body background-color control */
            new WP_Customize_Color_Control(
                $wp_customize,
                'body-background-color',
                array(
                    'label'      => __( 'Body background color', 'pioneer' ),
                    'section'    => 'colors',
                    'settings'   => 'body_background_color'
                )
            )
        );
        $wp_customize->add_control( /* Body text-color control */
            new WP_Customize_Color_Control(
                $wp_customize,
                'body-text-color',
                array(
                    'label'      => __( 'Body text color', 'pioneer' ),
                    'section'    => 'colors',
                    'settings'   => 'body_text_color'
                )
            )
        );
        $wp_customize->add_control( /* All link color control */
            new WP_Customize_Color_Control(
                $wp_customize,
                'all_link_color',
                array(
                    'label'      => __( 'All link color', 'pioneer' ),
                    'section'    => 'colors',
                    'settings'   => 'all_link'
                )
            )
        );
        $wp_customize->add_control( /* Header background-color control */
            new WP_Customize_Color_Control(
                $wp_customize,
                'header-background-color',
                array(
                    'label'      => __( 'haeder background color', 'pioneer' ),
                    'section'    => 'colors',
                    'settings'   => 'header_background_color'
                )
            )
        );
        $wp_customize->add_control( /* Header menu color control */
            new WP_Customize_Color_Control(
                $wp_customize,
                'header-menu-color',
                array(
                    'label'      => __( 'header menu color', 'pioneer' ),
                    'section'    => 'colors',
                    'settings'   => 'header_menu_color'
                )
            )
        );
        $wp_customize->add_control( /* Post link color control */
            new WP_Customize_Color_Control(
                $wp_customize,
                'post_link_color',
                array(
                    'label'      => __( 'Post link color', 'pioneer' ),
                    'section'    => 'colors',
                    'settings'   => 'post_link'
                )
            )
        );
        $wp_customize->add_control( /* Post background-color control */
            new WP_Customize_Color_Control(
                $wp_customize,
                'post_background_color',
                array(
                    'label'      => __( 'Post background color', 'pioneer' ),
                    'section'    => 'colors',
                    'settings'   => 'front_page_post_background_color'
                )
            )
        );
        $wp_customize->add_control( /* Sidebar header color control */
            new WP_Customize_Color_Control(
                $wp_customize,
                'sidebar_header_color',
                array(
                    'label'      => __( 'Sidebar header text color', 'pioneer' ),
                    'section'    => 'colors',
                    'settings'   => 'sidebar_header_text_color'
                )
            )
        );
        $wp_customize->add_control( /* Sidebar list item color control */
            new WP_Customize_Color_Control(
                $wp_customize,
                'sidebar_list_item_color',
                array(
                    'label'      => __( 'Sidebar list item link color', 'pioneer' ),
                    'section'    => 'colors',
                    'settings'   => 'sidebar_list_item_link_color'
                )
            )
        );
        
    }
    add_action( 'customize_register', 'mytheme_register_theme_customizer' );
    
    function mytheme_customizer_css() {
        ?>
        <style type="text/css">
            body { background-color: <?php echo get_theme_mod('body_background_color'); ?>; }    /* body background color */
            body { color: <?php echo get_theme_mod('body_text_color'); ?>; }    /* body text color */
            a { color: <?php echo get_theme_mod( 'all_link' ); ?>; }                /* All link color */
            .header { background-color: <?php echo get_theme_mod('header_background_color'); ?>; }    /* header background color */
            .menu-item a { color: <?php echo get_theme_mod('header_menu_color'); ?> }
            .post-heading a { color: <?php echo get_theme_mod( 'post_link' ); ?>; } /* Post link color */
            .front-page-post-wrapper { background-color: <?php echo get_theme_mod('front_page_post_background_color'); ?> } /* Post background-color */
            .sidebar-content-header { color: <?php echo get_theme_mod('sidebar_header_text_color'); ?>; }    /* sidebar header color */
            .sidebar-ul li a { color: <?php echo get_theme_mod('sidebar_list_item_link_color'); ?>; }    /* sidebar list item link color */
        </style>
        <?php
    }
    add_action( 'wp_head', 'mytheme_customizer_css' );
	
	function tcx_customizer_live_preview() {
 
		wp_enqueue_script(
			'mytheme-theme-customizer',
			get_template_directory_uri() . '/js/theme-customizer.js',
			array( 'jquery', 'customize-preview' ),
			'0.3.0',
			true
		);
	 
	}
	add_action( 'customize_preview_init', 'tcx_customizer_live_preview' );
    // END Theme customization Settings
	
	
	//header_image part start
	$args = array(
			'flex-width'	=> true,
			'width'         => 980,
			'flex-height'	=> true,
			'height'        => 200,
			'default-image' => get_template_directory_uri().'/images/first-header.jpg',
			'uploads'       => true,
		);
	add_theme_support( 'custom-header', $args );
	//header_image part end
	
	
	//Add a preeciding arrow symbol to each of the category link start
	add_filter ( 'wp_list_categories', 'span_before_link_list_categories' );

	function span_before_link_list_categories( $list ) {
		$list = str_replace('<a href=','<span>&raquo; &nbsp;</span><a href=',$list);
		return $list;
	}
	//Add a preeciding arrow symbol to each of the category link end
	


?>