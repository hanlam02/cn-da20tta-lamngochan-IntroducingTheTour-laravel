<?php

namespace App\Http\Controllers\Api; // Update the namespace to match the actual location
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Homepage extends Controller
{
    public function homepage(){ // Update the method name to match the route
        return view('homepage.app');
    }
}
