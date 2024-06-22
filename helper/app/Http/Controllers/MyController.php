<?php

namespace App\Http\Controllers;

use App\Models\data;
use Illuminate\Http\Request;

class MyController extends Controller
{
    function fetch()
    {
        $records = data::all();
        // print_r($records);
        show($records);
    }

    function showfy()
    {
       $fy = getfy();
       show($fy);
    }
}
