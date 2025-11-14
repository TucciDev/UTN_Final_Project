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
                        <h3 class="category-title">Cuenta y perfil</h3>
                        <p class="category-description">
                            Problemas con tu cuenta, contraseña, datos personales y configuración de perfil.
                        </p>
                        <!-- <span class="category-badge">5 artículos</span> -->
                    </div>
                </div>
                <!-- Categoría 2: Gestión de Tareas -->
                <div class="col-lg-4 col-md-6 mb-4" data-category="tareas" data-aos="fade-up" data-aos-delay="100">
                    <div class="category-card" data-category="tareas">
                        <div class="category-icon">
                            <i class="bi bi-list-check"></i>
                        </div>
                        <h3 class="category-title">Gestión de tareas</h3>
                        <p class="category-description">
                            Crear, editar, organizar y compartir tareas. Problemas con proyectos y equipos.
                        </p>
                        <!-- <span class="category-badge">5 artículos</span> -->
                    </div>
                </div>
                <!-- Categoría 3: Grupos y Colaboración -->
                <div class="col-lg-4 col-md-6 mb-4" data-category="sync" data-aos="fade-up" data-aos-delay="200">
                    <div class="category-card" data-category="sync">
                        <div class="category-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h3 class="category-title">Grupos y colaboración</h3>
                        <p class="category-description">
                            Creación y gestión de grupos. Invitaciones, roles, chat y administración de miembros.
                        </p>
                        <!-- <span class="category-badge">5 artículos</span> -->
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
                                        <span class="faq-question-text">¿Cómo puedo crear una cuenta en CollabPro?</span>
                                    </button>
                                </h2>
                                <div id="cuenta1" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p class="mb-3">Para registrarte en CollabPro:</p>
                                        <ol class="faq-list">
                                            <li>Ingresá a la página principal de la plataforma.</li>
                                            <li>Hacé clic en <strong>“Registrarse”.</strong></li>
                                            <li>Completá el formulario con tu nombre, apellido, correo electrónico, nombre de usuario y contraseña.</li>
                                            <li>Confirmá la contraseña y seleccioná <strong>“Crear cuenta”.</strong></li>
                                        </ol>
                                        <div class="faq-warning">
                                            <i class="bi bi-info-circle-fill"></i>
                                            <span><strong>Nota:</strong> También podés registrarte más rápido usando tu cuenta de Google, eligiendo “Registrarse con Google” y autorizando el acceso.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuenta2">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Qué hago si olvidé mi contraseña?</span>
                                    </button>
                                </h2>
                                <div id="cuenta2" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p class="mb-3">Si no recordás tu contraseña:</p>
                                        <ol class="faq-list">
                                            <li>En la pantalla de inicio de sesión, hacé clic en <strong>“¿Olvidaste tu contraseña?”.</strong></li>
                                            <li>Ingresá el correo con el que te registraste.</li>
                                            <li>Revisá tu bandeja de entrada y seguí el enlace de recuperación.</li>
                                            <li>Creá una nueva contraseña para volver a acceder a tu cuenta.</li>
                                        </ol>
                                        <div class="faq-tip">
                                            <i class="bi bi-lightbulb"></i>
                                            <span><strong>Tip:</strong> Usá una contraseña de al menos 8 caracteres con letras y números.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuenta3">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Puedo iniciar sesión con mi cuenta de Google?</span>
                                    </button>
                                </h2>
                                <div id="cuenta3" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Sí. Si te registraste o vinculaste tu cuenta de Google, podés iniciar sesión fácilmente haciendo clic en <strong>“Iniciar sesión con Google”</strong>, seleccionando tu cuenta y accediendo directamente a tu Dashboard.</p>
                                    </div>
                                </div>
                            </div>
 
                                                            <!-- Pregunta 4 -->
                                <div class="accordion-item faq-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuenta4">
                                            <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                            <span class="faq-question-text">¿Cómo puedo editar mi perfil o cambiar mi información personal?</span>
                                        </button>
                                    </h2>
                                    <div id="cuenta4" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            <p>Para modificar tus datos personales:</p>
                                            <ol class="faq-list">
                                                <li>Desde el <strong>Dashboard</strong>, hacé clic en los tres puntos que aparecen junto a tu nombre de usuario (abajo a la izquierda).</li>
                                                <li>Seleccioná <strong>“Mi perfil”.</strong></li>
                                                <li>Desde ahí podés cambiar tu foto de perfil, actualizar tu información personal o modificar tu contraseña.</li>
                                            </ol>  
                                        </div>
                                    </div>
                                </div>
 
                                <!-- Pregunta 5 -->
                                <div class="accordion-item faq-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cuenta5">
                                            <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                            <span class="faq-question-text">¿Qué puedo hacer si tengo problemas para acceder a mi cuenta o actualizar mis datos?</span>
                                        </button>
                                    </h2>
                                    <div id="cuenta5" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            <p>Si tenés inconvenientes para ingresar o modificar tu información:</p>
                                            <ol class="faq-list">
                                                <li>Verificá que el correo y la contraseña sean correctos.</li>
                                                <li>Si el problema persiste, usá la opción <strong>“¿Olvidaste tu contraseña?”</strong> para restablecerla.</li>
                                                <li>Si no podés actualizar tus datos, cerrá sesión e intentá nuevamente.</li>
                                                <li>En caso de que el inconveniente continúe, comunicate con el <strong>equipo de soporte</strong> de CollabPro para recibir ayuda personalizada.</li>
                                            </ol>
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
                                        <span class="faq-question-text">¿Cómo puedo crear una nueva tarea en CollabPro?</span>
                                    </button>
                                </h2>
                                <div id="tareas1" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p class="mb-3">Crear una tarea es muy simple:</p>
                                        <ol class="faq-list">
                                            <li>Ingresá al tablero del equipo donde querés agregarla.</li>
                                            <li>Hacé clic en el botón <strong>“Nueva tarea”</strong> o en el símbolo <strong>“+”</strong> dentro de la columna correspondiente.</li>
                                            <li>Completá los campos requeridos: nombre de la tarea, descripción, responsable, fecha límite y nivel de prioridad.</li>
                                            <li>Seleccioná <strong>“Guardar”</strong> para crearla.</li>
                                        </ol>
                                        <p class="mb-3">La tarea aparecerá automáticamente en el tablero Kanban del equipo.</p>
                                    </div>
                                </div>
                            </div>
 
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tareas2">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Cómo puedo asignar una tarea a un miembro del equipo?</span>
                                    </button>
                                </h2>
                                <div id="tareas2" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Cuando creás o editás una tarea, vas a encontrar el campo <strong>“Asignado a”.</strong></p>
                                        <ol class="faq-list">
                                            <li>Hacé clic en ese campo y seleccioná el nombre del miembro del equipo que se encargará de la tarea.</li>
                                            <li>Guardá los cambios y el usuario asignado recibirá una notificación.</li>
                                        </ol>
                                        <p>También podés cambiar la asignación en cualquier momento desde el tablero.</p>
                                    </div>
                                </div>
                            </div>
 
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tareas3">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿De qué manera puedo seguir el progreso de una tarea?</span>
                                    </button>
                                </h2>
                                <div id="tareas3" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>El tablero Kanban de CollabPro te permite visualizar el estado de cada tarea según su progreso.
                                        Podés moverlas manualmente entre columnas como <strong>“Pendiente”</strong>, <strong>“En progreso”</strong>, o <strong>“Completada”.</strong>
                                        Además, cada tarea muestra detalles como porcentaje de avance, responsable y fecha límite, para un seguimiento más claro y organizado.</p>
                                    </div>
                                </div>
                            </div>
 
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tareas4">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Puedo editar o eliminar una tarea después de crearla?</span>
                                    </button>
                                </h2>
                                <div id="tareas4" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Sí. Para editar una tarea, hacé clic sobre ella en el tablero y seleccioná la opción <strong>“Editar”.</strong>
                                        Desde ahí podés modificar su nombre, descripción, fecha, prioridad o asignación.
                                        Si necesitás eliminarla, hacé clic en <strong>“Eliminar tarea”</strong> dentro del mismo menú.
                                        Tené en cuenta que solo los administradores o creadores del grupo pueden borrar tareas.
                                        </p>  
                                    </div>
                                </div>
                            </div>
 
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tareas5">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Cómo funciona el sistema de puntos y ranking por completar tareas?</span>
                                    </button>
                                </h2>
                                <div id="tareas5" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>CollabPro incluye un sistema de gamificación que premia la productividad.
                                        Cada vez que un usuario completa una tarea, gana puntos.
                                        Estos puntos se acumulan y determinan la posición del usuario en el ranking del equipo, fomentando la motivación y la colaboración.
                                        El ranking puede verse desde el <strong>Dashboard</strong> general del grupo.
                                        </p>
                                    </div>
                                </div>
                            </div>
 
                        </div>
 
                        <!-- PREGUNTAS CATEGORÍA: GRUPOS Y COLABORACIÓN -->
                        <div class="accordion accordion-flush faq-accordion" id="syncQuestions" style="display: none;">
                           
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sync1">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Cómo puedo crear un grupo de trabajo en CollabPro?</span>
                                    </button>
                                </h2>
                                <div id="sync1" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p class="mb-3">Para crear un grupo:</p>
                                        <ol class="faq-list">
                                            <li>Ingresá a tu <strong>Dashboard.</strong></li>
                                            <li>Hacé clic en el botón <strong>“Crear grupo”.</strong></li>
                                            <li>Completá la información requerida: nombre del equipo, descripción (opcional), icono e imagen representativa, y color del grupo.</li>
                                            <li>Confirmá seleccionando <strong>“Crear equipo”.</strong></li>
                                        </ol>
                                        <div class="faq-tip">
                                            <i class="bi bi-lightbulb"></i>
                                            <span><strong>Importante:</strong> Una vez creado, vas a recibir un código de invitación único para que otros usuarios puedan unirse.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sync2">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Cómo puedo unirme a un grupo existente?</span>
                                    </button>
                                </h2>
                                <div id="sync2" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Si otro usuario te invitó a un grupo, seguí estos pasos:</p>
                                        <ul class="faq-list">
                                            <li>Desde el <strong>Dashboard</strong>, hacé clic en <strong>“Unirse a un grupo”.</strong></li>
                                            <li>Ingresá el código de invitación que te compartieron.</li>
                                            <li>Hacé clic en <strong>“Unirse al equipo”.</strong></li>
                                        </ul>
                                        <p>Listo, vas a formar parte del grupo y podrás acceder a sus tareas y tableros.</p>
                                    </div>
                                </div>
                            </div>
 
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sync3">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Qué diferencia hay entre un administrador y un miembro del grupo?</span>
                                    </button>
                                </h2>
                                <div id="sync3" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>En CollabPro existen dos roles:</p>
                                        <ol class="faq-list">
                                            <li><strong>Administrador:</strong> puede crear, editar y eliminar tareas, gestionar miembros, ver estadísticas generales y acceder al panel de administración del grupo.</li>
                                            <li><strong>Miembro:</strong> puede visualizar tareas, marcarlas como completadas, participar en el chat y colaborar en las actividades del equipo.</li>
                                        </ol>
                                        <div class="faq-tip">
                                            <i class="bi bi-lightbulb"></i>
                                            <span>El rol se asigna automáticamente al crear el grupo, pero puede modificarse desde la configuración del equipo.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sync4">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Cómo puedo comunicarme con mi equipo dentro de la plataforma?</span>
                                    </button>
                                </h2>
                                <div id="sync4" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>CollabPro incluye un chat integrado en tiempo real para cada grupo. Para usarlo:</p>
                                        <ul class="faq-list">
                                            <li>Ingresá al grupo desde el <strong>Dashboard.</strong></li>
                                            <li>Abrí la pestaña <strong>“Mensajes”.</strong></li>
                                            <li>Seleccioná el miembro con quien querés comunicarte.</li>
                                            <li>Escribí tu mensaje y presioná Enter o hacé clic en el botón de enviar.</li>
                                        </ul>
                                        <div class="faq-warning">
                                            <i class="bi bi-info-circle-fill"></i>
                                            <span><strong>Importante:</strong> Podés ver el historial de mensajes y los nombres y avatares de quienes participan, lo que facilita la comunicación sin salir de la plataforma.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                 
 
                            <!-- Pregunta 5 -->
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sync5">
                                        <i class="bi bi-plus-circle-fill me-3 faq-icon"></i>
                                        <span class="faq-question-text">¿Cómo puedo gestionar los miembros de mi grupo?</span>
                                    </button>
                                </h2>
                                <div id="sync5" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <p>Para administrar los integrantes del grupo:</p>
                                        <ol class="faq-list">
                                            <li>Ingresá al grupo desde el <strong>Dashboard.</strong></li>
                                            <li>Abrí la pestaña <strong>“Miembros”.</strong></li>
                                        </ol>
                                        <div class="faq-tip">
                                            <i class="bi bi-lightbulb"></i>
                                            <span>Desde ahí podés ver todos los integrantes, asignar o quitar roles y, si sos administrador, eliminar usuarios o volver a compartir el código de invitación para sumar nuevos miembros.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>

    <!-- Footer -->
    <!-- ========================================
        FOOTER
        ========================================= -->
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
                        <li><a href="{{ route('home') }}">Características</a></li>
                        <li><a href="{{ route('home') }}">Cómo funciona</a></li>
                        <li><a href="{{ route('register') }}">Crear Cuenta</a></li>
                        <li><a href="{{ route('login') }}">Iniciar Sesion</a></li>
                    </ul>
                </div>
                
                <!-- Links Recursos -->
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="300">
                    <h6 class="footer-title mb-3">Recursos</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#">Documentación</a></li>
                        <li><a href="#">Tutoriales</a></li>
                        <li><a href="{{ route('support') }}">Soporte</a></li>
                        <li><a href="{{ route('contact') }}">Contacto</a></li>
                    </ul>
                </div>
                
                <!-- Links Legal -->
                <div class="col-lg-2 col-md-6 col-6" data-aos="fade-up" data-aos-delay="400">
                    <h6 class="footer-title mb-3">Legal</h6>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ route('privacy') }}" target="_blank">Privacidad</a></li>
                        <li><a href="{{ route('terms') }}" target="_blank">Términos</a></li>
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