<?php

use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::any('testdata', [MyController::class, 'fetch']);

Route::any('getFinancialYear', [MyController::class, 'showfy']);
