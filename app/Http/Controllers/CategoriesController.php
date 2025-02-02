<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories= categories::select('id','categoriesname','icon','remarks')->latest()->get();
        return Inertia::render('categories/Categories',[
            'categories' => $categories,
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
        //
        $model= categories::create([
            'categoriesname'=>$request->categoriesname,
            'icon'=>$request->icon,
            'remarks'=>$request->remarks,
        ]);

        dd($model);
    }

    /**
     * Display the specified resource.
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categories $categories,$id)
    {
        //
        // dd($id);
        $categori= categories::select('id','categoriesname','icon','remarks')->where('id',$id)->first();
        return Inertia::render('categories/Categories',[
            'categoriesedit' => $categori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $model=categories::where('id',$id)->first();
        $model->update([
            'categoriesname'=>$request->categoriesname,
            'icon'=>$request->icon,
            'remarks'=>$request->remarks,
        ]);
        $model->save();
        // dd($model);
        // return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $categories)
    {
        //
        // dd($categories);
        $categories->delete();
    }
}
