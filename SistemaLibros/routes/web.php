<?php

use App\Http\Controllers\LibroController;
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
Route::controller(LibroController::class)->group(function(){

    Route::get('create', 'create');
    Route::get('show', 'show');
    Route::post('validate', 'validateForm');
});
Route::resource('libros', LibroController::class);
