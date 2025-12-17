<?php
/**
 * The template for displaying all pages
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
        </div>
    </section>

    <section class="page-content section-padding">
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="page-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="page-body">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Страницы:', 'israel-concierge'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>
            </article>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        </div>
    </section>

    <?php
endwhile;
?>

<?php
get_footer();
