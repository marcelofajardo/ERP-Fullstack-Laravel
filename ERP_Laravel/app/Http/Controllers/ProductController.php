<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.products', compact('products'));
    }

    public function publicIndex()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'required',
            'stock' => 'required|integer'
        ]);

        //$product = Product::create($request->all());
        $product = new Product();
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->stock = $request->stock;
        if ($request->sales) {
            $product->sales = true;
        } else {
            $product->sales = false;
        }
        $product->save();

        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $product = Product::find($id);


        return view('admin.products.product', compact('product'));
    }

    public function showPublic($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));

        //return response()->json($product, 200);
    }

    public function edit($id)
    {

        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'required',
            'stock' => 'required|integer'
        ]);

        //$product->update($request->all());
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->stock = $request->stock;
        if ($request->sales) {
            $product->sales = true;
        } else {
            $product->sales = false;
        }
        $product->save();

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();


        return redirect()->route('product.index');
    }
}
