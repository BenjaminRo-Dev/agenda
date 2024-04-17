<?php

use App\Http\Controllers\Web\AdministradorController;
use App\Http\Controllers\Web\CursoController;
use App\Http\Controllers\Web\EstudianteController;
use App\Http\Controllers\Web\MateriaController;
use App\Http\Controllers\Web\ProfesorController;
use App\Http\Controllers\Web\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    

Route::get('/no-autorizado',[AdministradorController::class, 'noAutorizado'])->name('no-autorizado');

Route::middleware('auth:sanctum', AdminMiddleware::class)->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('materias', MateriaController::class);
    Route::post('/import', [UserController::class, 'import'])->name('users.import');
    Route::get('/excel', [UserController::class, 'excel'])->name('users.excel');

    // Route::get('asignarCurso/{estudiante}/{curso}', [EstudianteController::class, 'asignarCurso'])->name('asignarCurso');
    Route::post('asignarCurso', [EstudianteController::class, 'asignarCurso'])->name('asignarCurso');
    Route::post('asignarCursoProfesor', [ProfesorController::class, 'asignarCurso'])->name('asignarCursoProfesor');
});







