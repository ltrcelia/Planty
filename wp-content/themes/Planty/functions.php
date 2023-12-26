<?php
add_action( 'wp_enqueue_scripts', 'wpm_enqueue_styles' );
function wpm_enqueue_styles()
{ 
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/css/theme.css' );
}

function add_extra_item_to_nav_menu($items, $args) {
    if ($args->theme_location == 'primary') {
        $items = '<li class="nous-rencontrer"><a href="http://localhost:8888/planty/nous-rencontrer">Nous contacter</a></li>';
        
        if (is_user_logged_in()) {
            $items .= '<li class="admin"><a href="' . admin_url() . '">Admin</a></li>';
        }
        
        $items .= '<li class="commander"><a href="http://localhost:8888/planty/commander">Commander</a></li>';
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2);