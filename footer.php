<?php
/**
 * The footer template
 *
 * Closing of content/body div <footer> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @since 0.1.0
 */
?>
    <?php wp_footer(); ?>
    <footer class="alignfull">
        <div class="footer-menu">

            <?php 
            // use a widget area to implement menus, content, or images in footer
            if ( is_active_sidebar( 'footer' ) ) { ?>
                <div id="footer-widgets-list">
                    <?php dynamic_sidebar('footer'); ?>
            </div>
            <?php } ?>

            <?php
            // or simply add a nav menu in the footer (or both, actually)
            if ( has_nav_menu( 'footer-menu' ) ) :
                
                wp_nav_menu( 
                    array ( 
                        'theme_location'      => 'footer-menu',
                        'depth'               => 1,

                    )
                );
            
            endif; 
            ?>
        </div>

    </footer>
    
    </body>
</html>
