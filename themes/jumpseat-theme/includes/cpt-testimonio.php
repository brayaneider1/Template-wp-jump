<?php
/**
 * CPT: Testimonio
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', function() {
    $labels = array(
        'name'               => 'Testimonios',
        'singular_name'      => 'Testimonio',
        'add_new'            => 'Nuevo Testimonio',
        'menu_name'          => 'Testimonios'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 6,
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon'           => 'dashicons-testimonial'
    );

    register_post_type( 'testimonio', $args );
});
