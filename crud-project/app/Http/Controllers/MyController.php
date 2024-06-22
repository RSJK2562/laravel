<?php

namespace App\Http\Controllers;

use App\Mail\SendOtp;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\registration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;

class MyController extends Controller
{
    function AddUser(Request $req)
    {
        $rg_tb = new registration();
        if ($req->psd != $req->cpsd) {
            return back()->with('psdError', 'Password Not match');
        } else {
            $photo = "IMG_" . time() . "." . $req->photo->extension();
            // print_r($photo);
            // die();
            $req->photo->move(public_path('photo'), $photo);

            $rg_tb->name = $req->name;
            $rg_tb->email = $req->email;
            $rg_tb->dob = $req->dob;
            $rg_tb->city = $req->city;
            $rg_tb->gender = $req->gender;
            $tech = implode(',', $req->technology);
            // print_r($tech);
            $rg_tb->tech = $tech;
            $rg_tb->address = $req->fulladdress;
            $rg_tb->password = $req->cpsd;

            $rg_tb->photos = $photo;
            $rg_tb->save();

            return back()->with('success', 'Registration Successfully');
        }
    }

    function Login(Request $req)
    {
        $rg_tb = new registration();
        $id = $req->email;
        $psd = $req->psd;
        // dd($id,$psd);
        $sql = $rg_tb::where('email', $id)
            ->where('password', $psd)
            ->get();
        if ($sql->isNotEmpty()) {
            // $req->session()->put('uid', $sql[0]);
            Session::put('uid', $sql[0]->id);
            return redirect('/Profile')->with('success', 'Welcome To Your Profile!');
        } else {
            return back()->with('error', 'Invalid Username or Password');
        }
    }

    function Logout(Request $req)
    {
        $req->session()->forget('uid');
        return redirect('Login')->with('info', 'You have sucessfully Loggd Out!');
    }

    function ForgetPassword(Request $req)
    {
        $email = $req->email;
        $rg_tb = registration::where('email', $email)->first();

        if (!empty($rg_tb)) {
            $random_number = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $rg_tb->otp = $random_number;

            $mailData = [
                'title' => 'Larave CRUD',
                'body' => $random_number,
                'otp' => $random_number . ' - Your OTP for Email Verification',
            ];

            // Mail::raw($mailData['body'], function ($message) {
            //     $message->to('raviup198@gmail.com')
            //         ->subject('Laravel CRUD - OTP');
            // });

            Mail::to($email)->send(new SendOtp($mailData));
            
            $rg_tb->save();
            return back()->with("info", "OTP Send Successfully");
        } else {
            return back()->with('error', 'Invalid Email Id');
        }
    }

    function newPassword(Request $req)
    {
        $otp = $req->otp;
        $rg_tb = registration::where('otp', $otp)->first();
        if (empty($rg_tb)) {
            return back()->with('info', 'Invalid OTP');
        } else {
            $New_pwd = $req->npwd;
            $Con_pwd = $req->cpwd;
            if ($New_pwd !== $Con_pwd) {
                return back()->with('info', 'New password and confirmation password do not match');
            } else {
                $rg_tb->password = $New_pwd;
                $rg_tb->otp = null;
                $rg_tb->save();

                return redirect('/Login')->with('success', 'Password reset successfully. You can now login with your new password.');
            }
        }
    }

    function profile(Request $req)
    {
        // $userid = $req->session()->get('uid');
        $userid = Session::get('uid');
        // dd($userid);  
        $userData = registration::find($userid);
        return view('Admin.profile', ['item' => $userData]);
    }

    function editProfile($id)
    {
        $rg_tb = new registration();
        $user = $rg_tb::where('id', $id)->first();
        return view('Admin.editProfile', ['user' => $user]);
    }

    function updateUser(Request $req)
    {
        $userId = $req->userId;
        $rg_tb = registration::find($userId);
        $currentPhotoPath = $rg_tb->photos;

        if ($currentPhotoPath) {
            $currentPhotoFullPath = public_path('photo') . '/' . $currentPhotoPath;
            if (File::exists($currentPhotoFullPath)) {
                File::delete($currentPhotoFullPath);
            }
        }

        $photo = "IMG_" . time() . "." . $req->photo->extension();
        $req->photo->move(public_path('photo'), $photo);

        $rg_tb->name = $req->name;
        $rg_tb->email = $req->email;
        $rg_tb->dob = $req->dob;
        $rg_tb->gender = $req->gender;
        $rg_tb->city = $req->city;
        $tech = implode(',', $req->technology);
        $rg_tb->tech = $tech;
        $rg_tb->address = $req->fulladdress;

        $rg_tb->photos = $photo;

        $rg_tb->save();

        return redirect('/Profile')->with('success', 'Updated successfully');
    }

