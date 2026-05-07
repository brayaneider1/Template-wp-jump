<?php
$front_id = get_option('page_on_front') ?: (is_front_page() ? get_the_ID() : 0);
$logo     = get_field('agency_logo', $front_id); 
$linkedin = get_field('footer_linkedin', $front_id) ?: '#';
$address  = get_field('footer_address', $front_id)  ?: '3116 W Cortland<br>Chicago, IL 60647';
$phone    = get_field('footer_phone', $front_id)    ?: '630.870.2141';
$email    = get_field('footer_email', $front_id)    ?: 'letsfly@web.com';
?>
<footer class="js-footer">
    <div class="container">
        <div class="js-footer__row">
            <div class="js-footer__group-left">
                <div class="js-footer__logo-col">
                    <a href="<?php echo home_url(); ?>" class="js-footer__logo">
                        <?php if($logo): ?>
                            <img src="<?php echo esc_url($logo); ?>" alt="JumpSeat" style="max-height: 40px;">
                        <?php else: ?>
                            LOGO
                        <?php endif; ?>
                    </a>
                </div>
                <div class="js-footer__social-col">
                    <a href="<?php echo esc_url($linkedin); ?>" class="js-footer__social-link" target="_blank">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                    </a>
                </div>
                <div class="js-footer__contact-col">
                    <h4 class="js-footer__label">CONTACT US</h4>
                    <div class="js-footer__text">
                        <p><?php echo wp_kses_post($address); ?></p>
                        <p><?php echo esc_html($phone); ?><br><?php echo esc_html($email); ?></p>
                    </div>
                </div>
                <div class="js-footer__nav-col">
                    <?php 
                    for($i=1; $i<=5; $i++):
                        $label = get_field("m{$i}_label", $front_id);
                        $url   = get_field("m{$i}_url", $front_id);
                        if($label): ?>
                            <a href="<?php echo esc_url($url ?: '#'); ?>" class="js-footer__nav-link"><?php echo esc_html($label); ?></a>
                        <?php endif; 
                    endfor; ?>
                </div>
            </div>
            <div class="js-footer__group-right">
                <div class="js-footer__stamps-cluster">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/image-70.png" alt="" class="js-footer__stamp-img s1">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/image-71.png" alt="" class="js-footer__stamp-img s2">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/image-72.png" alt="" class="js-footer__stamp-img s3">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/image-73.png" alt="" class="js-footer__stamp-img s4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/image-74.png" alt="" class="js-footer__stamp-img s5">
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
