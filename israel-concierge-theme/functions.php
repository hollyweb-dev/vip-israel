<?php
/**
 * Israel Concierge Theme Functions
 *
 * @package Israel_Concierge
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function israel_concierge_setup() {
    // Поддержка заголовка документа
    add_theme_support('title-tag');

    // Поддержка миниатюр
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 800, true);

    // Поддержка пользовательского логотипа
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Регистрация меню
    register_nav_menus(array(
        'primary' => esc_html__('Основное меню', 'israel-concierge'),
        'footer'  => esc_html__('Меню в футере', 'israel-concierge'),
    ));

    // Поддержка HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Поддержка автоматических ссылок на RSS
    add_theme_support('automatic-feed-links');
}
add_action('after_setup_theme', 'israel_concierge_setup');

/**
 * Enqueue scripts and styles
 */
function israel_concierge_scripts() {
    // Google Fonts
    wp_enqueue_style('israel-concierge-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap', array(), null);

    // Основные стили темы
    wp_enqueue_style('israel-concierge-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');

    // Основной JavaScript
    wp_enqueue_script('israel-concierge-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);

    // Локализация скриптов
    wp_localize_script('israel-concierge-main', 'israelConcierge', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('israel_concierge_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'israel_concierge_scripts');

/**
 * Customizer settings
 */
function israel_concierge_customize_register($wp_customize) {
    // Секция контактной информации
    $wp_customize->add_section('israel_concierge_contact', array(
        'title'    => esc_html__('Контактная информация', 'israel-concierge'),
        'priority' => 30,
    ));

    // Телефон
    $wp_customize->add_setting('israel_concierge_phone', array(
        'default'           => '+972-54-2128363',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('israel_concierge_phone', array(
        'label'   => esc_html__('Телефон', 'israel-concierge'),
        'section' => 'israel_concierge_contact',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('israel_concierge_email', array(
        'default'           => 'info@israel-concierge.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('israel_concierge_email', array(
        'label'   => esc_html__('Email', 'israel-concierge'),
        'section' => 'israel_concierge_contact',
        'type'    => 'email',
    ));

    // WhatsApp
    $wp_customize->add_setting('israel_concierge_whatsapp', array(
        'default'           => '+972542128363',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('israel_concierge_whatsapp', array(
        'label'   => esc_html__('WhatsApp (формат: +972542128363)', 'israel-concierge'),
        'section' => 'israel_concierge_contact',
        'type'    => 'text',
    ));

    // Telegram
    $wp_customize->add_setting('israel_concierge_telegram', array(
        'default'           => 'israelconcierge',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('israel_concierge_telegram', array(
        'label'   => esc_html__('Telegram (username)', 'israel-concierge'),
        'section' => 'israel_concierge_contact',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'israel_concierge_customize_register');

/**
 * AJAX handler для контактной формы
 */
function israel_concierge_contact_form_handler() {
    check_ajax_referer('israel_concierge_nonce', 'nonce');

    $name    = sanitize_text_field($_POST['name']);
    $phone   = sanitize_text_field($_POST['phone']);
    $email   = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    if (empty($name) || empty($phone) || empty($email)) {
        wp_send_json_error(array('message' => 'Пожалуйста, заполните все обязательные поля.'));
    }

    $to      = get_option('admin_email');
    $subject = 'Новая заявка с сайта Israel Concierge';
    $body    = "Имя: $name\nТелефон: $phone\nEmail: $email\n\nСообщение:\n$message";
    $headers = array('Content-Type: text/plain; charset=UTF-8');

    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success(array('message' => 'Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.'));
    } else {
        wp_send_json_error(array('message' => 'Произошла ошибка при отправке. Пожалуйста, попробуйте позже.'));
    }
}
add_action('wp_ajax_israel_concierge_contact', 'israel_concierge_contact_form_handler');
add_action('wp_ajax_nopriv_israel_concierge_contact', 'israel_concierge_contact_form_handler');

/**
 * Получение контактной информации из Customizer
 */
function israel_concierge_get_contact_info() {
    return array(
        'phone'    => get_theme_mod('israel_concierge_phone', '+972-54-2128363'),
        'email'    => get_theme_mod('israel_concierge_email', 'info@israel-concierge.com'),
        'whatsapp' => get_theme_mod('israel_concierge_whatsapp', '+972542128363'),
        'telegram' => get_theme_mod('israel_concierge_telegram', 'israelconcierge'),
    );
}

/**
 * Добавление класса body для страниц
 */
function israel_concierge_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    return $classes;
}
add_filter('body_class', 'israel_concierge_body_classes');
