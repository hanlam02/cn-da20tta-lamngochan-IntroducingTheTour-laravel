<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Revenue extends Controller
{
    public function index()
    {
        //$tour = Category::paginate(8);
        return view('admin.category.revenue');
        
    }
}
