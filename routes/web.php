<?php

use App\Http\Controllers\Web\CursoController;
use App\Http\Controllers\Web\UserController;
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


Route::resource('users', UserController::class)
    ->middleware('auth:sanctum');

Route::post('/import', [UserController::class, 'import'])
    ->name('users.import')
    ->middleware('auth:sanctum');

// Route::get('/export', [UserController::class, 'export'])
//     ->name('users.export')
//     ->middleware('auth:sanctum');

Route::get('/excel', [UserController::class, 'excel'])
    ->name('users.excel')
    ->middleware('auth:sanctum');


Route::resource('cursos', CursoController::class)
    ->middleware('auth:sanctum');