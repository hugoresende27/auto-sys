<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth'])->name('welcome');

require __DIR__.'/auth.php';


Route::get('allusers', [AdminController::class, 'allusers']);

Route::get('teste', [AdminController::class, 'teste']);

Route::get('addcar', [CarController::class, 'create']);