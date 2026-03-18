<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    //generar rutas de todos los metodos  del contralador 
    Route::resource('libros', LibroController::class);
    
});


//crear ruta para la vista de actualizacion de un regiistro
Route::get('/libros/{id}/edit', [
    LibroController::class, 'edit'
])-> name('libros.edit');

//crear ruta para actualizar el registro
Route::put('/libros/{id}', [
    LibroController::class, 'update'
])->name("libros.update");

//ruta para el formulario de autenticacion
Route::get('/registro', [
    AuthController::class,'registerForm'
])->name('registro');

//ruta para ejecutar el formulario
Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

Route::get('/acceso',[
    AuthController::class, 'loginForm'
])->name('acceso');

//Ruta para manejar los datos de inicio de sesion
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

//Ruta para cerrar sesion
Route::post('/cerrar',[
    AuthController::class,'logout'
])->name('cerrar');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard',[
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');    
});




