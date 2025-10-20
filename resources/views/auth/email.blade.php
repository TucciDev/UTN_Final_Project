<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - CollabPro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; overflow-x: hidden; }
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
        .auth-wrapper::before, .auth-wrapper::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s ease-in-out infinite;
        }
        .auth-wrapper::before { width: 400px; height: 400px; top: -100px; right: -100px; }
        .auth-wrapper::after { width: 300px; height: 300px; bottom: -80px; left: -80px; animation-delay: 2s; }
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(180deg); }
        }
        .forgot-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 3rem;
            max-width: 500px;
            width: 100%;
            position: relative;
            z-index: 1;
        }
        .forgot-header { text-align: center; margin-bottom: 2rem; }
        .forgot-icon {
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
        .forgot-icon i { font-size: 2.5rem; color: white; }
        .forgot-header h1 { color: #2d3748; font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; }
        .forgot-header p { color: #718096; font-size: 1rem; line-height: 1.6; }
        .form-label { font-weight: 600; color: #2d3748; margin-bottom: 0.5rem; }
        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .form-control:focus { border-color: #667eea; box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1); }
        .input-group-text {
            background: transparent;
            border: 2px solid #e2e8f0;
            border-right: none;
            border-radius: 12px 0 0 12px;
            color: #718096;
        }
        .input-group .form-control { border-left: none; border-radius: 0 12px 12px 0; }
        .input-group:focus-within .input-group-text { border-color: #667eea; }
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
        .btn-primary-custom:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5); }
        .alert-custom {
            border-radius: 12px;
            border: none;
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .alert-success-custom { background: #d4edda; color: #155724; }
        .alert-danger-custom { background: #fee; color: #c53030; }
        .back-link { text-align: center; margin-top: 1.5rem; }
        .back-link a { color: #667eea; text-decoration: none; font-weight: 600; transition: color 0.3s ease; }
        .back-link a:hover { color: #764ba2; }
        @media (max-width: 575px) {
            .auth-wrapper { padding: 1rem; }
            .forgot-card { padding: 2rem 1.5rem; }
            .forgot-header h1 { font-size: 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="forgot-card">
            <div class="forgot-header">
                <div class="forgot-icon">
                    <i class="bi bi-key"></i>
                </div>
                <h1>¿Olvidaste tu contraseña?</h1>
                <p>No te preocupes, te enviaremos instrucciones para restablecerla</p>
            </div>

            @if (session('status'))
            <div class="alert-custom alert-success-custom">
                <i class="bi bi-check-circle-fill"></i>
                <span>{{ session('status') }}</span>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert-custom alert-danger-custom">
                <i class="bi bi-exclamation-circle"></i>
                <span>{{ $errors->first() }}</span>
            </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">
                        <i class="bi bi-envelope me-2"></i>Correo Electrónico
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-at"></i>
                        </span>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="tu@email.com" required autofocus>
                    </div>
                    <small class="text-muted">Te enviaremos un enlace para restablecer tu contraseña</small>
                </div>
                <button type="submit" class="btn-primary-custom">
                    <i class="bi bi-send me-2"></i>Enviar Enlace de Recuperación
                </button>
            </form>

            <div class="back-link">
                <a href="{{ route('login') }}">
                    <i class="bi bi-arrow-left me-2"></i>Volver al inicio de sesión
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>