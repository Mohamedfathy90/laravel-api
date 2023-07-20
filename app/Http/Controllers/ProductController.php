<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name'  => ['required','string'],
            'price' => ['min:0','numeric','required'],
            'description'=>['string']
        ]);
        $credentials['slug']=Str::slug($request->name); 
        Product::create($credentials);
        return response()->json(['message'=>"Product has been added successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $credentials = $request->validate([
            'name'  => ['string'],
            'price' => ['min:0','numeric'],
            'description'=>['string'] 
        ]);
        if($request->has('name'))
        $credentials['slug']=Str::slug($request->name); 
        $product->update($credentials);
        return response()->json(['message'=>"Product has been updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message'=>"Product has been deleted successfully"]);
    }

    public function search($name) 
    {
        return response()->json(Product::where('name','like','%'.$name.'%')->get());
    }
}
