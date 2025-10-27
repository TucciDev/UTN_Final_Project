<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipo - CollabPro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Equipo creado exitosamente</h1>
        <p>ID: {{ $equipo->id }}</p>
        <p>Nombre: {{ $equipo->nombre }}</p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver al Dashboard</a>
    </div>
</body>
</html>