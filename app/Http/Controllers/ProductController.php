<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest('id')->select('id','product_name','product_price')->get();
        //return $products;
        return view('pages.index',compact('products'));
    }

    public function addProduct(Request $request)
    {
        $request->validate(
            [
            'product_name'=>'required',
            'product_price'=>'required'
            ],[
                'product_name.required'=>'Product name is Required',
                'product_price.required'=>'Product price is required',
            ]
        );

        $product = Product::create([
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
        ]);

        return response()->json($product);

    }
}
