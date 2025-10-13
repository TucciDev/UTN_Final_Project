@extends ("layouts.welcome")

@section ("navbar")

@endsection

@section ("content")

<div class="users_container">

<h1 class="titulo_usuarios_tabla">Usuarios registrados:</h1>

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.show', $user->id) }}" class="btn_editar">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection

@section ("footer")


@endsection