<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $equipo->nombre }} - CollabPro</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .container-custom {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Avatares en tarjetas de grupos */
        .avatar-group .avatar {
            padding: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .avatar-group .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Wrapper para iniciales cuando no hay imagen */
        .avatar-initials {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        /* Asegurar que el botón dropdown esté posicionado correctamente */
        .member-card .dropdown {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 10;
        }

        /* Estilos adicionales para el menú de acciones */
        .member-card {
            position: relative;
            overflow: visible !important;
        }

        .member-card .dropdown .btn {
            border: none;
            background: white;
            color: #64748b;
            padding: 0.25rem 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .member-card .dropdown .btn:hover {
            background: #f1f5f9;
            color: #1e293b;
        }

        .dropdown-menu {
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            min-width: 200px;
            z-index: 2000 !important;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        .dropdown-item:hover {
            background: #f1f5f9;
        }

        .dropdown-item.text-danger:hover {
            background: #fee2e2;
            color: #dc2626 !important;
        }

        .dropdown-item form {
            margin: 0;
        }

        .dropdown-item button {
            background: none;
            border: none;
            padding: 0;
            width: 100%;
            text-align: left;
            cursor: pointer;
            color: inherit;
            font-size: inherit;
        }

        .dropdown-item.disabled {
            pointer-events: none;
            opacity: 0.6;
        }
        

        /* Popover personalizado */
        .popover {
            z-index: 1500 !important;
        }

        .popover-body {
            padding: 1rem;
        }

        /* Avatar con hover */
        .member-avatar-large {
            transition: transform 0.2s ease;
        }

        .member-avatar-large:hover {
            transform: scale(1.05);
        }

        /* Avatar grande en lista de miembros */
        .member-avatar-large {
            padding: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .member-avatar-large img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Header del equipo */
        .team-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }

        .team-header-content {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .team-icon-large {
            width: 80px;
            height: 80px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            flex-shrink: 0;
            overflow: hidden;
        }

        .team-icon-large img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .team-info {
            flex: 1;
            min-width: 0;
        }

        .team-name {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .team-description {
            color: #64748b;
            margin-bottom: 1rem;
        }

        .team-stats {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .stat-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #475569;
        }

        .stat-badge i {
            color: #667eea;
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

        /* Tabs/Navegación */
        .nav-tabs-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 0.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border: none;
        }

        .nav-tabs-custom .nav-link {
            border: none;
            border-radius: 12px;
            padding: 0.875rem 1.5rem;
            color: #64748b;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-tabs-custom .nav-link:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }

        .nav-tabs-custom .nav-link.active {
            background: linear-gradient(135deg, #667eea 0%, #2563eb 100%);
            color: white;
        }

        /* Tablero Kanban */
        .kanban-board {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .kanban-column {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .kanban-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .kanban-title {
            font-weight: 700;
            font-size: 1.1rem;
            color: #1e293b;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .kanban-count {
            background: #f1f5f9;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #64748b;
        }

        .kanban-tasks {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            min-height: 200px;
        }

        /* Tarjeta de tarea */
        .task-card {
            background: white;
            border-radius: 12px;
            padding: 1rem;
            border: 2px solid #f1f5f9;
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
        }

        .task-card:hover {
            border-color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
        }

        /* Indicador de tarea no movible */
        .task-card[draggable="false"]::before {
            content: '🔒';
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            font-size: 0.75rem;
            opacity: 0.5;
        }

        /* Indicador de tarea movible */
        .task-card[draggable="true"]::before {
            content: '⋮⋮';
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            font-size: 1rem;
            opacity: 0.3;
            font-weight: bold;
            letter-spacing: -2px;
        }

        .task-title {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .task-description {
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 0.75rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .task-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .task-priority {
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
        }

        .task-assignee {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: #64748b;
        }

        .assignee-avatar {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #2563eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 600;
            color: white;
        }

        .task-date {
            font-size: 0.75rem;
            color: #94a3b8;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .task-date.overdue {
            color: #ef4444;
            font-weight: 600;
        }

        .task-date.soon {
            color: #f59e0b;
            font-weight: 600;
        }

        /* Avatares del podio */
        .podium-avatar {
            padding: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .podium-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Avatares de la lista de ranking */
        .ranking-avatar {
            padding: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ranking-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Iniciales cuando no hay imagen */
        .avatar-initials {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        /* Botón crear tarea */
        .btn-create-task {
            width: 100%;
            padding: 0.875rem;
            background: linear-gradient(135deg, #667eea 0%, #2563eb 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-create-task:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        /* Lista de miembros */
        .members-list {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .member-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: white;
            border-radius: 12px;
            margin-bottom: 2rem;
            border: 2px solid #f1f5f9;
            transition: all 0.3s;
            position: relative;
            overflow: visible !important;
            z-index: auto;
        }

        .member-card:hover {
            border-color: #667eea;
            transform: translateX(5px);
            z-index: 100;
        }

        .member-avatar-large {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea 0%, #2563eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .member-info {
            flex: 1;
            min-width: 0;
        }

        .member-name {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }

        .member-role {
            font-size: 0.85rem;
            color: #64748b;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .member-stats {
            display: flex;
            gap: 1.5rem;
            text-align: center;
        }

        .member-stat {
            display: flex;
            flex-direction: column;
        }

        .member-stat-value {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
        }

        .member-stat-label {
            font-size: 0.75rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #94a3b8;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        /* Código de invitación */
        .invitation-code-box {
            background: linear-gradient(135deg, #667eea 0%, #2563eb 100%);
            color: white;
            border-radius: 12px;
            padding: 1.25rem;
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .invitation-code {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 0.2rem;
            font-family: 'Courier New', monospace;
        }

        .btn-copy-code {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-copy-code:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Drag and drop styles */
        .task-card.dragging {
            opacity: 0.5;
            cursor: grabbing;
        }

        .task-card:not(.dragging) {
            cursor: grab;
        }

        .task-card[draggable="false"] {
            cursor: pointer !important;
            opacity: 0.85;
            border-color: #e2e8f0;
        }

        .task-card[draggable="false"]:hover {
            border-color: #cbd5e1;
            transform: none;
        }

        .kanban-tasks.drag-over {
            background: rgba(102, 126, 234, 0.05);
            border: 2px dashed #667eea;
            border-radius: 12px;
        }

        /* Alertas */
        .alert {
            border-radius: 12px;
            border: none;
            margin-bottom: 1.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 1rem 0.5rem;
            }

            .container-custom {
                padding: 0;
            }

            .back-link {
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }

            .team-header {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .team-header-content {
                flex-direction: column;
                text-align: center;
                align-items: center;
            }

            .team-icon-large {
                width: 60px;
                height: 60px;
                font-size: 2rem;
            }

            .team-name {
                font-size: 1.5rem;
            }

            .team-description {
                font-size: 0.9rem;
            }

            .team-stats {
                flex-direction: column;
                gap: 0.75rem;
                width: 100%;
            }

            .stat-badge {
                justify-content: center;
                width: 100%;
                padding: 0.5rem;
                background: rgba(102, 126, 234, 0.05);
                border-radius: 8px;
            }

            .invitation-code-box {
                flex-direction: column;
                text-align: center;
                padding: 1rem;
            }

            .invitation-code {
                font-size: 1.25rem;
                letter-spacing: 0.15rem;
            }

            .btn-copy-code {
                width: 100%;
            }

            /* Tabs */
            .nav-tabs-custom {
                padding: 0.25rem;
                margin-bottom: 1.5rem;
                overflow-x: auto;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .nav-tabs-custom .nav-link {
                padding: 0.75rem 1rem;
                font-size: 0.85rem;
                display: inline-flex;
            }

            /* Kanban */
            .kanban-board {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .kanban-column {
                padding: 1rem;
            }

            .kanban-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .kanban-title {
                font-size: 1rem;
            }

            .btn-create-task {
                padding: 0.75rem;
                font-size: 0.95rem;
            }

            /* Task cards */
            .task-card {
                padding: 0.875rem;
            }

            .task-title {
                font-size: 0.9rem;
                padding-right: 1.5rem;
            }

            .task-description {
                font-size: 0.8rem;
            }

            .task-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .task-priority {
                font-size: 0.7rem;
                padding: 0.2rem 0.6rem;
            }

            .task-assignee {
                font-size: 0.8rem;
            }

            .task-date {
                font-size: 0.7rem;
            }

            /* Miembros */
            .members-list {
                padding: 1rem;
            }

            .members-list h3 {
                font-size: 1.25rem;
                margin-bottom: 1rem;
            }

            .member-card {
                padding: 0.875rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .member-avatar-large {
                width: 40px;
                height: 40px;
                font-size: 0.9rem;
            }

            .member-info {
                width: 100%;
            }

            .member-name {
                font-size: 0.95rem;
            }

            .member-role {
                font-size: 0.8rem;
            }

            .member-stats {
                width: 100%;
                justify-content: space-around;
                gap: 1rem;
            }

            .member-stat-value {
                font-size: 1.1rem;
            }

            .member-stat-label {
                font-size: 0.7rem;
            }

            /* Modales */
            .modal-dialog {
                margin: 0.5rem;
                max-width: calc(100% - 1rem);
            }

            .modal-content {
                border-radius: 12px;
            }

            .modal-header {
                padding: 1rem;
            }

            .modal-title {
                font-size: 1.1rem;
            }

            .modal-body {
                padding: 1rem;
            }

            .modal-footer {
                padding: 1rem;
                flex-direction: column;
                gap: 0.5rem;
            }

            .modal-footer .btn {
                width: 100%;
                margin: 0;
            }

            /* Form controls en modal */
            .modal .form-label {
                font-size: 0.9rem;
            }

            .modal .form-control,
            .modal .form-select {
                font-size: 0.9rem;
                padding: 0.65rem 0.75rem;
            }

            .modal .row {
                margin-left: 0;
                margin-right: 0;
            }

            .modal .row > [class*='col'] {
                padding-left: 0;
                padding-right: 0;
            }

            /* Calendario */
            .task-footer {
                flex-wrap: wrap;
            }

            /* Empty state */
            .empty-state {
                padding: 2rem 1rem;
            }

            .empty-state i {
                font-size: 2.5rem;
            }

            .empty-state p {
                font-size: 0.9rem;
            }

            /* Drag indicators */
            .task-card[draggable="true"]::before,
            .task-card[draggable="false"]::before {
                top: 0.25rem;
                right: 0.25rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .team-name {
                font-size: 1.25rem;
            }

            .invitation-code {
                font-size: 1.1rem;
                letter-spacing: 0.1rem;
            }

            .kanban-title {
                font-size: 0.95rem;
            }

            .task-title {
                font-size: 0.85rem;
            }

            .member-name {
                font-size: 0.9rem;
            }
        }

        /* Estilos para el Podio del Ranking */
        .podium-card {
            width: 100%;
            border-radius: 16px 16px 0 0;
            padding: 1.5rem 1rem;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            position: relative;
        }

        .podium-trophy {
            position: absolute;
            top: 1rem;
            font-size: 2rem;
            opacity: 0.5;
        }

        .podium-avatar {
            width: 60px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            border: 3px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .podium-name {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }

        .podium-points {
            font-size: 0.9rem;
            font-weight: 500;
            opacity: 0.9;
            margin-bottom: 1rem;
        }

        .podium-position {
            font-weight: 800;
            line-height: 1;
        }

        /* Estilos para la lista del ranking */
        .ranking-list-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: white;
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 0.75rem;
            border: 2px solid #f1f5f9;
        }

        .ranking-position { font-weight: 700; color: #64748b; font-size: 1.1rem; width: 25px; text-align: center; }
        .ranking-avatar { width: 40px; height: 40px; border-radius: 50%; background: #667eea; color: white; display: flex; align-items: center; justify-content: center; font-weight: 600; }
        .ranking-name { flex: 1; font-weight: 600; color: #1e293b; }
        .ranking-points { font-weight: 700; color: #2563eb; font-size: 1.1rem; }

        @media (max-width: 576px) {
            .podium-card { padding: 1rem 0.5rem; }
            .podium-avatar { width: 50px; height: 50px; font-size: 1.2rem; }
            .podium-name { font-size: 0.85rem; }
            .podium-points { font-size: 0.8rem; }
            .podium-position { font-size: 2rem !important; }
        }

        /* FIX: Dropdown visible */
        .members-list {
            overflow: visible !important;
        }

        .tab-pane {
            overflow: visible !important;
        }

        .tab-content {
            overflow: visible !important;
        }

        .modal-backdrop {
            z-index: 3990 !important;
        }
        .modal-backdrop.show {
            opacity: 0.6 !important;
        }

        .modal {
            z-index: 4000 !important; /* Superior a otros elementos */
        }

        .member-card .dropdown-menu {
            z-index: 2000 !important;
        }

        .member-card .dropdown .btn {
            z-index: 1 !important;
            position: relative;
        }

        .member-card .dropdown.show .dropdown-menu {
            display: block;
            z-index: 3000 !important;
            position: absolute;
        }

        .members-list,
        .tab-pane,
        .tab-content {
            overflow: visible !important;
        }
    </style>
</head>
<body>

    <div class="container-custom">
        <a href="{{ route('dashboard') }}" class="back-link">
            <i class="bi bi-arrow-left"></i>
            Volver al Dashboard
        </a>

        <!-- Alertas -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Header del equipo -->
        <div class="team-header">
            <div class="team-header-content">
                @if($equipo->imagen_url)
                    <div class="team-icon-large">
                        <img src="{{ $equipo->imagen_url }}" alt="{{ $equipo->nombre }}">
                    </div>
                @else
                    <div class="team-icon-large" style="background: {{ $equipo->color }};">
                        <i class="{{ $equipo->icono }}"></i>
                    </div>
                @endif

                <div class="team-info">
                    <h1 class="team-name">{{ $equipo->nombre }}</h1>
                    @if($equipo->descripcion)
                        <p class="team-description">{{ $equipo->descripcion }}</p>
                    @endif
                    <div class="team-stats">
                        <div class="stat-badge">
                            <i class="bi bi-people-fill"></i>
                            <span><strong>{{ $equipo->total_miembros }}</strong> miembros</span>
                        </div>
                        <div class="stat-badge">
                            <i class="bi bi-list-task"></i>
                            <span><strong>{{ $tareasPorHacer->count() + $tareasEnProgreso->count() + $tareasCompletadas->count() }}</strong> tareas</span>
                        </div>
                        <div class="stat-badge">
                            <i class="bi bi-trophy-fill"></i>
                            <span><strong>{{ $puntosUsuario }}</strong> puntos</span>
                        </div>
                        <div class="stat-badge">
                            @if($esAdmin)
                                <i class="bi bi-star-fill" style="color: #fbbf24;"></i>
                                <span><strong>Administrador</strong></span>
                            @else
                                <i class="bi bi-person"></i>
                                <span><strong>Miembro</strong></span>
                            @endif
                        </div>
                    </div>

                    @if($esAdmin)
                    <!-- Código de invitación (solo para admins) -->
                    <div class="invitation-code-box">
                        <div>
                            <div style="font-size: 0.85rem; opacity: 0.9; margin-bottom: 0.25rem;">Código de invitación:</div>
                            <div class="invitation-code" id="invitationCode">{{ $equipo->codigo_invitacion }}</div>
                        </div>
                        <button type="button" class="btn-copy-code" onclick="copiarCodigo()">
                            <i class="bi bi-clipboard"></i> Copiar
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tabs de navegación -->
        <ul class="nav nav-tabs nav-tabs-custom" id="teamTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tasks-tab" data-bs-toggle="tab" data-bs-target="#tasks" type="button">
                    <i class="bi bi-kanban"></i>
                    Tareas
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="calendar-tab" data-bs-toggle="tab" data-bs-target="#calendar" type="button">
                    <i class="bi bi-calendar3"></i>
                    Calendario
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="workload-tab" data-bs-toggle="tab" data-bs-target="#workload" type="button">
                    <i class="bi bi-graph-up"></i>
                    Miembros
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="workload-tab" data-bs-toggle="tab" data-bs-target="#Ranking" type="button">
                    <i class="bi bi-trophy-fill"></i>
                    Ranking
                </button>
            </li>
        </ul>

        <!-- Contenido de los tabs -->
        <div class="tab-content" id="teamTabsContent">
            
            <!-- Tab: Tareas (Kanban) -->
            <div class="tab-pane fade show active" id="tasks" role="tabpanel">
                @if($esAdmin)
                <button class="btn-create-task mb-3" data-bs-toggle="modal" data-bs-target="#createTaskModal">
                    <i class="bi bi-plus-circle"></i>
                    Crear Nueva Tarea
                </button>
                @endif

                <div class="kanban-board">
                    <!-- Columna: Por Hacer -->
                    <div class="kanban-column">
                        <div class="kanban-header">
                            <div class="kanban-title">
                                <i class="bi bi-circle" style="color: #94a3b8;"></i>
                                Por Hacer
                            </div>
                            <span class="kanban-count">{{ $tareasPorHacer->count() }}</span>
                        </div>
                        <div class="kanban-tasks" data-estado="por_hacer">
                            @forelse($tareasPorHacer as $tarea)
                                <div class="task-card" 
                                     draggable="{{ ($esAdmin || $tarea->asignado_a == Auth::id()) ? 'true' : 'false' }}" 
                                     data-tarea-id="{{ $tarea->id }}"
                                     data-bs-toggle="modal" 
                                     data-bs-target="#taskDetailModal{{ $tarea->id }}"
                                     ondragstart="drag(event)"
                                     ondragend="dragEnd(event)"
                                     style="{{ ($esAdmin || $tarea->asignado_a == Auth::id()) ? '' : 'cursor: pointer;' }}">
                                    <div class="task-title">{{ $tarea->titulo }}</div>
                                    @if($tarea->descripcion)
                                        <div class="task-description">{{ $tarea->descripcion }}</div>
                                    @endif
                                    <div class="task-footer">
                                        <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                                            <span class="task-priority" style="background: {{ $tarea->color_prioridad }};">
                                                {{ $tarea->texto_prioridad }}
                                            </span>
                                            @if($tarea->fecha_vencimiento)
                                                <span class="task-date {{ $tarea->estaVencida() ? 'overdue' : ($tarea->estaPorVencer() ? 'soon' : '') }}">
                                                    <i class="bi bi-calendar"></i>
                                                    {{ $tarea->fecha_vencimiento->format('d/m/Y H:i') }}
                                                </span>
                                            @endif
                                        </div>
                                        @if($tarea->asignado)
                                            <div class="task-assignee">
                                                <div class="assignee-avatar">{{ $tarea->asignado->initials }}</div>
                                                <span>{{ $tarea->asignado->nombre }}</span>
                                            </div>
                                        @else
                                            <div class="task-assignee">
                                                <i class="bi bi-person-dash" style="color: #cbd5e1;"></i>
                                                <span style="color: #cbd5e1;">Sin asignar</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <p>No hay tareas pendientes</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Columna: En Progreso -->
                    <div class="kanban-column">
                        <div class="kanban-header">
                            <div class="kanban-title">
                                <i class="bi bi-arrow-clockwise" style="color: #f59e0b;"></i>
                                En Progreso
                            </div>
                            <span class="kanban-count">{{ $tareasEnProgreso->count() }}</span>
                        </div>
                        <div class="kanban-tasks" data-estado="en_progreso">
                            @forelse($tareasEnProgreso as $tarea)
                                <div class="task-card" 
                                     draggable="{{ ($esAdmin || $tarea->asignado_a == Auth::id()) ? 'true' : 'false' }}" 
                                     data-tarea-id="{{ $tarea->id }}"
                                     data-bs-toggle="modal" 
                                     data-bs-target="#taskDetailModal{{ $tarea->id }}"
                                     ondragstart="drag(event)"
                                     ondragend="dragEnd(event)"
                                     style="{{ ($esAdmin || $tarea->asignado_a == Auth::id()) ? '' : 'cursor: pointer;' }}">
                                    <div class="task-title">{{ $tarea->titulo }}</div>
                                    @if($tarea->descripcion)
                                        <div class="task-description">{{ $tarea->descripcion }}</div>
                                    @endif
                                    <div class="task-footer">
                                        <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                                            <span class="task-priority" style="background: {{ $tarea->color_prioridad }};">
                                                {{ $tarea->texto_prioridad }}
                                            </span>
                                            @if($tarea->fecha_vencimiento)
                                                <span class="task-date {{ $tarea->estaVencida() ? 'overdue' : ($tarea->estaPorVencer() ? 'soon' : '') }}">
                                                    <i class="bi bi-calendar"></i>
                                                    {{ $tarea->fecha_vencimiento->format('d/m/Y') }}
                                                </span>
                                            @endif
                                        </div>
                                        @if($tarea->asignado)
                                            <div class="task-assignee">
                                                <div class="assignee-avatar">{{ $tarea->asignado->initials }}</div>
                                                <span>{{ $tarea->asignado->nombre }}</span>
                                            </div>
                                        @else
                                            <div class="task-assignee">
                                                <i class="bi bi-person-dash" style="color: #cbd5e1;"></i>
                                                <span style="color: #cbd5e1;">Sin asignar</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <p>No hay tareas en progreso</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Columna: Completadas -->
                    <div class="kanban-column">
                        <div class="kanban-header">
                            <div class="kanban-title">
                                <i class="bi bi-check-circle-fill" style="color: #10b981;"></i>
                                Completadas
                            </div>
                            <span class="kanban-count">{{ $tareasCompletadas->count() }}</span>
                        </div>
                        <div class="kanban-tasks" data-estado="completada">
                            @forelse($tareasCompletadas as $tarea)
                                <div class="task-card" 
                                     draggable="true" 
                                     data-tarea-id="{{ $tarea->id }}"
                                     data-bs-toggle="modal" 
                                     data-bs-target="#taskDetailModal{{ $tarea->id }}"
                                     ondragstart="drag(event)"
                                     ondragend="dragEnd(event)">
                                    <div class="task-title" style="text-decoration: line-through; opacity: 0.7;">{{ $tarea->titulo }}</div>
                                    @if($tarea->descripcion)
                                        <div class="task-description">{{ $tarea->descripcion }}</div>
                                    @endif
                                    <div class="task-footer">
                                        <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                                            <span class="task-priority" style="background: {{ $tarea->color_prioridad }};">
                                                {{ $tarea->texto_prioridad }}
                                            </span>
                                            @if($tarea->puntos > 0)
                                                <span style="font-size: 0.75rem; color: #10b981; font-weight: 600;">
                                                    <i class="bi bi-trophy-fill"></i> +{{ $tarea->puntos }} pts
                                                </span>
                                            @endif
                                        </div>
                                        @if($tarea->asignado)
                                            <div class="task-assignee">
                                                <div class="assignee-avatar">{{ $tarea->asignado->initials }}</div>
                                                <span>{{ $tarea->asignado->nombre }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <p>No hay tareas completadas aún</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab: Calendario -->
            <div class="tab-pane fade" id="calendar" role="tabpanel">
                <div class="members-list">
                    <h3 style="margin-bottom: 1.5rem; color: #1e293b; font-weight: 700;">
                        <i class="bi bi-calendar3 me-2"></i>
                        Tareas por Fecha
                    </h3>

                    @php
                        $todasLasTareas = collect()
                            ->merge($tareasPorHacer)
                            ->merge($tareasEnProgreso)
                            ->merge($tareasCompletadas)
                            ->filter(function($tarea) {
                                return $tarea->fecha_vencimiento !== null;
                            })
                            ->sortBy('fecha_vencimiento');
                        
                        $tareasPorFecha = $todasLasTareas->groupBy(function($tarea) {
                            return $tarea->fecha_vencimiento->format('Y-m-d');
                        });
                    @endphp

                    @forelse($tareasPorFecha as $fecha => $tareas)
                        @php
                            $fechaObj = \Carbon\Carbon::parse($fecha);
                            $esHoy = $fechaObj->isToday();
                            $esMañana = $fechaObj->isTomorrow();
                            $esAyer = $fechaObj->isYesterday();
                        @endphp

                        <div style="margin-bottom: 2rem;">
                            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem; padding-bottom: 0.75rem; border-bottom: 2px solid #e2e8f0; flex-wrap: wrap;">
                                <h4 style="margin: 0; color: #1e293b; font-weight: 700; font-size: clamp(1rem, 4vw, 1.25rem);">
                                    @if($esHoy)
                                        🔴 Hoy
                                    @elseif($esMañana)
                                        🟡 Mañana
                                    @elseif($esAyer)
                                        Ayer
                                    @else
                                        {{ $fechaObj->locale('es')->isoFormat('dddd, D [de] MMMM') }}
                                    @endif
                                </h4>
                                <span style="color: #64748b; font-size: clamp(0.8rem, 2.5vw, 0.9rem);">
                                    ({{ $tareas->count() }} {{ $tareas->count() === 1 ? 'tarea' : 'tareas' }})
                                </span>
                            </div>

                            @foreach($tareas as $tarea)
                                <div class="task-card" style="margin-bottom: 1rem;" data-bs-toggle="modal" data-bs-target="#taskDetailModal{{ $tarea->id }}">
                                    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 0.5rem;">
                                        <div class="task-title" style="{{ $tarea->estado === 'completada' ? 'text-decoration: line-through; opacity: 0.7;' : '' }}">
                                            {{ $tarea->titulo }}
                                        </div>
                                        <span class="task-priority" style="background: {{ $tarea->color_prioridad }}; flex-shrink: 0;">
                                            {{ $tarea->texto_prioridad }}
                                        </span>
                                    </div>

                                    @if($tarea->descripcion)
                                        <div class="task-description">{{ $tarea->descripcion }}</div>
                                    @endif

                                    <div class="task-footer">
                                        <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                                            <span class="task-date {{ $tarea->estaVencida() ? 'overdue' : ($tarea->estaPorVencer() ? 'soon' : '') }}">
                                                <i class="bi bi-clock"></i>
                                                {{ $tarea->fecha_vencimiento->format('H:i') }}
                                            </span>
                                            <span style="padding: 0.25rem 0.75rem; background: #f1f5f9; border-radius: 6px; font-size: 0.75rem; font-weight: 600;">
                                                {{ $tarea->texto_estado }}
                                            </span>
                                        </div>
                                        @if($tarea->asignado)
                                            <div class="task-assignee">
                                                <div class="assignee-avatar">{{ $tarea->asignado->initials }}</div>
                                                <span>{{ $tarea->asignado->nombre }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="bi bi-calendar-x"></i>
                            <p>No hay tareas con fecha de vencimiento</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Tab: Miembros -->
            <div class="tab-pane fade" id="workload" role="tabpanel">
                <div class="members-list">
                    <h3 style="margin-bottom: 1.5rem; color: #1e293b; font-weight: 700;">
                        <i class="bi bi-people-fill me-2"></i>
                        Miembros del Equipo
                    </h3>

                    @foreach($miembros as $miembro)
                    <div class="member-card">
                        <!-- Avatar que abre el modal -->
                        <div class="member-avatar-large"
                            style="cursor: pointer;"
                            data-bs-toggle="modal"
                            data-bs-target="#memberModal{{ $miembro['id'] }}">
                            @if($miembro['avatar_url'])
                                <img src="{{ $miembro['avatar_url'] }}" alt="{{ $miembro['nombre'] }}">
                            @else
                                {{ $miembro['iniciales'] }}
                            @endif
                        </div>

                        <div class="member-info">
                            <div class="member-name">{{ $miembro['nombre'] }}</div>
                            <div class="member-role">
                                @if($miembro['es_admin'])
                                    <i class="bi bi-star-fill" style="color: #fbbf24;"></i>
                                    Administrador
                                @else
                                    <i class="bi bi-person"></i>
                                    Miembro
                                @endif
                            </div>
                        </div>

                        <div class="member-stats">
                            <div class="member-stat">
                                <div class="member-stat-value">{{ $miembro['tareas_asignadas'] }}</div>
                                <div class="member-stat-label">Tareas</div>
                            </div>
                            <div class="member-stat">
                                <div class="member-stat-value">{{ $miembro['tareas_completadas'] }}</div>
                                <div class="member-stat-label">Completadas</div>
                            </div>
                            <div class="member-stat">
                                <div class="member-stat-value">{{ $miembro['puntos'] }}</div>
                                <div class="member-stat-label">Puntos</div>
                            </div>
                        </div>

                        <!-- Menú de acciones (solo para administradores) -->
                        @if($esAdmin)
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if($miembro['id'] !== Auth::id() && $equipo->creador_id !== $miembro['id'])
                                    @if($miembro['es_admin'])
                                        <!-- Cambiar a miembro -->
                                        <li>
                                            <form action="{{ route('equipos.change-role', [$equipo->id, $miembro['id']]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="rol" value="miembro">
                                                <button type="submit" class="dropdown-item">
                                                    <i class="bi bi-person me-2"></i>
                                                    Cambiar a Miembro
                                                </button>
                                            </form>
                                        </li>
                                    @else
                                        <!-- Cambiar a admin -->
                                        <li>
                                            <form action="{{ route('equipos.change-role', [$equipo->id, $miembro['id']]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="rol" value="admin">
                                                <button type="submit" class="dropdown-item">
                                                    <i class="bi bi-star me-2"></i>
                                                    Hacer Administrador
                                                </button>
                                            </form>
                                        </li>
                                    @endif
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('equipos.remove-member', [$equipo->id, $miembro['id']]) }}" 
                                            method="POST" 
                                            onsubmit="return confirm('¿Estás seguro de que deseas eliminar a {{ $miembro['nombre'] }} del equipo?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-trash me-2"></i>
                                                Eliminar del Equipo
                                            </button>
                                        </form>
                                    </li>
                                @else
                                    <li>
                                        <span class="dropdown-item text-muted disabled">
                                            @if($equipo->creador_id === $miembro['id'])
                                                <i class="bi bi-info-circle me-2"></i>
                                                Creador del equipo
                                            @else
                                                <i class="bi bi-info-circle me-2"></i>
                                                Este eres tú
                                            @endif
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        @endif
                    </div>

                    @endforeach
                </div>
            </div>

            

            <!-- Tab: Ranking -->
<div class="tab-pane fade" id="Ranking" role="tabpanel">
    <div class="members-list">
        <h3 style="margin-bottom: 1.5rem; color: #1e293b; font-weight: 700;">
            <i class="bi bi-people-fill me-2"></i>
            Ranking de puntos del equipo
        </h3>

        @php
            // Ordenar miembros por puntos para el ranking
            $rankingMiembros = $miembros->sortByDesc('puntos')->values();
        @endphp

        @if($rankingMiembros->count() > 0)
            <!-- Podio -->
            <div class="row justify-content-center text-center mb-5">
                <!-- Segundo Lugar -->
                @if($rankingMiembros->has(1))
                    <div class="col-4 d-flex align-items-end">
                        <div class="podium-card" style="height: 85%; background: linear-gradient(135deg, #c5c5c5ff, #bdbdbdff);">
                            <div class="podium-avatar">
                                @if($rankingMiembros[1]['avatar_url'])
                                    <img src="{{ $rankingMiembros[1]['avatar_url'] }}" alt="{{ $rankingMiembros[1]['nombre'] }}">
                                @else
                                    <div class="avatar-initials">{{ $rankingMiembros[1]['iniciales'] }}</div>
                                @endif
                            </div>
                            <div class="podium-name">{{ $rankingMiembros[1]['nombre'] }}</div>
                            <div class="podium-points">{{ $rankingMiembros[1]['puntos'] }} pts</div>
                            <div class="podium-position" style="font-size: 3rem;">2</div>
                        </div>
                    </div>
                @endif

                <!-- Primer Lugar -->
                @if($rankingMiembros->has(0))
                    <div class="col-4 d-flex align-items-end">
                        <div class="podium-card" style="height: 100%; background: linear-gradient(135deg, #ffc400ff, #f0c400);">
                            <i class="bi bi-trophy-fill podium-trophy"></i>
                            <div class="podium-avatar">{{ $rankingMiembros[0]['iniciales'] }}</div>
                            <div class="podium-name">{{ $rankingMiembros[0]['nombre'] }}</div>
                            <div class="podium-points">{{ $rankingMiembros[0]['puntos'] }} pts</div>
                            <div class="podium-position" style="font-size: 4rem;">1</div>
                        </div>
                    </div>
                @endif

                <!-- Tercer Lugar -->
                @if($rankingMiembros->has(2))
                    <div class="col-4 d-flex align-items-end">
                        <div class="podium-card" style="height: 70%; background: linear-gradient(135deg, #d48a40ff, #cc8c4bff);">
                            <div class="podium-avatar">{{ $rankingMiembros[2]['iniciales'] }}</div>
                            <div class="podium-name">{{ $rankingMiembros[2]['nombre'] }}</div>
                            <div class="podium-points">{{ $rankingMiembros[2]['puntos'] }} pts</div>
                            <div class="podium-position" style="font-size: 2.5rem;">3</div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Lista del resto de miembros -->
            @if($rankingMiembros->count() > 3)
                <h4 style="color: #1e293b; font-weight: 600; margin-bottom: 1rem;">Resto del Ranking</h4>
                @foreach($rankingMiembros->slice(3) as $index => $miembro)
                    <div class="ranking-list-item">
                        <div class="ranking-position">{{ $index + 4 }}</div>
                        <div class="ranking-avatar">{{ $miembro['iniciales'] }}</div>
                        <div class="ranking-name">{{ $miembro['nombre'] }}</div>
                        <div class="ranking-points">{{ $miembro['puntos'] }} pts</div>
                    </div>
                @endforeach
            @endif
        @else
            <div class="empty-state">No hay miembros en el equipo para mostrar un ranking.</div>
        @endif
    </div>
</div>
    

    <!-- Modal: Crear Tarea -->
    <div class="modal fade" id="createTaskModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="border-radius: 16px; border: none;">
                <form action="{{ route('tareas.store', $equipo->id) }}" method="POST">
                    @csrf
                    <div class="modal-header" style="border-bottom: 1px solid #f1f5f9;">
                        <h5 class="modal-title" style="font-weight: 700; color: #1e293b;">
                            <i class="bi bi-plus-circle me-2"></i>Crear Nueva Tarea
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Título -->
                        <div class="mb-3">
                            <label for="titulo" class="form-label fw-bold">Título *</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required maxlength="20" placeholder="Ej: Diseñar landing page">
                        </div>

                        <!-- Descripción -->
                        <div class="mb-3">
                            <label for="descripcion" class="form-label fw-bold">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" maxlength="200" placeholder="Describe los detalles de la tarea..."></textarea>
                        </div>

                        <div class="row">
                            <!-- Prioridad -->
                            <div class="col-md-6 mb-3">
                                <label for="prioridad" class="form-label fw-bold">Prioridad *</label>
                                <select class="form-select" id="prioridad" name="prioridad" required>
                                    <option value="baja">🟢 Baja</option>
                                    <option value="media" selected>🟡 Media</option>
                                    <option value="alta">🔴 Alta</option>
                                </select>
                            </div>

                            <!-- Puntos -->
                            <div class="col-md-6 mb-3">
                                <label for="puntos" class="form-label fw-bold">Puntos</label>
                                <input type="number" class="form-control" id="puntos" name="puntos" min="0" max="1000" value="0" placeholder="0">
                                <small class="text-muted">Puntos que otorga al completarla</small>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Asignar a -->
                            <div class="col-md-6 mb-3">
                                <label for="asignado_a" class="form-label fw-bold">Asignar a *</label>
                                <select class="form-select" id="asignado_a" name="asignado_a" required>
                                    <option value="">Selecciona un miembro...</option>
                                    @foreach($miembros as $miembro)
                                        <option value="{{ $miembro['id'] }}">
                                            {{ $miembro['nombre'] }} 
                                            @if($miembro['es_admin']) ⭐ @endif
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Obligatorio - La tarea debe tener un responsable</small>
                            </div>

                            <!-- Fecha de vencimiento -->
                            <div class="col-md-6 mb-3">
                                <label for="fecha_vencimiento" class="form-label fw-bold">Fecha y hora de vencimiento</label>
                                <input type="datetime-local" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" min="{{ now()->format('Y-m-d\TH:i') }}">
                                <small class="text-muted">Opcional</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #f1f5f9;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Crear Tarea
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modals para detalles de tareas (se generan dinámicamente) -->
    @foreach([$tareasPorHacer, $tareasEnProgreso, $tareasCompletadas] as $listaTareas)
        @foreach($listaTareas as $tarea)
        <div class="modal fade" id="taskDetailModal{{ $tarea->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 16px; border: none;">
                    <div class="modal-header" style="border-bottom: 1px solid #f1f5f9;">
                        <h5 class="modal-title" style="font-weight: 700; color: #1e293b;">
                            {{ $tarea->titulo }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div style="margin-bottom: 1rem;">
                            <span class="task-priority" style="background: {{ $tarea->color_prioridad }};">
                                {{ $tarea->texto_prioridad }}
                            </span>
                            <span style="margin-left: 0.5rem; padding: 0.25rem 0.75rem; background: #f1f5f9; border-radius: 6px; font-size: 0.85rem; font-weight: 600;">
                                {{ $tarea->texto_estado }}
                            </span>
                        </div>

                        @if($tarea->descripcion)
                        <div style="margin-bottom: 1rem;">
                            <strong style="color: #1e293b; display: block; margin-bottom: 0.5rem;">Descripción:</strong>
                            <p style="color: #64748b; margin: 0;">{{ $tarea->descripcion }}</p>
                        </div>
                        @endif

                        <div style="margin-bottom: 1rem;">
                            <strong style="color: #1e293b; display: block; margin-bottom: 0.5rem;">Asignado a:</strong>
                            @if($tarea->asignado)
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <div class="assignee-avatar">{{ $tarea->asignado->initials }}</div>
                                    <span>{{ $tarea->asignado->full_name }}</span>
                                </div>
                            @else
                                <span style="color: #94a3b8;">Sin asignar</span>
                            @endif
                        </div>

                        @if($tarea->fecha_vencimiento)
                        <div style="margin-bottom: 1rem;">
                            <strong style="color: #1e293b; display: block; margin-bottom: 0.5rem;">Fecha de vencimiento:</strong>
                            <span class="task-date {{ $tarea->estaVencida() ? 'overdue' : ($tarea->estaPorVencer() ? 'soon' : '') }}">
                                <i class="bi bi-calendar"></i>
                                {{ $tarea->fecha_vencimiento->format('d/m/Y') }}
                                @if($tarea->estaVencida())
                                    <strong>(¡Vencida!)</strong>
                                @elseif($tarea->estaPorVencer())
                                    <strong>(Próximo a vencer)</strong>
                                @endif
                            </span>
                        </div>
                        @endif

                        @if($tarea->puntos > 0)
                        <div style="margin-bottom: 1rem;">
                            <strong style="color: #1e293b; display: block; margin-bottom: 0.5rem;">Puntos:</strong>
                            <span style="color: #10b981; font-weight: 600;">
                                <i class="bi bi-trophy-fill"></i> {{ $tarea->puntos }} puntos
                            </span>
                        </div>
                        @endif

                        <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #f1f5f9; font-size: 0.85rem; color: #94a3b8;">
                            <div style="margin-bottom: 0.25rem;">
                                <strong>Creada por:</strong> {{ $tarea->creador->full_name }}
                            </div>
                            <div>
                                <strong>Fecha de creación:</strong> {{ $tarea->created_at->format('d/m/Y H:i') }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #f1f5f9;">
                        @if($esAdmin)
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editTaskModal{{ $tarea->id }}" data-bs-dismiss="modal">
                                <i class="bi bi-pencil"></i> Editar
                            </button>
                            <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de eliminar esta tarea?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        @endif
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endforeach

    <!-- Modals para editar tareas (solo para admins) -->
    @if($esAdmin)
        @foreach([$tareasPorHacer, $tareasEnProgreso, $tareasCompletadas] as $listaTareas)
            @foreach($listaTareas as $tarea)
            <div class="modal fade" id="editTaskModal{{ $tarea->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content" style="border-radius: 16px; border: none;">
                        <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header" style="border-bottom: 1px solid #f1f5f9;">
                                <h5 class="modal-title" style="font-weight: 700; color: #1e293b;">
                                    <i class="bi bi-pencil me-2"></i>Editar Tarea
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Título -->
                                <div class="mb-3">
                                    <label for="titulo_edit_{{ $tarea->id }}" class="form-label fw-bold">Título *</label>
                                    <input type="text" class="form-control" id="titulo_edit_{{ $tarea->id }}" name="titulo" value="{{ $tarea->titulo }}" required maxlength="255">
                                </div>

                                <!-- Descripción -->
                                <div class="mb-3">
                                    <label for="descripcion_edit_{{ $tarea->id }}" class="form-label fw-bold">Descripción</label>
                                    <textarea class="form-control" id="descripcion_edit_{{ $tarea->id }}" name="descripcion" rows="3" maxlength="1000">{{ $tarea->descripcion }}</textarea>
                                </div>

                                <div class="row">
                                    <!-- Estado -->
                                    <div class="col-md-6 mb-3">
                                        <label for="estado_edit_{{ $tarea->id }}" class="form-label fw-bold">Estado *</label>
                                        <select class="form-select" id="estado_edit_{{ $tarea->id }}" name="estado" required>
                                            <option value="por_hacer" {{ $tarea->estado === 'por_hacer' ? 'selected' : '' }}>Por Hacer</option>
                                            <option value="en_progreso" {{ $tarea->estado === 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                                            <option value="completada" {{ $tarea->estado === 'completada' ? 'selected' : '' }}>Completada</option>
                                        </select>
                                    </div>

                                    <!-- Prioridad -->
                                    <div class="col-md-6 mb-3">
                                        <label for="prioridad_edit_{{ $tarea->id }}" class="form-label fw-bold">Prioridad *</label>
                                        <select class="form-select" id="prioridad_edit_{{ $tarea->id }}" name="prioridad" required>
                                            <option value="baja" {{ $tarea->prioridad === 'baja' ? 'selected' : '' }}>🟢 Baja</option>
                                            <option value="media" {{ $tarea->prioridad === 'media' ? 'selected' : '' }}>🟡 Media</option>
                                            <option value="alta" {{ $tarea->prioridad === 'alta' ? 'selected' : '' }}>🔴 Alta</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Puntos -->
                                    <div class="col-md-6 mb-3">
                                        <label for="puntos_edit_{{ $tarea->id }}" class="form-label fw-bold">Puntos</label>
                                        <input type="number" class="form-control" id="puntos_edit_{{ $tarea->id }}" name="puntos" min="0" max="1000" value="{{ $tarea->puntos }}">
                                    </div>

                                    <!-- Asignar a -->
                                    <div class="col-md-6 mb-3">
                                        <label for="asignado_a_edit_{{ $tarea->id }}" class="form-label fw-bold">Asignar a *</label>
                                        <select class="form-select" id="asignado_a_edit_{{ $tarea->id }}" name="asignado_a" required>
                                            @foreach($miembros as $miembro)
                                                <option value="{{ $miembro['id'] }}" {{ $tarea->asignado_a == $miembro['id'] ? 'selected' : '' }}>
                                                    {{ $miembro['nombre'] }} 
                                                    @if($miembro['es_admin']) ⭐ @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Fecha de vencimiento -->
                                <div class="mb-3">
                                    <label for="fecha_vencimiento_edit_{{ $tarea->id }}" class="form-label fw-bold">Fecha y hora de vencimiento</label>
                                    <input type="datetime-local" class="form-control" id="fecha_vencimiento_edit_{{ $tarea->id }}" name="fecha_vencimiento" value="{{ $tarea->fecha_vencimiento ? $tarea->fecha_vencimiento->format('Y-m-d\TH:i') : '' }}">
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 1px solid #f1f5f9;">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Guardar Cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
    @endif

    <!-- Modals de Perfil de Miembro -->
    @foreach($miembros as $miembro)
    <div class="modal fade" id="memberModal{{ $miembro['id'] }}" tabindex="-1" aria-labelledby="memberModalLabel{{ $miembro['id'] }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 16px; border: none; background: #fff; box-shadow: 0 8px 32px rgba(0,0,0,0.1);">
                <div class="modal-header" style="border-bottom: 1px solid #f1f5f9;">
                    <h5 class="modal-title" id="memberModalLabel{{ $miembro['id'] }}" style="font-weight: 700; color: #1e293b;">
                        Perfil de Miembro
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 2rem;">
                    <div class="text-center mb-4">
                        <div style="width: 100px; height: 100px; border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #2563eb 100%); color: white; font-size: 2.5rem; font-weight: 700; overflow: hidden;">
                            @if($miembro['avatar_url'])
                                <img src="{{ $miembro['avatar_url'] }}" alt="{{ $miembro['nombre'] }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                {{ $miembro['iniciales'] }}
                            @endif
                        </div>
                        <h4 class="mt-3 mb-1" style="font-weight: 700; color: #1e293b;">{{ $miembro['nombre'] }}</h4>
                        <div style="font-size: 0.9rem; color: #64748b;">
                            @if($miembro['es_admin'])
                                <i class="bi bi-star-fill" style="color: #fbbf24;"></i>
                                Administrador
                            @else
                                <i class="bi bi-person"></i>
                                Miembro
                            @endif
                        </div>
                    </div>

                    <div style="background: #f8fafc; border-radius: 12px; padding: 1rem; display: flex; justify-content: space-around; text-align: center;">
                        <div class="member-stat">
                            <div class="member-stat-value" style="font-size: 1.5rem;">{{ $miembro['tareas_asignadas'] }}</div>
                            <div class="member-stat-label" style="font-size: 0.8rem;">Tareas</div>
                        </div>
                        <div class="member-stat">
                            <div class="member-stat-value" style="font-size: 1.5rem;">{{ $miembro['tareas_completadas'] }}</div>
                            <div class="member-stat-label" style="font-size: 0.8rem;">Completadas</div>
                        </div>
                        <div class="member-stat">
                            <div class="member-stat-value" style="font-size: 1.5rem;">{{ $miembro['puntos'] }}</div>
                            <div class="member-stat-label" style="font-size: 0.8rem;">Puntos</div>
                        </div>
                    </div>
                    <div style="margin-top: 1.5rem; border-top: 1px solid #f1f5f9; padding-top: 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                            <i class="bi bi-person-circle" style="color: #64748b; font-size: 1.1rem;"></i>
                            <span style="font-size: 0.9rem; color: #475569;">{{ $miembro['username'] }}</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <i class="bi bi-envelope-fill" style="color: #64748b; font-size: 1.1rem;"></i>
                            <span style="font-size: 0.9rem; color: #475569;">{{ $miembro['email'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para Drag & Drop y copiar código -->
    <script>
        // Token CSRF para peticiones AJAX
        const csrfToken = '{{ csrf_token() }}';

        // Drag and Drop
        let draggedElement = null;

        function drag(event) {
            // Solo permitir drag si draggable="true"
            if (event.target.getAttribute('draggable') === 'true') {
                draggedElement = event.target;
                event.target.classList.add('dragging');
            } else {
                event.preventDefault();
            }
        }

        function dragEnd(event) {
            event.target.classList.remove('dragging');
        }

        // Permitir drop en las columnas
        document.querySelectorAll('.kanban-tasks').forEach(column => {
            column.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('drag-over');
            });

            column.addEventListener('dragleave', function(e) {
                this.classList.remove('drag-over');
            });

            column.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('drag-over');
                
                if (draggedElement) {
                    const tareaId = draggedElement.dataset.tareaId;
                    const nuevoEstado = this.dataset.estado;
                    
                    // Eliminar mensaje de "empty state" si existe
                    const emptyState = this.querySelector('.empty-state');
                    if (emptyState) {
                        emptyState.remove();
                    }
                    
                    // Mover visualmente la tarea
                    this.appendChild(draggedElement);
                    
                    // Actualizar en el servidor
                    cambiarEstadoTarea(tareaId, nuevoEstado);
                }
            });
        });

        // Función para cambiar estado de tarea
        function cambiarEstadoTarea(tareaId, nuevoEstado) {
            fetch(`/tareas/${tareaId}/estado`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    estado: nuevoEstado
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Actualizar contadores y empty states
                    actualizarContadores();
                    
                    // Recargar la página para actualizar puntos
                    setTimeout(() => location.reload(), 1000);
                } else {
                    mostrarNotificacion('Error al actualizar estado', 'error');
                    // Recargar la página en caso de error
                    setTimeout(() => location.reload(), 1500);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarNotificacion('Error al actualizar estado', 'error');
                setTimeout(() => location.reload(), 1500);
            });
        }

        // Actualizar contadores de tareas
        function actualizarContadores() {
            document.querySelectorAll('.kanban-column').forEach(column => {
                const tasksContainer = column.querySelector('.kanban-tasks');
                const taskCards = tasksContainer.querySelectorAll('.task-card');
                const count = taskCards.length;
                const countBadge = column.querySelector('.kanban-count');
                
                if (countBadge) {
                    countBadge.textContent = count;
                }
                
                // Si no hay tareas y no hay empty state, agregarlo
                if (count === 0 && !tasksContainer.querySelector('.empty-state')) {
                    const estado = tasksContainer.dataset.estado;
                    let mensaje = '';
                    
                    if (estado === 'por_hacer') {
                        mensaje = 'No hay tareas pendientes';
                    } else if (estado === 'en_progreso') {
                        mensaje = 'No hay tareas en progreso';
                    } else if (estado === 'completada') {
                        mensaje = 'No hay tareas completadas aún';
                    }
                    
                    const emptyState = document.createElement('div');
                    emptyState.className = 'empty-state';
                    emptyState.innerHTML = `
                        <i class="bi bi-inbox"></i>
                        <p>${mensaje}</p>
                    `;
                    tasksContainer.appendChild(emptyState);
                }
                
                // Si hay tareas, eliminar el empty state
                if (count > 0) {
                    const emptyState = tasksContainer.querySelector('.empty-state');
                    if (emptyState) {
                        emptyState.remove();
                    }
                }
            });
        }

        // Función para copiar código de invitación
        function copiarCodigo() {
            const codigo = document.getElementById('invitationCode').textContent;
            
            navigator.clipboard.writeText(codigo).then(() => {
                mostrarNotificacion('¡Código copiado al portapapeles!', 'success');
            }).catch(err => {
                console.error('Error al copiar:', err);
                mostrarNotificacion('Error al copiar el código', 'error');
            });
        }

        // Mostrar notificación temporal
        function mostrarNotificacion(mensaje, tipo = 'success') {
            const alertClass = tipo === 'success' ? 'alert-success' : 'alert-danger';
            const icon = tipo === 'success' ? 'check-circle' : 'exclamation-circle';
            
            const alert = document.createElement('div');
            alert.className = `alert ${alertClass} alert-dismissible fade show`;
            alert.style.position = 'fixed';
            alert.style.top = '20px';
            alert.style.right = '20px';
            alert.style.zIndex = '9999';
            alert.style.minWidth = '300px';
            alert.innerHTML = `
                <i class="bi bi-${icon} me-2"></i>
                ${mensaje}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.body.appendChild(alert);
            
            // Auto-cerrar después de 3 segundos
            setTimeout(() => {
                alert.remove();
            }, 3000);
        }
    </script>
    <!-- Script para inicializar los popovers -->
    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar todos los popovers
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl, {
                container: 'body',
                sanitize: false
            });
        });
    });
    </script>
    @endpush
</body>
</html>