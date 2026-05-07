<?php
$img_dir  = get_stylesheet_directory_uri() . '/assets/img/';
$subtitle = get_field('hero_subtitle') ?: 'Avoid turbulence. Arrive at your destination sooner. And enjoy the ascent';
$cta_url  = get_field('hero_cta_url')  ?: '#contact';
?>
<section id="hero" class="js-hero js-reveal" aria-label="Hero">
    <div class="js-hero__bg" aria-hidden="true"></div>
    <div class="js-hero__overlay" aria-hidden="true"></div>
    <div class="js-hero__content">
        <div class="js-hero__takeoff-wrapper">
            <img src="<?php echo esc_url($img_dir . 'rawpixel-ceo.png'); ?>" alt="" class="js-hero__plane-bg" aria-hidden="true">
            <img src="<?php echo esc_url($img_dir . 'takeoff-graphic.png'); ?>" alt="TAKE OFF." class="js-hero__takeoff-img">
            <img src="<?php echo esc_url($img_dir . 'rawpixel-deco.png'); ?>" alt="" class="js-hero__plane-fg" aria-hidden="true">
        </div>
        <p class="js-hero__subtitle"><?php echo esc_html($subtitle); ?></p>
        <a href="<?php echo esc_url($cta_url); ?>" class="btn-outline js-hero__cta">
            FLY WITH US
            <svg width="18" height="18" viewBox="0 0 24 24" fill="white" aria-hidden="true">
                <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8-8-8z"/>
            </svg>
        </a>
    </div>
</section>
