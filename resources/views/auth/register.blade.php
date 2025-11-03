<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - CollabPro</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <style>
        .password-toggle-icon {
            cursor: pointer;
            transition: color 0.2s ease-in-out, transform 0.2s ease-in-out;
        }

        .password-toggle-icon:hover {
            color: #667eea;
        }

        .password-toggle-icon:active {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div class="auth-wrapper auth-wrapper-register">
        <div class="container">
            <div class="auth-card row g-0">
                
                <div class="col-lg-5 auth-left auth-left-register">
                    <div>
                        <img src="{{ asset('img/collabpro_logo1.png') }}" alt="CollabPro" class="auth-logo">
                        <h2>Comienza tu viaje</h2>
                        <p>Únete a miles de equipos que ya transformaron su productividad</p>
                        
                        <ul class="auth-benefits list-unstyled">
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Gratis para equipos hasta 10 personas</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Sin tarjeta de crédito requerida</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Configuración en menos de 2 minutos</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Soporte 24/7 incluido</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-7 auth-right">
                    <div class="auth-header">
                        <h1>Crear Cuenta</h1>
                        <p>Completa los datos para comenzar</p>
                    </div>

                    @if ($errors->any())
                    <div class="alert-custom alert-danger-custom">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        <strong>Errores encontrados:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST" id="registerForm">
                        @csrf
                        
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">
                                    <i class="bi bi-person me-2"></i>Nombre
                                </label>
                                <input type="text" 
                                       class="form-control @error('nombre') is-invalid @enderror" 
                                       id="nombre" 
                                       name="nombre"
                                       placeholder="Nombre..." 
                                       pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$"
                                       title="Solo se permiten letras y espacios"
                                       value="{{ old('nombre') }}"
                                       required>
                            </div>
                            <div class="col-md-6">
                                <label for="apellido" class="form-label">
                                    <i class="bi bi-person me-2"></i>Apellido
                                </label>
                                <input type="text" 
                                       class="form-control @error('apellido') is-invalid @enderror" 
                                       id="apellido" 
                                       name="apellido"
                                       placeholder="Apellido..." 
                                       pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$"
                                       title="Solo se permiten letras y espacios"
                                       value="{{ old('apellido') }}"
                                       required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope me-2"></i>Correo Electrónico
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-at"></i>
                                </span>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email"
                                       placeholder="tu@email.com" 
                                       value="{{ old('email') }}"
                                       required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">
                                <i class="bi bi-person-badge me-2"></i>Nombre de Usuario
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person-circle"></i>
                                </span>
                                <input type="text" 
                                       class="form-control @error('username') is-invalid @enderror" 
                                       id="username" 
                                       name="username"
                                       placeholder="username" 
                                       value="{{ old('username') }}"
                                       required
                                       pattern="[a-zA-Z0-9_]+"
                                       title="Solo letras, números y guiones bajos">
                            </div>
                            <small class="text-muted">Solo letras, números y guiones bajos</small>
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
                                       placeholder="Mínimo 8 caracteres" 
                                       required
                                       minlength="8"
                                       oninput="checkPasswordStrength()">
                                <span class="input-group-text">
                                    <i class="bi bi-eye-slash password-toggle-icon" id="togglePassword" style="cursor: pointer;"></i>
                                </span>
                            </div>
                            <div class="password-strength">
                                <div class="password-strength-bar" id="strengthBar"></div>
                            </div>
                            <small class="text-muted" id="strengthText">Ingresa una contraseña</small>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">
                                <i class="bi bi-lock-fill me-2"></i>Confirmar Contraseña
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-shield-check"></i>
                                </span>
                                <input type="password" 
                                       class="form-control" 
                                       id="password-confirm" 
                                       name="password_confirmation"
                                       placeholder="Repite tu contraseña" 
                                       required
                                       minlength="8">
                                <span class="input-group-text">
                                    <i class="bi bi-eye-slash password-toggle-icon" id="togglePasswordConfirm" style="cursor: pointer;"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input @error('terms') is-invalid @enderror" 
                                       type="checkbox" 
                                       id="terms" 
                                       name="terms"
                                       required>
                                <label class="form-check-label" for="terms">
                                    Acepto los 
                                    <a href="{{ url('terminosycondiciones.html') }}" target="_blank" class="auth-link">Términos y Condiciones</a> 
                                    y la 
                                    <a href="{{ url('terminosycondiciones.html') }}" target="_blank" class="auth-link">Política de Privacidad</a>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn-primary-custom">
                            <i class="bi bi-rocket-takeoff me-2"></i>
                            Crear Cuenta
                        </button>
                    </form>
                    <a href="{{ route('google.redirect') }}" class="btn btn-light border w-100 py-2">
                            <i class="bi bi-google me-2"></i>
                            Registrarse con Google
                        </a>
                        
                    <div class="text-center mt-4">
                        <p class="text-muted">
                            ¿Ya tienes cuenta? 
                            <a href="{{ route('login') }}" class="auth-link">Inicia sesión aquí</a>
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
    <script>
        function checkPasswordStrength() {
            const pwdInput = document.getElementById('password');
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');

            if (!pwdInput || !strengthBar || !strengthText) return;

            const pwd = pwdInput.value;
            let score = 0;

            if (pwd.length >= 8) score += 1; // length
            if (/[A-ZÁÉÍÓÚÑ]/.test(pwd)) score += 1; // uppercase
            if (/[0-9]/.test(pwd)) score += 1; // digits
            if (/[^A-Za-z0-9ÁÉÍÓÚáéíóúÑñ]/.test(pwd)) score += 1; // special chars

            const percent = (score / 3) * 100;
            strengthBar.style.width = percent + '%';

            let text = 'Débil';
            let color = '#f59e0b'; // verde claro

            if (score === 1) {
                text = 'Débil';
                color = '#f59e0b';
            } else if (score === 2) {
                text = 'Moderada';
                color = '#60a5fa';
            } else if (score >= 3) {
                text = 'Fuerte';
                color = '#10b981';
            }

            strengthBar.style.background = color;
            strengthText.textContent = text;
        }

        function togglePasswordVisibility(inputId, toggleButtonId) {
            const passwordInput = document.getElementById(inputId);
            const toggleButton = document.getElementById(toggleButtonId);

            if (!passwordInput || !toggleButton) return;

            toggleButton.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('bi-eye');
                this.classList.toggle('bi-eye-slash');
            });
        }

        // initialize
        checkPasswordStrength();
        togglePasswordVisibility('password', 'togglePassword');
        togglePasswordVisibility('password-confirm', 'togglePasswordConfirm');
    </script>
</body>
</html>