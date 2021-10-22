<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $root_category = Category::find(0);

        $home_sliders = array();
        foreach ($root_category->images as $image)
            $home_sliders[] = $image;

        $amazing_products = Product::query()->whereNotNull('amazing_id')->get();

        return response()
            ->json([
                'sliders' => $home_sliders,
                'amazing_products' => $amazing_products,
            ]);
    }
}
