<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('wp', function() {
    if ( is_front_page() && function_exists('acf_form_head') ) {
        acf_form_head();
    }
});
require_once get_stylesheet_directory() . '/config.php';
require_once get_stylesheet_directory() . '/includes/acf-fields.php';
add_action( 'after_setup_theme', function() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus([
        'primary' => 'Primary Menu',
    ]);
});
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'js-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap' );
    wp_enqueue_style( 'js-style', get_stylesheet_uri(), array(), '2.0.2' );
    if ( is_front_page() ) {
        $css_dir = get_stylesheet_directory_uri() . '/assets/css/';
        wp_enqueue_style( 'js-home', $css_dir . 'jumpseat.css', array(), '3.0.2' );
        wp_enqueue_style( 'js-sections', $css_dir . 'sections.css', array(), '3.0.2' );
        wp_enqueue_style( 'js-flight-board', $css_dir . 'flight-board.css', array(), '3.0.2' );
        wp_enqueue_style( 'js-testimonials', $css_dir . 'testimonials.css', array(), '3.0.2' );
        wp_enqueue_style( 'js-case-studies', $css_dir . 'case-studies.css', array(), '3.0.2' );
        wp_enqueue_style( 'js-about', $css_dir . 'about-agency.css', array(), '3.0.2' );
        wp_enqueue_style( 'js-values', $css_dir . 'values.css', array(), '3.0.2' );
        wp_enqueue_style( 'js-feeling-lost', $css_dir . 'feeling-lost.css', array(), '3.0.2' );
        wp_enqueue_style( 'js-acts-of-forever', $css_dir . 'acts-of-forever.css', array(), '3.0.2' );
        wp_enqueue_script( 'js-main', get_stylesheet_directory_uri() . '/assets/js/jumpseat.js', array(), '2.0.2', true );
        wp_localize_script( 'js-main', 'JSConfig', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('js_lead_nonce'),
        ));
    }
});
add_action( 'wp_head', function() { ?>
    <style>
        :root {
            --color-bg:       #232A33;
            --color-surface:  #1B2128;
            --color-dark:     #181D24;
            --color-accent:   #F89485;
            --color-sky:      #49C6F3;
            --color-text:     #FFFFFF;
            --color-muted:    #C7C7C7;
            --color-subtle:   #F2F2F2;
            --color-border:   rgba(255,255,255,0.15);
            --font-heading:   'Plus Jakarta Sans', sans-serif;
            --font-body:      'Plus Jakarta Sans', sans-serif;
            --font-mono:      'Inter', monospace;
        }
    </style>
<?php });
