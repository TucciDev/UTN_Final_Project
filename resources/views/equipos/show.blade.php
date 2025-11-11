<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $equipo->nombre }} - CollabPro</title>
    
   <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   
    <!-- CSS  -->
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">  

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
                <button class="nav-link" id="workload-tab" data-bs-toggle="tab" data-bs-target="#members" type="button">
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
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" onclick="cargarMensajes()">
                    <i class="bi bi-chat-dots"></i>
                    Mensajes
                    <span id="unreadBadge" class="badge bg-danger ms-1" style="display: none;">0</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="workload-tab" data-bs-toggle="tab" data-bs-target="#workload" type="button">
                    <i class="bi bi-graph-up"></i>
                    Carga de Trabajo
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
            <div class="tab-pane fade" id="members" role="tabpanel">
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
                        <br><br><div class="dropdown">
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
                            <div class="podium-avatar">
                                @if($rankingMiembros[0]['avatar_url'])
                                    <img src="{{ $rankingMiembros[0]['avatar_url'] }}" alt="{{ $rankingMiembros[0]['nombre'] }}">
                                @else
                                    <div class="avatar-initials">{{ $rankingMiembros[0]['iniciales'] }}</div>
                                @endif
                            </div>
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
                            <div class="podium-avatar">
                                @if($rankingMiembros[2]['avatar_url'])
                                    <img src="{{ $rankingMiembros[2]['avatar_url'] }}" alt="{{ $rankingMiembros[2]['nombre'] }}">
                                @else
                                    <div class="avatar-initials">{{ $rankingMiembros[2]['iniciales'] }}</div>
                                @endif
                            </div>
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
                        <div class="ranking-position">{{ $index + 1 }}</div>
                            <div class="ranking-avatar">
                                @if($miembro['avatar_url'])
                                    <img src="{{ $miembro['avatar_url'] }}" alt="{{ $miembro['nombre'] }}">
                                @else
                                    <div class="avatar-initials">{{ $miembro['iniciales'] }}</div>
                                @endif
                            </div>
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
    
        <!-- Tab: Mensajes -->
        <div class="tab-pane fade" id="messages" role="tabpanel">
            <div class="chat-container">
                <!-- Sidebar con lista de usuarios -->
                <div class="chat-sidebar">
                    <div class="chat-sidebar-header">
                        <h4><i class="bi bi-people me-2"></i>Miembros</h4>
                    </div>
                    <div class="chat-users-list" id="chatUsersList">
                        @foreach($miembros as $miembro)
                            @if($miembro['id'] != Auth::id())
                            <div class="chat-user-item" 
                                    data-user-id="{{ $miembro['id'] }}"
                                    data-user-name="{{ $miembro['nombre'] }}"
                                    data-user-role="{{ $miembro['es_admin'] ? 'Administrador' : 'Miembro' }}"
                                    data-user-initials="{{ $miembro['iniciales'] }}"
                                    onclick="seleccionarUsuario(this)">
                                <div class="chat-user-avatar">{{ $miembro['iniciales'] }}</div>
                                <div class="chat-user-info">
                                    <div class="chat-user-name">{{ $miembro['nombre'] }}</div>
                                    <div class="chat-user-role">
                                        @if($miembro['es_admin'])
                                            <i class="bi bi-star-fill" style="color: #fbbf24;"></i> Admin
                                        @else
                                            <i class="bi bi-person"></i> Miembro
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Área principal del chat -->
                <div class="chat-main">
                    <!-- Header del chat (usuario seleccionado) -->
                    <div class="chat-header" id="chatHeader" style="display: none;">
                        <div class="chat-header-avatar" id="chatHeaderAvatar"></div>
                        <div class="chat-header-info">
                            <h5 id="chatHeaderName"></h5>
                            <p id="chatHeaderRole"></p>
                        </div>
                    </div>

                    <!-- Área de mensajes -->
                    <div class="chat-messages" id="chatMessages">
                        <div class="chat-empty">
                            <i class="bi bi-chat-dots"></i>
                            <h4>Selecciona un miembro</h4>
                            <p>Elige un miembro del equipo para comenzar a chatear</p>
                        </div>
                    </div>

                    <!-- Input para escribir mensaje -->
                    <div class="chat-input-container" id="chatInputContainer" style="display: none;">
                        <div id="filePreviewContainer"></div>
                        <form id="chatForm" onsubmit="enviarMensaje(event)">
                            <div class="chat-input-wrapper">
                                <div class="chat-input-group">
                                    <textarea 
                                        id="messageInput" 
                                        class="chat-textarea" 
                                        placeholder="Escribe un mensaje..."
                                        rows="1"
                                        onkeypress="handleEnter(event)"></textarea>
                                    <input type="file" id="fileInput" class="chat-file-input" onchange="previsualizarArchivo(this)">
                                    <button type="button" class="chat-file-button" onclick="document.getElementById('fileInput').click()">
                                        <i class="bi bi-paperclip"></i>
                                    </button>
                                </div>
                                <button type="submit" class="chat-send-button" id="sendButton">
                                    <i class="bi bi-send-fill"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Tab: Carga de Trabajo -->
        <div class="tab-pane fade" id="workload" role="tabpanel">
            @if($esAdmin)
                <div class="members-list">
                    <h3 style="margin-bottom: 1.5rem; color: #1e293b; font-weight: 700;">
                        <i class="bi bi-graph-up me-2"></i>
                        Carga de trabajo del equipo
                    </h3>

                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
                        @foreach($miembros as $miembro)
                            @php
                                $cargaActual = $miembro['tareas_asignadas'] - $miembro['tareas_completadas'];
                                $capacidadMaxima = 6;
                                $porcentajeCarga = min(($cargaActual / $capacidadMaxima) * 100, 100);
                            @endphp
                            
                            <div class="workload-card">
                                <!-- Avatar y nombre -->
                                <div style="display: flex; align-items: center; gap: 0.9rem; margin-bottom: 1rem;">
                                    <div style="width: 45px; height: 45px; border-radius: 12px; background: linear-gradient(135deg, #667eea 0%, #2563eb 100%); display: flex; align-items: center; justify-content: center; font-weight: 700; color: white; font-size: 1rem; flex-shrink: 0;">
                                        @if($miembro['avatar_url'])
                                            <img src="{{ $miembro['avatar_url'] }}" alt="{{ $miembro['nombre'] }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px;">
                                        @else
                                            {{ $miembro['iniciales'] }}
                                        @endif
                                    </div>
                                    <div style="flex: 1; min-width: 0;">
                                        <div style="font-weight: 500; color: #1e293b; font-size: 0.95rem; margin-bottom: 0.05rem !important; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            {{ $miembro['nombre'] }}
                                        </div>
                                        <div style="font-size: 0.8rem; color: #64748b;">
                                            @if($miembro['es_admin'])
                                                <i class="bi bi-star-fill" style="color: #fbbf24;"></i> Administrador
                                            @else
                                                <i class="bi bi-person"></i> Miembro
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Carga actual -->
                                <div style="margin-bottom: 0.75rem;">
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                        <span style="font-size: 0.88rem; font-weight: 400; color: rgba(28, 37, 53, 1);">Carga actual:</span>
                                        <span style="font-size: 0.88rem; font-weight: 600; color: #1e293b;">
                                            {{ $cargaActual }} 
                                            @if($cargaActual == 1)
                                                tarea
                                            @else
                                                tareas
                                            @endif
                                        </span>
                                    </div>
                                    
                                    <!-- Barra de progreso -->
                                    <div style="width: 100%; height: 8px; background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-radius: 8px; overflow: hidden; position: relative; box-shadow: inset 0 2px 4px rgba(0,0,0,0.06);">
                                        <div class="progress-bar" style="height: 100%; border-radius: 8px; transition: width 0.3s ease, background 0.3s ease; width: {{ $porcentajeCarga }}%; 
                                            background: {{ $cargaActual >= 6 ? 'linear-gradient(135deg, #ff6b6b, #ee5a6f, #c44569)' : ($cargaActual >= 4 ? 'linear-gradient(135deg, #ffd93d, #f9ca24, #f39c12)' : 'linear-gradient(135deg, #6bcf7f, #4ecdc4, #45b7d1)') }};
                                            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
                                        "></div>
                                    </div>
                                </div>

                                <!-- Capacidad máxima -->
                                <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 0.75rem; border-top: 1px solid #f1f5f9; font-size: 0.8rem;">
                                    <span style="color: #64748b;">Capacidad máxima:</span>
                                    <span style="font-weight: 700; color: {{ $cargaActual >= 6 ? '#ef4444' : '#64748b' }};">
                                        {{ $cargaActual }} / {{ $capacidadMaxima }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="members-list">
                    <div class="empty-state">
                        <i class="bi bi-lock-fill"></i>
                        <p style="color: #64748b; margin-top: 1rem;">Esta sección solo está disponible para administradores</p>
                    </div>
                </div>
            @endif
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
                                        <option value="{{ $miembro['id'] }}" 
                                                {{ $miembro['tareas_activas'] >= 6 ? 'disabled' : '' }}>
                                            {{ $miembro['nombre'] }} 
                                            @if($miembro['es_admin']) ⭐ @endif
                                            @if($miembro['tareas_activas'] >= 6)
                                                (⚠️ Máx. carga alcanzada)
                                            @else
                                                ({{ $miembro['tareas_activas'] }}/6 tareas)
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Límite: 6 tareas activas por persona</small>
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
                                                <option value="{{ $miembro['id'] }}" 
                                                        {{ $tarea->asignado_a == $miembro['id'] ? 'selected' : '' }}
                                                        {{ ($miembro['tareas_activas'] >= 6 && $tarea->asignado_a != $miembro['id']) ? 'disabled' : '' }}>
                                                    {{ $miembro['nombre'] }} 
                                                    @if($miembro['es_admin']) ⭐ @endif
                                                    @if($miembro['tareas_activas'] >= 6 && $tarea->asignado_a != $miembro['id'])
                                                        (⚠️ Máx. carga)
                                                    @elseif($tarea->asignado_a != $miembro['id'])
                                                        ({{ $miembro['tareas_activas'] }}/6)
                                                    @endif
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
        const equipoId = {{ $equipo->id }};
        const currentUserId = {{ Auth::id() }};

        // Variables globales para el chat
        let selectedUserId = null;
        let chatInterval = null;
        let selectedFile = null;

        // ========================================
        // FUNCIONES DE MENSAJERÍA
        // ========================================

        /**
         * Selecciona un usuario para chatear
         */
        function seleccionarUsuario(element) {
            // Remover selección anterior
            document.querySelectorAll('.chat-user-item').forEach(item => {
                item.classList.remove('active');
            });

            // Agregar selección actual
            element.classList.add('active');

            // Guardar datos del usuario seleccionado
            selectedUserId = element.dataset.userId;
            const userName = element.dataset.userName;
            const userRole = element.dataset.userRole;
            const userInitials = element.dataset.userInitials;

            // Actualizar header del chat
            document.getElementById('chatHeaderAvatar').textContent = userInitials;
            document.getElementById('chatHeaderName').textContent = userName;
            document.getElementById('chatHeaderRole').textContent = userRole;
            document.getElementById('chatHeader').style.display = 'flex';
            document.getElementById('chatInputContainer').style.display = 'block';

            // Cargar mensajes
            cargarMensajes();

            // Iniciar polling para nuevos mensajes cada 5 segundos (aumentado de 3)
            if (chatInterval) {
                clearInterval(chatInterval);
            }
            chatInterval = setInterval(cargarMensajes, 5000);
        }

        /**
         * Carga los mensajes entre el usuario actual y el seleccionado
         */
        function cargarMensajes() {
            if (!selectedUserId) return;

            fetch(`/equipos/${equipoId}/mensajes?receptor_id=${selectedUserId}`, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                const chatMessages = document.getElementById('chatMessages');
                const scrollPos = chatMessages.scrollHeight - chatMessages.scrollTop;
                const wasAtBottom = scrollPos <= chatMessages.clientHeight + 100;
                
                chatMessages.innerHTML = '';

                if (data.mensajes && data.mensajes.length > 0) {
                    data.mensajes.forEach(mensaje => {
                        chatMessages.appendChild(crearMensajeHTML(mensaje));
                    });
                    
                    // Solo hacer scroll si estaba al final
                    if (wasAtBottom) {
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                    }
                } else {
                    chatMessages.innerHTML = `
                        <div class="chat-empty">
                            <i class="bi bi-chat"></i>
                            <h4>No hay mensajes aún</h4>
                            <p>Comienza la conversación enviando un mensaje</p>
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Error al cargar mensajes:', error);
            });
        }

        /**
         * Crea el HTML de un mensaje
         */
        function crearMensajeHTML(mensaje) {
            const div = document.createElement('div');
            div.className = `chat-message ${mensaje.es_mio ? 'own' : ''}`;
            div.dataset.mensajeId = mensaje.id;

            let contenido = `
                <div class="chat-message-avatar">${mensaje.emisor_iniciales}</div>
                <div class="chat-message-content">
                    <div class="chat-message-bubble">
            `;

            if (mensaje.mensaje) {
                contenido += `<p class="chat-message-text">${escapeHtml(mensaje.mensaje)}</p>`;
            }

            if (mensaje.archivo) {
                if (mensaje.es_imagen) {
                    contenido += `
                        <img src="${mensaje.archivo}" 
                             alt="${mensaje.nombre_archivo}" 
                             class="chat-message-image"
                             onclick="window.open('${mensaje.archivo}', '_blank')">
                    `;
                } else {
                    contenido += `
                        <div class="chat-message-file">
                            <div class="chat-file-icon">
                                <i class="${mensaje.archivo_icono}"></i>
                            </div>
                            <div class="chat-file-info">
                                <div class="chat-file-name">${escapeHtml(mensaje.nombre_archivo)}</div>
                                <div class="chat-file-size">${mensaje.archivo_tamaño}</div>
                            </div>
                            <a href="${mensaje.archivo}" download class="btn btn-sm" style="color: inherit;">
                                <i class="bi bi-download"></i>
                            </a>
                        </div>
                    `;
                }
            }

            contenido += `
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="chat-message-time">${mensaje.created_at}</div>
                        ${mensaje.es_mio ? `
                            <button onclick="eliminarMensaje(${mensaje.id})" 
                                    style="background: transparent; border: none; color: inherit; opacity: 0.6; cursor: pointer; padding: 0.25rem; font-size: 0.85rem;"
                                    title="Eliminar mensaje">
                                <i class="bi bi-trash"></i>
                            </button>
                        ` : ''}
                    </div>
                </div>
            `;

            div.innerHTML = contenido;
            return div;
        }

        /**
         * Elimina un mensaje
         */
        function eliminarMensaje(mensajeId) {
            if (!confirm('¿Estás seguro de eliminar este mensaje?')) {
                return;
            }

            fetch(`/mensajes/${mensajeId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    cargarMensajes();
                    mostrarNotificacion('Mensaje eliminado', 'success');
                } else {
                    mostrarNotificacion('Error al eliminar mensaje', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarNotificacion('Error al eliminar mensaje', 'error');
            });
        }

        /**
         * Envía un mensaje
         */
        function enviarMensaje(event) {
            event.preventDefault();

            if (!selectedUserId) {
                mostrarNotificacion('Selecciona un usuario primero', 'error');
                return;
            }

            const messageInput = document.getElementById('messageInput');
            const fileInput = document.getElementById('fileInput');
            const mensaje = messageInput.value.trim();

            if (!mensaje && !fileInput.files[0]) {
                mostrarNotificacion('Escribe un mensaje o adjunta un archivo', 'error');
                return;
            }

            const formData = new FormData();
            formData.append('receptor_id', selectedUserId);
            if (mensaje) formData.append('mensaje', mensaje);
            if (fileInput.files[0]) formData.append('archivo', fileInput.files[0]);

            // Deshabilitar botón de envío
            const sendButton = document.getElementById('sendButton');
            sendButton.disabled = true;

            // Pausar el polling mientras se envía
            if (chatInterval) {
                clearInterval(chatInterval);
            }

            fetch(`/equipos/${equipoId}/mensajes`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Limpiar inputs
                    messageInput.value = '';
                    fileInput.value = '';
                    selectedFile = null;
                    document.getElementById('filePreviewContainer').innerHTML = '';

                    // Recargar todos los mensajes para evitar duplicados
                    cargarMensajes();

                    // Reiniciar polling (5 segundos)
                    chatInterval = setInterval(cargarMensajes, 5000);
                } else {
                    mostrarNotificacion(data.error || 'Error al enviar mensaje', 'error');
                    // Reiniciar polling en caso de error
                    chatInterval = setInterval(cargarMensajes, 5000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarNotificacion('Error al enviar mensaje', 'error');
                // Reiniciar polling en caso de error
                chatInterval = setInterval(cargarMensajes, 5000);
            })
            .finally(() => {
                sendButton.disabled = false;
            });
        }

        /**
         * Previsualiza el archivo seleccionado
         */
        function previsualizarArchivo(input) {
            const container = document.getElementById('filePreviewContainer');
            
            if (input.files && input.files[0]) {
                const file = input.files[0];
                selectedFile = file;

                const iconClass = getFileIcon(file.name);
                
                container.innerHTML = `
                    <div class="chat-file-preview">
                        <div class="chat-file-preview-info">
                            <i class="${iconClass} chat-file-preview-icon"></i>
                            <span class="chat-file-preview-name">${file.name}</span>
                        </div>
                        <button type="button" class="chat-file-preview-remove" onclick="removerArchivo()">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                `;
            }
        }

        /**
         * Remueve el archivo seleccionado
         */
        function removerArchivo() {
            document.getElementById('fileInput').value = '';
            document.getElementById('filePreviewContainer').innerHTML = '';
            selectedFile = null;
        }

        /**
         * Obtiene el icono según el tipo de archivo
         */
        function getFileIcon(filename) {
            const ext = filename.split('.').pop().toLowerCase();
            const icons = {
                'pdf': 'bi-file-earmark-pdf',
                'doc': 'bi-file-earmark-word',
                'docx': 'bi-file-earmark-word',
                'xls': 'bi-file-earmark-excel',
                'xlsx': 'bi-file-earmark-excel',
                'ppt': 'bi-file-earmark-ppt',
                'pptx': 'bi-file-earmark-ppt',
                'jpg': 'bi-file-earmark-image',
                'jpeg': 'bi-file-earmark-image',
                'png': 'bi-file-earmark-image',
                'gif': 'bi-file-earmark-image',
                'zip': 'bi-file-earmark-zip',
                'rar': 'bi-file-earmark-zip',
                'txt': 'bi-file-earmark-text',
                'mp3': 'bi-file-earmark-music',
                'mp4': 'bi-file-earmark-play',
            };
            return icons[ext] || 'bi-file-earmark';
        }

        /**
         * Maneja la tecla Enter en el textarea
         */
        function handleEnter(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                document.getElementById('chatForm').dispatchEvent(new Event('submit'));
            }
        }

        /**
         * Escapa HTML para prevenir XSS
         */
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        /**
         * Actualiza el contador de mensajes no leídos
         */
        function actualizarContadorNoLeidos() {
            fetch(`/equipos/${equipoId}/mensajes/no-leidos`, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                const badge = document.getElementById('unreadBadge');
                if (data.no_leidos > 0) {
                    badge.textContent = data.no_leidos;
                    badge.style.display = 'inline-block';
                } else {
                    badge.style.display = 'none';
                }
            })
            .catch(error => console.error('Error al actualizar contador:', error));
        }

        // Actualizar contador cada 10 segundos (aumentado de 5)
        setInterval(actualizarContadorNoLeidos, 10000);
        actualizarContadorNoLeidos();

        // Limpiar interval al cambiar de tab
        document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tab => {
            tab.addEventListener('shown.bs.tab', function (e) {
                if (e.target.id !== 'messages-tab' && chatInterval) {
                    clearInterval(chatInterval);
                    chatInterval = null;
                }
            });
        });

        // ========================================
        // DRAG AND DROP (código existente)
        // ========================================

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