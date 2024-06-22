<?php

use App\Models\Softdlt;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("showdata", function () {
    $data = Softdlt::get();
    // dd($data);
    dd($data->toArray());
});

Route::get("deletedata", function () {
    Softdlt::first()->delete();
    dd('First record deleted');
});

Route::get("showalldata", function () {
    $data = Softdlt::withTrashed()->get();
    dd($data->toArray());
});

Route::get("showdltdata", function () {
    $data = Softdlt::onlyTrashed()->get();
    dd($data->toArray());
});

Route::get("backdltdata", function () {
    // Softdlt::onlyTrashed()->restore();
    Softdlt::onlyTrashed()->whereId(1)->restore();
});

Route::get('forcedelete', function () {
    // Softdlt::onlyTrashed()->first()->forceDelete();
    Softdlt::onlyTrashed()->whereId(4)->forceDelete();
});
