<?php
$front_id      = get_option('page_on_front');
$heading       = get_field('about_heading', $front_id)     ?: 'B2B Agency';
$heading_accent = get_field('about_heading2', $front_id)    ?: '& Advisory';
$desc          = get_field('about_description', $front_id) ?: "If a management consultancy and indie agency came together, JumpSeat would be the result. We're a unique blend of left and right brain thinking.";

$services = [];
for($i=1; $i<=4; $i++) {
    $stitle = get_field("s{$i}_title", $front_id);
    $sdesc  = get_field("s{$i}_desc", $front_id);
    if($stitle) {
        $services[] = [
            'svc_title' => $stitle,
            'svc_desc'  => $sdesc ?: ''
        ];
    }
}

if ( empty($services) ) {
    $services = [
        ['svc_title' => 'STRATEGIC REVENUE GENERATION ADVISORY', 'svc_desc' => 'Alignment of sales and marketing around a single revenue goal.'],
        ['svc_title' => 'BRAND DEVELOPMENT', 'svc_desc' => 'Building brands that command attention and drive preference.'],
        ['svc_title' => 'DEMAND GEN CAMPAIGN STRATEGY AND EXECUTION', 'svc_desc' => 'Full-funnel campaigns that fill your pipeline.'],
        ['svc_title' => 'RECRUITMENT, ONBOARDING AND COACHING', 'svc_desc' => 'Equipping your team with the tools to close more deals.'],
    ];
}
?>
<section id="services" class="js-about section js-reveal">
    <div class="glow-blob-container">
        <div class="glow-blob--about-accent" aria-hidden="true"></div>
    </div>
    <div class="glow-blob-container2">
        <div class="glow-blob--about-purple" aria-hidden="true"></div>
    </div>
    
    <div class="js-about__ghost js-parallax" data-speed="0.25" aria-hidden="true">AGENCY & ADVISORY</div>
    
    <div class="container">
        <div class="js-about__header">
            <h2 class="js-about__title">
                <span class="js-about__title-line1"><?php echo esc_html($heading); ?></span>
                <span class="js-about__title-line2"><?php echo esc_html($heading_accent); ?></span>
            </h2>
        </div>
        
        <div class="js-about__grid">
            <div class="js-about__header-col">
                <div class="js-about__desc-col">
                    <p class="js-about__desc"><?php echo esc_html($desc); ?></p>
                </div>
            </div>
            
            <div class="js-about__services">
                <?php foreach ( $services as $svc ) : ?>
                <div class="js-about__service">
                    <div class="js-about__service-header">
                        <h3 class="js-about__service-name"><?php echo esc_html($svc['svc_title']); ?></h3>
                        <span class="js-about__service-arrow">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </span>
                    </div>
                    <div class="js-about__service-body">
                        <p class="js-about__service-desc"><?php echo esc_html($svc['svc_desc']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
