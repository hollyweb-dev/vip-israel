/**
 * Israel Concierge - Main JavaScript
 * Премиальная WordPress-тема для персональных услуг консьержа в Израиле
 */

(function() {
    'use strict';

    /**
     * Initialize all functions when DOM is ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initMobileMenu();
        initScrollAnimations();
        initSmoothScroll();
        initContactForms();
        initHeaderScroll();
    });

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = document.querySelector('.mobile-menu-toggle');
        const navigation = document.querySelector('.main-navigation');

        if (menuToggle && navigation) {
            menuToggle.addEventListener('click', function() {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !isExpanded);
                navigation.classList.toggle('active');
            });
        }
    }

    /**
     * Scroll Animations - Fade in elements on scroll
     */
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all elements that should fade in
        const animatedElements = document.querySelectorAll('.service-card, .feature-card, .why-item, .service-item, .benefit-item, .info-item, .expertise-item, .testimonial-card');

        animatedElements.forEach(function(element) {
            element.classList.add('fade-in-up');
            observer.observe(element);
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');

        anchorLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');

                if (href === '#' || href === '#0') {
                    return;
                }

                const target = document.querySelector(href);

                if (target) {
                    e.preventDefault();

                    const headerOffset = 100;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Contact Form Handler
     */
    function initContactForms() {
        // Handle all forms with class 'concierge-form'
        const forms = document.querySelectorAll('.concierge-form');

        forms.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                handleFormSubmit(form);
            });
        });
    }

    /**
     * Handle Form Submission via AJAX
     */
    function handleFormSubmit(form) {
        const submitButton = form.querySelector('button[type="submit"]');
        const responseDiv = form.querySelector('.form-response');
        const formData = new FormData(form);

        // Add action and nonce for WordPress AJAX
        formData.append('action', 'israel_concierge_contact');
        formData.append('nonce', israelConcierge.nonce);

        // Disable submit button
        submitButton.disabled = true;
        submitButton.textContent = 'Отправка...';

        // Reset response
        responseDiv.className = 'form-response';
        responseDiv.style.display = 'none';

        // Send AJAX request
        fetch(israelConcierge.ajaxurl, {
            method: 'POST',
            body: formData,
            credentials: 'same-origin'
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.success) {
                // Success
                responseDiv.className = 'form-response success';
                responseDiv.textContent = data.data.message;
                responseDiv.style.display = 'block';

                // Reset form
                form.reset();

                // Scroll to response
                responseDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                // Error
                responseDiv.className = 'form-response error';
                responseDiv.textContent = data.data.message;
                responseDiv.style.display = 'block';
            }
        })
        .catch(function(error) {
            console.error('Form submission error:', error);
            responseDiv.className = 'form-response error';
            responseDiv.textContent = 'Произошла ошибка при отправке формы. Пожалуйста, попробуйте позже.';
            responseDiv.style.display = 'block';
        })
        .finally(function() {
            // Re-enable submit button
            submitButton.disabled = false;
            submitButton.textContent = 'Отправить заявку';
        });
    }

    /**
     * Header Scroll Effect
     */
    function initHeaderScroll() {
        const header = document.querySelector('.site-header');
        let lastScroll = 0;

        if (!header) return;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll <= 0) {
                header.classList.remove('scroll-up');
                header.style.transform = 'translateY(0)';
                return;
            }

            if (currentScroll > lastScroll && !header.classList.contains('scroll-down')) {
                // Scrolling down
                header.classList.remove('scroll-up');
                header.classList.add('scroll-down');
            } else if (currentScroll < lastScroll && header.classList.contains('scroll-down')) {
                // Scrolling up
                header.classList.remove('scroll-down');
                header.classList.add('scroll-up');
            }

            lastScroll = currentScroll;
        });
    }

    /**
     * Scroll Indicator (for hero section)
     */
    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function() {
            const aboutSection = document.querySelector('.about-section');
            if (aboutSection) {
                aboutSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    /**
     * Add loading class to body on page load
     */
    window.addEventListener('load', function() {
        document.body.classList.add('loaded');
    });

    /**
     * Prevent animation on page load for better performance
     */
    let resizeTimer;
    window.addEventListener('resize', function() {
        document.body.classList.add('resize-animation-stopper');
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            document.body.classList.remove('resize-animation-stopper');
        }, 400);
    });

})();
