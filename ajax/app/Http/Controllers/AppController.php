<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Exception;
use Illuminate\Http\Request;

class AppController extends Controller
{
    function saveUser1(Request $request)
    {
        // $Users = new Users();

        // $Users->name = $request->name;
        // $Users->email = $request->email;
        // $Users->mobile = $request->mobile;
        // $Users->password = $request->password;
        // $Users->save();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'User added successfully.'
        // ]);

        try {
            Users::create($request->all());
            $msg = 'User Successfully Added';
        } catch (Exception $exc) {
            $msg = $exc;
        }

        return response()->json([
            'success' => true,
            'message' => $msg,
        ]);
    }

    function saveUser2(Request $req)
    {
        // $Users = new Users();
        // // Decode serialize data
        // parse_str($req->input('data'), $formData);
        // // dd($formData);
        // $Users->name = $formData['name'];
        // $Users->email = $formData['email'];
        // $Users->mobile = $formData['mobile'];
        // $Users->password = $formData['password'];
        // $Users->save();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'User added successfully.'
        // ]);

        try {
            $Users = new Users();
            // Decode serialize data
            parse_str($req->input('data'), $formData);
            // dd($formData);
            $Users->name = $formData['name'];
            $Users->email = $formData['email'];
            $Users->mobile = $formData['mobile'];
            $Users->password = $formData['password'];
            $Users->save();

            return response()->json([
                'success' => true,
                'message' => 'User added successfully.'
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex
            ]);
        }
    }

    function saveUser3(Request $req)
    {
        try {
            $Users = new Users();
            // Decode serialize data
            parse_str($req->input('data'), $formData);
            // dd($formData);
            $Users->name = $formData['name'];
            $Users->email = $formData['email'];
            $Users->mobile = $formData['mobile'];
            $Users->password = $formData['password'];

            if (empty($formData['id'])) {
                $Users->save();
                $msg = 'User added successfully.';
            } else {
                $Users = Users::find($formData['id']);
                $Users->update($formData);
                $msg = 'User update successfully.';
            }

            return response()->json([
                'success' => true,
                'message' => $msg
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex
            ]);
        }
    }

    function getData()
    {
        return Users::orderBy('id', 'desc')->get();
    }

    function editdata(Request $req)
    {
        return Users::find($req->id);
    }

    function delete(Request $req)
    {
        $Users_tbl = Users::find($req->id);
        $Users_tbl->delete();
        return response()->json([
            'success' => true,
            'message' => 'User Delete!'
        ]);
    }
}
