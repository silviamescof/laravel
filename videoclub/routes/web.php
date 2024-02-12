<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('catalog');
})->middleware(['auth', 'verified'])->name('catalog');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    return view('logout');
});

Route::controller(CatalogController::class)->group(function () {
    // Ruta 'catalog' y 'index' accesibles sin autenticación
    Route::get('catalog', 'index')->name('catalog');
    Route::get('catalog/show/{id}', 'show')->name('show');
    
    // Resto de las rutas del CatalogController requieren autenticación
    Route::middleware('auth')->group(function () {
        Route::get('catalog/create', 'create')->name('create');
        Route::post('catalog/create/validarPelicula', 'validarPelicula')->name('validar');
        Route::get('catalog/edit/{id}', 'edit')->name('edit');
        Route::post('catalog/edit/{id}', 'validarEdit')->name('validarEdit');
        Route::get('catalog/alquilar/{id}', 'alquilar')->name('alquilar');
        Route::get('catalog/entregar/{id}', 'entregar')->name('entregar');
    });
});

require __DIR__.'/auth.php';
