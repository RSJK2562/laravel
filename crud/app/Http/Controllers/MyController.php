<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userform;
use App\Models\SearchData;
use App\Models\admission;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    function processdata(Request $req)
    {
        echo $req->t1 . " " . $req->t2;
    }

    function getdata(Request $req)
    {
        $name = $req->name;
        $email = $req->email;

        $objtbl = new Userform;

        $objtbl->name = $name;
        $objtbl->email = $email;
        $objtbl->save();

        // return redirect('user')->with('msg','Data Inserted Successfully');

        return $this->fetchdata();
    }

    function fetchdata()
    {
        $data = Userform::all();
        return view('userform', ['res' => $data]);
    }

    function searchdata(Request $req)
    {
        $rollnum = $req->rollnum;
        $data = SearchData::where('rollnumber', $rollnum)->get();

        // echo "<pre>";
        // print_r($data);
        if ($data->count() == 0) {
            return redirect('searchpage')->with('errorMsg', 'Recond Not found');
        } else {
            return view('search', ['res' => $data[0]]);
        }
    }

    function logins(Request $req)
    {
        $email = $req->email;
        $password = $req->password;


        $sql = SearchData::where('email', $email)
            ->where('rollnumber', $password)
            ->get();

        // if ($sql->count() == 0) {
        //     return redirect('loginform')->with('error', 'Invalid Username & Password');
        // } else {
        //     return redirect('loginform')->with('success', 'Username & Password Match');
        // }

        if ($sql->isNotEmpty()) {
            // return redirect('loginform')->with('success', 'Username & Password Match');

            $req->session()->put('uid', $sql[0]);
            // return redirect('loginform');
            return redirect('searchpage');
        } else {
            return redirect('loginform')->with('report', 'Invalid Username & Password');
        }
    }

    function logout(Request $req)
    {
        $req->session()->forget('uid');
        return redirect('loginform')->with('logout', 'You have sucessfully Loggd Out!');
    }

    function admission(Request $req)
    {

        $admission = new admission();

        $photo = "IMG_" . time() . "." . $req->photo->extension();
        $signature = "SIGN_" . time() . "." . $req->signature->extension();

        // echo $photo;
        // echo $signature;
        // die();

        $req->photo->move(public_path('photo'), $photo);
        $req->signature->move(public_path('signature'), $signature);

        $admission->name = $req->name;
        $admission->email = $req->email;
        $admission->password = $req->password;
        $admission->mobile = $req->mobile;
        $admission->dob = $req->dob;
        $admission->address = $req->address;

        $admission->photos = $photo;
        $admission->signatures = $signature;

        $admission->save();

        return back()->with('success', 'Admission Successfully!');
    }

    function Animatede(Request $req)
    {

        DB::table('employee')->insert(
            [
                'name' => $req->name,
                'email' => $req->email,
                'mobile' => $req->mobile,
                'password' => $req->password,
            ]
        );

        return back()->with('success', 'Registered Successfully');
    }

    function addEmp(Request $req)
    {
        $employee = new Employee();

        $employee->name = $req->name;
        $employee->email = $req->email;
        $employee->mobile = $req->mobile;
        $employee->password = $req->password;
        $employee->save();

        $data =  $employee::all();
        return back()->with(['data' => $data, 'success' => 'Employee added successfully']);
        // return view('AddShow', ['data' => $data]);
    }

    function fetchingData()
    {
        $employee = new Employee();
        // $records = $employee::all();
        $records = $employee->paginate(5);

        return view('Fetching', ['data' => $records]);
    }

    function addUser(Request $req)
    {
        $employee = new Employee();

        $employee->name = $req->name;
        $employee->email = $req->email;
        $employee->mobile = $req->mobile;
        $employee->password = $req->password;
        $employee->save();

        return $this->userList();
    }

    function userList()
    {
        $employee = new Employee();
        // $records = $employee::all();
        $records = $employee::orderBy('id', 'desc')->get();
        return view('UserList', ['data' => $records]);
    }

    function editUser($id)
    {
        $employee = new Employee();

        $user = $employee::where('id', $id)->first();
        return view('userEdit', ['user' => $user]);
    }

    function updateuser(Request $req)
    {
        $userId = $req->userId;
        $employee = Employee::find($userId);

        $employee->name = $req->name;
        $employee->email = $req->email;
        $employee->mobile = $req->mobile;
        $employee->save();

        return redirect('UserList')->with('update', 'User Updated successfully');
        // return back()->with('User updated successfully');
    }

    function deleteUser($id)
    {
        Employee::where('id', $id)->delete();
        // return $this->userList();
        return back()->with('delete', 'User Deleted successfully');

    }
}
