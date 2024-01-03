<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $defaultEmail = 'admin@example.com';
        $defaultPassword = 'admin123';

    
        $inputEmail = $request->input('email');
        $inputPassword = $request->input('password');

        
        if ($inputEmail === $defaultEmail && $inputPassword === $defaultPassword) {
         
            return redirect()->route('admin.index');
        }

        return redirect()->route('login.login')->with('error', 'Invalid login credentials');
    }
}
