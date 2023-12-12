<?php

namespace App\Http\Controllers\Api; // Update the namespace to match the actual location
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Categorylocation;

class Homepage extends Controller
{
    public function homepage(){ // Update the method name to match the route
        $featuredTour = Category::where('stock',1)->get();
        $locations = Categorylocation::all();
       // dd($featuredTour);
        return view('homepage.app',compact('featuredTour','locations'));
    }

    public function detail($nametour){
        $product = Category::where('nametour',$nametour)->first();
       // dd($product);
        return view('homepage.detail',compact('product'));
    }

    
}
