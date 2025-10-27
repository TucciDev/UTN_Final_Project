<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CollabPro</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #2563eb 50%, #06b6d4 100%);
            background-attachment: fixed;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* ========================================
        SIDEBAR
        ======================================== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            color: #1e293b;
            padding: 0;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        /* Header del sidebar */
        .sidebar-header {
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            flex-shrink: 0;
        }

        .sidebar-logo {
            max-width: 150px;
            height: auto;
        }

        /* Navegación del sidebar */
        .sidebar-nav {
            padding: 1rem 0;
            flex: 1;
            overflow-y: auto;
        }

        .nav-section-title {
            padding: 1rem 1.5rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
        }

        .sidebar-nav .nav-link {
            color: #475569;
            padding: 0.875rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-weight: 500;
        }

        .sidebar-nav .nav-link:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            border-left-color: #667eea;
        }

        .sidebar-nav .nav-link.active {
            background: rgba(102, 126, 234, 0.15);
            color: #667eea;
            border-left-color: #667eea;
            font-weight: 600;
        }

        .sidebar-nav .nav-link i {
            font-size: 1.25rem;
            width: 24px;
            text-align: center;
        }

        /* Perfil en sidebar - CORREGIDO */
        .sidebar-profile {
            padding: 1rem 1.5rem;
            background: rgba(102, 126, 234, 0.08);
            border-top: 1px solid rgba(0,0,0,0.05);
            flex-shrink: 0;
            margin-top: auto;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #2563eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            font-size: 0.9rem;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
            flex-shrink: 0;
        }

        .profile-details {
            flex: 1;
            min-width: 0;
        }

        .profile-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: #1e293b;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.3;
        }

        .profile-email {
            font-size: 0.75rem;
            color: #64748b;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.3;
        }

        .profile-dropdown {
            background: transparent;
            border: none;
            color: #475569;
            padding: 0.25rem;
            cursor: pointer;
            flex-shrink: 0;
        }

        .profile-dropdown:hover {
            color: #667eea;
        }

        /* ========================================
        MAIN CONTENT
        ======================================== */
        .main-content {
            margin-left: 280px;
            padding: 2rem;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .mobile-menu-btn {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            font-size: 1.5rem;
            color: #667eea;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        /* Content area */
        .content-area {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* ========================================
        CARDS DE GRUPOS
        ======================================== */
        .groups-header {
            margin-bottom: 2rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .groups-header h2 {
            color: #1e293b;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .groups-header p {
            color: #64748b;
            margin: 0;
        }

        .group-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            cursor: pointer;
            height: 100%;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .group-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.25);
            border-color: #667eea;
        }

        .group-card-header {
            display: flex;
            align-items: start;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .group-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea 0%, #2563eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .group-info {
            flex: 1;
            min-width: 0;
        }

        .group-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.25rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .group-role {
            font-size: 0.85rem;
            color: #64748b;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .group-stats {
            display: flex;
            gap: 1.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(0,0,0,0.06);
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .stat-label {
            font-size: 0.75rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
        }

        /* Badge de miembros */
        .members-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: #64748b;
            margin-top: 1rem;
        }

        .avatar-group {
            display: flex;
            margin-left: -0.5rem;
        }

        .avatar-group .avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 2px solid white;
            background: linear-gradient(135deg, #667eea 0%, #2563eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 600;
            color: white;
            margin-left: -0.5rem;
        }

        /* Card para crear grupo */
        .create-group-card {
            background: linear-gradient(135deg, #667eea 0%, #2563eb 100%);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 1rem;
            border: 2px dashed rgba(255,255,255,0.4);
        }

        .create-group-card:hover {
            border-color: white;
            background: linear-gradient(135deg, #5568d3 0%, #1d4ed8 100%);
        }

        .create-group-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        .create-group-card h5 {
            margin: 0;
            font-weight: 700;
        }

        .create-group-card p {
            margin: 0;
            opacity: 0.95;
            font-size: 0.9rem;
        }

       /* ========================================
        RESPONSIVE
        ======================================== */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
                padding-top: 5rem;
            }

            .mobile-menu-btn {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .mobile-menu-btn {
                display: flex;
                align-items: center;
                justify-content: center;
                transition: 0.3s ease;
            }
            
            .mobile-menu-btn.active {
                position: fixed;
                left: 190px; /* un poco más que el ancho del sidebar */
                transition: left 0.3s ease;
                transform: rotate(90deg);
            }
            .groups-header {
                padding: 1.5rem;
            }

            .groups-header h2 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 575px) {
            .main-content {
                padding: 0.75rem;
                padding-top: 5rem;
            }

            .groups-header {
                padding: 1.25rem;
            }

            .groups-header h2 {
                font-size: 1.3rem;
            }

            .group-stats {
                gap: 1rem;
            }

            .stat-value {
                font-size: 1.1rem;
            }

            .group-name {
                font-size: 1rem;
            }

            .group-icon {
                width: 45px;
                height: 45px;
                font-size: 1.3rem;
            }
        }

        /* Overlay para cerrar sidebar en móvil */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }

        /* Dropdown menu mejorado */
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border-radius: 12px;
        }

        .dropdown-item {
            padding: 0.65rem 1rem;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }

        /* Prevenir scroll del body cuando sidebar está abierto en móvil */
        body.sidebar-open {
            overflow: hidden;
        }

        @media (max-width: 991px) {
            body.sidebar-open {
                overflow: hidden;
            }
        }
    </style>
</head>
<body>

    <!-- Botón menú móvil -->
    <button class="mobile-menu-btn" id="mobileMenuBtn">
        <i class="bi bi-list"></i>
    </button>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- ========================================
        SIDEBAR
    ======================================== -->
    <aside class="sidebar" id="sidebar">
        <!-- Header -->
        <div class="sidebar-header">
            <img src="{{ asset('img/collabpro_logo3.png') }}" alt="CollabPro" class="sidebar-logo">
        </div>

        <!-- Navegación -->
        <nav class="sidebar-nav">
            <!-- Sección: Grupos -->
            <div class="nav-section-title">Grupos</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="bi bi-collection"></i>
                        <span>Mis Grupos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#createGroupModal">
                        <i class="bi bi-plus-circle"></i>
                        <span>Crear Grupo</span>
                    </a>
                </li>
            </ul>

            <!-- Sección: Otras opciones -->
            <div class="nav-section-title">Más</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-bell"></i>
                        <span>Notificaciones</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        <i class="bi bi-house"></i>
                        <span>Ir al Inicio</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Perfil del usuario -->
        <div class="sidebar-profile">
            <div class="profile-info">
                <div class="profile-avatar">
                    {{ substr(Auth::user()->nombre, 0, 1) }}{{ substr(Auth::user()->apellido, 0, 1) }}
                </div>
                <div class="profile-details">
                    <div class="profile-name">{{ Auth::user()->username }}</div>
                    <div class="profile-email">{{ Auth::user()->email }}</div>
                </div>
                <div class="dropdown">
                    <button class="profile-dropdown" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Mi Perfil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Configuración</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>

    <!-- Overlay para cerrar sidebar en móvil -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- ========================================
        MAIN CONTENT
    ======================================== -->
    <main class="main-content">
        <!-- Content Area -->
        <div class="content-area">
            <!-- Header -->
            <div class="groups-header">
                <h2>Bienvenido, {{ Auth::user()->nombre }}! 👋</h2>
                <p>Aquí puedes ver y gestionar todos tus grupos de trabajo</p>
            </div>

            <!-- Grid de grupos -->
            <div class="row g-4">
                
                <!-- Card: Crear nuevo grupo -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="group-card create-group-card" data-bs-toggle="modal" data-bs-target="#createGroupModal">
                        <div class="create-group-icon">
                            <i class="bi bi-plus-lg"></i>
                        </div>
                        <h5>Crear Nuevo Grupo</h5>
                        <p>Comienza a colaborar con tu equipo</p>
                    </div>
                </div>

                <!-- Grupo 1 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="group-card">
                        <div class="group-card-header">
                            <div class="group-icon">
                                <i class="bi bi-code-slash"></i>
                            </div>
                            <div class="group-info">
                                <div class="group-name">Desarrollo Web</div>
                                <div class="group-role">
                                    <i class="bi bi-star-fill" style="color: #fbbf24;"></i>
                                    Admin
                                </div>
                            </div>
                        </div>
                        
                        <div class="group-stats">
                            <div class="stat-item">
                                <span class="stat-label">Tareas</span>
                                <span class="stat-value">24</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Completadas</span>
                                <span class="stat-value">15</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Miembros</span>
                                <span class="stat-value">8</span>
                            </div>
                        </div>

                        <div class="members-badge">
                            <div class="avatar-group">
                                <div class="avatar">FP</div>
                                <div class="avatar">MG</div>
                                <div class="avatar">LR</div>
                                <div class="avatar">+5</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grupo 2 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="group-card">
                        <div class="group-card-header">
                            <div class="group-icon">
                                <i class="bi bi-palette"></i>
                            </div>
                            <div class="group-info">
                                <div class="group-name">Diseño UI/UX</div>
                                <div class="group-role">
                                    <i class="bi bi-person" style="color: #60a5fa;"></i>
                                    Miembro
                                </div>
                            </div>
                        </div>
                        
                        <div class="group-stats">
                            <div class="stat-item">
                                <span class="stat-label">Tareas</span>
                                <span class="stat-value">12</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Completadas</span>
                                <span class="stat-value">8</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Miembros</span>
                                <span class="stat-value">5</span>
                            </div>
                        </div>

                        <div class="members-badge">
                            <div class="avatar-group">
                                <div class="avatar">AM</div>
                                <div class="avatar">JS</div>
                                <div class="avatar">TR</div>
                                <div class="avatar">+2</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grupo 3 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="group-card">
                        <div class="group-card-header">
                            <div class="group-icon">
                                <i class="bi bi-megaphone"></i>
                            </div>
                            <div class="group-info">
                                <div class="group-name">Marketing Digital</div>
                                <div class="group-role">
                                    <i class="bi bi-star-fill" style="color: #fbbf24;"></i>
                                    Admin
                                </div>
                            </div>
                        </div>
                        
                        <div class="group-stats">
                            <div class="stat-item">
                                <span class="stat-label">Tareas</span>
                                <span class="stat-value">18</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Completadas</span>
                                <span class="stat-value">12</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Miembros</span>
                                <span class="stat-value">6</span>
                            </div>
                        </div>

                        <div class="members-badge">
                            <div class="avatar-group">
                                <div class="avatar">FP</div>
                                <div class="avatar">CM</div>
                                <div class="avatar">PL</div>
                                <div class="avatar">+3</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para sidebar móvil -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const body = document.body;

        function toggleSidebar() {
            const isOpen = sidebar.classList.contains('show');
            
            if (isOpen) {
                closeSidebar();
            } else {
                openSidebar();
            }
        }

        function openSidebar() {
            sidebar.classList.add('show');
            sidebarOverlay.classList.add('show');
            mobileMenuBtn.classList.add('active');
            body.classList.add('sidebar-open');
        }

        function closeSidebar() {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
            mobileMenuBtn.classList.remove('active');
            body.classList.remove('sidebar-open');
        }

        // Toggle sidebar al hacer click en el botón hamburguesa
        mobileMenuBtn.addEventListener('click', toggleSidebar);

        // Cerrar sidebar al hacer click en el overlay
        sidebarOverlay.addEventListener('click', closeSidebar);

        // Cerrar sidebar al hacer click en cualquier link del sidebar en móvil
        const sidebarLinks = sidebar.querySelectorAll('.nav-link');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 991) {
                    closeSidebar();
                }
            });
        });

        // Cerrar sidebar al cambiar de tamaño a desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 991) {
                closeSidebar();
            }
        });

        // Prevenir scroll cuando el sidebar está abierto en móvil
        let startY = 0;
        sidebar.addEventListener('touchstart', function(e) {
            startY = e.touches[0].pageY;
        }, { passive: true });

        sidebar.addEventListener('touchmove', function(e) {
            const y = e.touches[0].pageY;
            const scrollTop = sidebar.scrollTop;
            const scrollHeight = sidebar.scrollHeight;
            const height = sidebar.clientHeight;
            const isAtTop = scrollTop === 0;
            const isAtBottom = scrollTop + height >= scrollHeight;

            if ((isAtTop && y > startY) || (isAtBottom && y < startY)) {
                e.preventDefault();
            }
        }, { passive: false });
    </script>
</body>
</html>