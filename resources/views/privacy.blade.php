<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Privacidad - CollabPro</title>
    
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
        .privacy-hero {
            position: relative;
            min-height: 400px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            display: flex;
            align-items: center;
            overflow: hidden;
            padding: 140px 0 80px 0;
        }

        .privacy-hero::before,
        .privacy-hero::after {
            content: '';
            position: absolute;
            border-radius: 50%;
        }

        .privacy-hero::before {
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: float 8s ease-in-out infinite;
        }

        .privacy-hero::after {
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

        /* === INTRO SECTION === */
        .privacy-intro {
            background: linear-gradient(180deg, #f8f9ff 0%, #ffffff 100%);
            padding: 3rem 0 2rem 0;
        }

        .intro-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            padding: 2.5rem;
            border-left: 6px solid var(--accent-color);
        }

        .intro-card h3 {
            color: var(--dark-color);
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .intro-card h3 i {
            color: var(--accent-color);
            font-size: 2rem;
        }

        .intro-card p {
            color: #4a5568;
            line-height: 1.8;
            font-size: 1.05rem;
            margin-bottom: 0;
        }

        /* === CONTENT SECTION === */
        .privacy-content-section {
            background: linear-gradient(180deg, #ffffff 0%, #f8f9ff 100%);
            padding: 2rem 0 4rem 0;
        }

        .privacy-card {
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
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            color: white;
            border-radius: 12px;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
        }

        .privacy-card h2 {
            color: var(--dark-color);
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .privacy-card p {
            color: #4a5568;
            line-height: 1.8;
            margin-bottom: 1.25rem;
            font-size: 1.05rem;
        }

        .privacy-card ul {
            list-style: none;
            padding-left: 0;
            margin: 1.5rem 0;
        }

        .privacy-card ul li {
            color: #4a5568;
            line-height: 1.8;
            margin-bottom: 1rem;
            padding-left: 2.5rem;
            position: relative;
            font-size: 1.05rem;
        }

        .privacy-card ul li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: white;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.5rem;
            line-height: 28px;
            text-align: center;
        }

        .privacy-card strong {
            color: var(--dark-color);
            font-weight: 600;
        }

        /* === INFO BOXES === */
        .info-box {
            background: linear-gradient(135deg, rgba(79, 172, 254, 0.08), rgba(0, 242, 254, 0.08));
            border-left: 4px solid var(--accent-color);
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
            background: linear-gradient(135deg, #4facfe, #00f2fe);
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
            color: var(--accent-color);
            display: block;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .info-box-content p {
            margin: 0;
            color: #4a5568;
        }

        /* === WARNING BOX === */
        .warning-box {
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.08), rgba(255, 152, 0, 0.08));
            border-left: 4px solid #ffc107;
            border-radius: 12px;
            padding: 1.5rem;
            margin: 2rem 0;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .warning-box-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #ffc107, #ff9800);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .warning-box-content {
            flex: 1;
        }

        .warning-box-content strong {
            color: #ff9800;
            display: block;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .warning-box-content p {
            margin: 0;
            color: #4a5568;
        }

        /* === DATA TABLE === */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .data-table th {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 1rem;
        }

        .data-table td {
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
            color: #4a5568;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .data-table tr:hover {
            background: rgba(79, 172, 254, 0.05);
        }

        /* === RIGHTS SECTION === */
        .rights-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .right-item {
            background: linear-gradient(135deg, rgba(79, 172, 254, 0.05), rgba(0, 242, 254, 0.05));
            border-radius: 16px;
            padding: 1.5rem;
            border: 2px solid rgba(79, 172, 254, 0.1);
            transition: all 0.3s ease;
        }

        .right-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(79, 172, 254, 0.2);
            border-color: var(--accent-color);
        }

        .right-item-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .right-item-icon i {
            font-size: 1.5rem;
            color: white;
        }

        .right-item h4 {
            color: var(--dark-color);
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .right-item p {
            color: #4a5568;
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
        }

        /* === CONTACT CTA === */
        .contact-cta {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
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
            color: var(--accent-color);
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
            color: var(--accent-color);
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
            background: var(--accent-color);
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
            .privacy-hero { min-height: 350px; padding: 120px 0 60px 0; }
            .hero-title { font-size: 2.5rem; }
            .privacy-card { padding: 2rem; }
            .privacy-card h2 { font-size: 1.5rem; }
            .intro-card { padding: 2rem; }
        }

        @media (max-width: 767px) {
            .logo { height: 50px; }
            .privacy-hero { min-height: 300px; padding: 100px 0 50px 0; }
            .hero-title { font-size: 2rem; }
            .hero-icon { width: 80px; height: 80px; }
            .hero-icon i { font-size: 2.5rem; }
            .privacy-card { padding: 1.5rem; border-radius: 16px; }
            .privacy-card h2 { font-size: 1.3rem; }
            .privacy-card p, .privacy-card ul li { font-size: 1rem; }
            .intro-card { padding: 1.5rem; }
            .contact-cta { padding: 2rem; }
            .contact-cta h3 { font-size: 1.5rem; }
            .rights-grid { grid-template-columns: 1fr; }
            .data-table { font-size: 0.9rem; }
            .data-table th, .data-table td { padding: 0.75rem; }
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
    <section class="privacy-hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-content" data-aos="fade-up">
                        <div class="hero-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <h1 class="hero-title">Política de Privacidad</h1>
                        <p class="hero-subtitle">Tu privacidad es nuestra prioridad. Conoce cómo protegemos tus datos</p>
                        <span class="last-update">
                            <i class="bi bi-calendar-check me-2"></i>
                            Última actualización: 26 de octubre de 2025
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- INTRO SECTION -->
    <section class="privacy-intro">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="intro-card" data-aos="fade-up">
                        <h3>
                            <i class="bi bi-info-circle-fill"></i>
                            Compromiso con tu privacidad
                        </h3>
                        <p>En CollabPro, respetamos tu privacidad y nos comprometemos a proteger tus datos personales. Esta Política de Privacidad explica cómo recopilamos, usamos, almacenamos y protegemos tu información cuando utilizas nuestros servicios. Al usar CollabPro, aceptas las prácticas descritas en esta política.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT SECTION -->
    <section class="privacy-content-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <!-- Sección 1 -->
                    <div class="privacy-card" data-aos="fade-up">
                        <h2>
                            <span class="section-number">1</span>
                            Información que Recopilamos
                        </h2>
                        <p>Recopilamos diferentes tipos de información para brindarte un mejor servicio:</p>
                        
                        <p><strong>Información proporcionada por ti:</strong></p>
                        <ul>
                            <li>Datos de registro (nombre, correo electrónico, contraseña)</li>
                            <li>Información de perfil (foto, biografía, preferencias)</li>
                            <li>Contenido que creas (tareas, proyectos, mensajes, comentarios)</li>
                            <li>Comunicaciones con nuestro equipo de soporte</li>
                        </ul>

                        <p><strong>Información recopilada automáticamente:</strong></p>
                        <ul>
                            <li>Datos de uso (páginas visitadas, funciones utilizadas, tiempo de uso)</li>
                            <li>Información del dispositivo (tipo de dispositivo, sistema operativo, navegador)</li>
                            <li>Dirección IP y datos de ubicación aproximada</li>
                            <li>Cookies y tecnologías similares</li>
                        </ul>

                        <div class="info-box">
                            <div class="info-box-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div class="info-box-content">
                                <strong>Seguridad de Contraseñas</strong>
                                <p>Todas las contraseñas se almacenan utilizando encriptación de nivel bancario (bcrypt) y nunca son accesibles en texto plano.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 2 -->
                    <div class="privacy-card" data-aos="fade-up" data-aos-delay="100">
                        <h2>
                            <span class="section-number">2</span>
                            Cómo Usamos tu Información
                        </h2>
                        <p>Utilizamos la información recopilada para los siguientes propósitos:</p>
                        <ul>
                            <li><strong>Proveer y mejorar nuestros servicios:</strong> Procesar tus solicitudes, gestionar tu cuenta y optimizar la experiencia del usuario</li>
                            <li><strong>Comunicación:</strong> Enviarte actualizaciones, notificaciones importantes y responder a tus consultas</li>
                            <li><strong>Seguridad:</strong> Detectar y prevenir fraudes, abusos y actividades maliciosas</li>
                            <li><strong>Análisis y desarrollo:</strong> Entender cómo se usa CollabPro para desarrollar nuevas funciones</li>
                            <li><strong>Personalización:</strong> Adaptar la experiencia según tus preferencias y uso</li>
                            <li><strong>Cumplimiento legal:</strong> Cumplir con obligaciones legales y regulatorias</li>
                        </ul>

                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Tipo de Dato</th>
                                    <th>Propósito</th>
                                    <th>Base Legal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Datos de cuenta</td>
                                    <td>Proveer el servicio</td>
                                    <td>Ejecución del contrato</td>
                                </tr>
                                <tr>
                                    <td>Datos de uso</td>
                                    <td>Mejorar el servicio</td>
                                    <td>Interés legítimo</td>
                                </tr>
                                <tr>
                                    <td>Comunicaciones</td>
                                    <td>Soporte al cliente</td>
                                    <td>Ejecución del contrato</td>
                                </tr>
                                <tr>
                                    <td>Datos técnicos</td>
                                    <td>Seguridad y prevención</td>
                                    <td>Interés legítimo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Sección 3 -->
                    <div class="privacy-card" data-aos="fade-up" data-aos-delay="200">
                        <h2>
                            <span class="section-number">3</span>
                            Compartir tu Información
                        </h2>
                        <p>CollabPro no vende tu información personal. Podemos compartir tus datos solo en las siguientes circunstancias:</p>
                        
                        <ul>
                            <li><strong>Con tu consentimiento:</strong> Cuando nos autorices explícitamente</li>
                            <li><strong>Proveedores de servicios:</strong> Empresas que nos ayudan a operar (hosting, análisis, email). Todos están obligados por acuerdos de confidencialidad</li>
                            <li><strong>Miembros de tu equipo:</strong> Información compartida dentro de proyectos y equipos colaborativos</li>
                            <li><strong>Cumplimiento legal:</strong> Cuando sea requerido por ley o para proteger derechos y seguridad</li>
                            <li><strong>Transferencia de negocio:</strong> En caso de fusión, adquisición o venta de activos</li>
                        </ul>

                        <li><strong>Cumplimiento legal:</strong> Cuando sea requerido por ley o para proteger derechos y seguridad</li>
                        </ul>

                        <div class="warning-box">
                            <div class="warning-box-icon">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                            <div class="warning-box-content">
                                <strong>Importante:</strong>
                                <p>Solo compartimos la información mínima necesaria y siempre bajo estrictas medidas de seguridad y confidencialidad.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 4 -->
                    <div class="privacy-card" data-aos="fade-up" data-aos-delay="300">
                        <h2>
                            <span class="section-number">4</span>
                            Tus Derechos
                        </h2>
                        <p>Tienes derecho a acceder, corregir, eliminar o limitar el uso de tus datos personales. También puedes oponerte a su tratamiento o solicitar la portabilidad de los mismos.</p>
                        
                        <div class="rights-grid">
                            <div class="right-item">
                                <div class="right-item-icon"><i class="bi bi-eye"></i></div>
                                <h4>Acceso a tus datos</h4>
                                <p>Podés solicitar una copia de los datos personales que tenemos sobre vos.</p>
                            </div>

                            <div class="right-item">
                                <div class="right-item-icon"><i class="bi bi-pencil-square"></i></div>
                                <h4>Corrección</h4>
                                <p>Podés actualizar o corregir cualquier información incorrecta o incompleta.</p>
                            </div>

                            <div class="right-item">
                                <div class="right-item-icon"><i class="bi bi-trash"></i></div>
                                <h4>Eliminación</h4>
                                <p>Podés solicitar que eliminemos tus datos cuando ya no sean necesarios.</p>
                            </div>

                            <div class="right-item">
                                <div class="right-item-icon"><i class="bi bi-lock"></i></div>
                                <h4>Limitación</h4>
                                <p>Podés solicitar la restricción del tratamiento de tus datos en determinadas circunstancias.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 5 -->
                    <div class="privacy-card" data-aos="fade-up" data-aos-delay="400">
                        <h2>
                            <span class="section-number">5</span>
                            Contacto
                        </h2>
                        <p>Si tenés preguntas sobre esta Política de Privacidad o querés ejercer tus derechos, podés contactarnos a través de:</p>

                        <div class="contact-cta">
                            <h3>¿Necesitás ayuda o querés saber más?</h3>
                            <p>Escribinos y nuestro equipo te responderá a la brevedad.</p>
                            <a href="mailto:soporte@collabpro.com" class="btn-contact">
                                <i class="bi bi-envelope-fill"></i> soporte@collabpro.com
                            </a>
                        </div>
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
                        <a href="https://instagram.com" class="social-link"><i class="bi bi-instagram"></i></a>
                        <a href="https://facebook.com" class="social-link"><i class="bi bi-facebook"></i></a>
                        <a href="https://github.com/TucciDev/UTN_Final_Project.git" class="social-link"><i class="bi bi-github"></i></a>
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
                        <li><a href="{{ asset('docs/Grupo 4- GDS-M4- 2C-2025.pdf') }}" target="_blank"">Documentación</a></li>
                        <li><a href="{{ asset('videos/VideoMarketing_Grupo4.mp4') }}" target="_blank">Demo</a></li>
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

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>
</html>