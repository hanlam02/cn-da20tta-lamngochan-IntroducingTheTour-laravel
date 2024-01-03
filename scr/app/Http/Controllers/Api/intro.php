<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class intro extends Controller
{
    public function hn()
    {
        //$tour = Category::paginate(8);
        return view('admin.intro.hanoi');
        
    }
}
