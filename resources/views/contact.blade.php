<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto - CollabPro</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 
    
    <!-- CSS  -->
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">  

</head>
<body style="background-color: white !important; margin: 0; padding: 0;">
    
    <!-- NAVBAR -->
<nav class="navbar navbar-expand-xl navbar-dark fixed-top" style="background: rgba(255, 255, 255, 0.99); box-shadow: 0 2px 20px rgba(0,0,0,0.8);">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('img/collabpro_logo1.png') }}" alt="CollabPro Logo" class="logo">
        </a>
        
        <!-- Botón Volver al Inicio (Desktop) -->
        <div class="ms-auto d-none d-xl-block">
            <a class="btn btn-outline-primary px-4 rounded-pill fw-semibold" href="{{ route('home') }}" style="color: rgb(102, 126, 234); border: 2px solid rgb(102, 126, 234); transition: all 0.3s;">
                <i class="bi bi-house-door me-1"></i> Volver al Inicio
            </a>
        </div>
        
        <!-- Menú hamburguesa (solo móvil) -->
        <button class="navbar-toggler border-0 d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="bi bi-list" style="font-size: 2.5rem; color: rgb(0, 0, 0);"></i>
        </button>
    </div>
</nav>

    <!-- <div style="height: 76px;"></div> -->

    <!-- OFFCANVAS (Menú móvil lateral) -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header" style="background: rgba(102, 126, 234, 0.95);">
        <h5 class="offcanvas-title text-white fw-bold" id="offcanvasNavbarLabel">
            <img src="{{ asset('img/collabpro_logo1.png') }}" alt="CollabPro Logo" style="height: 60px;">
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" style="background: rgba(102, 126, 234, 0.95);">
        <div class="d-grid gap-2">
            <a href="{{ route('home') }}" class="btn btn-light rounded-pill fw-semibold" style="color: #667eea;">
                <i class="bi bi-house-door me-2"></i> Volver al Inicio
            </a>
        </div>
    </div>
