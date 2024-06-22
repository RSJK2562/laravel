<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelTest;

class ControllerTest extends Controller
{
    function getdata()
    {
        return ModelTest::all();
    }

    function setdata()
    {
        $tbl = new ModelTest();
        $tbl->name = "Mr Ravi";
        $tbl->email = "abc@gmail.com";
        $tbl->mobile = "9087654321";
        $tbl->password = "1234";
        $tbl->save();
    }
}
