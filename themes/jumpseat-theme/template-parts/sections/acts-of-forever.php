<?php
/**
 * Template Part: Eliminate Random Acts of Sales & Marketing Forever
 */
$title        = get_field('acts_title')        ?: 'ELIMINATE RANDOM ACTS OF SALES & MARKETING FOREVER';
$highlight    = get_field('acts_highlight')    ?: "This is the hill we're willing to die on.";
$body         = get_field('acts_body')         ?: "We exist to stop all the random acts of content. Half-baked webinars an uninspired emails. One-off tweets and abandoned social channels. Leadership meetings that start with, 'I just heard this on a podcast...'";
$footer_note  = get_field('acts_footer_note')  ?: 'You get it. RAoS&M produce chaos but not consistent results.';
$cta_label    = get_field('acts_cta_label')    ?: 'GET TO KNOW US';
$cta_url      = get_field('acts_cta_url')      ?: '#about';

$img_dir      = get_stylesheet_directory_uri() . '/assets/img/';
$img_monitor  = get_field('acts_img_monitor')  ?: $img_dir . 'monitor.png';
$img_mobile   = get_field('acts_img_mobile')   ?: $img_dir . 'mobile.png';
?>
<section class="js-acts section js-reveal">
    <div class="container">
        <div class="js-acts__grid">
            
            <div class="js-acts__content js-reveal">
                <h2 class="js-acts__title">
                    <?php echo esc_html($title); ?>
                </h2>
                
                <div class="js-acts__body">
                    <p class="js-acts__highlight"><?php echo esc_html($highlight); ?></p>
                    <div class="js-acts__main-text">
                        <?php echo wpautop(wp_kses_post($body)); ?>
                    </div>
                    <p class="js-acts__footer-note">
                        <?php echo esc_html($footer_note); ?>
                    </p>
                </div>

                <div class="js-acts__cta-wrap">
                    <a href="<?php echo esc_attr($cta_url); ?>" class="btn-outline">
                        <?php echo esc_html($cta_label); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8-8-8z"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <div class="js-acts__image-col js-reveal">
                <div class="js-acts__image-wrap">
                    <img src="<?php echo esc_url($img_monitor); ?>" alt="Monitor" class="js-acts__img-monitor">
                    <img src="<?php echo esc_url($img_mobile); ?>" alt="Mobile" class="js-acts__img-mobile">
                </div>
            </div>
            
        </div>
    </div>
</section>
