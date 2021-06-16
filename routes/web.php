<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ColoresController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\EstatusControler;
use App\Http\Controllers\EtapasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

use App\Http\Controllers\LanguageController;


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

// Page Route
// Route::get('/', [PageController::class, 'blankPage'])->middleware('verified');
Route::get('/', [PageController::class, 'blankPage']);


Route::get('/page-blank', [PageController::class, 'blankPage']);
Route::get('/page-collapse', [PageController::class, 'collapsePage']);


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// locale route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Auth::routes(['verify' => true]);

//Rutas para ColorController
Route::get('/colores', [ColoresController::class, 'index']);

//rutas de catalogos
Route::resource('/etapas', EtapasController::class);
Route::resource('/areas', AreasController::class);
Route::resource('/departamentos', DepartamentosController::class);
Route::resource('/estatus', EstatusControler::class);