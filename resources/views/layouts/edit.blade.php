@extends ("layouts.welcome")

@section ("navbar")

@endsection

@section ("content")




<div>

<h2 class="titulo">Edición de usuarios</h2>
<!-- //aca podemos meter codigo html -->
<form method="POST" action="{{ route('users.store') }}" class="form_insert">

    {{ csrf_field()}}

    <table>
        <tr>
            <td><label for="name" class="label_nombre">Nombre:</label></td>
            <td><input type="text" id="name" name="name" required class="input_nombre"></td>
        </tr>
        <tr>
            <td><label for="email" class="label_email">Email:</label></td>
            <td><input type="email" id="email" name="email" required class="input_email"></td>
        </tr>
        <tr>
            <td><label for="password" class="label_password">Contraseña:</label></td>
            <td><input type="password" id="password" name="password" required class="input_password"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; padding-top: 15px;">
                <input type="submit" name="enviar" value="Enviar" class="btn-enviar">
            </td>
        </tr>
    </table>
</form>
</div>
@endsection

@section ("footer ")


@endsection