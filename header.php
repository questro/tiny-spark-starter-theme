<?php
/**
 * The header template
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @since 0.1.0
 */
?>

<!doctype html> 
<html 

<?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?> ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?> 

</head>


<body <?php body_class(); ?>>

    <?php wp_body_open(); ?> 
    
    <header class="header-nav-wrapper">

        

        <div class="nav-wrapper">

            <nav id="nav-js" class="navigation">

                    <div class="site-title-toggle-btn-wrapper">
                        <div> 
                            <?php 
                                if ( function_exists( 'the_custom_logo' ) ) :
                                    the_custom_logo();
                                endif;
                            ?> 
                            <a href="/">
                                <span class="site-title"><?php bloginfo( 'name' ); ?></span>
                            </a>
                        </div>
                    </div>
                    
                    <?php
                        if ( has_nav_menu( 'primary-menu' ) ) :
                            wp_nav_menu( 
                                array(
                                    'theme_location' => 'primary-menu',
                                    'menu_class'     => 'primary-menu',
                                    'container'      => 'div',
                                    'container_class'=> 'primary-menu-wrapper',
                                    'depth'          => 3,
                                    'walker'         => new TinySpark_Primary_Menu_Walker()
                                ) 
                        ); 
                        endif;
                        if ( has_nav_menu( 'mobile-menu' ) ) : 
                            wp_nav_menu(
                                array( 
                                    'theme_location' => 'mobile-menu',
                                    'menu_class'     => 'mobile-menu',
                                    'container'      => 'div', 
                                    'container_class'=> 'mobile-menu-wrapper',
                                    'depth'          => 3,
                                    'walker'         => new TinySpark_Mobile_Menu_Walker()
                                    )
                                );
                        endif;
                    ?> 
                
                </nav>
        </div>

        <div class="toggle-btn-wrapper" > 
            <button id="nav-toggle-btn" aria-expanded="false" aria-controls="menu">  &#x2630;  </button>
        </div>
        
    </header>
