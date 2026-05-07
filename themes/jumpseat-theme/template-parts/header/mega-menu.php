<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$latest_post = get_posts( array(
    'posts_per_page' => 1,
    'post_status'    => 'publish',
) );

$has_post = !empty($latest_post);
if ($has_post) {
    $post_id = $latest_post[0]->ID;
    $post_title = get_the_title($post_id);
    $post_excerpt = get_the_excerpt($post_id);
    $post_link = get_permalink($post_id);
}
?>

<div id="selva-mega-menu" class="mega-menu">
    <div class="container">
        <div class="mega-menu__grid">
            
            <div class="mega-menu__column">
                <h3 class="mega-menu__title">Navegación</h3>
                <ul class="mega-menu__list">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mega-menu__link">Inicio</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/nosotros' ) ); ?>" class="mega-menu__link">Nosotros</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/noticias' ) ); ?>" class="mega-menu__link">Noticias</a></li>
                </ul>
            </div>

            <div class="mega-menu__column">
                <h3 class="mega-menu__title">Contacto</h3>
                <div class="mega-menu__contact">
                    <p class="mega-menu__text">¿Listo para iniciar tu próximo ecosistema digital?</p>
                    <a href="https://wa.me/573124524674" target="_blank" class="btn btn--whatsapp">
                        Hablar por WhatsApp
                    </a>
                </div>
            </div>

            <div class="mega-menu__column mega-menu__column--featured">
                <div class="featured-card">
                    <span class="featured-card__tag">Última Noticia</span>
                    <?php if ($has_post) : ?>
                        <h4 class="featured-card__title"><?php echo esc_html($post_title); ?></h4>
                        <p class="featured-card__text"><?php echo esc_html(wp_trim_words($post_excerpt, 15)); ?></p>
                        <a href="<?php echo esc_url($post_link); ?>" class="post-card__link">Leer más <span class="arrow">→</span></a>
                    <?php else : ?>
                        <h4 class="featured-card__title">Próximamente</h4>
                        <p class="featured-card__text">Estamos preparando nuevas perspectivas tecnológicas.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>