</div>
    
    <!-- HERO SECTION -->
    <section class="faq-hero">
        <div class="faq-background">
            <div class="faq-shape faq-shape-1"></div>
            <div class="faq-shape faq-shape-2"></div>
            <div class="faq-shape faq-shape-3"></div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center hero-content">
                    <h1 class="hero-title display-3 fw-bold mb-4" data-aos="fade-down">Contactanos</h1>
                    <p class="hero-subtitle lead mb-0" data-aos="fade-up" data-aos-delay="100">Estamos para ayudarte. Enviá tu consulta y te respondemos a la brevedad.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN DE CONTACTO  -->
    <section class="contact-section-modern py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f8f9ff 100%);">
        <div class="container">
        
            <!-- Formulario y mapa -->
            <div class="row g-4">
                
                <!-- FORMULARIO-->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="form-card-modern">
                        <div class="form-header-modern">
                            <div class="form-icon-float">
                                <i class="bi bi-chat-dots-fill"></i>
                            </div>
                            <h2 class="form-title-modern">Enviá tu consulta</h2>
                            <p class="form-subtitle-modern">Completa el formulario y te contactaremos pronto.</p>
                        </div>

                        <form id="contactForm" class="modern-form">
                            
                            <!-- Nombre -->
                            <div class="input-group-modern">
                                <div class="input-icon">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="input-wrapper">
                                    <input 
                                        type="text" 
                                        id="nombre" 
                                        name="nombre" 
                                        class="input-modern" 
                                        required
                                        autocomplete="off"
                                    >
                                    <label for="nombre" class="label-modern">Nombre completo</label>
                                    <div class="input-underline"></div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="input-group-modern">
                                <div class="input-icon">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <div class="input-wrapper">
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email" 
                                        class="input-modern" 
                                        required
                                        autocomplete="off"
                                    >
                                    <label for="email" class="label-modern">Email</label>
                                    <div class="input-underline"></div>
                                </div>
                            </div>

                            <!-- Asunto -->
                            <div class="input-group-modern">
                                <div class="input-icon">
                                    <i class="bi bi-tag-fill"></i>
                                </div>
                                <div class="input-wrapper">
                                    <input 
                                        type="text" 
                                        id="asunto" 
                                        name="asunto" 
                                        class="input-modern" 
                                        required
                                        autocomplete="off"
                                    >
                                    <label for="asunto" class="label-modern">Asunto</label>
                                    <div class="input-underline"></div>
                                </div>
                            </div>

                            <!-- Mensaje con contador -->
                            <div class="input-group-modern">
                                <div class="input-icon" style="align-items: flex-start; padding-top: 1.2rem;">
                                    <i class="bi bi-chat-square-text-fill"></i>
                                </div>
                                <div class="input-wrapper">
                                    <textarea 
                                        id="mensaje" 
                                        name="mensaje" 
                                        class="input-modern textarea-modern" 
                                        rows="4"
                                        maxlength="500"
                                        required
                                        autocomplete="off"
                                    ></textarea>
                                    <label for="mensaje" class="label-modern">Tu consulta</label>
                                    <div class="input-underline"></div>
                                    <div class="char-counter">
                                        <span id="charCount">0</span> / 500 caracteres
                                    </div>
                                </div>
                            </div>

                            <!-- Botón Submit -->
                            <button type="submit" class="btn-submit-modern">
                                <span class="btn-text">
                                    <i class="bi bi-send-fill me-2"></i>
                                    Enviar mensaje
                                </span>
                                <div class="btn-shimmer"></div>
                            </button>

                        </form>
                    </div>
                </div>

                <!-- MAPA -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="map-card-modern">
                        <!-- <div class="map-overlay">
                            <div class="map-badge">
                                <i class="bi bi-geo-alt-fill me-2"></i>
                                UTN - Facultad Regional Haedo
                            </div>
                        </div> -->
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.559144186612!2d-58.60460592464899!3d-34.640579459445085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bc951c0fe2d9f5%3A0x9f1c540898efecbe!2sUTN%20HAEDO!5e0!3m2!1ses!2sar!4v1761862832140!5m2!1ses!2sar" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================
        FOOTER
        ========================================= -->
    <footer class="footer-modern">
        <div class="container py-5">
            <!-- Footer Main -->
            <div class="row g-4 pb-4">
                <!-- Logo y descripción -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="footer-brand mb-3">
                        <img src="img/collabpro_logo1.png" alt="CollabPro" class="footer-logo mb-3">
                        <p class="text-muted">Transforma tu equipo con la plataforma de gestión más innovadora</p>
                    </div>
                    <div class="social-links mt-4">
                        <a href="https://instagram.com" class="social-link"><i class="bi bi-instagram"></i></a>
                        <a href="https://facebook.com" class="social-link"><i class="bi bi-facebook"></i></a>
                        <a href="https://github.com/TucciDev/UTN_Final_Project.git" class="social-link"><i class="bi bi-github"></i></a>
                    </div>
                </div>
                
                <!-- Links Producto -->
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                    <h6 class="footer-title mb-3">Producto</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ route('home') }}">Características</a></li>
                        <li><a href="{{ route('home') }}">Cómo funciona</a></li>
                        <li><a href="{{ route('register') }}">Crear Cuenta</a></li>
                        <li><a href="{{ route('login') }}">Iniciar Sesion</a></li>
                    </ul>
                </div>
                
                <!-- Links Recursos -->
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="300">
                    <h6 class="footer-title mb-3">Recursos</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ asset('docs/Grupo 4- GDS-M4- 2C-2025.pdf') }}" target="_blank"">Documentación</a></li>
                        <li><a href="{{ asset('videos/VideoMarketing_Grupo4.mp4') }}" target="_blank">Demo</a></li>
                        <li><a href="{{ route('support') }}">Soporte</a></li>
                        <li><a href="{{ route('contact') }}">Contacto</a></li>
                    </ul>
                </div>
                
                <!-- Links Legal -->
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="400">
                    <h6 class="footer-title mb-3">Legal</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ route('privacy') }}" target="_blank">Privacidad</a></li>
                        <li><a href="{{ route('terms') }}" target="_blank">Términos</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Footer Bottom -->
            <div class="footer-bottom pt-4 mt-4 border-top border-secondary">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <p class="footer-copyright mb-0 text-muted">
                            © 2025 CollabPro. Todos los derechos reservados
                        </p>
                        <p class="footer-subtitle small text-muted mb-0">Proyecto Universitario</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <span class="badge bg-success-subtle text-success px-3 py-2">
                            <i class="bi bi-clock me-1"></i> Sistema Activo
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    </script>

    <!-- JavaScript -->
    <script>
        // Contador de caracteres
        const mensajeTextarea = document.getElementById('mensaje');
        const charCount = document.getElementById('charCount');
        
        mensajeTextarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });

        // Envío del formulario
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nombre = document.getElementById('nombre').value.trim();
            const email = document.getElementById('email').value.trim();
            const asunto = document.getElementById('asunto').value.trim();
            const mensaje = document.getElementById('mensaje').value.trim();

            if (!nombre || !email || !asunto || !mensaje) {
                mostrarNotificacion('⚠️ Completa todos los campos', 'warning');
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                mostrarNotificacion('⚠️ Email inválido', 'warning');
                return;
            }

            // Deshabilitar botón mientras se envía
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.querySelector('.btn-text').innerHTML;
            submitBtn.disabled = true;
            submitBtn.querySelector('.btn-text').innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Enviando...';

            // Envío real con AJAX
            fetch('{{ route("contacto.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    nombre: nombre,
                    email: email,
                    asunto: asunto,
                    mensaje: mensaje
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    mostrarNotificacion(data.message, 'success');
                    this.reset();
                    charCount.textContent = '0';
                } else {
                    mostrarNotificacion(data.message || '❌ Error al enviar el mensaje', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarNotificacion('❌ Error al enviar el mensaje', 'error');
            })
            .finally(() => {
                // Restaurar botón
                submitBtn.disabled = false;
                submitBtn.querySelector('.btn-text').innerHTML = originalText;
            });
        });

        // Notificación 
        function mostrarNotificacion(mensaje, tipo) {
            const notif = document.createElement('div');
            notif.className = `notificacion-moderna ${tipo}`;
            notif.textContent = mensaje;
            document.body.appendChild(notif);
            
            setTimeout(() => notif.classList.add('show'), 100);
            setTimeout(() => {
                notif.classList.remove('show');
                setTimeout(() => notif.remove(), 300);
            }, 3000);
        }
    </script>

    @php
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\Mail;
    @endphp
</body>
</html>