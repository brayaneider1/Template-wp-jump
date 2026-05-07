<?php
$title   = get_field('values_title') ?: 'WITH YOU EVERY MILE';
$desc    = get_field('values_description') ?: 'Some firms don\'t "do" at all. Others "do" it for you... We\'re in it with you every step.';
$cta_url = get_field('values_cta_url') ?: '#about';
?>
<section id="values" class="js-values section js-reveal" aria-label="With You Every Mile">
    
    <div class="js-values__ghost-wrap" data-speed="0.15">
        <div class="js-values__ghost-with" aria-hidden="true">WITH</div>
        <div class="js-values__ghost-you" aria-hidden="true">YOU</div>
    </div>

    <div class="container js-values__content js-reveal">
        <div class="glow-blob glow-blob--values"></div>
        
        <div class="js-values__header">
            <span class="js-values__eyebrow"><?php echo esc_html($title); ?></span>
            <h2 class="js-values__large-title">WITH YOU</h2>
        </div>

        <p class="js-values__desc"><?php echo esc_html($desc); ?></p>
        
        <div class="js-diagram" role="img" aria-label="JumpSeat vs Advisory Firms vs Agencies comparison">
            <div class="js-diagram__labels">
                <div class="js-diagram__col">
                    <span class="js-diagram__label">Advisory Firms</span>
                    <span class="js-diagram__sub"><em class="neg">Don't</em> do</span>
                </div>
                <div class="js-diagram__col">
                    <span class="js-diagram__label">Agencies</span>
                    <span class="js-diagram__sub"><em class="neg">For</em> you</span>
                </div>
                <div class="js-diagram__col">
                    <span class="js-diagram__label js-diagram__label--brand">JumpSeat</span>
                    <span class="js-diagram__sub js-diagram__sub--brand"><em class="pos">With</em> you</span>
                </div>
            </div>
            <div class="js-diagram__line-row">
                <div class="js-diagram__track">
                    <div class="js-diagram__progress"></div>
                </div>
                <div class="js-diagram__dots-row">
                    <div class="js-diagram__dot"></div>
                    <div class="js-diagram__dot"></div>
                    <div class="js-diagram__dot js-diagram__dot--active"></div>
                </div>
            </div>
        </div>
        
        <div class="js-values__cta-wrap">
            <a href="<?php echo esc_url($cta_url); ?>" class="btn-outline">
                GET TO KNOW US
                <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8-8-8z"/>
                </svg>
            </a>
        </div>
    </div>
</section>
