<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Consumable;

class ShoppingcartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request)
    {
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
        }
        else{
            $cart = false;
        }
        return view('cart.index')->with('cart', $cart);
    }

    public function addToCart(Request $request) 
    {
        $consumables = Consumable::find($request->consumable);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($consumables, $consumables->id);
        $request->session()->put('cart', $cart);
        // dd($cart);

        return redirect()->back()->with('success', 'The product has succesfully been added to the cart.');
    }

    public function getCart()
    {
        if(!Session::has('cart')){return view('cart/shoppingcart');}
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart/shoppingcart', ['consumables' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } 
        else {
            Session::forget('cart');
        }
        return redirect()->route('shoppingcart')->with('success', 'Product is succesfully reduces by one.');
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } 
        else {
            Session::forget('cart');
        }
        return redirect('/cart/shoppingcart')->with('success', 'Product is succesfully removed from the cart.');
    }
}
