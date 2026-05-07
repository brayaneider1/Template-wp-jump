<?php
$front_id = get_option('page_on_front');
$line1 = get_field('cases_heading_white', $front_id) ?: 'Show Up Boldly';
$line2 = get_field('cases_heading_accent', $front_id) ?: 'Show Up Confidently';
$cases = [];
for($i=1; $i<=3; $i++) {
    $title = get_field("cs{$i}_title_yellow", $front_id);
    if($title) {
        $cases[] = [
            'cs_image'        => get_field("cs{$i}_image", $front_id),
            'cs_title_yellow' => $title,
            'cs_desc_img'     => get_field("cs{$i}_desc_img", $front_id),
            'cs_panel_title'  => get_field("cs{$i}_panel_title", $front_id),
            'cs_panel_body'   => get_field("cs{$i}_panel_body", $front_id),
            'cs_url'          => get_field("cs{$i}_url", $front_id),
        ];
    }
}
if ( empty($cases) ) {
    $img_dir = get_stylesheet_directory_uri() . '/assets/img/';
    $cases = [
        [
            'cs_image'       => $img_dir . 'aerea.jpg',
            'cs_title_yellow' => 'Stay in the Driver\'s Seat',
            'cs_desc_img'    => 'One-stop access to key trucking business needs. Get everything from freight factoring to fuel cards, equipment leasing and insurance.',
            'cs_panel_title' => 'Lorem ipsum dolor sit amet, consectur',
            'cs_panel_body'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'cs_url'         => '#',
        ],
        [
            'cs_image'       => $img_dir . 'restaurante.jpg',
            'cs_title_yellow' => 'Show Up Boldly',
            'cs_desc_img'    => 'Building brands that command attention in the B2B space through strategic positioning and creative execution.',
            'cs_panel_title' => 'Brand strategy that converts',
            'cs_panel_body'  => 'We helped this client triple their pipeline in six months through a complete brand overhaul.',
            'cs_url'         => '#',
        ],
    ];
}
?>
<section id="cases" class="js-cases js-reveal" aria-label="Case Studies">
    <div class="container js-cases__heading-wrap">
        <div class="js-cases__heading">
            <div class="js-cases__heading-text">
                <p class="js-cases__line js-cases__line--white"><?php echo esc_html($line1); ?></p>
                <p class="js-cases__line js-cases__line--accent"><?php echo esc_html($line2); ?></p>
            </div>
            <button class="js-cases__arrow" data-cases-next aria-label="Next case study">→</button>
        </div>
    </div>
    <div class="js-cases__track-wrap">
        <div class="js-cases__track" data-cases-slider>
            <?php foreach ($cases as $i => $cs) :
                $img = !empty($cs['cs_image']) ? $cs['cs_image'] : get_stylesheet_directory_uri() . '/assets/img/aerea.jpg';
            ?>
            <div class="js-case-slide <?php echo $i === 0 ? 'is-active' : ''; ?>"
                 aria-hidden="<?php echo $i !== 0 ? 'true' : 'false'; ?>">
                <div class="js-case__card">
                    <div class="js-case__card-header">
                        <div class="js-case__card-brand">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                            </svg>
                            <span>JUMPSEAT</span>
                        </div>
                        <span class="js-case__card-label">BOARDING PASS</span>
                    </div>
                    <div class="js-case__card-body">
                        <div class="js-case__img-col">
                            <img src="<?php echo esc_url($img); ?>"
                                 alt="<?php echo esc_attr($cs['cs_title_yellow']); ?>"
                                 class="js-case__img">
                            <div class="js-case__img-overlay"></div>
                            <div class="js-case__img-content">
                                <h2 class="js-case__img-title">
                                    <?php echo esc_html($cs['cs_title_yellow']); ?>
                                </h2>
                                <p class="js-case__img-desc">
                                    <?php echo esc_html($cs['cs_desc_img']); ?>
                                </p>
                            </div>
                        </div>
                        <div class="js-case__panel">
                            <div class="js-case__panel-content">
                                <h3 class="js-case__panel-title">
                                    <?php echo esc_html($cs['cs_panel_title']); ?>
                                </h3>
                                <p class="js-case__panel-body">
                                    <?php echo esc_html($cs['cs_panel_body']); ?>
                                </p>
                            </div>
                            <a href="<?php echo esc_url($cs['cs_url'] ?: '#'); ?>" class="js-case__panel-cta">
                                CASE STUDY <span>→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container">
        <div class="js-cases__dots" role="tablist">
            <?php foreach ($cases as $i => $_) : ?>
            <button class="js-dot <?php echo $i === 0 ? 'is-active' : ''; ?>"
                    data-cases-slide="<?php echo $i; ?>"
                    role="tab"
                    aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                    aria-label="Case <?php echo $i + 1; ?>">
            </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>
