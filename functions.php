<?php 

/**
 * TINY SPARK STARTER THEME
 * https://petescott.ca
 * devSite
 *
 * @package  WordPress
 * @since 1.0.0
 */

/**
 * Some hooks have been omitted for brevity: https://rachievee.com/the-wordpress-hooks-firing-sequence/
 * 1. mu_plugins_loaded
 * 2. registered_taxonomy
 * 3. registered_post_type
 * 4. plugins_loaded
 * 5. setup_theme
 * 6. load_textdomain
 * 7. after_setup_theme
 * 8. init (after WP is loaded, but before headers are sent)
 * 9. widgets_init
 * 10. register_sidebar
 * 11. wp_register_sidebar_widget
 * 12. wp_loaded (all WP plugins and theme is loaded and instantiated)
 * 13. pre_get_posts 
 * 14. from here it's mostly building the page template and parts, loop, admin, etc...
 */



if ( ! function_exists( 'tiny_spark_setup' )) :

    function tiny_spark_setup() {

        // enable theme translation: HOW TO DO THIS? 
        load_theme_textdomain( 'tiny_spark', get_template_directory() . '/languages' );

        // do not add RSS feed links to head [?? security]
            ## add_theme_support( 'automatic-feed-links');

        // ADD THEME SUPPORTS: 

        // document title dynamically added
        add_theme_support( 'title-tag' );

        // add custom menu support 
        add_theme_support( 'menus' );

        //add theme support: widgets
        add_theme_support( 'widgets');

        // add theme support: selective refresh on widgets
        add_theme_support( 'customize-selective-refresh-widgets');

        //opt-in for block styles	
        add_theme_support( 'wp-block-styles' ); 

        // add support for responsive embedded content
        add_theme_support( 'responsive-embeds' );

        // add support for editor styles
        add_theme_support( 'editor-styles' );

        // enqueue editor styles
        add_editor_style ( 'assets/css/style-editor.css' );

        // add support for full/wide align (only if FSE theme.json not present)
        //add_theme_support( 'align-wide' ); 

        // enable post thumbnails on posts and pages
        ## @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        add_theme_support( 'post-thumbnails' );

         // default core markup for search form, comment form, comments for valid HTML5
         add_theme_support( 
            'html5',  
            array (
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        // add support for custom logo
        ## @link https://codex.wordpress.org/Theme_Logo
        add_theme_support( 'custom-logo',  
            array(
                'height'    => 205,
                'width'     => 259,
                'flex-width'=>  false, 
                'flex-height'=> false,
            )
        );

         // add support for custom logo
        ## @link https://codex.wordpress.org/Theme_Logo
        add_theme_support( 'custom-logo',  
            array(
                'height'    => 200,
                'width'     => 250,
                'flex-width'=>  false, 
                'flex-height'=> false,
            )
        );


        // add custom editor font sizes
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Small - 16px', 'tiny_spark' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'tiny_spark' ),
					'size'      => 16,
					'slug'      => 'small',
				),
                array(
					'name'      => esc_html__( 'Normal - 18px', 'tiny_spark' ),
					'shortName' => esc_html_x( 'N', 'Font size', 'tiny_spark' ),
					'size'      => 18,
					'slug'      => 'normal',
				),
                array(
					'name'      => esc_html__( 'Medium - 20px', 'tiny_spark' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'tiny_spark' ),
					'size'      => 20,
					'slug'      => 'medium',
				),
				array(
					'name'      => esc_html__( 'Large - 27px', 'tiny_spark' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'tiny_spark' ),
					'size'      => 27,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Huge - 48px', 'tiny_spark' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'tiny_spark' ),
					'size'      => 48,
					'slug'      => 'huge',
				),
			)
		);

        // Editor color palette:  Add custom colours for use in the array
        $black          = '#000000';
        $white          = '#ffffff';
        $light_grey     = '#eeeeee';
        $dark_grey      = '#666666';

        add_theme_support(
            'editor-color-palette',
            array( 

                array( 
                    'name'  => __( 'Background', 'tiny_spark' ),
                    'slug'  => 'background',
                    'color' => $white,

                ),

                array ( 
                    'name'  => __( 'Foreground', 'tiny_spark' ),
                    'slug'  => 'foreground',
                    'color' => $black,
                ),

                array ( 
                    'name'  => __( 'Primary', 'tiny_spark' ),
                    'slug'  => 'primary',
                    'color' => $light_grey,
                ),

                array ( 
                    'name'  => __( 'Secondary', 'tiny_spark' ),
                    'slug'  => 'secondary',
                    'color' => $dark_grey,
                ),              

            )
        );

        // OPTIONAL FEATURES (we may want to turn off)

        // Option: disable custom colours and font sizes for consistency
            // use: add_theme_support( 'disable-custom-font-sizes' );


        // Option: remove default block patterns
        remove_theme_support( 'core-block-patterns' );


        /* Option: Adds theme support for Custom Background colour */
        // $def = array(
        //     "default-color"          => '',
        //     "default-image"          => '',
        //     "default-repeat"         => "repeat",
        //     "default-position-x"     => "left",
        //     "default-position-y"    =>   "top",
        //     "default-size"           => "auto",
        //     "default-attachment"     => "scroll",
        //     "wp-head-callback"       => "_custom_background_cb",
        //     "admin-head-callback"    => '',
        //     "admin-preview-callback" => ''
        //     );
        // add_theme_support( "custom-background", $def );

        // Option: Edit Admin Bar: remove it, then add custom styling in stylesheet
          add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

         
  
        

    

        // FILTERS FOR EXTRA CONTROL & FUNCTIONALITY

        // Control Display Archive Title on Archive/Category/Author Pages
        add_filter( 'get_the_archive_title', function ($title) {    
            if ( is_category() ) {    
                    $title = single_cat_title( '', false );    
                } elseif ( is_tag() ) {    
                    $title = single_tag_title( '', false );    
                } elseif ( is_author() ) {    
                    $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
                } elseif ( is_tax() ) { //for custom post types
                    $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
                } elseif (is_post_type_archive()) {
                    $title = post_type_archive_title( '', false );
                }
            return $title;    
        });


        // CUSTOM MENUS 

        // register menus 
        register_nav_menus( 
            array(
                'primary-menu' => esc_html__('Primary Nav Menu', 'tiny_spark' ),
                'secondary-menu' => esc_html__('Secondary Nav Menu', 'tiny_spark' ),
                'footer-menu'  => esc_html__('Footer Nav Menu', 'tiny_spark'),
                'mobile-menu'  => esc_html__('Mobile Nav Menu', 'tiny_spark')
            ) 
        );    

    }

