<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */


    public function share(Request $request): array
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
            [
                'name' => 'Product',
                'url' => 'admin.products.index',
                'icon' => 'file-text',
                'permission' => 'view-reports',
            ],
        ];

        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
                'menu' => $menuItems,
            ],
        ];
    }

}
