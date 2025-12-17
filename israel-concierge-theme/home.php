<?php
/**
 * Template Name: Главная страница
 *
 * @package Israel_Concierge
 */

get_header();
?>

<?php
while (have_posts()) :
    the_post();
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('home-page-template'); ?>>
        <?php the_content(); ?>
    </article>

    <?php
endwhile;
?>

<?php
get_footer();
