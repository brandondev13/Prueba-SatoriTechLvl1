<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\PersonajeController;

Route::post('/guardar-personaje', [PersonajeController::class, 'store']);
Route::get('/mostrar-personajes', [PersonajeController::class, 'index'])->name('mostrar-personajes');

Route::get('/', function () {
    return view('welcome');
});
