<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Consumable;
use App\ConsumableOrder;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = unserialize($request->items);
        if(isset($items)){
            $order = new Order();
            $order->user_id = Auth::id();
            if($order->save()){
                foreach($items as $item){
                    $consumable_order = new ConsumableOrder;
                    $consumable_order->consumable_id = $item['consumable_id'];
                    $consumable_order->restaurant_id = $item['restaurant_id'];
                    $consumable_order->order_id = $order->id;
                    $consumable_order->quantity = $item['qty'];
                    $consumable_order->save();
                }
                $request->session()->forget('cart');
                return redirect()->route('user.index');
            }
        }
        else{
            return redirect()->back()->with('fail', 'Zet eerst iets in uw winkelwagen aub');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
