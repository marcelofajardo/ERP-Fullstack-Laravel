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
                    __('cart.brand') => $product->brand,
                )
            ));
        }
        return redirect()->back()->with('success', __('cart.action_add_message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cart)
    {
        // si debes actualizar solo la cantidad de producto
        /*
        Cart::update(456, array(
            'quantity' => 2, // si la cantidad actual del producto es 1, se sumarán 2 items dando como resultado 3
        ));
        */
        // Tambien puedes reducir la cantidad de un item especifico:
        /*
        Cart::update(456, array(
            'quantity' => -1, // a la cantidad actual, se le restará uno
        ));
        */
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
