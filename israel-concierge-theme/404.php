<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Israel_Concierge
 */

get_header();
?>

<section class="page-hero">
    <div class="page-hero-content">
        <h1 class="page-title">404</h1>
        <p class="page-subtitle"><?php esc_html_e('Страница не найдена', 'israel-concierge'); ?></p>
    </div>
</section>

<section class="error-404 section-padding">
    <div class="container">
        <div class="error-content text-center" style="max-width: 700px; margin: 0 auto;">
            <h2 style="margin-bottom: 1.5rem;">
                <?php esc_html_e('К сожалению, такой страницы не существует', 'israel-concierge'); ?>
            </h2>
            <p class="lead" style="margin-bottom: 2rem;">
                <?php esc_html_e('Возможно, она была удалена или перемещена. Попробуйте воспользоваться поиском или вернитесь на главную страницу.', 'israel-concierge'); ?>
            </p>

            <div style="margin-bottom: 3rem;">
                <?php get_search_form(); ?>
            </div>

            <div class="error-actions" style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-large">
                    <?php esc_html_e('На главную', 'israel-concierge'); ?>
                </a>
                <a href="javascript:history.back()" class="btn btn-outline btn-large">
                    <?php esc_html_e('Вернуться назад', 'israel-concierge'); ?>
                </a>
            </div>
        </div>

        <?php
        // Show recent posts
        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => 3,
            'post_status' => 'publish'
        ));

        if ($recent_posts) :
            ?>
            <div style="margin-top: 5rem;">
                <h3 class="text-center" style="margin-bottom: 2rem;">
                    <?php esc_html_e('Возможно, вас заинтересует:', 'israel-concierge'); ?>
                </h3>
                <div class="services-grid">
                    <?php
                    foreach ($recent_posts as $post_item) :
                        ?>
                        <div class="service-card">
                            <h3 class="service-title">
                                <a href="<?php echo get_permalink($post_item['ID']); ?>">
                                    <?php echo esc_html($post_item['post_title']); ?>
                                </a>
                            </h3>
                            <p class="service-description">
                                <?php echo wp_trim_words($post_item['post_excerpt'] ?: $post_item['post_content'], 20); ?>
                            </p>
                            <a href="<?php echo get_permalink($post_item['ID']); ?>" class="service-link">
                                <?php esc_html_e('Читать далее', 'israel-concierge'); ?> →
                            </a>
                        </div>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <?php
        endif;
        ?>
    </div>
</section>

<?php
get_footer();
