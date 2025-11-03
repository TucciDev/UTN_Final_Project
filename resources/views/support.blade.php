<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soporte - CollabPro</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 

    <!-- CSS  -->
    <link rel="stylesheet" href="{{ asset('css/support.css') }}">   

</head>

<body style="background-color: white !important; margin: 0; padding: 0;">
    
    <!-- ========================================
        NAVBAR
    ========================================= -->
    <nav class="navbar navbar-expand-xl navbar-dark fixed-top" style="background: rgba(255, 255, 255, 0.99); box-shadow: 0 2px 20px rgba(0,0,0,0.8);">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('img/collabpro_logo1.png') }}" alt="CollabPro Logo" class="logo">
        </a>
        
        <!-- Botón Volver al Inicio (Desktop) -->
        <div class="ms-auto d-none d-xl-block">
            <a class="btn btn-outline-primary px-4 rounded-pill fw-semibold" href="{{ route('home') }}" style="color: rgb(102, 126, 234); border: 2px solid rgb(102, 126, 234); transition: all 0.3s;">
                <i class="bi bi-house-door me-1"></i> Volver al Inicio
            </a>
        </div>
        
        <!-- Menú hamburguesa (solo móvil) -->
        <button class="navbar-toggler border-0 d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="bi bi-list" style="font-size: 2.5rem; color: rgb(0, 0, 0);"></i>
        </button>
    </div>
</nav>
    <!-- Espaciador para navbar fijo -->
    
    <!-- ========================================
        OFFCANVAS (Menú móvil lateral)
    ========================================= -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header" style="background: rgba(102, 126, 234, 0.95);">
        <h5 class="offcanvas-title text-white fw-bold" id="offcanvasNavbarLabel">
            <img src="{{ asset('img/collabpro_logo1.png') }}" alt="CollabPro Logo" class="logo">
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" style="background: rgba(102, 126, 234, 0.95);">
        <div class="d-grid gap-2">
            <a href="{{ route('home') }}" class="btn btn-light rounded-pill fw-semibold" style="color: #667eea;">
                <i class="bi bi-house-door me-2"></i> Volver al Inicio
            </a>
        </div>
    </div>
