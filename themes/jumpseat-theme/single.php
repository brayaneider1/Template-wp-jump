<?php
/**
 * The template for displaying all single posts
 */

get_header('selva'); ?>

<main id="selva-single-post" class="single-post">
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <!-- Post Header -->
        <header class="section post-header">
            <div class="container">
                <div class="post-header__content reveal">
                    <span class="post-header__category">
                        <?php the_category(', '); ?>
                    </span>
                    <h1 class="post-header__title heading-serif"><?php the_title(); ?></h1>
                    <div class="post-header__meta">
                        <span class="post-header__date"><?php echo get_the_date(); ?></span>
                        <span class="post-header__author">por <?php the_author(); ?></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Post Content -->
        <article class="section post-body">
            <div class="container container--narrow">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-featured-image reveal">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>

                <div class="post-content reveal">
                    <?php the_content(); ?>
                </div>

                <footer class="post-footer reveal">
                    <div class="post-tags">
                        <?php the_tags('', ' ', ''); ?>
                    </div>
                </footer>
            </div>
        </article>

    <?php endwhile; endif; ?>

    <!-- Navigation -->
    <nav class="section post-navigation">
        <div class="container">
            <div class="post-nav__links">
                <div class="post-nav__prev"><?php previous_post_link('%link', '← Post anterior'); ?></div>
                <div class="post-nav__next"><?php next_post_link('%link', 'Siguiente post →'); ?></div>
            </div>
        </div>
    </nav>

</main>

<?php get_footer('selva'); ?>
