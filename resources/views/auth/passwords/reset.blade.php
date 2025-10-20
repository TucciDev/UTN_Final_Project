<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - CollabPro</title>
    
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
            overflow-x: hidden;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
        }

        .auth-wrapper::before,
        .auth-wrapper::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s ease-in-out infinite;
        }

        .auth-wrapper::before {
            width: 400px;
            height: 400px;
            top: -100px;
            right: -100px;
        }

        .auth-wrapper::after {
            width: 300px;
            height: 300px;
            bottom: -80px;
            left: -80px;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(180deg); }
        }

        .reset-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 3rem;
            max-width: 500px;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        .reset-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .reset-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .reset-icon i {
            font-size: 2.5rem;
            color: white;
        }

        .reset-header h1 {
            color: #2d3748;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .reset-header p {
            color: #718096;
            font-size: 1rem;
        }

        .form-label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .input-group-text {
            background: transparent;
            border: 2px solid #e2e8f0;
            border-right: none;
            border-radius: 12px 0 0 12px;
            color: #718096;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }

        .input-group:focus-within .input-group-text {
            border-color: #667eea;
        }

        .password-strength {
            height: 4px;
            border-radius: 2px;
            background: #e2e8f0;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
        }

        .password-strength-weak { 
            width: 33%; 
            background: #f56565; 
        }
        .password-strength-medium { 
            width: 66%; 
            background: #ed8936; 
        }
        .password-strength-strong { 
            width: 100%; 
            background: #48bb78; 
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 0.875rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
        }

        .alert-custom {
            border-radius: 12px;
            border: none;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .alert-danger-custom {
            background: #fee;
            color: #c53030;
        }

        .password-requirements {
            background: #f7fafc;
            border-radius: 12px;
            padding: 1rem;
            margin-top: 1rem;
        }

        .password-requirements h6 {
            font-size: 0.875rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }

        .password-requirements ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .password-requirements li {
            font-size: 0.875rem;
            color: #718096;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .password-requirements li i {
            font-size: 1rem;
        }

        .requirement-met {
            color: #48bb78;
        }

        .requirement-unmet {
            color: #cbd5e0;
        }

        @media (max-width: 575px) {
            .auth-wrapper {
                padding: 1rem;
            }

            .reset-card {
                padding: 2rem 1.5rem;
            }

            .reset-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="reset-card">
            <div class="reset-header">
                <div class="reset-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <h1>Nueva Contraseña</h1>
                <p>Ingresa tu nueva contraseña segura</p>
            </div>

            <!-- Mensajes de error -->
            <!-- @if ($errors->any())
            <div class="alert-custom alert-danger-custom">
                <i class="bi bi-exclamation-circle me-2"></i>
                <strong>Error:</strong> {{ $errors->first() }}
            </div>
            @endif -->

            <!-- Formulario -->
            <form action="#" method="POST" id="resetForm">
                <!-- @csrf (Laravel) -->
                
                <!-- Token y Email ocultos -->
                <input type="hidden" name="token" value="">
                <input type="hidden" name="email" value="">

                <!-- Email (visible pero readonly) -->
                <div class="mb-3">
                    <label for="email_display" class="form-label">
                        <i class="bi bi-envelope me-2"></i>Correo Electrónico
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-at"></i>
                        </span>
                        <input type="email" 
                               class="form-control" 
                               id="email_display" 
                               value=""
                               readonly>
                    </div>
                </div>

                <!-- Nueva contraseña -->
                <div class="mb-3">
                    <label for="password" class="form-label">
                        <i class="bi bi-lock me-2"></i>Nueva Contraseña
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-key"></i>
                        </span>
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password"
                               placeholder="Mínimo 8 caracteres" 
                               required
                               minlength="8"
                               oninput="checkPasswordStrength()">
                    </div>
                    <div class="password-strength">
                        <div class="password-strength-bar" id="strengthBar"></div>
                    </div>
                    <small class="text-muted" id="strengthText">Ingresa una contraseña</small>
                </div>

                <!-- Confirmar contraseña -->
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
                               id="password_confirmation" 
                               name="password_confirmation"
                               placeholder="Repite tu contraseña" 
                               required
                               minlength="8">
                    </div>
                </div>

                <!-- Requisitos de contraseña -->
                <div class="password-requirements">
                    <h6>Requisitos de contraseña:</h6>
                    <ul>
                        <li id="req-length" class="requirement-unmet">
                            <i class="bi bi-circle"></i>
                            <span>Mínimo 8 caracteres</span>
                        </li>
                        <li id="req-uppercase" class="requirement-unmet">
                            <i class="bi bi-circle"></i>
                            <span>Al menos una mayúscula</span>
                        </li>
                        <li id="req-lowercase" class="requirement-unmet">
                            <i class="bi bi-circle"></i>
                            <span>Al menos una minúscula</span>
                        </li>
                        <li id="req-number" class="requirement-unmet">
                            <i class="bi bi-circle"></i>
                            <span>Al menos un número</span>
                        </li>
                        <li id="req-special" class="requirement-unmet">
                            <i class="bi bi-circle"></i>
                            <span>Al menos un carácter especial</span>
                        </li>
                    </ul>
                </div>

                <button type="submit" class="btn-primary-custom mt-4">
                    <i class="bi bi-check-circle me-2"></i>
                    Restablecer Contraseña
                </button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script de validación -->
    <script>
        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            
            let strength = 0;
            let metRequirements = 0;
            
            // Verificar requisitos
            const hasLength = password.length >= 8;
            const hasUppercase = /[A-Z]/.test(password);
            const hasLowercase = /[a-z]/.test(password);
            const hasNumber = /\d/.test(password);
            const hasSpecial = /[^a-zA-Z\d]/.test(password);
            
            // Actualizar indicadores visuales
            updateRequirement('req-length', hasLength);
            updateRequirement('req-uppercase', hasUppercase);
            updateRequirement('req-lowercase', hasLowercase);
            updateRequirement('req-number', hasNumber);
            updateRequirement('req-special', hasSpecial);
            
            // Calcular fortaleza
            if (hasLength) { strength++; metRequirements++; }
            if (password.length >= 12) strength++;
            if (hasUppercase && hasLowercase) { strength++; metRequirements++; }
            if (hasNumber) { strength++; metRequirements++; }
            if (hasSpecial) { strength++; metRequirements++; }
            
            // Actualizar barra y texto
            strengthBar.className = 'password-strength-bar';
            
            if (strength === 0 || password.length === 0) {
                strengthText.textContent = 'Ingresa una contraseña';
                strengthText.style.color = '#a0aec0';
            } else if (strength <= 2) {
                strengthBar.classList.add('password-strength-weak');
                strengthText.textContent = 'Contraseña débil';
                strengthText.style.color = '#f56565';
            } else if (strength <= 4) {
                strengthBar.classList.add('password-strength-medium');
                strengthText.textContent = 'Contraseña media';
                strengthText.style.color = '#ed8936';
            } else {
                strengthBar.classList.add('password-strength-strong');
                strengthText.textContent = 'Contraseña fuerte';
                strengthText.style.color = '#48bb78';
            }
        }

        function updateRequirement(id, met) {
            const element = document.getElementById(id);
            if (met) {
                element.classList.remove('requirement-unmet');
                element.classList.add('requirement-met');
                element.querySelector('i').className = 'bi bi-check-circle-fill';
            } else {
                element.classList.remove('requirement-met');
                element.classList.add('requirement-unmet');
                element.querySelector('i').className = 'bi bi-circle';
            }
        }

        // Validar formulario
        document.getElementById('resetForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmation = document.getElementById('password_confirmation').value;
            
            if (password !== confirmation) {
                e.preventDefault();
                alert('Las contraseñas no coinciden');
                return false;
            }

            // Verificar requisitos mínimos
            const hasLength = password.length >= 8;
            const hasUppercase = /[A-Z]/.test(password);
            const hasLowercase = /[a-z]/.test(password);
            const hasNumber = /\d/.test(password);
            const hasSpecial = /[^a-zA-Z\d]/.test(password);

            if (!hasLength || !hasUppercase || !hasLowercase || !hasNumber || !hasSpecial) {
                e.preventDefault();
                alert('La contraseña no cumple con todos los requisitos');
                return false;
            }
        });
    </script>
</body>
</html>