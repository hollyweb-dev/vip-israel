<?php
/**
 * The template for displaying all single posts
 *
 * @package Israel_Concierge
 */

get_header();
?>

<?php
while (have_posts()) :
    the_post();
    ?>

    <section class="page-hero">
        <div class="page-hero-content">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="post-meta" style="color: var(--color-light-gray); margin-top: 1rem;">
                <span class="post-date">
                    <?php echo get_the_date(); ?>
                </span>
                <?php if (has_category()) : ?>
                    <span style="margin: 0 0.5rem;">•</span>
                    <span class="post-categories">
                        <?php the_category(', '); ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="single-content section-padding">
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-featured-image" style="margin-bottom: 3rem; border-radius: 8px; overflow: hidden;">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content" style="max-width: 800px; margin: 0 auto; font-size: 1.125rem; line-height: 1.8;">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Страницы:', 'israel-concierge'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <?php if (has_tag()) : ?>
                    <div class="post-tags" style="max-width: 800px; margin: 3rem auto 0; padding-top: 2rem; border-top: 1px solid var(--color-medium-gray);">
                        <strong style="color: var(--color-gold); margin-right: 1rem;">
                            <?php esc_html_e('Теги:', 'israel-concierge'); ?>
                        </strong>
                        <?php the_tags('', ', ', ''); ?>
                    </div>
                <?php endif; ?>

                <div class="post-navigation" style="max-width: 800px; margin: 3rem auto 0; padding-top: 2rem; border-top: 1px solid var(--color-medium-gray); display: flex; justify-content: space-between; gap: 2rem;">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>

                    <div class="nav-previous" style="flex: 1;">
                        <?php if ($prev_post) : ?>
                            <div style="margin-bottom: 0.5rem; color: var(--color-light-gray); font-size: 0.875rem;">
                                ← <?php esc_html_e('Предыдущая статья', 'israel-concierge'); ?>
                            </div>
                            <a href="<?php echo get_permalink($prev_post); ?>" style="color: var(--color-gold); font-weight: 600;">
                                <?php echo get_the_title($prev_post); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="nav-next" style="flex: 1; text-align: right;">
                        <?php if ($next_post) : ?>
                            <div style="margin-bottom: 0.5rem; color: var(--color-light-gray); font-size: 0.875rem;">
                                <?php esc_html_e('Следующая статья', 'israel-concierge'); ?> →
                            </div>
                            <a href="<?php echo get_permalink($next_post); ?>" style="color: var(--color-gold); font-weight: 600;">
                                <?php echo get_the_title($next_post); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </article>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                ?>
                <div style="max-width: 800px; margin: 4rem auto 0;">
                    <?php comments_template(); ?>
                </div>
                <?php
            endif;
            ?>
        </div>
    </section>

    <?php
endwhile;
?>

<?php
get_footer();
