<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resources([
        'tipos' => App\Http\Controllers\Dashboard\Tipos\TiposController::class,
        'marcas' => App\Http\Controllers\Dashboard\Marcas\MarcasController::class,
        'modelos' => App\Http\Controllers\Dashboard\Modelos\ModelosController::class,
        'estatuses' => App\Http\Controllers\Dashboard\Estatuses\EstatusesController::class,
        'cores' => App\Http\Controllers\Dashboard\Cores\CoresController::class,
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
