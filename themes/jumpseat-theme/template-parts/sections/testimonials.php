<?php

$testimonials = get_field('testimonials') ?: [
    [
        't_quote_white' => 'We have not often worked with the external in B2B',
        't_quote_accent' => 'they are one of the best.',
        't_author_name' => 'J.L. SMITH',
        't_author_title' => 'CEO, ISCO INDUSTRIES',
    ],
];
?>
<section id="testimonials" class="js-testi section js-reveal">
    <div class="glow-blob glow-blob--testi-blue" aria-hidden="true"></div>
    <div class="glow-blob glow-blob--testi-peach" aria-hidden="true"></div>
    
    <div class="container">
        <div class="js-testi__header js-reveal">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-client.png" alt="Client Logo" class="js-testi__client-logo">
        </div>
        
        <div class="js-testi__slider js-reveal">
            <?php foreach ($testimonials as $t) : ?>
            <div class="js-testi__slide">
                <blockquote class="js-testi__quote">
                    <span class="white">“<?php echo esc_html($t['t_quote_white']); ?></span>
                    <span class="accent"><?php echo esc_html($t['t_quote_accent']); ?>”</span>
                </blockquote>
                <div class="js-testi__author">
                    <span class="name"><?php echo esc_html($t['t_author_name']); ?></span>
                    <span class="title"><?php echo esc_html($t['t_author_title']); ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
