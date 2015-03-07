<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . '-child/js/prefix-woo-ajax.js', array(), '1.0.0', true );
}

add_action( 'init', 'custom_remove_footer_credit', 10 );

function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
    add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
}

function custom_storefront_credit() {
        ?>
        <div class="site-info">
                &copy; <?php echo get_bloginfo( 'name' ) . ' ' . get_the_date( 'Y' ); ?>
        Designed by <a href="http://www.thedatatube.com">the datatube</a>
        </div><!-- .site-info -->
        <?php
}


