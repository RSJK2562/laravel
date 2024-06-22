<?php

namespace App\Http\Controllers;

use App\Models\ApiModal;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function getdata()
    {
        return ApiModal::all();
    }

    function setdata(Request $req)
    {
        $tbl = new ApiModal();
        $tbl->name = $req->name;
        $tbl->email = $req->email;
        $tbl->mobile = $req->mobile;
        $tbl->password = $req->pwd;
        $tbl->save();
        $last_rec_id = $tbl->id;
        $res = ApiModal::find($last_rec_id);
        $data = [
            'status' => 200,
            'msg' => 'Employee all Successfully',
            'data' => $res
        ];
        return response()->json($data, 200);
        // return response()->json($last_rec_id);
    }
}
