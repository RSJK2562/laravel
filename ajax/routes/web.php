<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/addUser', [AppController::class,'saveUser1']);

Route::view('/addUser', 'user');
Route::post('/addUser1', [AppController::class,'saveUser2']);

Route::view('/addUserModal', 'allUserModal');
Route::post('/addUser2', [AppController::class,'saveUser3']);
Route::get('/getdata', [AppController::class, 'getData']);
Route::post('/editdata', [AppController::class, 'editdata']);
Route::post('/deleteData', [AppController::class, 'delete']);
