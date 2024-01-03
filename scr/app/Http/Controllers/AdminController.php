<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
         $defaultEmail = 'admin@example.com';
        $defaultPassword = 'admin123';

    
        $inputEmail = $request->input('email');
        $inputPassword = $request->input('password');

        
        if ($inputEmail === $defaultEmail && $inputPassword === $defaultPassword) {
           
            return redirect()->route('admin.index');
        }

       
    }

    public function index()
    {
         return view('admin.index');
    }

}
