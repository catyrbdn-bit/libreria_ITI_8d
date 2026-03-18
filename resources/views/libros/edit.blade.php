<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>


    @extends('layouts.app')

    @section('content')

    <h1> Editar Libro: {{ $libro->nombre }} </h1>

    <form action="{{ route('libros.update', $libro) }}" method="POST">

<!--Obligatorio-->
    @csrf
    <!--indicar metodo para actualizar un registro-->
    
    @method('PUT')

        <input value="{{ $libro->nombre }}" type="text" name="nombre" placeholder="Nombre del libro"  class="form-control mb-2">
        <br> 
        <input value="{{ $libro->autor }}" type="text" name="autor" placeholder="Autor del libro"  class="form-control mb-2">
        <br> 
        <input value="{{ $libro->editorial }}" type="text" name="editorial" placeholder="Editorial del libro"  class="form-control mb-2">
        <br> 
        <input value="{{ $libro->precio }}" type="text" name="precio" placeholder="Precio del libro"  class="form-control mb-2">

        <button type="submit" class= "btn btn-outline-primary">Guardar </button>
        <br><br>
    </form>
    <div class=>
    <a href="{{ route('libros.index') }}" class= "btn btn-danger">
        Regresar
    </a>
    </div>

@endsection


</body>
</html>