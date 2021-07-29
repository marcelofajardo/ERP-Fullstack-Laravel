<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_product;

use Illuminate\Http\Request;
use Cart;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $cartCollection = Cart::getContent();

        return view('order.index', compact('cartCollection'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $cartCollection = Cart::getContent();

        return view('order.create', compact('cartCollection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        if( \Auth::guest()){
            return redirect()->route('login');
        }

        try{
            $order = new Order();
            
            $order->user_id = \Auth::user()->id;       
            $order->taxes_id = $request->taxes_id;
            $order->discount_id = $request->discount_id;
            $order->payment_id = $request->payment_id;
            $order->adress_id = $request->adress_id;
            $order->date = today();       
            $order->gross_total =  ($request->gross_total = null) ? $request->gross_total :  0;
            $order->net_total = ($request->net_total = null) ? $request->net_total : 0;
            $order->comments = $request->comments;
            
            $order->save();
            
            if ($this->storeLines($order->id) == "OK"){
                $cartCollection = Cart::getContent();

                foreach($cartCollection as $item){
                    $order->gross_total = $order->gross_total  + $item->price;
                    $order->net_total = $order->net_total  + $item->price;
                }

                $order->save();
            }
        }catch(Exception $e){
            return back()->withError($e->getMessage())->withInput();        
        }
            
        return redirect()->route('order.index')->with("errors", "Pedido no realizado");       

    }


    public function storeLines($order_id){   

        try {
                            
            $cartCollection = Cart::getContent();

            foreach($cartCollection as $item){
    
                $order_product = new Order_product();            
                $order_product->order_id = $order_id;  
                $order_product->product_id = $item->id;
                /* In future developments, it will be necessary to include the management of discounts and taxes */
                $order_product->taxes_id = 0;
                $order_product->discount_id = 0;
                $order_product->quantity = ($item->quantity = null) ? $item->quantity : 1;           

                $order_product->save();
            }
        
        } catch (Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }    
        
        return "OK";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
