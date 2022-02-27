<?php

namespace App\Http\Middleware;

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MakeController;
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



Route::get('addcar', [CarController::class, 'create']);
Route::post('addcar/create', [CarController::class, 'store'])->name('save_car');



Route::middleware(CheckRole::class)->group(function()
        {

            Route::get('allusers', [AdminController::class, 'allusers']);
            Route::get('allmakes', [AdminController::class, 'allmakes']);

            Route::get('makes/{make}/show', [MakeController::class, 'show']);
                    
        });