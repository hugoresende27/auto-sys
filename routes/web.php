<?php

namespace App\Http\Middleware;


use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MakeController;
use App\Http\Controllers\ManuController;
use App\Http\Controllers\UserController;
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

Route::get('/search/{page?}', [AdminController::class ,'search'])->name('search');



Route::get('addcar', [CarController::class, 'create']);


Route::get('showcar/{car}/edit',  [CarController::class, 'edit']);
Route::put('showcar/{car}',  [CarController::class, 'update'])->name('update_car');
Route::delete('showcar/{id}', [CarController::class, 'destroy']);

Route::get('showcar/{car}/show', [CarController::class, 'show']);
// Route::get('showcar/{car}/show/edit', [CarController::class, 'show']);

Route::post('addcar/create', [CarController::class, 'store'])->name('save_car');
Route::get('/addcar/getModelos/{code}', [CarController::class, 'getModelos']);

Route::get('myautos', [UserController::class, 'myAutos']);

Route::middleware([CheckRole::class,'checkrole'])->group(function()

        {

            Route::get('allusers', [AdminController::class, 'allusers']);

            Route::get('all', [AdminController::class, 'all']);

            Route::get('allcars', [AdminController::class, 'allcars']);

            // Route::get('allmakes', [AdminController::class, 'allmakes']);
          
            Route::get('makes/{manu}/show', [ManuController::class, 'show']);

            Route::get('/teste/', [AdminController::class ,'teste'])->name('teste');
                    
        });
        

Route::get('allmakes', [AdminController::class, 'allmakes']);

