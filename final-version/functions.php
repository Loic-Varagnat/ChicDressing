<?php 

add_action( 'wp_enqueue_scripts', 'chicdressing_enqueue_styles' );
function chicdressing_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 

}

add_filter( 'big_image_size_threshold', '__return_false' );

add_action('wp_enqueue_scripts', 'remove_parent_fonts', 20);
function remove_parent_fonts() {
    // Défilez à travers les styles en file d'attente
    foreach (wp_styles()->queue as $handle) {
        if (strpos($handle, 'google-fonts') !== false) {
            wp_dequeue_style($handle);
        }
    }
}
function custom_image_sizes() {
    add_image_size( 'slider-background', 400, 260, true ); // Ajustez les dimensions en fonction de vos besoins
}
add_action( 'after_setup_theme', 'custom_image_sizes' );

 
