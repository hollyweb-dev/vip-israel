<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Перейти к содержимому', 'israel-concierge'); ?></a>

    <header id="masthead" class="site-header">
        <div class="header-container">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) {
                        ?>
                        <p class="site-description"><?php echo $description; ?></p>
                        <?php
                    }
                }
                ?>
            </div><!-- .site-branding -->

            <button class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="menu-toggle-icon"></span>
                <span class="screen-reader-text"><?php esc_html_e('Меню', 'israel-concierge'); ?></span>
            </button>

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ));
                ?>
            </nav><!-- #site-navigation -->

            <?php
            $contact = israel_concierge_get_contact_info();
            ?>
            <div class="header-contact">
                <a href="tel:<?php echo esc_attr(str_replace([' ', '-'], '', $contact['phone'])); ?>" class="header-phone">
                    <span class="phone-icon">📞</span>
                    <?php echo esc_html($contact['phone']); ?>
                </a>
                <a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' ', '-'], '', $contact['whatsapp'])); ?>" class="btn btn-primary" target="_blank" rel="noopener">
                    WhatsApp
                </a>
            </div>
        </div>
    </header><!-- #masthead -->

    <main id="content" class="site-content">
