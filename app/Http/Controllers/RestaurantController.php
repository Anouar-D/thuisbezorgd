<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Restaurant;
use App\Consumable;
use Auth;

class RestaurantController extends Controller
{

    public function search(Request $request){
        $restaurants = Restaurant::where('title', 'like', $request->search.'%')->orderBy('title', 'ASC')->get();
        return view('restaurant.search')->with('restaurants', $restaurants);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::get();
        return view('restaurant.index')->with('restaurants', $restaurants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant;
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'zipcode' => ['required', 'string', 'regex:/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i', 'max:8'],
            'city' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/', 'max:12'],
        ]);
        
        $restaurant->user_id = Auth::id();
        $restaurant->title = $request->title;
        $restaurant->email = $request->email;
        $restaurant->address = $request->address;
        $restaurant->zipcode = $request->zipcode;
        $restaurant->city = $request->city;
        $restaurant->phone = $request->phone;
        if($restaurant->save()){
            return redirect()->route('myRestaurant')->with('success', 'Restaurant toegevoegen gelukt');
        }
        else{
            return redirect()->route('myRestaurant')->with('fail', 'Restaurant toegevoegen Gefaald, probeer het later nogmaals.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $restaurant = Restaurant::with('Consumable')->findOrFail($id);
        $request->session()->put('restaurant_id', $id);
        return view('restaurant.show')->with('restaurant', $restaurant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        if(Auth::id() === $restaurant->user_id){
            return view('restaurant.edit')->with('restaurant', $restaurant  );
        }   
        else{
            return abort(403);            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'zipcode' => ['required', 'string', 'regex:/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i', 'max:8'],
            'city' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/', 'max:12'],
        ]);

        if(Auth::id() === $restaurant->user_id){
            $restaurant->title = $request->title;
            $restaurant->email = $request->email;
            $restaurant->address = $request->address;
            $restaurant->zipcode = $request->zipcode;
            $restaurant->city = $request->city;
            $restaurant->phone = $request->phone;
            if($restaurant->save()){
                return redirect()->route('myRestaurant')->with('status', 'Restaurant geüpdated!');
            }
            else{
                return redirect()->route('myRestaurant')->with('fail', 'Restaurant updaten gefaald, probeer het later nogmaals.');                
            }
        }   
        else{
            return abort(403);            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
