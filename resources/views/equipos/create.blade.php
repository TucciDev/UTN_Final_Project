<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Equipo - CollabPro</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #2563eb 50%, #06b6d4 100%);
            background-attachment: fixed;
            min-height: 100vh;
            padding: 1rem;
        }

        @media (min-width: 768px) {
            body {
                padding: 2rem 1rem;
            }
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            width: 100%;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }

        @media (min-width: 768px) {
            .form-card {
                border-radius: 20px;
                padding: 2.5rem;
            }
        }

        .form-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        @media (min-width: 768px) {
            .form-header {
                margin-bottom: 2rem;
            }
        }

        .form-header h1 {
            color: #1e293b;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
        }

        @media (min-width: 768px) {
            .form-header h1 {
                font-size: 2rem;
            }
        }

        .form-header p {
            color: #64748b;
            font-size: 0.9rem;
        }

        @media (min-width: 768px) {
            .form-header p {
                font-size: 1rem;
            }
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: rgb(255, 255, 255);
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 1rem;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        @media (min-width: 768px) {
            .back-link {
                margin-bottom: 1.5rem;
                font-size: 1rem;
            }
        }

        .back-link:hover {
            color: rgb(255, 255, 255);
            transform: translateX(-5px);
        }

        @media (min-width: 768px) {
            .back-link:hover {
                transform: translateX(-10px);
            }
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        @media (min-width: 768px) {
            .form-label {
                font-size: 1rem;
            }
        }

        .form-control, .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.625rem 0.875rem;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        @media (min-width: 768px) {
            .form-control, .form-select {
                padding: 0.75rem 1rem;
                font-size: 1rem;
            }
        }

        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        @media (min-width: 768px) {
            textarea.form-control {
                min-height: 100px;
            }
        }

        .icon-picker {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(45px, 1fr));
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        @media (min-width: 768px) {
            .icon-picker {
                grid-template-columns: repeat(auto-fill, minmax(50px, 1fr));
            }
        }

        .icon-option {
            aspect-ratio: 1;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1.25rem;
            background: white;
        }

        @media (min-width: 768px) {
            .icon-option {
                font-size: 1.5rem;
            }
        }

        .icon-option:hover {
            border-color: #667eea;
            transform: scale(1.05);
        }

        .icon-option.selected {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }

        .color-picker {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(45px, 1fr));
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        @media (min-width: 768px) {
            .color-picker {
                grid-template-columns: repeat(auto-fill, minmax(50px, 1fr));
            }
        }

        .color-option {
            aspect-ratio: 1;
            border: 3px solid transparent;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .color-option:hover {
            transform: scale(1.1);
        }

        .color-option.selected {
            border-color: #1e293b;
            box-shadow: 0 0 0 2px white, 0 0 0 4px #1e293b;
        }

        .btn-primary-custom {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, #667eea 0%, #2563eb 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        @media (min-width: 768px) {
            .btn-primary-custom {
                padding: 0.875rem;
                font-size: 1.05rem;
            }
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .preview-card {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        @media (min-width: 768px) {
            .preview-card {
                border-radius: 15px;
                padding: 1.5rem;
            }
        }

        .preview-title {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            color: #64748b;
            margin-bottom: 0.75rem;
            letter-spacing: 0.5px;
        }

        @media (min-width: 768px) {
            .preview-title {
                font-size: 0.85rem;
                margin-bottom: 1rem;
            }
        }

        .preview-content {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        @media (min-width: 768px) {
            .preview-content {
                border-radius: 12px;
                padding: 1.25rem;
                gap: 1rem;
            }
        }

        .preview-icon {
            width: 45px;
            height: 45px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
            transition: all 0.3s;
            flex-shrink: 0;
        }

        @media (min-width: 768px) {
            .preview-icon {
                width: 50px;
                height: 50px;
                border-radius: 10px;
                font-size: 1.5rem;
            }
        }

        .preview-info {
            flex: 1;
            min-width: 0;
        }

        .preview-info h4 {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 700;
            color: #1e293b;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        @media (min-width: 768px) {
            .preview-info h4 {
                font-size: 1.1rem;
            }
        }

        .preview-info p {
            margin: 0;
            font-size: 0.8rem;
            color: #64748b;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        @media (min-width: 768px) {
            .preview-info p {
                font-size: 0.9rem;
            }
        }

        .alert {
            border-radius: 10px;
            border: none;
            font-size: 0.9rem;
        }

        @media (min-width: 768px) {
            .alert {
                border-radius: 12px;
                font-size: 1rem;
            }
        }

        small.text-muted {
            font-size: 0.8rem;
        }

        @media (min-width: 768px) {
            small.text-muted {
                font-size: 0.875rem;
            }
        }

        .mb-4 {
            margin-bottom: 1.25rem !important;
        }

        @media (min-width: 768px) {
            .mb-4 {
                margin-bottom: 1.5rem !important;
            }
        }

        #imagenPreview {
            margin-top: 1rem;
        }

        #imagenPreview img {
            max-width: 100%;
            width: 150px;
            border-radius: 10px;
            border: 2px solid #e2e8f0;
        }

        @media (min-width: 768px) {
            #imagenPreview img {
                width: 200px;
                border-radius: 12px;
            }
        }

        #removeImageBtn {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #ef4444;
            color: white;
            border: 2px solid white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        @media (min-width: 768px) {
            #removeImageBtn {
                top: -10px;
                right: -10px;
                width: 32px;
                height: 32px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <div class="form-container">
        <a href="{{ route('dashboard') }}" class="back-link">
            <i class="bi bi-arrow-left"></i>
            Volver al Dashboard
        </a>

        <div class="form-card">
            <div class="form-header">
                <h1><i class="bi bi-plus-circle me-2"></i>Crear Nuevo Equipo</h1>
                <p>Configura tu equipo y comienza a colaborar</p>
            </div>

            <!-- Preview del equipo -->
            <div class="preview-card">
                <div class="preview-title">Vista Previa</div>
                <div class="preview-content">
                    <div class="preview-icon" id="previewIcon" style="background: #667eea; overflow: hidden; padding: 0;">
                        <i class="bi bi-people" style="font-size: inherit; color: white; display: flex; align-items: center; justify-content: center; width: 100%; height: 100%;"></i>
                        <img id="previewImageInIcon" src="" alt="" style="display: none; width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="preview-info">
                        <h4 id="previewNombre">Mi Equipo</h4>
                        <p id="previewDescripcion">Descripción del equipo</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('equipos.store') }}" method="POST" id="createTeamForm" enctype="multipart/form-data">
                @csrf
                <!-- Nombre del equipo -->
                <div class="mb-4">
                    <label for="nombre" class="form-label">
                        <i class="bi bi-tag me-2"></i>Nombre del Equipo
                    </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="nombre" 
                        name="nombre"
                        placeholder="Ej: Desarrollo Web, Marketing..." 
                        required
                        maxlength="20">
                    <small class="text-muted">Máximo 20 caracteres</small>
                </div>

                <!-- Descripción -->
                <div class="mb-4">
                    <label for="descripcion" class="form-label">
                        <i class="bi bi-text-paragraph me-2"></i>Descripción (Opcional)
                    </label>
                    <textarea 
                        class="form-control" 
                        id="descripcion" 
                        name="descripcion"
                        placeholder="Describe brevemente el propósito..."
                        maxlength="200"></textarea>
                    <small class="text-muted">Máximo 200 caracteres</small>
                </div>

                <!-- Upload de imagen -->
                <div class="mb-4">
                    <label for="imagen" class="form-label">
                        <i class="bi bi-image me-2"></i>Imagen del Equipo (Opcional)
                    </label>
                    <input 
                        type="file" 
                        class="form-control" 
                        id="imagen" 
                        name="imagen"
                        accept="image/*">
                    <small class="text-muted">JPG, PNG, GIF. Máx 2MB</small>
                    
                    <!-- Preview de la imagen -->
                    <div id="imagenPreview" style="display: none;">
                        <div style="position: relative; display: inline-block;">
                            <img id="imagenPreviewImg" src="" alt="Preview">
                            <button 
                                type="button" 
                                id="removeImageBtn" 
                                title="Eliminar imagen">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Selector de icono -->
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-emoji-smile me-2"></i>Icono del Equipo 
                        <small class="text-muted">(sin imagen)</small>
                    </label>
                    <input type="hidden" name="icono" id="iconoInput" value="bi-people">
                    <div class="icon-picker" id="iconPickerContainer">
                        <div class="icon-option selected" data-icon="bi-people">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="icon-option" data-icon="bi-code-slash">
                            <i class="bi bi-code-slash"></i>
                        </div>
                        <div class="icon-option" data-icon="bi-palette">
                            <i class="bi bi-palette"></i>
                        </div>
                        <div class="icon-option" data-icon="bi-megaphone">
                            <i class="bi bi-megaphone"></i>
                        </div>
                        <div class="icon-option" data-icon="bi-graph-up">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="icon-option" data-icon="bi-lightbulb">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <div class="icon-option" data-icon="bi-gear">
                            <i class="bi bi-gear"></i>
                        </div>
                        <div class="icon-option" data-icon="bi-shield">
                            <i class="bi bi-shield"></i>
                        </div>
                        <div class="icon-option" data-icon="bi-trophy">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div class="icon-option" data-icon="bi-rocket">
                            <i class="bi bi-rocket"></i>
                        </div>
                    </div>
                </div>

                <!-- Selector de color -->
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-palette-fill me-2"></i>Color del Equipo 
                        <small class="text-muted">(sin imagen)</small>
                    </label>
                    <input type="hidden" name="color" id="colorInput" value="#667eea">
                    <div class="color-picker">
                        <div class="color-option selected" data-color="#667eea" style="background: #667eea;"></div>
                        <div class="color-option" data-color="#2563eb" style="background: #2563eb;"></div>
                        <div class="color-option" data-color="#06b6d4" style="background: #06b6d4;"></div>
                        <div class="color-option" data-color="#10b981" style="background: #10b981;"></div>
                        <div class="color-option" data-color="#f59e0b" style="background: #f59e0b;"></div>
                        <div class="color-option" data-color="#ef4444" style="background: #ef4444;"></div>
                        <div class="color-option" data-color="#ec4899" style="background: #ec4899;"></div>
                        <div class="color-option" data-color="#8b5cf6" style="background: #8b5cf6;"></div>
                        <div class="color-option" data-color="#64748b" style="background: #64748b;"></div>
                    </div>
                </div>

                <!-- Botón submit -->
                <button type="submit" class="btn-primary-custom">
                    <i class="bi bi-check-circle me-2"></i>
                    Crear Equipo
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Preview en tiempo real
        const nombreInput = document.getElementById('nombre');
        const descripcionInput = document.getElementById('descripcion');
        const previewNombre = document.getElementById('previewNombre');
        const previewDescripcion = document.getElementById('previewDescripcion');
        const previewIcon = document.getElementById('previewIcon');

        // Actualizar nombre
        nombreInput.addEventListener('input', function() {
            previewNombre.textContent = this.value || 'Mi Equipo';
        });

        // Actualizar descripción
        descripcionInput.addEventListener('input', function() {
            previewDescripcion.textContent = this.value || 'Descripción del equipo';
        });

        // Selector de iconos
        const iconOptions = document.querySelectorAll('.icon-option');
        const iconoInput = document.getElementById('iconoInput');

        iconOptions.forEach(option => {
            option.addEventListener('click', function() {
                iconOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                
                const icon = this.dataset.icon;
                iconoInput.value = icon;
                
                previewIcon.querySelector('i').className = icon;
            });
        });

        // Selector de colores
        const colorOptions = document.querySelectorAll('.color-option');
        const colorInput = document.getElementById('colorInput');

        colorOptions.forEach(option => {
            option.addEventListener('click', function() {
                colorOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                
                const color = this.dataset.color;
                colorInput.value = color;
                
                if (previewImageInIcon.style.display === 'none') {
                    previewIcon.style.background = color;
                }
            });
        });

        // Preview de imagen upload
        const imagenInput = document.getElementById('imagen');
        const imagenPreview = document.getElementById('imagenPreview');
        const imagenPreviewImg = document.getElementById('imagenPreviewImg');
        const previewImageInIcon = document.getElementById('previewImageInIcon');
        const previewIconElement = previewIcon.querySelector('i');
        const removeImageBtn = document.getElementById('removeImageBtn');

        imagenInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    imagenPreviewImg.src = e.target.result;
                    imagenPreview.style.display = 'block';
                    
                    previewImageInIcon.src = e.target.result;
                    previewImageInIcon.style.display = 'block';
                    previewIconElement.style.display = 'none';
                    previewIcon.style.background = 'transparent';
                };
                
                reader.readAsDataURL(file);
            } else {
                resetImagePreview();
            }
        });

        function resetImagePreview() {
            imagenPreview.style.display = 'none';
            previewImageInIcon.style.display = 'none';
            previewIconElement.style.display = 'flex';
            
            const selectedColor = document.querySelector('.color-option.selected');
            if (selectedColor) {
                previewIcon.style.background = selectedColor.dataset.color;
            }
            
            imagenInput.value = '';
        }

        removeImageBtn.addEventListener('click', function() {
            resetImagePreview();
        });
    </script>
</body>
</html>