<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - CollabPro</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-wrapper">
        <div class="container">
            <div class="auth-card row g-0">
                
                <div class="col-lg-5 auth-left">
                    <div>
                        <img src="{{ asset('img/collabpro_logo1.png') }}" alt="CollabPro" class="auth-logo">
                        <h2>¡Bienvenido de vuelta!</h2>
                        <p>Accede a tu cuenta y continúa gestionando tu equipo</p>
                        
                        <ul class="auth-features list-unstyled">
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Gestión de tareas en tiempo real</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Sistema de puntos y rankings</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Analytics y reportes detallados</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-7 auth-right">
                    <div class="auth-header">
                        <h1>Iniciar Sesión</h1>
                        <p>Ingresa tu email o nombre de usuario</p>
                    </div>

                    @if ($errors->any())
                    <div class="alert-custom alert-danger-custom">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        <strong>Error:</strong> {{ $errors->first() }}
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success alert-custom">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <!-- Campo unificado: Email o Username -->
                        <div class="mb-3">
                            <label for="login" class="form-label">
                                <i class="bi bi-person-circle me-2"></i>Correo Electrónico o Usuario
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" 
                                       class="form-control @error('login') is-invalid @enderror" 
                                       id="login" 
                                       name="login"
                                       placeholder="tu@email.com o usuario123" 
                                       required
                                       value="{{ old('login') }}"
                                       autocomplete="username">
                            </div>
                            @error('login')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="bi bi-lock me-2"></i>Contraseña
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-key"></i>
                                </span>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password"
                                       placeholder="••••••••" 
                                       required
                                       autocomplete="current-password">
                            </div>
                            @error('password')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="remember" 
                                       name="remember">
                                <label class="form-check-label" for="remember">
                                    Recordarme
                                </label>
                            </div>
                            <div>
                                <a href="{{ route('password.request') }}" class="auth-link">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>

                        <button type="submit" class="btn-primary-custom">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Iniciar Sesión
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <div class="separator">
                            <span class="separator-text">O</span>
                        </div>
                        <a href="{{ route('google.redirect') }}" class="btn btn-google-custom mt-3">
                            <i class="bi bi-google me-2"></i>
                            Iniciar sesión con Google
                        </a>
                    </div>

                    <div class="text-center mt-4">
                        <p class="text-muted">
                            ¿No tienes cuenta? 
                            <a href="{{ route('register') }}" class="auth-link">Regístrate aquí</a>
                        </p>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ url('/') }}" class="text-muted text-decoration-none">
                            <i class="bi bi-arrow-left me-2"></i>Volver al inicio
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para feedback visual -->
    <script>
        document.getElementById('login').addEventListener('input', function(e) {
            const value = e.target.value;
            const icon = this.previousElementSibling.querySelector('i');
            
            // Cambiar icono según el tipo detectado
            if (value.includes('@')) {
                icon.className = 'bi bi-envelope';
            } else {
                icon.className = 'bi bi-person';
            }
        });
    </script>
</body>
</html>