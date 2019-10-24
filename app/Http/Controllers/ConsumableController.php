<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Restaurant;
use App\Consumable;

class ConsumableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('consumable.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $restaurantId)
    {
        $consumable = new Consumable;

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string','min:2', 'max:64000'],
            'price' => ['required', 'numeric'],
        ]);

        $consumable->restaurant_id = $restaurantId;
        $consumable->name = $request->title;
        if($request->category > 0 && $request->category < 4){
            $consumable->category = $request->category;
        }
        else{
            return redirect()->back()->with('fail', 'Probeer opnieuw, You SHALL NOT REWRITE MY CODE MUHAHAHAHA');
        }
        $consumable->description = $request->description;
        $consumable->price = $request->price;
        if($consumable->save()){
            return redirect()->route('restaurants.show', $restaurant_id)->with('status', 'Product Toegevoegd!');
        }
        else{
            return redirect()->route('restaurants.show', $restaurant_id)->with('fail', 'Product toevoegen gefaald, probeer het later nogmaals');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $restaurantId, $id)
    {
        $consumable = Consumable::findOrFail($id);
        return view('consumable.show')->with('consumable', $consumable);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
