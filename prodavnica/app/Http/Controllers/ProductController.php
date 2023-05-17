<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'product_name'=>'required|string|max:255',
            'description'=>'required|string',
            'price'=>'required',
            'manufacturer_id'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $product=Product::create([
            'product_name'=>$request->product_name,
            'description'=>$request->description,
            'price'=>$request->price,
            'manufacturer_id'=>$request->manufacturer_id,
            'user_id'=>Auth::user()->id,
        ]);
        return response()->json(['Produkt je napravljen',
        new ProductResource($product)]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        $product=Product::find($product_id);
        if(is_null($product)){
            return response()->json('Product nije pronadjen',404);
        }
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator=Validator::make($request->all(),[
            'manufacturer_id'=>'required',
            'product_name'=>'required|string|max:255',
            'description'=>'required|string',
            'price'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        $product->manufacturer_id = $request->manufacturer_id; 
        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->price=$request->price;
        
        $product->save();
        return response()->json(['Proizvod je azuriran',
        new ProductResource($product)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product);
        return response()->json('Product is deleted successfully!');
    }
      
}
