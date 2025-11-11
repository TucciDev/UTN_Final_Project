<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones - CollabPro</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #4facfe;
            --dark-color: #2d3748;
            --light-color: #f7fafc;
            --text-muted: #718096;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff !important;
            overflow-x: hidden;
        }

        /* === NAVBAR === */
        .navbar.fixed-top {
            background: rgba(255, 255, 255, 0.99) !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.08) !important;
            z-index: 1000;
        }

        .logo {
            height: 80px;
            max-width: 100%;
            object-fit: contain;
        }

        .btn-outline-primary {
            color: rgb(102, 126, 234) !important;
            border: 2px solid rgb(102, 126, 234) !important;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: rgb(102, 126, 234) !important;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        /* === OFFCANVAS === */
        .offcanvas-end {
            width: 300px !important;
        }

        #offcanvasNavbar,
        #offcanvasNavbar .offcanvas-header,
        #offcanvasNavbar .offcanvas-body {
            background: rgba(102, 126, 234, 0.95) !important;
        }

        /* === HERO SECTION === */
        .terms-hero {
            position: relative;
            min-height: 400px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            overflow: hidden;
            padding: 140px 0 80px 0;
        }

        .terms-hero::before,
        .terms-hero::after {
            content: '';
            position: absolute;
            border-radius: 50%;
        }

        .terms-hero::before {
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: float 8s ease-in-out infinite;
        }

        .terms-hero::after {
            bottom: -30%;
            left: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .hero-icon {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .hero-icon i {
            font-size: 3rem;
            color: white;
        }

        .hero-title {
            color: white;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.2rem;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
        }

        .last-update {
            display: inline-block;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* === CONTENT SECTION === */
        .terms-content-section {
            background: linear-gradient(180deg, #f8f9ff 0%, #ffffff 100%);
            padding: 4rem 0;
        }

        .terms-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            padding: 3rem;
            margin-bottom: 2rem;
        }

        .section-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 12px;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .terms-card h2 {
            color: var(--dark-color);
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .terms-card p {
            color: #4a5568;
            line-height: 1.8;
            margin-bottom: 1.25rem;
            font-size: 1.05rem;
        }

        .terms-card ul {
            list-style: none;
            padding-left: 0;
            margin: 1.5rem 0;
        }

        .terms-card ul li {
            color: #4a5568;
            line-height: 1.8;
            margin-bottom: 1rem;
            padding-left: 2.5rem;
            position: relative;
            font-size: 1.05rem;
        }

        .terms-card ul li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: white;
            background: linear-gradient(135deg, #667eea, #764ba2);
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
        }

        /* === INFO BOXES === */
        .info-box {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.08), rgba(118, 75, 162, 0.08));
            border-left: 4px solid var(--primary-color);
            border-radius: 12px;
            padding: 1.5rem;
            margin: 2rem 0;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .info-box-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .info-box-content {
            flex: 1;
        }

        .info-box-content strong {
            color: var(--primary-color);
            display: block;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .info-box-content p {
            margin: 0;
            color: #4a5568;
        }

        /* === CONTACT CTA === */
        .contact-cta {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 24px;
            padding: 3rem;
            text-align: center;
            color: white;
            margin-top: 3rem;
            position: relative;
            overflow: hidden;
        }

        .contact-cta::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .contact-cta h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }

        .contact-cta p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            position: relative;
            z-index: 2;
        }

        .btn-contact {
            background: white;
            color: var(--primary-color);
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-contact:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            color: var(--primary-color);
        }

        /* === FOOTER === */
        .footer-modern {
            background: #1a202c;
            color: #cbd5e0;
        }

        .footer-logo {
            max-height: 60px;
            width: auto;
            filter: brightness(0) invert(1);
        }

        .footer-brand p {
            color: #cbd5e0 !important;
            max-width: 300px;
            line-height: 1.6;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--primary-color);
            transform: translateY(-5px);
            color: white;
        }

        .footer-title {
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.875rem;
            letter-spacing: 1px;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: #cbd5e0;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--accent-color);
            transform: translateX(5px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-copyright,
        .footer-subtitle {
            font-size: 0.9rem;
            color: #cbd5e0 !important;
        }

        /* === RESPONSIVE === */
        @media (max-width: 991px) {
            .logo { height: 60px; }
            .terms-hero { min-height: 350px; padding: 120px 0 60px 0; }
            .hero-title { font-size: 2.5rem; }
            .terms-card { padding: 2rem; }
            .terms-card h2 { font-size: 1.5rem; }
        }

        @media (max-width: 767px) {
            .logo { height: 50px; }
            .terms-hero { min-height: 300px; padding: 100px 0 50px 0; }
            .hero-title { font-size: 2rem; }
            .hero-icon { width: 80px; height: 80px; }
            .hero-icon i { font-size: 2.5rem; }
            .terms-card { padding: 1.5rem; border-radius: 16px; }
            .terms-card h2 { font-size: 1.3rem; }
            .terms-card p, .terms-card ul li { font-size: 1rem; }
            .contact-cta { padding: 2rem; }
            .contact-cta h3 { font-size: 1.5rem; }
        }
    </style>
</head>
<body>
    <!-- OFFCANVAS -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
        <div class="offcanvas-header" style="background: rgba(102, 126, 234, 0.95);">
            <h5 class="offcanvas-title text-white fw-bold">
                <img src="{{ asset('img/collabpro_logo1.png') }}" alt="CollabPro Logo" style="height: 60px;">
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
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
    <section class="terms-hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-content" data-aos="fade-up">
                        <div class="hero-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h1 class="hero-title">Términos y Condiciones</h1>
                        <p class="hero-subtitle">Lee atentamente nuestros términos de uso y políticas</p>
                        <span class="last-update">
                            <i class="bi bi-calendar-check me-2"></i>
                            Última actualización: 26 de octubre de 2025
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT SECTION -->
    <section class="terms-content-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <!-- Sección 1 -->
                    <div class="terms-card" data-aos="fade-up">
                        <h2>
                            <span class="section-number">1</span>
                            Aceptación de los Términos
                        </h2>
                        <p>Al acceder y utilizar CollabPro, usted acepta estar sujeto a estos Términos y Condiciones ("Términos"). Si no está de acuerdo con alguna parte de los términos, no podrá acceder a CollabPro.</p>
                        <div class="info-box">
                            <div class="info-box-icon">
                                <i class="bi bi-info-circle"></i>
                            </div>
                            <div class="info-box-content">
                                <strong>Importante</strong>
                                <p>El uso continuado de nuestros servicios implica la aceptación de estos términos y todas las actualizaciones posteriores.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 2 -->
                    <div class="terms-card" data-aos="fade-up" data-aos-delay="100">
                        <h2>
                            <span class="section-number">2</span>
                            Descripción de CollabPro
                        </h2>
                        <p>CollabPro proporciona a los usuarios herramientas para organizar, gestionar y colaborar en tareas y proyectos. CollabPro puede incluir actualizaciones, nuevas funciones y cambios que también estarán sujetos a estos Términos.</p>
                    </div>

                    <!-- Sección 3 -->
                    <div class="terms-card" data-aos="fade-up" data-aos-delay="200">
                        <h2>
                            <span class="section-number">3</span>
                            Cuentas de Usuario
                        </h2>
                        <p>Para acceder a la mayoría de las funciones de CollabPro, debe registrarse para obtener una cuenta. Usted es responsable de:</p>
                        <ul>
                            <li>Mantener la confidencialidad de su cuenta y contraseña</li>
                            <li>Todas las actividades que ocurran bajo su cuenta</li>
                            <li>Notificar inmediatamente cualquier uso no autorizado</li>
                            <li>Mantener actualizada su información de contacto</li>
                        </ul>
                    </div>

                    <!-- Sección 4 -->
                    <div class="terms-card" data-aos="fade-up" data-aos-delay="300">
                        <h2>
                            <span class="section-number">4</span>
                            Contenido del Usuario
                        </h2>
                        <p>Usted es el único responsable de todo el contenido que cargue, publique, envíe por correo electrónico, transmita o de otra manera ponga a disposición a través de CollabPro ("Contenido del Usuario").</p>
                        <p>Usted conserva todos los derechos sobre su Contenido de Usuario; sin embargo, nos otorga una licencia mundial, libre de regalías y no exclusiva para usar, distribuir, reproducir, modificar, adaptar y publicar dicho Contenido de Usuario con el fin de proporcionar CollabPro.</p>
                    </div>

                    <!-- Sección 5 -->
                    <div class="terms-card" data-aos="fade-up" data-aos-delay="400">
                        <h2>
                            <span class="section-number">5</span>
                            Conducta del Usuario
                        </h2>
                        <p>Usted se compromete a no utilizar CollabPro para:</p>
                        <ul>
                            <li>Cargar, publicar o transmitir contenido ilegal, dañino, amenazante o abusivo</li>
                            <li>Hacerse pasar por cualquier persona o entidad</li>
                            <li>Violar derechos de propiedad intelectual de terceros</li>
                            <li>Transmitir virus, malware o código malicioso</li>
                            <li>Interferir con el funcionamiento del servicio</li>
                            <li>Violar cualquier ley local, estatal, nacional o internacional aplicable</li>
                        </ul>
                    </div>

                    <!-- Sección 6 -->
                    <div class="terms-card" data-aos="fade-up" data-aos-delay="500">
                        <h2>
                            <span class="section-number">6</span>
                            Modificaciones y Precios
                        </h2>
                        <p>Nos reservamos el derecho de modificar o descontinuar, temporal o permanentemente, CollabPro (o cualquier parte del mismo) con o sin notificación. Los precios de todos los servicios están sujetos a cambios con 30 días de antelación.</p>
                        <div class="info-box">
                            <div class="info-box-icon">
                                <i class="bi bi-bell"></i>
                            </div>
                            <div class="info-box-content">
                                <strong>Notificaciones</strong>
                                <p>Dicha notificación puede proporcionarse en cualquier momento publicando los cambios en nuestro sitio web o mediante correo electrónico.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 7 -->
                    <div class="terms-card" data-aos="fade-up" data-aos-delay="600">
                        <h2>
                            <span class="section-number">7</span>
                            Terminación
                        </h2>
                        <p>Podemos, bajo ciertas circunstancias y sin previo aviso, cancelar inmediatamente su cuenta y el acceso a CollabPro. Las causas incluyen:</p>
                        <ul>
                            <li>Incumplimientos o violaciones de estos Términos</li>
                            <li>Solicitudes de las fuerzas del orden u otras agencias gubernamentales</li>
                            <li>Solicitud suya (auto-iniciada eliminación de cuenta)</li>
                            <li>Interrupción o modificación material de CollabPro</li>
                            <li>Problemas técnicos o de seguridad inesperados</li>
                        </ul>
                    </div>

                    <!-- Sección 8 -->
                    <div class="terms-card" data-aos="fade-up" data-aos-delay="700">
                        <h2>
                            <span class="section-number">8</span>
                            Descargo de Garantías
                        </h2>
                        <p>El uso de CollabPro es bajo su propio riesgo. CollabPro se proporciona "TAL CUAL" y "SEGÚN DISPONIBILIDAD". Renunciamos expresamente a todas las garantías de cualquier tipo, ya sean expresas o implícitas.</p>
                    </div>

                    <!-- Sección 9 -->
                    <div class="terms-card" data-aos="fade-up" data-aos-delay="800">
                        <h2>
                            <span class="section-number">9</span>
                            Limitación de Responsabilidad
                        </h2>
                        <p>No seremos responsables de ningún daño directo, indirecto, incidental, especial, consecuente o ejemplar, incluidos daños por pérdida de ganancias, uso, datos u otras pérdidas intangibles como resultado de:</p>
                        <ul>
                            <li>El uso o la imposibilidad de usar el servicio</li>
                            <li>Acceso no autorizado o alteración de sus transmisiones o datos</li>
                            <li>Declaraciones o conducta de cualquier tercero en el servicio</li>
                            <li>Cualquier otro asunto relacionado con el servicio</li>
                        </ul>
                    </div>

                    <!-- Sección 10 -->
                    <div class="terms-card" data-aos="fade-up" data-aos-delay="900">
                        <h2>
                            <span class="section-number">10</span>
                            Cambios a los Términos
                        </h2>
                        <p>Nos reservamos el derecho, a nuestra entera discreción, de modificar o reemplazar estos Términos en cualquier momento. Si una revisión es material, intentaremos proporcionar un aviso de al menos 30 días antes de que entren en vigencia los nuevos términos.</p>
                    </div>

                    <!-- CTA de Contacto -->
                    <div class="contact-cta" data-aos="fade-up" data-aos-delay="1000">
                        <h3>¿Tienes preguntas sobre estos términos?</h3>
                        <p>Nuestro equipo está disponible para ayudarte con cualquier consulta</p>
                        <a href="{{ route('contact') }}" class="btn-contact">
                            <i class="bi bi-envelope-fill"></i>
                            Contáctanos
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer-modern">
        <div class="container py-5">
            <div class="row g-4 pb-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="footer-brand mb-3">
                        <img src="img/collabpro_logo1.png" alt="CollabPro" class="footer-logo mb-3">
                        <p class="text-muted">Transforma tu equipo con la plataforma de gestión más innovadora</p>
                    </div>
                    <div class="social-links mt-4">
                        <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                    <h6 class="footer-title mb-3">Producto</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ route('home') }}">Características</a></li>
                        <li><a href="{{ route('home') }}">Cómo funciona</a></li>
                        <li><a href="{{ route('register') }}">Crear Cuenta</a></li>
                        <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="300">
                    <h6 class="footer-title mb-3">Recursos</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#">Documentación</a></li>
                        <li><a href="#">Tutoriales</a></li>
                        <li><a href="{{ route('support') }}">Soporte</a></li>
                        <li><a href="{{ route('contact') }}">Contacto</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="400">
                    <h6 class="footer-title mb-3">Legal</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ route('privacy') }}">Privacidad</a></li>
                        <li><a href="{{ route('terms') }}">Términos</a></li>
                    </ul>
                </div>
            </div>
            
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

</body>
</html>