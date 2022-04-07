<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logCheck(Request $req)
    {
        $data = $req->all();

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            // return redirect()->route('dashboard');
            return response()->json([
                "failed" => "Credentials"
            ]);
        } else {
            return response()->json([
                "failed" => "Invalid Credentials"
            ]);
        }
    }
    public function logOut(Request $req)
    {
        Auth::logout();
        return response()->json([
            "status" => "logout"
        ]);
           
        
    }
}