</div>
    
    <!-- Hero Section -->
    <section class="faq-hero">
        <div class="faq-background">
            <div class="faq-shape faq-shape-1"></div>
            <div class="faq-shape faq-shape-2"></div>
            <div class="faq-shape faq-shape-3"></div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center hero-content">
                    <h1 class="hero-title display-3 fw-bold mb-4" data-aos="fade-down">¿En qué podemos ayudarte?</h1>
                    <p class="hero-subtitle lead mb-0" data-aos="fade-up" data-aos-delay="100">Te damos la bienvenida al <i>centro de soporte</i> de CollabPro.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Search Section -->
    <section class="search-section py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="search-wrapper">
                        <i class="bi bi-search search-icon"></i>
                        <input 
                            type="text" 
                            id="searchSupport" 
                            class="form-control search-input" 
                            placeholder="Buscar en soporte..."
                        >
                        <i class="bi bi-x-circle search-clear" id="clearSearch"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center categories-row" id="categoriesRow">
                
                <!-- Categoría 1: Cuenta y Perfil -->
                <div class="col-lg-4 col-md-6 mb-4" data-category="cuenta" data-aos="fade-up" data-aos-delay="0">
                    <div class="category-card" data-category="cuenta">
                        <div class="category-icon">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <h3 class="category-title">Cuenta y Perfil</h3>
                        <p class="category-description">
                            Problemas con tu cuenta, contraseña, datos personales y configuración de perfil.
                        </p>
                        <span class="category-badge">5 artículos</span>
                    </div>
                </div>
                <!-- Categoría 2: Gestión de Tareas -->
                <div class="col-lg-4 col-md-6 mb-4" data-category="tareas" data-aos="fade-up" data-aos-delay="100">
                    <div class="category-card" data-category="tareas">
                        <div class="category-icon">
                            <i class="bi bi-list-check"></i>
                        </div>
                        <h3 class="category-title">Gestión de Tareas</h3>
                        <p class="category-description">
                            Crear, editar, organizar y compartir tareas. Problemas con proyectos y equipos.
                        </p>
                        <span class="category-badge">5 artículos</span>
                    </div>
                </div>
                <!-- Categoría 3: Sincronización y Notificaciones -->
                <div class="col-lg-4 col-md-6 mb-4" data-category="sync" data-aos="fade-up" data-aos-delay="200">
                    <div class="category-card" data-category="sync">
                        <div class="category-icon">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <h3 class="category-title">Sincronización y Notificaciones</h3>
                        <p class="category-description">
                            Problemas de sincronización entre dispositivos y configuración de notificaciones.
                        </p>
                        <span class="category-badge">5 artículos</span>
                    </div>
                </div>
            </div>
            <!-- Botón Volver (oculto inicialmente) 
            <div class="text-center mb-4" id="backButtonContainer" style="display: none;">
                <button class="back-button" id="backButton">
                    <i class="bi bi-arrow-left"></i>
                    Volver a categorías
                </button>
            </div> -->
            <!-- Contenedor de Preguntas (oculto inicialmente) -->
            <div class="questions-container" id="questionsContainer">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        
                        <!-- PREGUNTAS CATEGORÍA: CUENTA Y PERFIL -->
                        <div class="accordion accordion-flush faq-accordion" id="cuentaQuestions" style="display: none;">
                            
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuenta1">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">No puedo iniciar sesión en mi cuenta</span>
                                    </button>
                                </h2>
                                <div id="cuenta1" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p class="mb-3">Si tenés problemas para iniciar sesión, seguí estos pasos:</p>
                                        <ol class="faq-list">
                                            <li>Verificá que estés usando el <strong>email correcto</strong> registrado</li>
                                            <li>Asegurate de que tu contraseña no tenga espacios adicionales</li>
                                            <li>Si olvidaste tu contraseña, hacé clic en <strong>"¿Olvidaste tu contraseña?"</strong></li>
                                            <li>Revisá tu carpeta de spam por si el email de recuperación llegó ahí</li>
                                            <li>Intentá limpiar caché y cookies de tu navegador</li>
                                        </ol>
                                        <div class="faq-warning">
                                            <i class="bi bi-info-circle-fill"></i>
                                            <span><strong>Nota:</strong> Después de 5 intentos fallidos, tu cuenta será bloqueada temporalmente por seguridad.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuenta2">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Cómo cambio mi contraseña?</span>
                                    </button>
                                </h2>
                                <div id="cuenta2" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p class="mb-3">Para cambiar tu contraseña:</p>
                                        <ol class="faq-list">
                                            <li>Ingresá a <strong>Configuración → Seguridad</strong></li>
                                            <li>Hacé clic en <strong>"Cambiar contraseña"</strong></li>
                                            <li>Ingresá tu contraseña actual</li>
                                            <li>Escribí tu nueva contraseña dos veces</li>
                                            <li>Hacé clic en <strong>"Guardar cambios"</strong></li>
                                        </ol>
                                        <div class="faq-tip">
                                            <i class="bi bi-lightbulb"></i>
                                            <span><strong>Tip:</strong> Usá una contraseña de al menos 8 caracteres con letras, números y símbolos.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuenta3">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Cómo actualizo mi información de perfil?</span>
                                    </button>
                                </h2>
                                <div id="cuenta3" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Podés actualizar tu perfil en cualquier momento:</p>
                                        <ol class="faq-list">
                                            <li>Hacé clic en tu foto de perfil en la esquina superior derecha</li>
                                            <li>Seleccioná <strong>"Mi perfil"</strong></li>
                                            <li>Editá la información que quieras cambiar</li>
                                            <li>Hacé clic en <strong>"Guardar"</strong></li>
                                        </ol>
                                        <p class="mt-3">Podés cambiar: nombre, email, foto de perfil, biografía y preferencias de notificación.</p>
                                    </div>
                                </div>
                            </div>

                                                            <!-- Pregunta 4 -->
                                <div class="accordion-item faq-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuenta4">
                                            <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                            <span class="faq-question-text">¿Cómo recupero mi cuenta si olvidé el correo asociado?</span>
                                        </button>
                                    </h2>
                                    <div id="cuenta4" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            <p>Si no recordás el correo con el que creaste tu cuenta, seguí estos pasos:</p>
                                            <ol class="faq-list">
                                                <li>Intentá buscar en tu bandeja de entrada correos con el remitente <strong>no-reply@collabpro.com.</strong></li>
                                                <li>Si tenés varias direcciones, probá iniciar sesión con cada una.</li>
                                                <li>En caso de no encontrar el correo, contactá al <strong>soporte de CollabPro</strong> indicando tu nombre completo y nombre del equipo al que pertenecés.</li>
                                            </ol>
                                            <div class="faq-warning">
                                                <i class="bi bi-info-circle-fill"></i>
                                                <span><strong>Nota:</strong> Por seguridad, el equipo de soporte solo puede confirmar la cuenta si verificás tu identidad.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pregunta 5 -->
                                <div class="accordion-item faq-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuenta5">
                                            <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                            <span class="faq-question-text">¿Qué hago si mi cuenta fue bloqueada?</span>
                                        </button>
                                    </h2>
                                    <div id="cuenta5" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            <p>Si tu cuenta fue bloqueada por motivos de seguridad, podés resolverlo así:</p>
                                            <ol class="faq-list">
                                                <li>Esperá 15 minutos y volvé a intentar iniciar sesión</li>
                                                <li>Si sigue bloqueada, usá la opción <strong>"Recuperar acceso"</strong> en la pantalla de inicio de sesión</li>
                                                <li>Comprobá tu correo electrónico para completar la verificación</li>
                                                <li>Si el problema persiste, contactá a <strong>soporte@collabpro.com</strong></li>
                                            </ol>
                                            <div class="faq-tip">
                                                <i class="bi bi-lightbulb"></i>
                                                <span><strong>Tip:</strong> Evitá múltiples intentos fallidos seguidos para prevenir bloqueos automáticos.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>


                        <!-- PREGUNTAS CATEGORÍA: GESTIÓN DE TAREAS -->
                        <div class="accordion accordion-flush faq-accordion" id="tareasQuestions" style="display: none;">
                            
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tareas1">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Cómo creo una nueva tarea?</span>
                                    </button>
                                </h2>
                                <div id="tareas1" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p class="mb-3">Crear una tarea es muy simple:</p>
                                        <ol class="faq-list">
                                            <li>Hacé clic en el botón <strong>"+ Nueva Tarea"</strong> en la parte superior</li>
                                            <li>Escribí el nombre de la tarea</li>
                                            <li>Agregá una descripción (opcional)</li>
                                            <li>Asigná una fecha de vencimiento</li>
                                            <li>Seleccioná la prioridad (Alta, Media o Baja)</li>
                                            <li>Hacé clic en <strong>"Guardar"</strong></li>
                                        </ol>
                                        <div class="faq-tip">
                                            <i class="bi bi-lightbulb"></i>
                                            <span><strong>Tip:</strong> Podés usar el atajo de teclado Ctrl+N para crear tareas rápidamente.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tareas2">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Cómo elimino una tarea?</span>
                                    </button>
                                </h2>
                                <div id="tareas2" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Para eliminar una tarea:</p>
                                        <ol class="faq-list">
                                            <li>Abrí la tarea que querés eliminar</li>
                                            <li>Hacé clic en el menú de opciones (tres puntos)</li>
                                            <li>Seleccioná <strong>"Eliminar"</strong></li>
                                            <li>Confirmá la eliminación</li>
                                        </ol>
                                        <div class="faq-warning">
                                            <i class="bi bi-info-circle-fill"></i>
                                            <span><strong>Nota:</strong> Las tareas eliminadas van a la papelera y pueden recuperarse durante 30 días.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tareas3">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">No puedo compartir una tarea con mi equipo</span>
                                    </button>
                                </h2>
                                <div id="tareas3" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Si no podés compartir tareas, verificá:</p>
                                        <ul class="faq-list">
                                            <li>Que tengas <strong>permisos de administrador o editor</strong> en el proyecto</li>
                                            <li>Que los usuarios con los que querés compartir estén en tu equipo</li>
                                            <li>Que tu plan incluya la función de <strong>colaboración</strong></li>
                                            <li>Que el email del usuario esté correctamente escrito</li>
                                        </ul>
                                        <p class="mt-3">Si el problema persiste, podés invitar al usuario primero al proyecto y luego compartir la tarea.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tareas4">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">No puedo agregar o eliminar miembros de mi equipo</span>
                                    </button>
                                </h2>
                                <div id="tareas4" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Solo los administradores o creadores del equipo pueden gestionar miembros. 
                                            Si tenés ese rol y el error persiste, actualizá la página o verificá tu conexión. 
                                            También podés revisar si el usuario ya fue invitado previamente.
                                        </p>   
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tareas5">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Cómo asigno una tarea a un miembro del equipo?</span>
                                    </button>
                                </h2>
                                <div id="tareas5" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Para asignar una tarea:</p>
                                        <ol class="faq-list">
                                            <li>Abrí la tarea que querés asignar</li>
                                            <li>Hacé clic en el campo <strong>"Asignar a"</strong></li>
                                            <li>Seleccioná el miembro del equipo de la lista</li>
                                            <li>La persona recibirá una notificación automáticamente</li>
                                        </ol>
                                        <div class="faq-tip">
                                            <i class="bi bi-lightbulb"></i>
                                            <span><strong>Tip:</strong> Podés asignar múltiples personas a una misma tarea.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- PREGUNTAS CATEGORÍA: SINCRONIZACIÓN Y NOTIFICACIONES -->
                        <div class="accordion accordion-flush faq-accordion" id="syncQuestions" style="display: none;">
                            
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sync1">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">Los cambios no se sincronizan entre dispositivos</span>
                                    </button>
                                </h2>
                                <div id="sync1" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p class="mb-3">Si los cambios no se reflejan en todos tus dispositivos:</p>
                                        <ol class="faq-list">
                                            <li>Verificá que estés <strong>usando la misma cuenta</strong> en todos los dispositivos</li>
                                            <li>Comprobá tu <strong>conexión a Internet</strong> en ambos dispositivos</li>
                                            <li>Forzá la sincronización deslizando hacia abajo en la pantalla principal</li>
                                            <li>Cerrá sesión y volvé a iniciarla</li>
                                            <li>Actualizá la aplicación a la <strong>última versión</strong></li>
                                        </ol>
                                        <div class="faq-tip">
                                            <i class="bi bi-lightbulb"></i>
                                            <span><strong>Consejo:</strong> La sincronización puede tardar hasta 1 minuto en completarse.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sync2">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">No recibo notificaciones de nuevas tareas</span>
                                    </button>
                                </h2>
                                <div id="sync2" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Si no estás recibiendo notificaciones:</p>
                                        <ul class="faq-list">
                                            <li><strong>En la app:</strong> Verificá que los permisos de notificaciones estén activados en la configuración de tu dispositivo</li>
                                            <li><strong>En la web:</strong> Asegurate de haber aceptado las notificaciones del navegador</li>
                                            <li>Andá a <strong>Configuración → Notificaciones</strong> y verificá que estén activadas</li>
                                            <li>Revisá que no esté activado el modo "No molestar"</li>
                                            <li>Comprobá tu bandeja de spam para notificaciones por email</li>
                                        </ul>
                                        <p class="mt-3">Recordá que podés personalizar qué notificaciones querés recibir en la configuración.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sync3">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">Recibo demasiadas notificaciones</span>
                                    </button>
                                </h2>
                                <div id="sync3" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Podés personalizar las notificaciones según tus necesidades:</p>
                                        <ol class="faq-list">
                                            <li>Andá a <strong>Configuración → Notificaciones</strong></li>
                                            <li>Desactivá las notificaciones que no necesitás</li>
                                            <li>Configurá un <strong>horario de silencio</strong> (ej: de 22:00 a 08:00)</li>
                                            <li>Ajustá la frecuencia de resúmenes diarios</li>
                                            <li>Desactivá notificaciones para proyectos específicos</li>
                                        </ol>
                                        <div class="faq-tip">
                                            <i class="bi bi-lightbulb"></i>
                                            <span><strong>Recomendado:</strong> Activá solo notificaciones de alta prioridad y menciones directas.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sync4">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">La sincronización con mi calendario no funciona</span>
                                    </button>
                                </h2>
                                <div id="sync4" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Para solucionar problemas de sincronización con calendarios:</p>
                                        <ul class="faq-list">
                                            <li>Desconectá y volvé a conectar tu calendario en <strong>Configuración → Integraciones</strong></li>
                                            <li>Verificá que hayas otorgado todos los <strong>permisos necesarios</strong></li>
                                            <li>Comprobá que tu calendario esté configurado como <strong>predeterminado</strong></li>
                                            <li>Asegurate de que la sincronización bidireccional esté activada</li>
                                            <li>Verificá que tu cuenta de calendario esté activa</li>
                                        </ul>
                                        <div class="faq-warning">
                                            <i class="bi bi-info-circle-fill"></i>
                                            <span><strong>Importante:</strong> Los cambios pueden tardar hasta 15 minutos en reflejarse.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                  

                            <!-- Pregunta 5 -->
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sync5">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">Las notificaciones llegan con retraso o en horarios incorrectos</span>
                                    </button>
                                </h2>
                                <div id="sync5" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Si las notificaciones no llegan a tiempo o aparecen en horarios equivocados, seguí estos pasos:</p>
                                        <ol class="faq-list">
                                            <li>Verificá que la <strong>hora y zona horaria</strong> de tu dispositivo estén configuradas correctamente</li>
                                            <li>Comprobá tu conexión a Internet y el estado del servicio de notificaciones</li>
                                            <li>En la app móvil, reiniciá la sesión o cerrá y abrí nuevamente la aplicación</li>
                                            <li>En la web, actualizá la página o borrá la caché del navegador</li>
                                            <li>Si el problema persiste, desactivá y volvé a activar las notificaciones desde <strong>Configuración → Notificaciones</strong></li>
                                        </ol>
                                        <div class="faq-tip">
                                            <i class="bi bi-lightbulb"></i>
                                            <span><strong>Consejo:</strong> Mantener la app actualizada garantiza que las notificaciones se entreguen correctamente.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>
    
    <!-- Botón volver (oculto inicialmente) -->
    <div class="text-center mb-4" id="backButtonContainer" style="display: none;">
        <button class="back-button" id="backButton">
        <i class="bi bi-chevron-up"></i>
        Ocultar preguntas
        </button>
    </div> 

    <!-- CTA Section -->
    <section class="py-5 my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cta-support-card position-relative overflow-hidden">
                        <!-- Patrón de fondo geométrico -->
                        <div class="cta-geometric-pattern"></div>
                        
                        <!-- Círculos decorativos -->
                        <div class="cta-circle cta-circle-1"></div>
                        <div class="cta-circle cta-circle-2"></div>
                        <div class="cta-circle cta-circle-3"></div>
                        
                        <div class="row align-items-center position-relative" style="z-index: 2;">
                            <!-- Columna izquierda: Icono -->
                            <div class="col-lg-5 text-center mb-4 mb-lg-0">
                                <div class="cta-icon-wrapper">
                                    <div class="cta-icon-circle">
                                        <i class="bi bi-headset"></i>
                                    </div>
                                    <div class="cta-icon-pulse"></div>
                                </div>
                            </div>
                            
                            <!-- Columna derecha: Contenido -->
                            <div class="col-lg-7 text-center text-lg-start">
                                <span class="cta-badge mb-3 d-inline-block">Soporte 24/7</span>
                                <h2 class="cta-heading mb-3">¿Necesitás ayuda adicional?</h2>
                                <p class="cta-description mb-4">
                                    Nuestro equipo de soporte está disponible para asistirte con cualquier consulta. Estamos para ayudarte.
                                </p>
                                <a href="{{ route('contact') }}" class="btn-cta-support">
                                    <span>Contactanos</span>
                                    <i class="bi bi-envelope ms-2"></i>
                                    <div class="btn-cta-shine"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
                        <li><a href="{{ route('contact') }}">Contacto</a></li>
                    </ul>
                </div>
                
                <!-- Links Recursos -->
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="300">
                    <h6 class="footer-title mb-3">Recursos</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#">Documentación</a></li>
                        <li><a href="#">API</a></li>
                        <li><a href="#">Tutoriales</a></li>
                        <li><a href="{{ route('support') }}">Soporte</a></li>
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
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });
    </script>
    
    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryCards = document.querySelectorAll('.category-card');
            const categoriesRow = document.getElementById('categoriesRow');
            const questionsContainer = document.getElementById('questionsContainer');
            const backButtonContainer = document.getElementById('backButtonContainer');
            const backButton = document.getElementById('backButton');
            const searchInput = document.getElementById('searchSupport');
            const clearSearch = document.getElementById('clearSearch');
            // Objeto con las preguntas de cada categoría
            const categoryQuestions = {
                'cuenta': document.getElementById('cuentaQuestions'),
                'tareas': document.getElementById('tareasQuestions'),
                'sync': document.getElementById('syncQuestions')
            };

             // Función de scroll suave
            function scrollLento(duration = 1000) {
                const questionsContainer = document.getElementById('questionsContainer');
                if (!questionsContainer) return;

                const rect = questionsContainer.getBoundingClientRect();
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const navbarHeight = 76; // altura del navbar fijo
                const target = rect.top + scrollTop - navbarHeight - 90; // 20px de margen extra

                const start = window.pageYOffset;
                const distance = target - start;
                let startTime = null;

                function animation(currentTime) {
                    if (startTime === null) startTime = currentTime;
                    const timeElapsed = currentTime - startTime;
                    const progress = Math.min(timeElapsed / duration, 1);

                    // Función de easing 
                    const ease = progress < 0.5
                        ? 2 * progress * progress
                        : -1 + (4 - 2 * progress) * progress;

                    window.scrollTo(0, start + distance * ease);

                    if (timeElapsed < duration) {
                        requestAnimationFrame(animation);
                    }
                }

                requestAnimationFrame(animation);
            }

            // función para scroll a categorías
            function scrollACategorias(duration = 1000) {
                const categoriesRow = document.getElementById('categoriesRow');
                if (!categoriesRow) return;

                const rect = categoriesRow.getBoundingClientRect();
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const navbarHeight = 76;
                const target = rect.top + scrollTop - navbarHeight - 80; // Mismo margen que las preguntas

                const start = window.pageYOffset;
                const distance = target - start;
                let startTime = null;

                function animation(currentTime) {
                    if (startTime === null) startTime = currentTime;
                    const timeElapsed = currentTime - startTime;
                    const progress = Math.min(timeElapsed / duration, 1);

                    const ease = progress < 0.5
                        ? 2 * progress * progress
                        : -1 + (4 - 2 * progress) * progress;

                    window.scrollTo(0, start + distance * ease);

                    if (timeElapsed < duration) {
                        requestAnimationFrame(animation);
                    }
                }

                requestAnimationFrame(animation);
            }


            // Función para seleccionar categoría
