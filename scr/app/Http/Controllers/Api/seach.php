<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Categorylocation;
use Illuminate\Http\Request;

class seach extends Controller
{
    public function seach($phone) {
        $seach = Categorybooktour::where('phone', $phone)->firstOrFail();
        return view('homepage.seach', compact('seach'));       
    }

    public function searchde(Request $request)
    {
        $search = $request->input('search');

        $domain = $request->input('domain');
        $alltour = Category::where('nametour', 'like', '%' . $search . '%')
            ->paginate(10);
            $alltour->appends(['search' => $search]);
            $locations = Categorylocation::all();
        return view('homepage.interface', compact('alltour', 'locations', 'domain'));
    }
}
