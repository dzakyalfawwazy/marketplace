<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MenuNavigationController extends Controller
{
    //
    public function index()
    {
        $menuItems = [

            [
                'name' => 'DashBoard',
                'url' => 'dashboard',
                'icon' => 'settings',
                'permission' => 'view-admin-menu',
            ],
            [
                'name' => 'Categories',
                'url' => 'admin.categories.index',
                'icon' => 'file-text',
                'permission' => 'view-reports',
            ],
        ];
       $menuItems= categories::all();
        // return response()->json($menuItems);
        return Inertia::render('categories.Categories',[
            'menuItems' => $menuItems,
        ]);
    }
}
