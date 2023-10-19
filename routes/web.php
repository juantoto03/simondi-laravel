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

Route::get('/dispositivos/aps/search', 'App\Http\Controllers\Dispositivos\Aps\ApsController@search')->name('aps.search');


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::controller(App\Http\Controllers\Dashboard\IndexController::class)->group(function(){
        Route::get('/', 'index');
    });
});

Route::group(['prefix' => 'campusnorte', 'middleware' => 'auth'], function () {
    Route::controller(App\Http\Controllers\Dashboard\Campus\NorteController::class)->group(function(){
        Route::get('/', 'index');
    });
});

Route::group(['prefix' => 'campussur', 'middleware' => 'auth'], function () {
    Route::controller(App\Http\Controllers\Dashboard\Campus\SurController::class)->group(function(){
        Route::get('/', 'index');
    });
});

// Route::group(['prefix' => 'consumo', 'middleware' => 'auth'], function () {
//     Route::controller(App\Http\Controllers\Dashboard\Consumo\ConsumoController::class)->group(function(){
//         Route::get('/', 'index');
//     });
// });

Route::prefix('consumo')->middleware('auth')->group(function () {
    Route::get('/', 'App\Http\Controllers\Dashboard\Consumo\ConsumoController@index')->name('consumo.index');
});

Route::group(['prefix' => 'disponibilidad', 'middleware' => 'auth'], function () {
    Route::controller(App\Http\Controllers\Dashboard\PowerBI\DisponibilidadController::class)->group(function(){
        Route::get('/', 'index');
    });
});

Route::group(['prefix' => 'usoinfra', 'middleware' => 'auth'], function () {
    Route::controller(App\Http\Controllers\Dashboard\PowerBI\UsoController::class)->group(function(){
        Route::get('/', 'index');
    });
});

Route::group(['prefix' => 'dispositivos', 'middleware' => ['auth',"admin"]], function () {
    
    Route::get('/', function () {
        return view('dispositivos');
    })->name('dispositivos');
    
    Route::resources([
        'routers' => App\Http\Controllers\Dispositivos\Routers\RoutersController::class,
        'switches' => App\Http\Controllers\Dispositivos\Switches\SwitchesController::class,
        'aps' => App\Http\Controllers\Dispositivos\Aps\ApsController::class,
        'servidores' => App\Http\Controllers\Dispositivos\Servidores\ServidoresController::class,
        'firewalls' => App\Http\Controllers\Dispositivos\Firewalls\FirewallsController::class,
    ]);
    
    Route::post('/routers/importar-csv', 'App\Http\Controllers\Dispositivos\Routers\RoutersController@importarCSV')->name('routers-importar-csv');
    Route::post('/switches/importar-csv', 'App\Http\Controllers\Dispositivos\Switches\SwitchesController@importarCSV')->name('switches-importar-csv');
    Route::post('/aps/importar-csv', 'App\Http\Controllers\Dispositivos\Aps\ApsController@importarCSV')->name('aps-importar-csv');
    Route::post('/servidores/importar-csv', 'App\Http\Controllers\Dispositivos\Servidores\servidoresController@importarCSV')->name('servidores-importar-csv');
    Route::post('/firewalls/importar-csv', 'App\Http\Controllers\Dispositivos\Firewalls\FirewallsController@importarCSV')->name('firewalls-importar-csv');
});

Route::group(['prefix' => 'categorias', 'middleware' => ['auth',"admin"]], function () {
    
    Route::get('/', function () {
        return view('categorias');
    })->name('categorias');
    
    Route::resources([
        'tipos' => App\Http\Controllers\Categorias\Tipos\TiposController::class,
        'importartipos' => App\Http\Controllers\Categorias\Tipos\TiposController::class,
        'marcas' => App\Http\Controllers\Categorias\Marcas\MarcasController::class,
        'modelos' => App\Http\Controllers\Categorias\Modelos\ModelosController::class,
        'estatuses' => App\Http\Controllers\Categorias\Estatuses\EstatusesController::class,
    ]);
    
    Route::post('/tipos/importar-csv', 'App\Http\Controllers\Categorias\Tipos\TiposController@importarCSV')->name('tipos-importar-csv');
    Route::post('/marcas/importar-csv', 'App\Http\Controllers\Categorias\Marcas\MarcasController@importarCSV')->name('marcas-importar-csv');
    Route::post('/estatuses/importar-csv', 'App\Http\Controllers\Categorias\Estatuses\EstatusesController@importarCSV')->name('estatuses-importar-csv');
    Route::post('/modelos/importar-csv', 'App\Http\Controllers\Categorias\Modelos\ModelosController@importarCSV')->name('modelos-importar-csv');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
