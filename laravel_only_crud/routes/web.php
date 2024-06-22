<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Basic Route
Route::get('/', [AppController::class, 'index']);

// Route with Parameter
Route::get('/about/{parametrname}', [AppController::class, 'About']);
// Route::get('/about/{parametrname}', [AppController::class, 'About'])->where('parametrname','[0-9]+');
// Route::get('/about/{parametrname}', [AppController::class, 'About'])->where('parametrname','[a-z,A-Z]+');

// Route with optional Parameter
Route::get('/services/{parametrname?}', [AppController::class, 'Services']);

// Names routes
Route::get('/countac', [AppController::class, 'CountacUs'])->name('countacs');


Route::get('/blog', [AppController::class, 'blogs']);

Route::get('/layout', [AppController::class, 'Layout']);
