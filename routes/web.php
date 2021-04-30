<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\objectsController;

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

Route::get('/', function () {
    return view('principal');
});
Route::get('/laravel', function() {
	return view('welcome');
});

Route::prefix('objects')->group(function () {
    Route::get('lista', [objectsController::class, 'index'])->name('objects.list');
    Route::post('editar', [objectsController::class, 'edit'])->name('objects.edit');
    Route::post('eliminar', [objectsController::class, 'destroy'])->name('objects.destroy');
    Route::post('nueva', [objectsController::class, 'store'])->name('objects.new');
    Route::get('lista/buscar', [objectsController::class, 'show'])->name('objects.search');
});
