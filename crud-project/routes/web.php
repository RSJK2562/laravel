<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Models\registration;

Route::get('/', function () {
    $rg_tb = new registration();
    // $data['records'] = $rg_tb::all();
    // return view('welcome', $data);
    $data = $rg_tb::all();
    return view('welcome', ['records' => $data]);
});

Route::view('/Add', 'registration');
Route::view('/Login', 'login');
Route::view('/Forget', 'forget');

Route::post('/addUser', [MyController::class, 'AddUser']);

Route::post('/userLogin', [MyController::class, 'Login']);

// Route::view('/Profile', 'Admin/profile')->middleware('checklogin');
Route::get('/Profile', [MyController::class, 'profile'])->middleware('checklogin');

Route::get('/pro_logout', [MyController::class, 'Logout'])->middleware('checklogin');

Route::post('/ForgetPassword', [MyController::class, 'ForgetPassword']);
Route::post('/newpassword', [MyController::class, 'newPassword']);

Route::get('EditProfile/{id}', [MyController::class, 'editProfile'])->middleware('checklogin');
Route::post('updateUser', [MyController::class, 'updateUser'])->middleware('checklogin');

Route::get('/ShowAllUser', [MyController::class, 'showAllUser'])->middleware('checklogin');
Route::get('/DeleteProfile/{id}', [MyController::class, 'deleteProfile'])->middleware('checklogin');

Route::view('/Password', 'Admin.password')->middleware('checklogin');
Route::post('/changePsd', [MyController::class, 'changePassword'])->middleware('checklogin');

// Route::view('/Courses', 'Admin.courses')->middleware('checklogin');
Route::get('/Courses', [MyController::class, 'myCourses'])->middleware('checklogin');
Route::any('/paycourses/{id?}', [MyController::class, 'payCourses'])->middleware('checklogin');

Route::post("/success-order",[MyController::class, 'success'])->name("orderSuccess");

Route::get('/SendOtp', [MyController::class, 'otp']);

Route::any('/excel',[MyController::class, 'excelData'])->middleware('checklogin');
Route::any('/excelImport',[MyController::class, 'excelImport'])->middleware('checklogin');