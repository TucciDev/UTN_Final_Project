<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unirse a Equipo - CollabPro</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 50%, #0e7490 100%);
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .join-container {
            max-width: 500px;
            width: 100%;
        }

        .join-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
            text-align: center;
        }

        .join-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 8px 24px rgba(6, 182, 212, 0.3);
        }

        .join-header h1 {
            color: #1e293b;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 1.75rem;
        }

        .join-header p {
            color: #64748b;
            margin-bottom: 2rem;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 1.5rem;
            transition: all 0.3s;
        }

        .back-link:hover {
            color: rgba(255, 255, 255, 0.8);
            transform: translateX(-5px);
        }

        .code-input {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 0.25rem;
            text-transform: uppercase;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1rem;
            transition: all 0.3s;
        }

        .code-input:focus {
            border-color: #06b6d4;
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.1);
        }

        .code-input::placeholder {
            letter-spacing: normal;
            font-size: 1rem;
            font-weight: 400;
        }

        .btn-join {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
            margin-top: 1.5rem;
        }

        .btn-join:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(6, 182, 212, 0.4);
        }

        .info-box {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border-radius: 12px;
            padding: 1.25rem;
            margin-top: 2rem;
            text-align: left;
        }

        .info-box h6 {
            color: #0c4a6e;
            font-weight: 700;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-box ul {
            margin: 0;
            padding-left: 1.25rem;
            color: #0369a1;
        }

        .info-box li {
            margin-bottom: 0.5rem;
        }

        .alert {
            border-radius: 12px;
            border: none;
            text-align: left;
            margin-bottom: 1.5rem;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 2rem 0;
            color: #94a3b8;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .divider span {
            padding: 0 1rem;
            font-size: 0.9rem;
        }

        .alt-action {
            text-align: center;
            margin-top: 1.5rem;
        }

        .alt-action p {
            color: #64748b;
            margin-bottom: 0.75rem;
        }

        .btn-outline-custom {
            padding: 0.75rem 2rem;
            border: 2px solid #06b6d4;
            border-radius: 12px;
            color: #06b6d4;
            background: transparent;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .btn-outline-custom:hover {
            background: #06b6d4;
            color: white;
            transform: translateY(-2px);
        }

        @media (max-width: 576px) {
            .join-card {
                padding: 2rem 1.5rem;
            }

            .join-header h1 {
                font-size: 1.5rem;
            }

            .code-input {
                font-size: 1.25rem;
                letter-spacing: 0.15rem;
            }
        }
    </style>
</head>
<body>

    <div class="join-container">
        <a href="{{ route('dashboard') }}" class="back-link">
            <i class="bi bi-arrow-left"></i>
            Volver al Dashboard
        </a>

        <div class="join-card">
            <div class="join-icon">
                <i class="bi bi-box-arrow-in-right"></i>
            </div>

            <div class="join-header">
                <h1>Unirse a un Equipo</h1>
                <p>Ingresa el código de invitación que recibiste</p>
            </div>

            @if($errors->any())
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle me-2"></i>
                <strong>Error:</strong> {{ $errors->first() }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('equipos.join') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <input 
                        type="text" 
                        class="form-control code-input @error('codigo_invitacion') is-invalid @enderror" 
                        id="codigo_invitacion" 
                        name="codigo_invitacion"
                        placeholder="Ej: ABC12345"
                        maxlength="8"
                        required
                        autofocus>
                </div>

                <button type="submit" class="btn-join">
                    <i class="bi bi-check-circle me-2"></i>
                    Unirse al Equipo
                </button>
            </form>

            <div class="info-box">
                <h6>
                    <i class="bi bi-info-circle"></i>
                    ¿Cómo funciona?
                </h6>
                <ul>
                    <li>El administrador del equipo te proporcionará un código de 8 caracteres</li>
                    <li>Ingresa el código exactamente como lo recibiste</li>
                    <li>Serás agregado automáticamente como miembro del equipo</li>
                </ul>
            </div>

            <div class="divider">
                <span>o</span>
            </div>

            <div class="alt-action">
                <p>¿Quieres crear tu propio equipo?</p>
                <a href="{{ route('equipos.create') }}" class="btn-outline-custom">
                    <i class="bi bi-plus-circle me-2"></i>Crear Equipo
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-uppercase para el código
        const codigoInput = document.getElementById('codigo_invitacion');
        
        codigoInput.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });

        // Auto-submit cuando se completan 8 caracteres (opcional)
        codigoInput.addEventListener('input', function() {
            if (this.value.length === 8) {
                // Opcional: enviar automáticamente
                // this.form.submit();
            }
        });
    </script>
</body>
</html>