function selectCategory(category) {
    const clickedCard = document.querySelector(`.category-card[data-category="${category}"]`);
    
    // Si la categoría ya está activa, ocultarla (toggle)
    if (clickedCard.classList.contains('active')) {
        resetCategories();
        return;
    }
    
    // Ocultar todas las preguntas
    Object.values(categoryQuestions).forEach(q => q.style.display = 'none');
    // Mostrar preguntas de la categoría seleccionada
    if (categoryQuestions[category]) {
        categoryQuestions[category].style.display = 'block';
    }
    // Añadir clase activa a la tarjeta seleccionada
    categoryCards.forEach(card => {
        if (card.dataset.category === category) {
            card.classList.add('active');
            card.closest('.col-lg-4').classList.add('active-category');
        } else {
            card.classList.remove('active');
            card.closest('.col-lg-4').classList.remove('active-category');
        }
    });

    // Mostrar contenedor de preguntas y botón volver
    categoriesRow.classList.add('category-selected');
    questionsContainer.classList.add('show');
    backButtonContainer.style.display = 'block';

    // Scroll suave a las preguntas
    setTimeout(() => {
        scrollLento(1000);
    }, 100);
}

            // Función para volver a categorías
            function resetCategories() {
                // Ocultar CTA suavemente
                const ctaSection = document.querySelector('.cta-section-modern');
                if (ctaSection) {
                    ctaSection.classList.add('hiding');
                }
                
                // Scroll PRIMERO a categorías
                scrollACategorias(800);
                
                // DESPUÉS ocultar preguntas con animación
                setTimeout(() => {
                    questionsContainer.classList.add('hiding');
                    
                    setTimeout(() => {
                        // Ocultar todas las preguntas
                        Object.values(categoryQuestions).forEach(q => q.style.display = 'none');
                        // Remover clases activas
                        categoryCards.forEach(card => {
                            card.classList.remove('active');
                            card.closest('.col-lg-4').classList.remove('active-category');
                        });
                        // Ocultar contenedor de preguntas y botón volver
                        categoriesRow.classList.remove('category-selected');
                        questionsContainer.classList.remove('show', 'hiding');
                        backButtonContainer.style.display = 'none';
                        
                        // Mostrar CTA suavemente después de todo
                        setTimeout(() => {
                            if (ctaSection) {
                                ctaSection.classList.remove('hiding');
                            }
                        }, 300);

                        // Mostrar categorías nuevamente
                        categoriesRow.style.display = '';

                    }, 500);
                }, 200);
            }

            // Event listeners para las categorías
            categoryCards.forEach(card => {
                card.addEventListener('click', function() {
                    const category = this.dataset.category;
                    selectCategory(category);
                });
            });
           
            // Event listener para el botón volver
            backButton.addEventListener('click', resetCategories);
            // ========================================
            // FUNCIONALIDAD DEL ACORDEÓN (iconos)
            // ========================================
            const accordionButtons = document.querySelectorAll('.accordion-button');
            
            accordionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const icon = this.querySelector('.faq-icon');
                    
                    setTimeout(() => {
                        if (this.classList.contains('collapsed')) {
                            icon.classList.remove('bi-dash-circle-fill');
                            icon.classList.add('bi-plus-circle-fill');
                        } else {
                            icon.classList.remove('bi-plus-circle-fill');
                            icon.classList.add('bi-dash-circle-fill');
                        }
                    }, 10);
                });
            });
            // ========================================
            // FUNCIONALIDAD DEL BUSCADOR
            // ========================================
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                
                // Mostrar/ocultar el botón X
                if (this.value.length > 0) {
                    clearSearch.style.display = 'block';
                } else {
                    clearSearch.style.display = 'none';
                }
                if (searchTerm === '') {
                    // Si no hay búsqueda, volver al estado normal SIN SCROLL
                    
                    // Ocultar todas las preguntas
                    Object.values(categoryQuestions).forEach(q => q.style.display = 'none');
                    
                    // Remover clases activas
                    categoryCards.forEach(card => {
                        card.classList.remove('active');
                        card.closest('.col-lg-4').classList.remove('active-category');
                    });
                    
                    // Ocultar contenedor de preguntas y botón volver
                    categoriesRow.classList.remove('category-selected');
                    questionsContainer.classList.remove('show', 'hiding');
                    backButtonContainer.style.display = 'none';
                    
                    // Mostrar categorías nuevamente
                    categoriesRow.style.display = '';
                    
                    // Remover mensaje de no resultados
                    const existingMessage = document.getElementById('noResultsMessage');
                    if (existingMessage) {
                        existingMessage.remove();
                    }
                    return;
                }
                // Mostrar todas las preguntas de todas las categorías
                Object.values(categoryQuestions).forEach(q => q.style.display = 'block');
                
                // Mostrar contenedor de preguntas
                categoriesRow.classList.add('category-selected');
                questionsContainer.classList.add('show');
                backButtonContainer.style.display = 'block';
                let visibleCount = 0;
                const allFaqItems = document.querySelectorAll('.faq-item');
                
                allFaqItems.forEach(item => {
                    const question = item.querySelector('.faq-question-text').textContent.toLowerCase();
                    const answer = item.querySelector('.accordion-body').textContent.toLowerCase();
                    
                    if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                        item.style.display = 'block';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });
                // Mensaje si no hay resultados
                const existingMessage = document.getElementById('noResultsMessage');
                if (existingMessage) {
                    existingMessage.remove();
                }
                
                if (visibleCount === 0) {
                    // Ocultar categorías
                    categoriesRow.style.display = 'none';
                    
                    const noResults = document.createElement('div');
                    noResults.id = 'noResultsMessage';
                    noResults.className = 'alert alert-info text-center my-4';
                    noResults.innerHTML = `
                        <i class="bi bi-search me-2"></i>
                        No se encontraron resultados para "<strong>${searchTerm}</strong>"
                        <br><small class="mt-2 d-block">Intenta con otras palabras clave</small>
                    `;
                    // Insertar después de la sección de búsqueda
                    document.querySelector('.search-section').insertAdjacentElement('afterend', noResults);
                } else {
                    // Ocultar categorías cuando hay resultados
                    categoriesRow.style.display = 'none';
                }
            });
            // Limpiar búsqueda
            clearSearch.addEventListener('click', function() {
                searchInput.value = '';
                searchInput.dispatchEvent(new Event('input'));
                searchInput.focus();
                this.style.display = 'none';
            });
        });

        
        
    </script>
    
</body>
@php
    use Illuminate\Support\Facades\Auth;
@endphp
</html>