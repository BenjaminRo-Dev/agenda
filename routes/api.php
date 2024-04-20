<?php

use App\Http\Controllers\Api\Estudiante\MateriaEstudianteController;
use App\Http\Controllers\Api\MateriaController;
use App\Http\Controllers\Api\Profesor\MateriaProfesorController;
use App\Http\Controllers\Api\Profesor\ProfesorController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json(['message' => 'Hello World!']);
});

Route::post('login', [UserController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function (){
    
    // Route::apiResource('materias', MateriaController::class)->names('api.materias');
    Route::get('materias/estudiante/{estudiante_id}', [MateriaEstudianteController::class, 'index'])->name('api.materias.estudiate.index');
    Route::get('materias/profesor/{profesor_id}', [MateriaProfesorController::class, 'index'])->name('api.materias.profesor.index');

    //Profesor:
    Route::get('profesor/datos-personales/{idProfesor}', [ProfesorController::class, 'datosPersonales'])->name('api.profesor.datos-personales');
    Route::get('profesor/cursos/{idProfesor}', [ProfesorController::class, 'cursos'])->name('api.profesor.cursos');
    Route::get('profesor/estudiantes-curso/{idProfesor}', [ProfesorController::class, 'estudiantesCurso'])->name('api.profesor.estudiantes-curso');


    //Login:
    
    Route::post('validate-token', [UserController::class, 'validateToken'])->name('api.validate-token');
    Route::post('logout', [UserController::class, 'logout'])->name('api.logout');


});

