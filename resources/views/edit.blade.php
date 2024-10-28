<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mensaje</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Editar Mensaje</h1>

        <form action="{{ route('messages.update', $message->id) }}" method="POST">
            @csrf
            @method('PUT')
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
            <button type="submit">Actualizar Mensaje</button>
        </form>
    </div>
</body>
</html>
