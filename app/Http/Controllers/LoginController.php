<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->username == "admin" && $request->password == "admin"){
            $_SESSION['username'] = $request->username ;
            return redirect('/dashboard');
        }
        else{
            return redirect('/');
        }
    }
}
