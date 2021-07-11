<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cart.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = Product::find($request->id);
        if ($product) {
            $cart = Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' =>$product->price,
                'quantity' => $request->quantity?$request->quantity:1,
                'attributes' => array(
                    'brand' => $product->brand,
                )
            ));
        }
        return redirect()->back()->with('success', __('cart.action_add_message'));
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cart)
    {
        Cart::remove($cart);
        return back();
    }

    public function delete() 
    {
        Cart::clear();
        return view('cart.index');
    }    

}