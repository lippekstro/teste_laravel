<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
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

Route::get('/', [WelcomeController::class, 'index']);

Route::resource('faqs', FaqController::class);
Route::resource('produtos', ProdutoController::class);
Route::resource('categorias', CategoriaController::class);