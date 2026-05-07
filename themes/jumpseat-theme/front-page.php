<?php
if (function_exists('acf_form_head')) {
    acf_form_head();
}
get_header();
?>

<main id="main" class="site-main">
    <?php
    $sections = [
        'hero-slider',
        'flight-board',
        'testimonials',
        'case-studies',
        'about-agency',
        'values',
        'acts-of-forever',
        'feeling-lost',
        'contact-form'
    ];

    foreach ( $sections as $section ) {
        get_template_part( 'template-parts/sections/' . $section );
    }
    ?>
</main>

<?php
get_footer();
