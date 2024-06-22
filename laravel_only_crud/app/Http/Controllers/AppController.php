<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function index()
    {
        // This is a Query Builder


        // Insert
        $param = array(
            'full_name' => "Ankit",
        );
        // DB::table('parties')->insert($param);


        // Select
        // $party = DB::table("parties")->get();

        // Single record
        // $party = DB::table("parties")
        //     ->where('full_name', 'Mr Ravi')
        //     ->get();

        // Using AND: 
        // $party = DB::table("parties")
        //     ->where('full_name', 'Mr Ravi')
        //     ->where('city', 'jaunpur')
        //     ->get();

        // Using OR:
        // $party = DB::table("parties")
        //     ->where('id', 1)
        //     ->orWhere('full_name', 'Ravi')
        //     ->get();

        // Using NOT: 1st type
        // $party = DB::table("parties")
        //     ->where('id', '<>', 1)
        //     ->get();

        // Using NOT: 2nd type
        // $party = DB::table("parties")
        //     ->whereNot('id', 2)
        //     ->get();

        // echo "<pre>";
        // print_r($party);

        // Update
        // $param = array(
        //     'full_name' => 'Ravi'
        // );
        // DB::table('parties')
        //     ->where('id', 5)
        //     ->update($param);

        // Delete
        // DB::table('parties')->where('id', 8)->delete();


        return "Success";
    }

    public function About($parametrname)
    {
        // Route and Route Types


        // $name = "Ravi";
        $phone = "9876543212";
        $city = "";
        // Using compact
        // return view('About', compact("name", "phone", "city"));

        // Using associative array
        // Ex.1
        /* return view('About', array(
            'name' => $name,
            'phone' => $phone,
            'city' => $city,
        ));*/

        // Ex.2
        $name = $parametrname;
        $data['name'] = $name;
        $data['phone'] = '7521878485';
        $data['city'] = 'Jaunpur';

        return view('About', $data);

        // Using with method
        // return view('About')->with('name', $name)->with('phone', $phone)->with('city', $city);

        // return view('blog', ['name' => 'Mr Ravi', 'phone' => '9876543210', 'city' => 'Jaunpur']);
    }

    public function blogs()
    {

        $users = array(
            array('name' => 'RAVI', 'phone' => '7521878485'),
            array('name' => 'Anil', 'phone' => '9628567050'),
            array('name' => 'Aman', 'phone' => '0987654321')
        );
        return view('blog', ['users' => $users]);
    }

    public function Services()
    {
        // This is a Eloquent ORM


        // Insert Data option 1
        $party = new Party;
        $party->full_name = "Ravi";
        $party->phone_nu = "7521878485";
        // $party->save();

        // Insert Data option 2
        $param = array(
            // all column name Party Model ke $fillable array me hona chahiye
            "full_name" => "Mr Ravi",
            "phone_nu" => "7521878485",
            "city" => "lucknow",
            "address" => "A C-19"
        );
        // Party::create($param);

        // Select All records
        // $parties = Party::all();
        // dd($parties);

        // Select one record by id
        // $id = 1;
        // $party = Party::find($id);
        // dd($party);

        // Select record by another colume/filed
        // $party = Party::where("phone_nu", "9876543210")->get();
        // dd($party);

        // Using AND:
        // $party = Party::where('phone_nu', '9876543210')
        //     ->where('full_name', 'Anil')
        //     ->get();
        // dd($party);

        // Using OR:
        // $party = Party::where('id', 10)
        //     ->orWhere('full_name', 'Anil')
        //     ->get();
        // dd($party);

        // Using NOT: 1st type
        // $party = Party::where('phone_nu', '!=', '9876543210')
        //     ->get();
        // dd($party);

        // Using NOT: 2nd type
        // $party = Party::whereNot('full_name', 'Anil')
        //     ->get();
        // dd($party);


        // Update
        // $id = 1;
        // $party = Party::find($id);
        // $party->full_name = "Aman";
        // $party->city = "jaunpur";
        // $party->save();

        // Delete
        // $id = 4;
        // $party = Party::find($id);
        // $party->delete();



        return "Services";
    }


    public function CountacUs()
    {
        return "Hello, Coder";
    }

    public function Layout() {
        return view('test');
    }
}
