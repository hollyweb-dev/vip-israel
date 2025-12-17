<?php
/**
 * Template Name: Контакты
 *
 * @package Israel_Concierge
 */

get_header();
$contact = israel_concierge_get_contact_info();
?>

<section class="page-hero">
    <div class="page-hero-content">
        <h1 class="page-title">Контакты</h1>
        <p class="page-subtitle">Свяжитесь с нами любым удобным способом</p>
    </div>
</section>

<section class="contact-page section-padding">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info-column">
                <h2>Наши контакты</h2>
                <p class="contact-intro">
                    Мы всегда готовы ответить на ваши вопросы и обсудить, как можем помочь.
                    Выберите удобный способ связи.
                </p>

                <div class="contact-methods">
                    <div class="contact-method">
                        <div class="contact-method-icon">📞</div>
                        <div class="contact-method-content">
                            <h3>Телефон</h3>
                            <a href="tel:<?php echo esc_attr(str_replace([' ', '-'], '', $contact['phone'])); ?>" class="contact-link">
                                <?php echo esc_html($contact['phone']); ?>
                            </a>
                            <p class="contact-note">Доступны для звонков 24/7</p>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="contact-method-icon">✉️</div>
                        <div class="contact-method-content">
                            <h3>Email</h3>
                            <a href="mailto:<?php echo esc_attr($contact['email']); ?>" class="contact-link">
                                <?php echo esc_html($contact['email']); ?>
                            </a>
                            <p class="contact-note">Ответим в течение 2 часов</p>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="contact-method-icon">💬</div>
                        <div class="contact-method-content">
                            <h3>WhatsApp</h3>
                            <a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' ', '-'], '', $contact['whatsapp'])); ?>" class="contact-link" target="_blank" rel="noopener">
                                <?php echo esc_html($contact['phone']); ?>
                            </a>
                            <p class="contact-note">Быстрая связь в мессенджере</p>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="contact-method-icon">✈️</div>
                        <div class="contact-method-content">
                            <h3>Telegram</h3>
                            <a href="https://t.me/<?php echo esc_attr($contact['telegram']); ?>" class="contact-link" target="_blank" rel="noopener">
                                @<?php echo esc_html($contact['telegram']); ?>
                            </a>
                            <p class="contact-note">Ещё один удобный способ связи</p>
                        </div>
                    </div>
                </div>

                <div class="working-hours">
                    <h3>Режим работы</h3>
                    <p><strong>Круглосуточно, 7 дней в неделю</strong></p>
                    <p class="hours-note">
                        Мы работаем без выходных и праздников, чтобы быть рядом,
                        когда вам нужна помощь.
                    </p>
                </div>

                <div class="social-links-block">
                    <h3>Мы в социальных сетях</h3>
                    <div class="social-links-list">
                        <a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' ', '-'], '', $contact['whatsapp'])); ?>" class="social-btn whatsapp" target="_blank" rel="noopener">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            WhatsApp
                        </a>
                        <a href="https://t.me/<?php echo esc_attr($contact['telegram']); ?>" class="social-btn telegram" target="_blank" rel="noopener">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                            </svg>
                            Telegram
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form-column">
                <h2>Оставьте заявку</h2>
                <p class="form-intro">
                    Заполните форму, и мы свяжемся с вами в ближайшее время для обсуждения ваших потребностей.
                </p>

                <form id="israel-concierge-contact-form" class="concierge-form" method="post">
                    <div class="form-group">
                        <label for="contact-name">Ваше имя *</label>
                        <input type="text" id="contact-name" name="name" required placeholder="Иван Иванов">
                    </div>

                    <div class="form-group">
                        <label for="contact-phone">Телефон *</label>
                        <input type="tel" id="contact-phone" name="phone" required placeholder="+972-54-1234567">
                    </div>

                    <div class="form-group">
                        <label for="contact-email">Email *</label>
                        <input type="email" id="contact-email" name="email" required placeholder="mail@example.com">
                    </div>

                    <div class="form-group">
                        <label for="contact-service">Интересующая услуга</label>
                        <select id="contact-service" name="service">
                            <option value="">Выберите услугу</option>
                            <option value="concierge">Консьерж-услуги</option>
                            <option value="property">Управление недвижимостью</option>
                            <option value="medical">Медицинское сопровождение</option>
                            <option value="legal">Юридические услуги</option>
                            <option value="family">Поддержка семьи</option>
                            <option value="other">Другое</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="contact-message">Сообщение</label>
                        <textarea id="contact-message" name="message" rows="6" placeholder="Расскажите, чем мы можем вам помочь..."></textarea>
                    </div>

                    <div class="form-submit">
                        <button type="submit" class="btn btn-primary btn-large btn-block">Отправить заявку</button>
                    </div>

                    <div class="form-response"></div>

                    <p class="form-privacy">
                        Отправляя форму, вы соглашаетесь с обработкой персональных данных
                        в соответствии с нашей политикой конфиденциальности.
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="faq-section section-padding bg-dark">
    <div class="container">
        <h2 class="section-title text-center">Часто задаваемые вопросы</h2>
        <div class="title-separator"></div>
        <div class="faq-list">
            <div class="faq-item">
                <h3 class="faq-question">Как быстро вы отвечаете на запросы?</h3>
                <p class="faq-answer">
                    Мы стремимся ответить на все обращения в течение 1-2 часов. В экстренных ситуациях — немедленно.
                </p>
            </div>
            <div class="faq-item">
                <h3 class="faq-question">Сколько стоят ваши услуги?</h3>
                <p class="faq-answer">
                    Стоимость зависит от объёма и типа услуг. Мы предлагаем индивидуальные пакеты под ваши потребности.
                    Свяжитесь с нами для получения персонального предложения.
                </p>
            </div>
            <div class="faq-item">
                <h3 class="faq-question">Работаете ли вы с частными лицами?</h3>
                <p class="faq-answer">
                    Да, мы работаем как с частными лицами, так и с корпоративными клиентами.
                </p>
            </div>
            <div class="faq-item">
                <h3 class="faq-question">Можно ли заказать разовую услугу?</h3>
                <p class="faq-answer">
                    Конечно! Мы предоставляем как разовые услуги, так и долгосрочное сопровождение.
                </p>
            </div>
            <div class="faq-item">
                <h3 class="faq-question">Гарантируете ли вы конфиденциальность?</h3>
                <p class="faq-answer">
                    Абсолютно. Конфиденциальность всей информации о наших клиентах — наш главный приоритет.
                </p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