endif;

add_action ( 'after_setup_theme', 'tiny_spark_setup' );


/** 
 * Add Scripts and styles
 */



if ( ! function_exists( 'tiny_spark_styles' ) ): 

    function tiny_spark_styles() {

        // Get theme version from style.css
        $theme_version = wp_get_theme()->get( 'Version' );

        // block styles
        //wp_enqueue_style( 'bits-blocks', get_template_directory_uri() . '/assets/css/blocks.css' );

        // editor UI styles
        wp_enqueue_style( 'tiny-spark-editor', get_template_directory_uri() . '/assets/css/style-editor.css' );
        
        // normalize
        wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css' );
        
        // style-sheet 
        wp_enqueue_style( 'tiny-spark-style', get_stylesheet_uri(), array(), $theme_version );

    }

endif;



add_action( 'wp_enqueue_scripts', 'tiny_spark_styles' );



//this goes in functions.php near the top
function tiny_spark_scripts_method() {
    // register your script location, dependencies and version
    //    wp_register_script('custom_script',
    //    get_template_directory_uri() . '/assets/js/toggle-menu.js',
    //    array('jquery'),
    //    '1.0' );
       wp_register_script('menu_toggle_script',
       get_template_directory_uri() . '/assets/js/menu-toggle.js',
       array(),
       '1.0' );

     // enqueue the script
      wp_enqueue_script('custom_script');
      wp_enqueue_script('menu_toggle_script');
      }
