document.addEventListener('DOMContentLoaded', function() {
    
    // ========================================
    // INICIALIZAR AOS
    // ========================================
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100,
        delay: 0
    });

    // ========================================
    // CONTADOR ANIMADO PARA ESTADÍSTICAS
    // ========================================
    const animateCounter = (element, target, duration = 2000) => {
        const start = 0;
        const increment = target / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = formatNumber(target);
                clearInterval(timer);
            } else {
                element.textContent = formatNumber(Math.floor(current));
            }
        }, 16);
    };

    const formatNumber = (num) => {
        if (num >= 1000) {
            return (num / 1000).toFixed(0) + 'K+';
        }
        return num + '%';
    };

    // Observador para activar contadores al hacer scroll
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                entry.target.classList.add('counted', 'visible');
                const text = entry.target.textContent.trim();
                
                // Extraer número del texto
                let targetNum;
                if (text.includes('K+')) {
                    targetNum = parseInt(text.replace('K+', '')) * 1000;
                } else if (text.includes('%')) {
                    targetNum = parseInt(text.replace('%', ''));
                } else if (text.includes('/')) {
                    return; // No animar "24/7"
                }
                
                if (targetNum) {
                    entry.target.textContent = '0';
                    animateCounter(entry.target, targetNum);
                }
            }
        });
    }, { threshold: 0.5 });

    // Aplicar observador a todos los números de stats
    document.querySelectorAll('.stat-number').forEach(stat => {
        statsObserver.observe(stat);
    });

    // ========================================
    // EFECTO PARALLAX SUAVE EN SECCIONES
    // ========================================
    let ticking = false;
    
    const handleParallax = () => {
        const scrolled = window.pageYOffset;
        
        // Efecto en las shapes del CTA
        document.querySelectorAll('.cta-shape').forEach((shape, index) => {
            const speed = 0.3 + (index * 0.1);
            const yPos = -(scrolled * speed);
            shape.style.transform = `translateY(${yPos}px)`;
        });
        
        ticking = false;
    };

    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(handleParallax);
            ticking = true;
        }
    });

    // ========================================
    // ANIMACIÓN DE PROGRESO EN STEPS
    // ========================================
    const animateSteps = () => {
        const steps = document.querySelectorAll('.step-number-modern');
        
        steps.forEach((step, index) => {
            setTimeout(() => {
                step.style.animation = `stepPulse 0.6s ease forwards`;
            }, index * 200);
        });
    };

    // CSS para la animación de steps
    const style = document.createElement('style');
    style.textContent = `
        @keyframes stepPulse {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    `;
    document.head.appendChild(style);

    // Observador para steps
    const stepsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateSteps();
                stepsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    const stepsSection = document.querySelector('.how-it-works-section');
    if (stepsSection) {
        stepsObserver.observe(stepsSection);
    }

    // ========================================
    // SMOOTH SCROLL PARA LINKS INTERNOS
    // ========================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            e.preventDefault();
            const target = document.querySelector(href);
            
            if (target) {
                const offsetTop = target.offsetTop - 80; // Compensar navbar
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ========================================
    // EFECTO DE TYPING EN TÍTULOS
    // ========================================
    const typeWriter = (element, text, speed = 50) => {
        let i = 0;
        element.textContent = '';
        
        const type = () => {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        };
        
        type();
    };

    // ========================================
    // LAZY LOADING DE IMÁGENES
    // ========================================
    const lazyImages = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.add('loaded');
                imageObserver.unobserve(img);
            }
        });
    });

    lazyImages.forEach(img => imageObserver.observe(img));

    // ========================================
    // RESIZE HANDLER
    // ========================================
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            AOS.refresh();
        }, 250);
    });

    console.log('✨ Animaciones modernas cargadas correctamente');
});