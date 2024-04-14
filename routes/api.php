<?php

use App\Http\Controllers\Api\Estudiante\MateriaEstudianteController;
use App\Http\Controllers\Api\MateriaController;
use App\Http\Controllers\Api\Profesor\MateriaProfesorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json(['message' => 'Hello World!']);
});


// Route::apiResource('materias', MateriaController::class)->names('api.materias');
Route::get('materias/estudiante/{estudiante_id}', [MateriaEstudianteController::class, 'index'])->name('api.materias.estudiate.index');
Route::get('materias/profesor/{profesor_id}', [MateriaProfesorController::class, 'index'])->name('api.materias.profesor.index');
