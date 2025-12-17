<?php
/**
 * The main template file
 *
 * @package Israel_Concierge
 */

get_header();
?>

<section class="page-hero">
    <div class="page-hero-content">
        <h1 class="page-title">
            <?php
            if (is_home()) {
                bloginfo('name');
            } elseif (is_archive()) {
                the_archive_title();
            } elseif (is_search()) {
                printf(esc_html__('Результаты поиска: %s', 'israel-concierge'), get_search_query());
            } else {
                esc_html_e('Блог', 'israel-concierge');
            }
            ?>
        </h1>
        <?php
        if (is_home() || is_front_page()) {
            $description = get_bloginfo('description', 'display');
            if ($description) {
                ?>
                <p class="page-subtitle"><?php echo esc_html($description); ?></p>
                <?php
            }
        }
        ?>
    </div>
</section>

<section class="content-section section-padding">
    <div class="container">
        <?php
        if (have_posts()) :
            ?>
            <div class="posts-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <header class="post-header">
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <div class="post-meta">
                                    <span class="post-date">
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    <?php if (has_category()) : ?>
                                        <span class="post-categories">
                                            <?php the_category(', '); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </header>

                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                                <?php esc_html_e('Читать далее', 'israel-concierge'); ?>
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => esc_html__('← Назад', 'israel-concierge'),
                'next_text' => esc_html__('Вперед →', 'israel-concierge'),
            ));
            ?>

        <?php
        else :
            ?>
            <div class="no-posts">
                <h2><?php esc_html_e('Ничего не найдено', 'israel-concierge'); ?></h2>
                <p><?php esc_html_e('К сожалению, по вашему запросу ничего не найдено. Попробуйте другой поиск.', 'israel-concierge'); ?></p>
                <?php get_search_form(); ?>
            </div>
            <?php
        endif;
        ?>
    </div>
</section>

<?php
get_footer();
