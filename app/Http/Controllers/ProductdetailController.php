<?php

namespace App\Http\Controllers;

use App\Models\productdetail;
use App\Http\Requests\StoreproductdetailRequest;
use App\Http\Requests\UpdateproductdetailRequest;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProductdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_product)
    {
        //

        $detail= productdetail::with(['product.category','product'])->where('idproduct',$id_product)->latest()->get();
        $header = product::select('id','nameproduct')->where('id',$id_product)->first();

        // dd($header);
        return Inertia::render('productsdetails/Productsdetails',[
            'details' => $detail,
            'headers' => $header,
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
    public function store(Request $request,$id_product)
    {
        // dd($request);
        if($request->hasFile('image'))
        {
            $image = Storage::disk('public')->put('images/productsdetails', $request->file('image'));

        }
        // dd($image);
        productdetail::create([
            'idproduct'=>$request->idproduct,
            'weight'=>$request->weight,
            'size'=>$request->size,
            'color'=>$request->color,
            'baseprice'=>$request->baseprice,
            'sellprice'=>$request->sellprice,
            'description'=>$request->description,
            'image'=>$image,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(productdetail $productdetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_product, productdetail $productdetail)
    {
        //
        // dd($productdetail);

        $header = product::select('id','nameproduct')->where('id',$id_product)->first();
         return Inertia::render('productsdetails/Productsdetails',[
            'detailsedit' => $productdetail,
            'headers' => $header,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id_product, Request $request, productdetail $productdetail)
    {
        //
         $model= $productdetail->update([
            'weight'=>$request->weight,
            'size'=>$request->size,
            'color'=>$request->color,
            'baseprice'=>$request->baseprice,
            'sellprice'=>$request->sellprice,
            'description'=>$request->description,
            'image'=>$request->image,
        ]);

        $productdetail->save();
        // dd($model);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_product,productdetail $productdetail)
    {
        //
         if ($productdetail->image) {
        Storage::disk('public')->delete($productdetail->image);
    }
        $productdetail->delete();
    }
}
