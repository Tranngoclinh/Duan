<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class LoginController extends Controller
{
    public function login()
    {
        return view('Customer.login');
    }

    public function adminlogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $check = Admin::where('email', $email)->take(1)->first();
        $checkpass = Admin::where('password', $password)->take(1)->first();
        if ($check) {
            if ($checkpass) {
                return redirect()->route('customers.index');
            }
        } else {
            
        }
    }
}
