<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Mensajes</h1>

        <!-- Formulario para crear un nuevo mensaje -->
        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            <div>
                <label for="text">Mensaje:</label>
                <input type="text" id="text" name="text" required>
            </div>
            <div>
                <label for="subrayado">Subrayado:</label>
                <input type="checkbox" id="subrayado">
            </div>
            <div>
                <label for="negrita">Negrita:</label>
                <input type="checkbox" id="negrita">
            </div>
            <button type="submit">Guardar Mensaje</button>
        </form>

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Mostrar mensajes existentes -->
        @if($messages->isEmpty())
            <p>No hay mensajes en la base de datos</p>
        @else
            <ul>
                @foreach($messages as $message)
                    <li>
                        <strong>{{ $message->text }}</strong>
                        <a href="{{ route('messages.edit', $message->id) }}">Editar</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>