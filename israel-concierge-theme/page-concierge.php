<?php
/**
 * Template Name: Консьерж-услуги
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

    <article id="post-<?php the_ID(); ?>" <?php post_class('page-template-concierge'); ?>>
        <div class="page-content-wrapper">
            <?php the_content(); ?>
        </div>
    </article>

    <?php
endwhile;
?>

<?php
get_footer();
