<?php
$front_id = get_option('page_on_front');
$headline = get_field('fb_title', $front_id) ?: 'B2B SUCCESS IS IN THE AIR';

$flights = [];
for($i=1; $i<=4; $i++) {
    $time = get_field("v{$i}_time", $front_id);
    $dest = get_field("v{$i}_dest", $front_id);
    $gate = get_field("v{$i}_gate", $front_id);
    
    if($time || $dest) {
        $flights[] = [
            'time' => $time ?: '00:00',
            'dest' => $dest ?: '---',
            'gate' => $gate ?: '-'
        ];
    }
}

if (empty($flights)) {
    $flights = [
        ['time' => '08:15', 'dest' => 'CREATE MOMENTUM', 'gate' => 'A12'],
        ['time' => '09:30', 'dest' => 'FULL SERVICE',   'gate' => 'B05'],
        ['time' => '11:45', 'dest' => 'GLOBAL AGENCY', 'gate' => 'C08'],
        ['time' => '14:20', 'dest' => 'FOR B2B TEAMS',  'gate' => 'D15'],
    ];
}
?>
<section id="flight-board" class="js-fboard section js-reveal">
    <div class="js-fboard__glow-blue" aria-hidden="true"></div>
    <div class="js-fboard__glow-peach" aria-hidden="true"></div>
    
    <div class="container">
        <div class="js-fboard__intro">
            <div class="js-fboard__intro-content">
                <h2 class="js-fboard__headline"><?php echo esc_html($headline); ?></h2>
                <p class="js-fboard__intro-text">Avoid turbulence. Arrive at your destination sooner. And enjoy the ascent.</p>
                <p class="js-fboard__body-text">We build comprehensive, strategic revenue generation engines that create sustainable momentum for your B2B growth.</p>
                <a href="#contact" class="js-fboard__cta">
                    BOOK A FLIGHT
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>
                </a>
            </div>
        </div>

        <div class="js-board">
            <div class="js-board__label-row">
                <svg viewBox="0 0 24 24"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>
                <span>AIRLINE</span>
            </div>

            <div class="js-board__col-headers">
                <span class="col-time">TIME</span>
                <span class="col-dest">DESTINATION</span>
                <span class="col-gate">GATE</span>
            </div>

            <?php foreach ($flights as $flight) : 
                $time_chars = str_split($flight['time']);
                $dest = strtoupper($flight['dest']);
                $gate = strtoupper($flight['gate']);
                $gate_chars = str_split($gate);
            ?>
            <div class="js-board__row">
                <div class="js-board__cell js-board__cell--time">
                    <?php foreach ($time_chars as $c) : ?>
                        <?php if ($c === ':') : ?>
                            <span class="js-tile--time-colon">:</span>
                        <?php else : ?>
                            <div class="js-tile js-tile--time"><span class="js-tile__face"><?php echo $c; ?></span></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="js-board__cell js-board__cell--dest">
                    <?php 
                    $max_chars = 18;
                    $dest_chars = str_split(substr($dest, 0, $max_chars));
                    foreach ($dest_chars as $c) : ?>
                        <div class="js-tile js-tile--dest"><span class="js-tile__face"><?php echo $c; ?></span></div>
                    <?php endforeach; 
                    for ($i = count($dest_chars); $i < $max_chars; $i++) : ?>
                        <div class="js-tile js-tile--empty"></div>
                    <?php endfor; ?>
                </div>

                <div class="js-board__cell js-board__cell--gate">
                    <?php foreach ($gate_chars as $c) : ?>
                        <div class="js-tile js-tile--gate"><span class="js-tile__face"><?php echo $c; ?></span></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
