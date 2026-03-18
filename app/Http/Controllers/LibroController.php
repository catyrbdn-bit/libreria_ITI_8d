<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// importar el modelo
use App\Models\Libro;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //obtener informacion de la base de datos
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $libros= Libro::all();
        return view('libros.create',compact('libros'));
    }

    /**
     * Guardar informacion en la base de datos 
     */
    public function store(Request $request)
    {
        //mandar la informacion a la bd
        Libro::create([
            //<NombreFormulario> => $request <NombreBD>
            'nombre'=> $request ->nombre , 
            'autor'=> $request ->autor,
            'editorial' => $request -> editorial,
            'precio' => $request -> precio



        ]);

        //redireccionar al usuario al formulario
        return redirect()->route('libros.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
    *editar registro
    */
    public function edit(Libro $libro)
    {
        //regresar datos del libro
        return view('libros.edit', compact('libro'));
    }

    /**
     * actualizar registro
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'precio' => 'required',
        ]);
        
        //indicar actualizacion de todos los campos
        $libro->update($request->all());

        //redirigir al usuario al index y enviarle un mensaje
        return redirect()->route('libros.index')
        ->with('success', 'Actualizacion exitosa');

    }

    /**
     * Eliminar
     */
    public function destroy(Libro $libro)
    {
        //funcion para eliminar
        $libro -> delete();
        return redirect()->route('libros.index')
        ->with('success', 'Libro eliminado');
    }
}
