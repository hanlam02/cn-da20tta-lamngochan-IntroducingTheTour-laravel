<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    // public function register(){
    //     return view('admin.register');
    // }

}
