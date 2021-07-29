<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_product;
use App\Models\Product;

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

        $this->setCondition();

        $conditions = Cart::getConditions();        

        foreach ($cartCollection as $item){
            Cart::addItemCondition($item->id, $conditions);
        }

        return view('order.index', compact('cartCollection','conditions'));
        
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
            /** This fields would be changed when the dessign decision were adapted: discounts and taxes management or Cart library methods */ 
            $order->taxes_id = $request->taxes_id;
            $order->discount_id = $request->discount_id;
            $order->payment_id = $request->payment_id;

            $order->adress_id = $request->adress_id;
            $order->date = today();       
            $order->gross_total =  (Cart::getTotal() == null) ? Cart::getTotal() :  0;;
            $order->net_total =  (Cart::getSubTotal() == null) ? Cart::getSubTotal() :  0;
            $order->comments = $request->comments;
            
            $order->save();
            
            if ($this->storeLines($order->id) == "OK"){
                $cartCollection = Cart::getContent();
                $order->gross_total = Cart::getSubTotal();
                $order->net_total = Cart::getTotal();
                $order->save();
            }

            $orderCollection = Order::all();

        }catch(Exception $e){
            return back()->withError($e->getMessage())->withInput();        
        }

        Cart::clear();
        Cart::session(\Auth::user()->id)->clear();

        return back()->with("success", "Order succefull");

    }


    public function storeLines($order_id){   

        try {
                            
            $cartCollection = Cart::getContent();

            foreach($cartCollection as $item){
    
                $order_product = new Order_product();            
                $order_product->order_id = $order_id;  
                $order_product->product_id = $item->id;
                /* In future developments, it will be necessary to include the discount and taxes managements */
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


    public function setCondition(){       

        $condition_2 = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'ProntoPago',
            'type' => 'discount',
            'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
            'value' => '-10',
            'attributes' => array( // attributes field is optional
                'description' => 'Value rest',
                'more_data' => 'Pronto pago discount'
            ),
            'order' => 2
        ));

        Cart::condition($condition_2);   
    }

  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $products =  array();
        if( \Auth::guest()){
            return redirect()->route('login');
        }

        $order = Order::find($id);
        $order_products = $order->order_products;

       /* foreach($order_products as $item){
            array_push($products,product::find($item->product_id));
        }*/

        return view('order.show',compact('order','order_products'));
    }

    public function list(){
        if( \Auth::guest()){
            return redirect()->route('login');
        }
        $orders = Order::where('user_id',"=",\Auth::user()->id)->get();

        return view('order.list',compact('orders'));


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
