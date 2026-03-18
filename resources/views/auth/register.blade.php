<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')


    <h1>Registro</h1>

    <form action = "{{route('registro.store') }}" method = "POST">

        @csrf

        <input type="text" name="name" placeholder="Nombre" class="form-control">
        <br><br>
        <input type="email" name="email" placeholder="Email" class="form-control">
        <br><br>
        <input type="text" name="phone" placeholder="Telefono" class="form-control">
        <br><br>
        <input type="password" name="password" placeholder="Contraseña" class="form-control">
        <br><br>
        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" class="form-control">
        <br><br>
        <div class="form-check">
            <input type="checkbox" name="is_admin" value="1" >
            <label for="is_admin"> Es administrador </label>
        </div>
        
        
        <br><br>
        <button type= "submit" class="btn btn-primary">Guardar</button>



    </form>

    @endsection
</body>
</html>