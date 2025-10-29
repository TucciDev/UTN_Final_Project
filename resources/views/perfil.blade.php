<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - CollabPro</title>
    
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

        .content-area {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* ========================================
        CUSTOM PROFILE STYLES
        ======================================== */
        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .profile-card .card-header {
            background: none;
            border: none;
            padding: 0 0 1.5rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.08);
            margin-bottom: 1.5rem;
        }

        .profile-card .card-header h5 {
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }
        
        .form-label {
            font-weight: 600;
            color: #475569;
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 0.875rem 1.125rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }

        .btn-primary {
            background-color: #667eea;
            border-color: #667eea;
            border-radius: 12px;
            padding: 0.875rem 1.5rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #5568d3;
            border-color: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .btn-danger {
            background-color: #ef4444;
            border-color: #ef4444;
            border-radius: 12px;
            padding: 0.875rem 1.5rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-danger:hover {
            background-color: #dc2626;
            border-color: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .modal-content {
            border-radius: 20px;
            border: none;
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
        }

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
            <div class="nav-section-title">Grupos</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="bi bi-collection"></i>
                        <span>Mis Grupos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipos.create') }}">
                        <i class="bi bi-plus-circle"></i>
                        <span>Crear Grupo</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipos.join.form') }}">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Unirse a Grupo</span>
                    </a>
                </li>
            </ul>
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
                    @if (Auth::user()->avatar_url)
                        <img src="{{ Auth::user()->avatar_url }}" 
                            alt="Avatar" 
                            class="rounded-circle" 
                            style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        <div class="rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px; background-color:">
                            {{ Auth::user()->initials }}
                        </div>
                    @endif
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
                        <li><a class="dropdown-item active" href="{{ route('perfil') }}"><i class="bi bi-person me-2"></i>Mi Perfil</a></li>
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

    <!-- ========================================
        MAIN CONTENT
    ======================================== -->
    <main class="main-content">
        <div class="content-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">

                        {{-- Profile Information --}}
                        <div class="profile-card">
                            <div class="card-header">
                                <h5 class="mb-0">Información del Perfil</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Avatar// Iniciales -->

                                    <div class="mb-3 d-flex justify-content-center">
                                        @if (Auth::user()->ruta_img)
                                            <img src="{{ Auth::user()->getAvatarUrlAttribute() }}" 
                                                alt="Avatar" 
                                                class="img-fluid rounded-circle mb-3" 
                                                style="width: 150px; height: 150px; object-fit: cover;">
                                        @else
                                            <div class="profile-avatar rounded-circle mb-3 d-flex align-items-center justify-content-center"
                                                style="width: 150px; height: 150px; background-color: #ccc; font-size: 50px; font-weight: bold;">
                                                {{ strtoupper(substr(Auth::user()->nombre,0,1) . substr(Auth::user()->apellido,0,1)) }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Subida de foto y boton de eliminacion -->

                                    <div class="mb-3">
                                        <label for="ruta_img" class="form-label">{{ __('Foto de Perfil') }}</label>
                                        <input id="ruta_img" type="file" 
                                            class="form-control @error('ruta_img') is-invalid @enderror" 
                                            name="ruta_img">
                                            
                                            @error('ruta_img')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if (Auth::user()->ruta_img)
                                                <div class="mt-2 text-start">
                                                    <button type="submit" name="delete_avatar" value="1" formnovalidate class="btn btn-danger btn-sm">
                                                        Eliminar Foto
                                                    </button>
                                                </div>
                                            @endif
                                    </div>

                                    <!-- Cambio de nombre -->

                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Nombre') }}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', auth()->user()->nombre) }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Cambio de apellido -->

                                    <div class="mb-3">
                                        <label for="surname" class="form-label">{{ __('Apellido') }}</label>
                                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname', auth()->user()->apellido) }}" required autocomplete="surname" autofocus>
                                        @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Cambio de usuario -->

                                    <div class="mb-3">
                                        <label for="username" class="form-label">{{ __('Nombre de Usuario') }}</label>
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', auth()->user()->username) }}" required autocomplete="username" autofocus>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Cambio de email -->
            
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', auth()->user()->email) }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
            
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Actualizar Perfil') }}
                                        </button>
                                    </div>
                                </form>
                                    
                            </div>
                        </div>

                        {{-- Security --}}
                        <div class="profile-card">
                            <div class="card-header">
                                <h5 class="mb-0">Seguridad</h5>
                            </div>

                                <!-- Cambio de contraseña -->

                            <div class="card-body">
                                <form action="{{ route('password.update') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">{{ __('Contraseña Actual') }}</label>
                                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">
                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
            
                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Nueva Contraseña') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
            
                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">{{ __('Confirmar Nueva Contraseña') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
            
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Cambiar Contraseña') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- Account Deletion --}}
                        <div class="profile-card">
                            <div class="card-header">
                                <h5 class="mb-0 text-danger">Eliminar Cuenta</h5>
                            </div>
                            <div class="card-body">
                                <p>Una vez que su cuenta sea eliminada, todos sus recursos y datos serán eliminados permanentemente. Antes de eliminar su cuenta, por favor descargue cualquier dato o información que desee conservar.</p>
                                <div class="text-end">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                        {{ __('Eliminar Cuenta') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Delete Account Modal --}}
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAccountModalLabel">{{ __('Confirmar Eliminación de Cuenta') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar su cuenta? Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancelar') }}</button>
                    <form action="{{ route('perfil.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Eliminar Cuenta') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para sidebar móvil -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const body = document.body;

        function toggleSidebar() {
            sidebar.classList.toggle('show');
            sidebarOverlay.classList.toggle('show');
            body.classList.toggle('sidebar-open');
        }

        mobileMenuBtn.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', toggleSidebar);
    </script>
</body>
</html>