<?php
/**
 * Template Name: Selva About Custom
 */

get_header('selva'); ?>

<main id="selva-about-content" class="about">
    
    <section class="section section--full-height about-hero">
        <div class="container">
            <div class="about-hero__wrapper reveal">
                <h1 class="about-hero__title">Más que una agencia, somos <span class="about-hero__title--italic"><i>arquitectos digitales</i></span>.</h1>
                <div class="about-hero__meta">
                    <span class="about-hero__year heading-serif">Est. 2026</span>
                    <div class="about-hero__line"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section narrative">
        <div class="container">
            <div class="narrative__grid reveal">
                <div class="narrative__text">
                    <h2 class="heading-serif">Nuestra <i>Filosofía</i></h2>
                    <p>En el corazón de la Amazonía, donde la biodiversidad es la regla, entendimos que el software debe ser igual: adaptable, resiliente y lleno de vida. No construimos sitios web, creamos ecosistemas digitales.</p>
                </div>
                <div class="narrative__image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/tiger.jpg" alt="Selva Studio Philosophy" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="section values">
        <div class="container">
            <div class="values__grid">
                <div class="value-item reveal">
                    <span class="value-item__num heading-serif">01</span>
                    <h3 class="value-item__title">Precisión</h3>
                    <p class="value-item__desc">Cada línea de código es escrita con un propósito claro y una arquitectura impecable.</p>
                </div>
                <div class="value-item reveal">
                    <span class="value-item__num heading-serif">02</span>
                    <h3 class="value-item__title">Biodiversidad</h3>
                    <p class="value-item__desc">Integramos diversas tecnologías para crear soluciones robustas y únicas.</p>
                </div>
                <div class="value-item reveal">
                    <span class="value-item__num heading-serif">03</span>
                    <h3 class="value-item__title">Impacto</h3>
                    <p class="value-item__desc">Buscamos que cada proyecto genere un cambio real en el ecosistema de nuestros clientes.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer('selva'); ?>
