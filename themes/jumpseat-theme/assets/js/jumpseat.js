document.addEventListener('DOMContentLoaded', () => {
    const revealCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                if (entry.target.id === 'flight-board') {
                    triggerFlightBoardAnimation();
                }
            }
        });
    };
    const revealObserver = new IntersectionObserver(revealCallback, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    const revealElements = document.querySelectorAll('.js-reveal');
    revealElements.forEach(el => revealObserver.observe(el));
    const header = document.querySelector('.js-header');
    const cloudLeft = document.querySelector('.js-hero__plane-bg');
    const cloudRight = document.querySelector('.js-hero__plane-fg');
    let ticking = false;
    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                const scrolled = window.scrollY;
                if (header) {
                    if (scrolled > 50) {
                        header.classList.add('is-scrolled');
                    } else {
                        header.classList.remove('is-scrolled');
                }
                }
                const parallaxItems = document.querySelectorAll('.js-parallax');
                parallaxItems.forEach(item => {
                    const speed = parseFloat(item.dataset.speed) || 0.1;
                    const rect = item.getBoundingClientRect();
                    const viewHeight = window.innerHeight;
                    if (rect.top < viewHeight && rect.bottom > 0) {
                        const relativePos = (viewHeight - rect.top) / (viewHeight + rect.height);
                        const offset = (relativePos - 0.5) * 100 * speed;
                        item.style.transform = `translateX(${offset}rem)`;
                    }
                });
                if (scrolled < 1500) {
                    if (cloudLeft) {
                        const x = -70 - scrolled * 0.04;
                        const y = -30 - scrolled * 0.02;
                        cloudLeft.style.transform = `scaleX(-1) translate(${x}%, ${y}%)`;
                    }
                    if (cloudRight) {
                        const x = -40 + scrolled * -0.04;
                        const y = scrolled * 0.02;
                        cloudRight.style.transform = `translate(${x}%, ${y}%)`;
                    }
                }
                ticking = false;
            });
            ticking = true;
        }
    });
    function triggerFlightBoardAnimation() {
        const tiles = document.querySelectorAll('.js-tile');
        tiles.forEach((tile, index) => {
            setTimeout(() => {
                tile.classList.add('is-flipping');
                setTimeout(() => {
                    tile.classList.remove('is-flipping');
                }, 1000);
            }, index * 30);
        });
    }
    const contactForm = document.getElementById('js-contact-form');
    const formResponse = document.getElementById('js-form-response');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const formData = new FormData(contactForm);
            formData.append('action', 'js_submit_contact');
            formData.append('nonce', JSConfig.nonce);
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'SENDING...';
            }
            formResponse.textContent = '';
            formResponse.classList.remove('is-active');
            fetch(JSConfig.ajax_url, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                formResponse.classList.add('is-active');
                if (data.success) {
                    formResponse.textContent = data.data;
                    formResponse.style.color = '#4ade80';
                    contactForm.reset();
                } else {
                    formResponse.textContent = data.data;
                    formResponse.style.color = '#f87171';
                }
            })
            .catch(err => {
                formResponse.classList.add('is-active');
                formResponse.textContent = 'Connection error. Please try again.';
                formResponse.style.color = '#f87171';
            })
            .finally(() => {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'START HERE';
                }
            });
        });
    }
    const casesSlider = document.querySelector('[data-cases-slider]');
    const casesNextBtn = document.querySelector('[data-cases-next]');
    const casesDots = document.querySelectorAll('[data-cases-slide]');
    const slides = document.querySelectorAll('.js-case-slide');
    let currentSlide = 0;
    function goToSlide(index) {
        if (!slides.length) return;
        slides.forEach((slide, i) => {
            slide.classList.remove('is-active');
            slide.setAttribute('aria-hidden', 'true');
            if (casesDots[i]) {
                casesDots[i].classList.remove('is-active');
                casesDots[i].setAttribute('aria-selected', 'false');
            }
        });
        slides[index].classList.add('is-active');
        slides[index].setAttribute('aria-hidden', 'false');
        if (casesDots[index]) {
            casesDots[index].classList.add('is-active');
            casesDots[index].setAttribute('aria-selected', 'true');
        }
        currentSlide = index;
    }
    if (casesNextBtn) {
        casesNextBtn.addEventListener('click', () => {
            let next = (currentSlide + 1) % slides.length;
            goToSlide(next);
        });
    }
    casesDots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            goToSlide(index);
        });
    });
    const hamburger = document.querySelector('.js-hamburger');
    const nav = document.querySelector('.js-header__nav');
    if (hamburger && nav) {
        hamburger.addEventListener('click', () => {
            nav.classList.toggle('is-open');
            hamburger.classList.toggle('is-active');
            document.body.classList.toggle('no-scroll');
        });
    }
});
