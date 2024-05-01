<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = DB::table('products')
        -> join('categories','products.id','=','categories.id')
        -> select('products.*',"categories.nombre")
        -> get();
        
        return view('Products.index',['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')
        ->orderBy('nombre')
        ->get();
        return view('Products.new', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Products();
        $product->name = $request->name;
        $product->category_id = $request->code;
        $product->price = $request->price;
        $product->stock = $request->stock;
        
        
        $product->save();
    

        $product = DB::table('products')
        -> join('categories','products.id','=','categories.id')
        -> select('products.*',"categories.nombre")
        -> get();
        
        return view('Products.index',['product' => $product]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
