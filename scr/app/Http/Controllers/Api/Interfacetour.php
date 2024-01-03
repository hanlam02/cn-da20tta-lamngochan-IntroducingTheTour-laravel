<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Categorylocation;

class interfacetour extends Controller
{
    public function index(Request $request){
        // $alltour = Category::paginate(12);
        // $locations = Categorylocation::all();
        // return view('homepage.interface', compact('alltour', 'locations'));

        $query = Category::query();

        $domain = $request->input('domain');
        $domain = $domain ?? null;
        
        if ($domain) {
            $query->where('domain', $domain);
        }
        
        $alltour = $query->paginate(12);
        $locations = Categorylocation::all();
        
        return view('homepage.interface', compact('alltour', 'locations', 'domain'));

    }
}
