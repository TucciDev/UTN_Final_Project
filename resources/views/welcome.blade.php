<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'CollabPro') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 

    <!-- Estilos personalizados para el index -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

</head>
<body>
    <!-- ========================================
        NAVBAR
    ========================================= -->
    <nav class="navbar navbar-expand-xl navbar-dark fixed-top" style="background: rgba(255, 255, 255, 0.99); box-shadow: 0 2px 20px rgba(0,0,0,0.8);">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/collabpro_logo1.png') }}" alt="CollabPro Logo" class="logo">
            </a>

            <!-- Botón hamburguesa -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="bi bi-list" style="font-size: 2.5rem; color: rgb(0, 0, 0);"></i>
            </button>
            
            <!-- Menú Desktop -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link px-3 fw-semibold" href="{{ route('home') }}" style="color: rgba(0, 0, 0, 0.9); transition: all 0.3s;">
                            <i class="bi bi-house-door me-1"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 fw-semibold" href="#caracteristicas" style="color: rgba(0, 0, 0, 0.9); transition: all 0.3s;">
                            <i class="bi bi-star me-1"></i> Características
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 fw-semibold" href="#como-funciona" style="color: rgba(0, 0, 0, 0.9); transition: all 0.3s;">
                            <i class="bi bi-question-circle me-1"></i> ¿Cómo funciona?
                        </a>
                    </li>
                </ul>
                
                <!-- Botones de acción Desktop -->
                <ul class="navbar-nav">
                    @auth
                        <!-- Usuario autenticado -->
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-light px-4 rounded-pill" href="{{ route('dashboard') }}" style="color: rgb(102, 126, 234); border: 2px solid rgba(102, 126, 234, 0.8); transition: all 0.3s;">
                                <i class="bi bi-speedometer2 me-1"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-light px-4 rounded-pill fw-semibold" style="background: white; color: #dc3545; border: 2px solid #dc3545; box-shadow: 0 4px 15px rgba(0,0,0,0.2); transition: all 0.3s;">
                                    <i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    @else
                        <!-- Usuario no autenticado -->
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-light px-4 rounded-pill" href="{{ route('login') }}" style="color: rgb(102, 126, 234); border: 2px solid rgba(102, 126, 234, 0.8); transition: all 0.3s;">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Iniciar Sesión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-light px-4 rounded-pill fw-semibold" href="{{ route('register') }}" style="background: white; color: rgb(102, 126, 234); box-shadow: 0 4px 15px rgba(0,0,0,0.2); transition: all 0.3s;">
                                <i class="bi bi-rocket-takeoff me-1"></i> Registrarse
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Espaciador para navbar fijo -->
    <div style="height: 76px;"></div>

    <!-- ========================================
        OFFCANVAS (Menú móvil lateral)
    ========================================= -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header" style="background: rgba(102, 126, 234, 0.95);">
            <h5 class="offcanvas-title text-white fw-bold" id="offcanvasNavbarLabel">
                <img src="{{ asset('img/collabpro_logo1.png') }}" alt="CollabPro Logo" style="height: 60px;">
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" style="background: rgba(102, 126, 234, 0.95);">
            <ul class="navbar-nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link px-3 fw-semibold" href="{{ route('home') }}" style="color: rgba(255,255,255,0.9); transition: all 0.3s;">
                        <i class="bi bi-house-door me-2"></i> Inicio
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link px-3 fw-semibold" href="#caracteristicas" style="color: rgba(255,255,255,0.9); transition: all 0.3s;">
                        <i class="bi bi-star me-2"></i> Características
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link px-3 fw-semibold" href="#como-funciona" style="color: rgba(255,255,255,0.9); transition: all 0.3s;">
                        <i class="bi bi-question-circle me-2"></i> ¿Cómo funciona?
                    </a>
                </li>
            </ul>

            <hr class="text-white my-4" style="opacity: 0.3;">

            <!-- Botones en móvil -->
            <div class="d-grid gap-2">
                @auth
                    <!-- Usuario autenticado -->
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-light rounded-pill">
                        <i class="bi bi-speedometer2 me-1"></i> Dashboard
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger rounded-pill w-100">
                            <i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesión
                        </button>
                    </form>
                @else
                    <!-- Usuario no autenticado -->
                    <a href="{{ route('login') }}" class="btn btn-outline-light rounded-pill">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Iniciar Sesión
                    </a>
                    <a class="btn btn-light rounded-pill fw-semibold" href="{{ route('register') }}" style="color: #667eea;">
                        <i class="bi bi-rocket-takeoff me-1"></i> Registrarse
                    </a>
                @endauth
            </div>
        </div>
    </div>
    <!-- ========================================
         CARRUSEL HERO
    ========================================= -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">    
            <!-- Slide 1: Introducción Principal -->
            <div class="carousel-item active">
                <div class="hero-slide" style="background-image: url('img/carousel_item1.webp');">
                    <!-- Overlay para mejorar legibilidad del texto -->
                    <div class="hero-overlay"></div>
                    
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-end">
                            <div class="col-12 col-lg-7 col-xl-6 text-center text-lg-end hero-content">
                                <h1 class="display-3 display-md-2 fw-bold mb-3 hero-title">
                                    Transforma tu equipo
                                </h1>
                                <p class="lead fs-4 fs-md-3 mb-4 hero-subtitle">
                                    Gestiona tareas, gana puntos, domina el ranking
                                </p>
                                <div class="hero-buttons d-flex flex-column flex-sm-row justify-content-center justify-content-lg-end gap-3">
                                    <a href="{{ route('register') }}" class="btn btn-hero-primary btn-lg px-4 py-3">
                                        <i class="bi bi-person-plus me-2"></i> Crear Cuenta
                                    </a>
                                    <a href="{{ route('login') }}" class="btn btn-hero-secondary btn-lg px-4 py-3">
                                        <i class="bi bi-box-arrow-in-right me-2"></i> Iniciar Sesión
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Características -->
            <div class="carousel-item">
                <div class="hero-slide" style="background-image: url('img/carousel_item2.webp');">
                    <div class="hero-overlay"></div>
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12 col-lg-6 hero-content">
                                <h2 class="display-4 fw-bold mb-3 hero-title">
                                    Colaboración en tiempo real
                                </h2>
                                <p class="lead fs-4 mb-4 hero-subtitle">
                                    Trabaja con tu equipo sin límites
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Gamificación -->
            <div class="carousel-item">
                <div class="hero-slide" style="background-image: url('img/carousel_item3.webp');">
                    <div class="hero-overlay"></div>
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-center text-center">
                            <div class="col-12 col-lg-8 hero-content">
                                <h2 class="display-4 fw-bold mb-3 hero-title">
                                    Sistema de puntos y rankings
                                </h2>
                                <p class="lead fs-4 mb-4 hero-subtitle">
                                    Motiva a tu equipo con gamificación
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 4: Llamada a la acción -->
            <div class="carousel-item">
                <div class="hero-slide" style="background-image: url('img/carousel_item4.webp');">
                    <div class="hero-overlay"></div>
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-end">
                            <div class="col-12 col-lg-6 text-center text-lg-end hero-content">
                                <h2 class="display-4 fw-bold mb-3 hero-title">
                                    ¿Listo para comenzar?
                                </h2>
                                <p class="lead fs-4 mb-4 hero-subtitle">
                                    Únete hoy y transforma tu forma de trabajar
                                </p>
                                <a href="{{ route('register') }}" class="btn btn-hero-primary btn-lg px-5 py-3">
                                    Comenzar Gratis
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <!-- ========================================
     CARACTERÍSTICAS - Diseño Moderno
    ========================================= -->
    <section id="caracteristicas" class="py-5 features-section">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="features-section-title display-5 fw-bold mb-3">¿Por qué elegir CollabPro?</h2>
                <p class="features-section-subtitle text-muted fs-5">Potencia tu equipo con herramientas profesionales</p>
            </div>
            
            <div class="row g-4">
                <!-- Característica 1 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card-modern h-100">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-list-task feature-icon-modern"></i>
                        </div>
                        <h5 class="feature-title mt-4 mb-3">Gestión Inteligente</h5>
                        <p class="feature-description text-muted">Organiza tareas con drag & drop, prioridades automáticas y seguimiento en tiempo real</p>
                    </div>
                </div>
                
                <!-- Característica 2 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card-modern h-100">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-controller feature-icon-modern"></i>
                        </div>
                        <h5 class="feature-title mt-4 mb-3">Gamificación</h5>
                        <p class="feature-description text-muted">Sistema de puntos, logros desbloqueables y rankings competitivos para motivar tu equipo</p>
                    </div>
                </div>
                
                <!-- Característica 3 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card-modern h-100">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-people-fill feature-icon-modern"></i>
                        </div>
                        <h5 class="feature-title mt-4 mb-3">Colaboración Real</h5>
                        <p class="feature-description text-muted">Asignación inteligente de roles y distribución óptima de carga de trabajo</p>
                    </div>
                </div>
                
                <!-- Característica 4 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card-modern h-100">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-graph-up-arrow feature-icon-modern"></i>
                        </div>
                        <h5 class="feature-title mt-4 mb-3">Analytics Pro</h5>
                        <p class="feature-description text-muted">Dashboard avanzado con métricas clave y visualización de datos en tiempo real</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
        CÓMO FUNCIONA 
        ========================================= -->
    <section id="como-funciona" class="py-5 how-it-works-section">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="steps-section-title display-5 fw-bold mb-3">¿Cómo funciona?</h2>
                <p class="steps-section-subtitle text-muted fs-5">4 pasos simples para transformar tu productividad</p>
            </div>
            
            <div class="row g-4 g-lg-5">
                <!-- Paso 1 -->
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="step-card text-center">
                        <div class="step-number-modern">
                            <span>01</span>
                            <div class="step-pulse"></div>
                        </div>
                        <div class="step-icon-bg mb-3">
                            <i class="bi bi-people step-icon"></i>
                        </div>
                        <h5 class="step-title mb-3">Crea tu Grupo</h5>
                        <p class="step-description text-muted">Forma tu equipo e invita miembros con un código único de acceso</p>
                    </div>
                </div>
                
                <!-- Paso 2 -->
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="step-card text-center">
                        <div class="step-number-modern">
                            <span>02</span>
                            <div class="step-pulse"></div>
                        </div>
                        <div class="step-icon-bg mb-3">
                            <i class="bi bi-clipboard-check step-icon"></i>
                        </div>
                        <h5 class="step-title mb-3">Asigna Tareas</h5>
                        <p class="step-description text-muted">Distribuye trabajo inteligentemente según capacidades del equipo</p>
                    </div>
                </div>
                
                <!-- Paso 3 -->
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="step-card text-center">
                        <div class="step-number-modern">
                            <span>03</span>
                            <div class="step-pulse"></div>
                        </div>
                        <div class="step-icon-bg mb-3">
                            <i class="bi bi-trophy step-icon"></i>
                        </div>
                        <h5 class="step-title mb-3">Completa y Gana</h5>
                        <p class="step-description text-muted">Acumula puntos automáticamente al completar tus objetivos</p>
                    </div>
                </div>
                
                <!-- Paso 4 -->
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="step-card text-center">
                        <div class="step-number-modern">
                            <span>04</span>
                            <div class="step-pulse"></div>
                        </div>
                        <div class="step-icon-bg mb-3">
                            <i class="bi bi-graph-up step-icon"></i>
                        </div>
                        <h5 class="step-title mb-3">Domina el Ranking</h5>
                        <p class="step-description text-muted">Compite sanamente y motiva a tu equipo a superarse</p>
                    </div>
                </div>
            </div>

            <!-- Línea conectora -->
            <div class="timeline-line d-none d-lg-block" data-aos="fade-right" data-aos-delay="500"></div>
        </div>
    </section>

    <!-- ========================================
        CALL TO ACTION - Diseño Moderno
        ========================================= -->
    <section class="cta-section-modern">
        <div class="container py-5">
            <div class="cta-card" data-aos="zoom-in">
                <div class="cta-background">
                    <div class="cta-shape cta-shape-1"></div>
                    <div class="cta-shape cta-shape-2"></div>
                    <div class="cta-shape cta-shape-3"></div>
                </div>
                <div class="cta-content text-center position-relative">
                    <h2 class="cta-title display-4 fw-bold mb-4">¿Listo para el siguiente nivel?</h2>
                    <p class="cta-subtitle lead mb-4 mx-auto">Únete a miles de equipos que ya transformaron su productividad</p>
                    <div class="cta-buttons d-flex flex-column flex-sm-row justify-content-center gap-3 mb-4">
                        <a href="{{ route('register') }}" class="btn btn-cta-primary btn-lg px-5 py-3">
                            <i class="bi bi-rocket-takeoff me-2"></i> Comenzar Gratis
                        </a>
                        <a href="#caracteristicas" class="btn btn-cta-secondary btn-lg px-5 py-3">
                            <i class="bi bi-play-circle me-2"></i> Ver Demo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
        FOOTER - Diseño Moderno
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
                        <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                    </div>
                </div>
                
                <!-- Links Producto -->
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                    <h6 class="footer-title mb-3">Producto</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#caracteristicas">Características</a></li>
                        <li><a href="#como-funciona">Cómo funciona</a></li>
                        <li><a href="#">Precios</a></li>
                        <li><a href="#">Actualizaciones</a></li>
                    </ul>
                </div>
                
                <!-- Links Empresa -->
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="200">
                    <h6 class="footer-title mb-3">Empresa</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#">Sobre Nosotros</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Carreras</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>
                
                <!-- Links Recursos -->
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="300">
                    <h6 class="footer-title mb-3">Recursos</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#">Documentación</a></li>
                        <li><a href="#">API</a></li>
                        <li><a href="#">Tutoriales</a></li>
                        <li><a href="#">Soporte</a></li>
                    </ul>
                </div>
                
                <!-- Links Legal -->
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="400">
                    <h6 class="footer-title mb-3">Legal</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#">Privacidad</a></li>
                        <li><a href="terminosycondiciones.html">Términos</a></li>
                        <li><a href="#">Cookies</a></li>
                        <li><a href="#">Licencias</a></li>
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
        yield('footer')
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tu archivo de animaciones -->
    <script src="js/animations.js"></script>

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
    @php
        use Illuminate\Support\Facades\Auth;
    @endphp
</html>