    function showAllUser()
    {
        $rg_tb = registration::orderBy('id', 'desc')->get();
        return view('Admin.showalluser', ['records' => $rg_tb]);
    }

    function deleteProfile($id)
    {
        $rg_tb = registration::find($id);
        $currentPhotoPath = $rg_tb->photos;
        if ($currentPhotoPath) {
            $currentPhotoFullPath = public_path('photo') . '/' . $currentPhotoPath;
            if (File::exists($currentPhotoFullPath)) {
                File::delete($currentPhotoFullPath);
            }
        }

        $rg_tb->delete();
        return back()->with('success', 'Profile deleted successfully');
    }

    function changePassword(Request $req)
    {
        $userId = $req->session()->get('uid');
        $rg_tb = registration::find($userId);
        $Old_psd = $req->oldpsd;
        $New_psd = $req->newpsd;
        $Con_psd = $req->conpsd;
        // echo $Old_psd . " / " . $New_psd . " / " . $Con_psd;
        if ($Old_psd !== $rg_tb->password) {
            return back()->with('error', 'Invalid Old Password');
        } else {
            if ($New_psd !== $Con_psd) {
                return back()->with('error', 'New password and confirmation password do not match');
            } else {
                $rg_tb->password = $New_psd;
                $rg_tb->save();
                Auth::logout();
                $req->session()->forget('uid');
                return redirect('/Login')->with('success', 'Password changed successfully.');
            }
        }
    }

    function myCourses(Request $req)
    {
        $User = $req->session()->get('uid');
        $data = Orders::where('userId', $User)
            ->orderBy('id', 'desc')
            ->get();
        return view('Admin.courses', ['data' => $data]);
    }

    function payCourses(Request $req, $id = null)
    {
        if ($id !== null) {
            $naPay =  Orders::find($id);
            if (!empty($naPay)) {
                // dd($naPay);
                $id = $id;
                $amount = $naPay->amount;

                $api = new Api(env("RZP_API_KEY"), env("RZP_SECRET_KEY"));
                $rzpOrder = $api->order->create(array('receipt' => 'ORD_' . $id, 'amount' => $amount * 100, 'currency' => 'INR'));

                $naPay->orderId = $rzpOrder->id;
                $naPay->save();
                return back()->with(['amount' => $amount * 100, 'rzpOrder' => $rzpOrder->id]);
            }
        }

        $orders_tb = new Orders();
        $orders_tb->userId = $req->session()->get('uid');
        $orders_tb->name = $req->name;
        $orders_tb->courses = $req->tech;
        $orders_tb->amount = $req->amount;
        // dd($record);
        $orders_tb->save();

        $api = new Api(env("RZP_API_KEY"), env("RZP_SECRET_KEY"));
        $rzpOrder = $api->order->create(array('receipt' => 'ORD_' . $orders_tb->id, 'amount' => $req->amount * 100, 'currency' => 'INR'));

        $order = $orders_tb::find($orders_tb->id);
        $order->orderId = $rzpOrder->id;
        $order->save();
        // dd($order);
        return back()->with(['success' => 'Courses Purchased Successfully.', 'orderId' => $orders_tb->id, 'amount' => $req->amount * 100, 'rzpOrder' => $rzpOrder->id]);
    }

    function success(Request $req)
    {
        // dd($req->all());
        $rzp_order_id = $req->razorpay_order_id;
        $paymentId = $req->razorpay_payment_id;
        $order = Orders::where('orderId', $rzp_order_id)->first();
        if ($order) {
            $order->paymentId = $paymentId;
            $order->save();
            return back()->with('success', 'Payment Successfully.');
        } else {
            return back()->with('error', 'Order not found.');
        }
    }

    function otp()
    {
        $random_number = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        $mailData = [
            'title' => 'Dear User',
            'body' => 'Your OTP is: ' . $random_number,
        ];

        // Mail::raw($mailData['body'], function ($message) {
        //     $message->to('raviup198@gmail.com')
        //         ->subject('Laravel CRUD - OTP');
        // });

        Mail::to('raviup198@gmail.com')->send(new SendOtp($mailData));
    }

    function excelData(Request $req)
    {
        return view('Admin.excel');
    }

    function excelImport(Request $req)
    {
        dd($req->all());
    }
}
