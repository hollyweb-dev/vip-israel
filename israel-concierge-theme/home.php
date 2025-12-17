<?php
/**
 * Template Name: Главная страница
 *
 * @package Israel_Concierge
 */

get_header();
$contact = israel_concierge_get_contact_info();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title fade-in">Услуги персонального ассистента в Израиле</h1>
        <p class="hero-subtitle fade-in delay-1">Премиальное сопровождение жизни и бизнеса для новых репатриантов и гостей страны</p>
        <div class="hero-buttons fade-in delay-2">
            <a href="#contact-form" class="btn btn-primary btn-large">Оставить заявку</a>
            <a href="https://wa.me/<?php echo esc_attr(str_replace(['+', ' ', '-'], '', $contact['whatsapp'])); ?>" class="btn btn-outline btn-large" target="_blank" rel="noopener">
                WhatsApp
            </a>
        </div>
    </div>
    <div class="scroll-indicator">
        <span>Прокрутите вниз</span>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
    </div>
</section>

<!-- About Section -->
<section class="about-section section-padding">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">О компании</h2>
            <div class="title-separator"></div>
        </div>
        <div class="about-content">
            <div class="about-text">
                <p class="lead">
                    Меня зовут <strong>Максим Нагибин</strong>, и я предоставляю услуги персонального ассистента в Израиле для тех,
                    кто ценит своё время и комфорт.
                </p>
                <p>
                    Переезд в новую страну или длительное пребывание в Израиле всегда сопряжены с множеством организационных
                    вопросов — от поиска жилья до решения юридических и медицинских задач. Моя цель — взять на себя все
                    хлопоты и обеспечить вам максимальный комфорт и безопасность.
                </p>
                <p>
                    Я предлагаю индивидуальный подход, конфиденциальность и высокое качество обслуживания.
                    Работаю только с проверенными партнёрами и специалистами, гарантирую оперативное решение любых вопросов.
                </p>
            </div>
            <div class="about-features">
                <div class="feature-card">
                    <div class="feature-icon">🛡️</div>
                    <h3>Конфиденциальность</h3>
                    <p>Полная конфиденциальность всех операций и личных данных клиентов</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>Оперативность</h3>
                    <p>Быстрое реагирование на любые запросы — 24/7</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💎</div>
                    <h3>Премиум-сервис</h3>
                    <p>Индивидуальный подход и работа с лучшими специалистами</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section section-padding bg-dark">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Основные направления услуг</h2>
            <div class="title-separator"></div>
            <p class="section-description">Комплексное решение всех вопросов для вашего комфорта в Израиле</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">🎯</div>
                <h3 class="service-title">Консьерж-услуги</h3>
                <p class="service-description">
                    Встреча в аэропорту, трансферы, аренда авто и вертолета, организация мероприятий,
                    поиск жилья и решение повседневных задач
                </p>
                <a href="<?php echo home_url('/concierge/'); ?>" class="service-link">Подробнее →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">🏡</div>
                <h3 class="service-title">Управление недвижимостью</h3>
                <p class="service-description">
                    Полное управление вашей недвижимостью: подготовка к приезду, обслуживание,
                    контроль состояния, поиск персонала и подрядчиков
                </p>
                <a href="<?php echo home_url('/property/'); ?>" class="service-link">Подробнее →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">🏥</div>
                <h3 class="service-title">Медицинское сопровождение</h3>
                <p class="service-description">
                    Подбор врачей и клиник, организация приёмов, перевод документов,
                    личное сопровождение на консультациях
                </p>
                <a href="<?php echo home_url('/medical/'); ?>" class="service-link">Подробнее →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">⚖️</div>
                <h3 class="service-title">Юридические услуги</h3>
                <p class="service-description">
                    Подбор адвокатов и нотариусов, открытие счетов, регистрация бизнеса,
                    визовые вопросы и переводы документов
                </p>
                <a href="<?php echo home_url('/legal/'); ?>" class="service-link">Подробнее →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">👨‍👩‍👧‍👦</div>
                <h3 class="service-title">Поддержка семьи</h3>
                <p class="service-description">
                    Подбор школ и детских садов, поиск нянь и репетиторов,
                    организация семейных праздников
                </p>
                <a href="<?php echo home_url('/family/'); ?>" class="service-link">Подробнее →</a>
            </div>
            <div class="service-card">
                <div class="service-icon">📞</div>
                <h3 class="service-title">Круглосуточная поддержка</h3>
                <p class="service-description">
                    Оперативное решение любых вопросов в режиме 24/7.
                    Всегда на связи для ваших нужд
                </p>
                <a href="<?php echo home_url('/contact/'); ?>" class="service-link">Связаться →</a>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-section section-padding">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Почему выбирают нас</h2>
            <div class="title-separator"></div>
        </div>
        <div class="why-grid">
            <div class="why-item">
                <div class="why-number">01</div>
                <h3>Опыт и экспертиза</h3>
                <p>Глубокое знание израильских реалий и многолетний опыт работы с VIP-клиентами</p>
            </div>
            <div class="why-item">
                <div class="why-number">02</div>
                <h3>Проверенные партнёры</h3>
                <p>Работаем только с надёжными специалистами и компаниями с безупречной репутацией</p>
            </div>
            <div class="why-item">
                <div class="why-number">03</div>
                <h3>Индивидуальный подход</h3>
                <p>Каждый клиент уникален — мы создаём персональные решения под ваши потребности</p>
            </div>
            <div class="why-item">
                <div class="why-number">04</div>
                <h3>Полная конфиденциальность</h3>
                <p>Гарантируем абсолютную конфиденциальность всех операций и личных данных</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section id="contact-form" class="contact-section section-padding bg-dark">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Оставьте заявку</h2>
            <div class="title-separator"></div>
            <p class="section-description">Свяжитесь с нами, и мы обсудим, как можем помочь именно вам</p>
        </div>
        <div class="contact-form-wrapper">
            <form id="israel-concierge-form" class="concierge-form" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="form-name">Ваше имя *</label>
                        <input type="text" id="form-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="form-phone">Телефон *</label>
                        <input type="tel" id="form-phone" name="phone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="form-email">Email *</label>
                    <input type="email" id="form-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="form-message">Сообщение</label>
                    <textarea id="form-message" name="message" rows="5" placeholder="Опишите, чем мы можем вам помочь..."></textarea>
                </div>
                <div class="form-submit">
                    <button type="submit" class="btn btn-primary btn-large">Отправить заявку</button>
                </div>
                <div class="form-response"></div>
            </form>
        </div>
    </div>
</section>

<?php
get_footer();
