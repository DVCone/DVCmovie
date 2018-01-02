<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
        public function login()
        {
            return view('auth.login');
        }
        
        public function logout()
        {
            Auth::logout();

            return redirect('/login');
        }
        
        
        public function authenticate(Request $request)
        {
            $email = $request->input('email');
            $password = $request->input('password');
    
            $dataLogin = ['email' => $email, 'password' => $password, 'role' => 'guest'];
            $dataLoginAdmin = ['email' => $email, 'password' => $password, 'role' => 'admin'];
            
            if(Auth::attempt($dataLogin))
            {
                return redirect('/guest');
            } elseif (Auth::attempt($dataLoginAdmin)) {
                return redirect('/home');
            }

        return redirect()->back()->with("error", "gagal login");
        }

        public function destroy()
        {
            Auth::logout();
    
            return redirect('/login');
        }
}
