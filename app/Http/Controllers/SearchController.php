<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class SearchController extends Controller
{   
    public function search(Request $request){
        $restaurants = Restaurant::where('title', 'like', $request->search.'%')->orderBy('title', 'ASC')->get();
        return view('restaurant.search')->with('restaurants', $restaurants);
    }
}
