<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\categories;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductstoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product= product::with('category')->latest()->get();
        $category = categories::select('id','categoriesname')->get();

        // dd($product->category);
        return Inertia::render('storepages/products/Products',[
            'products' => $product,
            'category' => $category,
        ]);
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

        product::create([
            'nameproduct' =>$request->nameproduct,
            'idcategory' =>$request->idcategory,
            'description' =>$request->description,
        ]);
        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
        $category = categories::select('id','categoriesname')->get();
        return Inertia::render('products/Products',[
            'productsedit' => $product,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $product->update([
            'nameproduct' =>$request->nameproduct,
            'idcategory' =>$request->idcategory,
            'description' =>$request->description,
        ]);
        $product->save();
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
        $product->delete();
    }
}
