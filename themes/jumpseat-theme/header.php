<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('js-body'); ?>>
<?php
$front_id = get_option('page_on_front');
if (!$front_id && (is_front_page() || is_home())) {
    $front_id = get_the_ID();
}
$logo = get_field('agency_logo', $front_id); 
?>
<header class="js-header site-header">
    <div class="js-header__inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="js-header__logo">
            <?php if ( $logo ) : ?>
                <img src="<?php echo esc_url($logo); ?>" alt="JumpSeat" style="max-height: 40px;">
            <?php else : ?>
                LOGO
            <?php endif; ?>
        </a>
        <nav class="js-header__nav" aria-label="Main Navigation">
            <ul class="js-header__menu">
                <?php 
                $has_menu = false;
                for($i=1; $i<=5; $i++):
                    $label = get_field("m{$i}_label", $front_id);
                    $url   = get_field("m{$i}_url", $front_id);
                    if($label): 
                        $has_menu = true;
                        ?>
                        <li><a href="<?php echo esc_url($url ?: '#'); ?>"><?php echo esc_html($label); ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if (!$has_menu) : ?>
                    <li><a href="#hero">BELIEFS</a></li>
                    <li><a href="#services">OUR SERVICES</a></li>
                    <li><a href="#contact">GET IN TOUCH</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <button class="js-hamburger" aria-label="Menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>