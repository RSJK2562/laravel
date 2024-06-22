<?php

use App\Http\Controllers\ControllerTest;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('callaccess', [ControllerTest::class, 'getdata']);
Route::get('callmutator', [ControllerTest::class, 'setdata']);