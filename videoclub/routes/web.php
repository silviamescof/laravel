<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogController;
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
    return view('home');
})->name('home');
Route::get('login', function () {
    return view('auth/login');
})->name('login');
Route::get('logout', function () {
    echo 'Logout';
})->name('logout');
Route::controller(CatalogController::class)->group(function(){

    Route::get('catalog','index')->name('catalog');
    Route::get('catalog/show/{id}','show')->name('show');
    Route::get('catalog/create','create')->name('create');
    Route::get('catalog/edit/{id}','edit')->name('edit');
    
});
Route::post('/register', [AuthController::class, 'validalogin'])->name('validalogin');

