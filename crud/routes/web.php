<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MyController;
use Illuminate\Http\Request;

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

Route::post('processform', function (Request $req) {
    echo $req->t1 . " " . $req->t2;
});
Route::post('getformdata', [MyController::class, 'processdata']);



// Route::view('user','userform');
Route::view('user', 'userform')->middleware('checklogin');
Route::post('processuserform', [MyController::class, 'getdata']);

// Route::view('searchpage','search');
Route::view('searchpage', 'search')->middleware('checklogin');
Route::post('processSearch', [MyController::class, 'searchdata']);

Route::view('loginform', 'login');
Route::post('processlogin', [MyController::class, 'logins']);
Route::get('processlogout', [MyController::class, 'logout']);

Route::view('Admission', 'admission');
Route::post('pro_admission', [MyController::class, 'admission']);

Route::view('animatedeform', 'animatedeform');
Route::post('pro_animatedeForm', [MyController::class, 'Animatede']);

Route::view('AddShow', 'addShow');
Route::post('addEmployee', [MyController::class, 'addEmp']);

Route::view('Fetching', 'fetching');
Route::get('Fetch', [MyController::class, 'fetchingData']);

Route::view('AddUser', 'user');
Route::post('addUser', [MyController::class, 'addUser']);
Route::get('UserList', [MyController::class, 'userList']);

Route::get('UserEdit/{id}', [MyController::class, 'editUser']);
Route::post('updateUser', [MyController::class, 'updateuser']);

Route::get('DeleteUser/{id}', [MyController::class, 'deleteUser']);


