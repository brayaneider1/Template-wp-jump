<?php
$front_id = get_option('page_on_front') ?: (is_front_page() ? get_the_ID() : 0);
$ceo_photo_raw = get_field('ceo_photo', $front_id);
$ceo_photo = '';
if (is_array($ceo_photo_raw)) {
    $ceo_photo = $ceo_photo_raw['url'];
} elseif (is_numeric($ceo_photo_raw)) {
    $ceo_photo = wp_get_attachment_url($ceo_photo_raw);
} else {
    $ceo_photo = $ceo_photo_raw;
}
if (empty($ceo_photo)) {
    $ceo_photo = get_template_directory_uri() . '/assets/img/dan2.png';
}
$ceo_email  = get_field('ceo_email', $front_id)   ?: 'dan@domain.co';
$ceo_tagline= get_field('ceo_tagline', $front_id) ?: 'PILOTS PREVIOUSLY. TAKEOFF TODAY.';
$team_url   = get_field('team_url', $front_id)    ?: '#';
$title_white= get_field('contact_title_white', $front_id) ?: 'GET IN TOUCH WITH';
$title_peach= get_field('contact_title_peach', $front_id) ?: 'OUR TEAM';
$ceo_text   = get_field('ceo_text', $front_id)    ?: 'Email our CEO directly, <a href="mailto:' . esc_attr($ceo_email) . '">' . esc_html($ceo_email) . '</a> or drop a line to our team.';
?>
<section id="contact" class="js-contact js-reveal" aria-label="Contact JumpSeat">
    <div class="glow-blob glow-blob--contact" aria-hidden="true"></div>
    <div class="container js-contact__inner">
        <div class="js-contact__card js-reveal">
            <div class="js-contact__header-text">
                <h2 class="js-contact__title">
                    <?php echo esc_html($title_white); ?> 
                    <span class="text-peach"><?php echo esc_html($title_peach); ?></span>
                </h2>
            </div>
            <div class="js-contact__form-wrap">
                <form id="js-contact-form" class="js-form">
                    <div class="js-form__row">
                        <div class="js-form__group">
                            <input type="text" name="name" placeholder="NAME *" required>
                        </div>
                        <div class="js-form__group">
                            <input type="email" name="email" placeholder="EMAIL *" required>
                        </div>
                    </div>
                    <div class="js-form__row">
                        <div class="js-form__group">
                            <input type="text" name="company" placeholder="COMPANY">
                        </div>
                        <div class="js-form__group">
                            <input type="text" name="title" placeholder="TITLE / POSITION">
                        </div>
                    </div>
                    <div class="js-form__group js-form__group--textarea">
                        <textarea name="message" placeholder="TELL US ABOUT YOUR CHALLENGE..."></textarea>
                    </div>
                    <div class="js-form__footer">
                        <div id="js-form-response" class="js-form__response"></div>
                        <button type="submit" class="btn-outline--small">
                            SEND
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="white"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8-8-8z"/></svg>
                        </button>
                    </div>
                </form>
            </div>
            <hr class="js-contact__divider">
            <div class="js-contact__ceo-block">
                <div class="js-contact__ceo-ring">
                    <img src="<?php echo esc_url($ceo_photo); ?>" alt="JumpSeat CEO" class="js-contact__ceo-img">
                </div>
                <div class="js-contact__ceo-info">
                    <p class="js-contact__ceo-text"><?php echo wp_kses_post($ceo_text); ?></p>
                    <p class="js-contact__ceo-tagline"><?php echo wp_kses_post($ceo_tagline); ?></p>
                </div>
            </div>
            <div class="js-contact__meet-wrap">
                <a href="<?php echo esc_url($team_url); ?>" class="btn-outline btn-outline--small js-contact__meet-btn">
                    MEET THE TEAM <span>→</span>
                </a>
            </div>
        </div>
    </div>
</section>