add_action('wp_enqueue_scripts', 'tiny_spark_scripts_method');


/**
 * Accessibility Features
 * 
 */

 /* Skip to content link */
function tiny_spark_skip_link() {
    echo '<a class="skip-link screen-reader-text" href="#primary">'
    . esc_html__( 'Skip to content', 'tiny' )
    . '</a>';
}
add_action( 'wp_body_open', 'tiny_spark_skip_link', 5 ); 


/**
 * Custom Walker Nav Menu class
 * https://awhitepixel.com/blog/wordpress-menu-walkers-tutorial/ 
 */

 class TinySpark_Primary_Menu_Walker extends Walker_Nav_Menu {
    
    // checks to see if # is the top level link and changes <a> to <span> 
        // to avoid page refresh on click
    function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
 
		if ($item->url && $item->url != '#') {
			$output .= '<a href="' . $item->url . '">';
		} else {
			$output .= '<span>';
		}
 
		$output .= $item->title;
 
		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}

        // if menu item has children, add an icon or caret 
        if ($args->walker->has_children) {
            $output .= '<span class="dashicons dashicons-arrow-down-alt2"></span>';
        } 
	}

 }

 class TinySpark_Mobile_Menu_Walker extends Walker_Nav_Menu {
    
    // checks to see if # is the top level link and changes <a> to <span> 
        // to avoid page refresh on click
    function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
 
		if ($item->url && $item->url != '#') {
			$output .= '<a href="' . $item->url . '">';
		} else {
			$output .= '<span>';
		}
 
		$output .= $item->title;
 
		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}

        // if menu item has children, add an icon or caret 
        if ($args->walker->has_children) {
            $output .= '<span class="dashicons dashicons-arrow-down-alt2"></span>';
        } 
	}

 }


 /* Disable Dashicons on Front End */
//  function tiny_spark_dequeue_dashicon() {
//     if (current_user_can( 'update_core' )) {
//         return;
//     }
//     wp_deregister_style('dashicons');
// }
// add_action( 'wp_enqueue_scripts', 'tiny_spark_dequeue_dashicon' );



/**
 * Disable WP Emoji
 * @link https://kinsta.com/knowledgebase/disable-emojis-wordpress/#disable-emojis-code
 */

/**
 * Disable emoji to reduce cruft.
 */
## Do this instead of below: 
## require get_template_directory() . '/inc/disable-emoji.php';

function tiny_spark_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'tiny_spark_disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'tiny_spark_disable_emojis_remove_dns_prefetch', 10, 2 );
   }

add_action( 'init', 'tiny_spark_disable_emojis' );


/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */

function tiny_spark_disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
} 
/**
    * Remove emoji CDN hostname from DNS prefetching hints.
    *
    * @param array $urls URLs to print for resource hints.
    * @param string $relation_type The relation type the URLs are printed for.
    * @return array Difference betwen the two arrays.
*/

function tiny_spark_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {

    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
   
   $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
   
   return $urls;
}




 /** 
  * Remove JQuery Migrate
  * @link https://dotlayer.com/what-is-migrate-js-why-and-how-to-remove-jquery-migrate-from-wordpress/
  */

  function tiny_spark_remove_jquery_migrate($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        
        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array(
                'jquery-migrate'
            ));
        }
    }
}

add_action('wp_default_scripts', 'tiny_spark_remove_jquery_migrate');


/** * Completely Remove jQuery From WordPress */
function tiny_spark_init() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
    }
}
add_action('init', 'tiny_spark_init');
