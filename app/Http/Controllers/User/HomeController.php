<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $root_category = Category::find(0);

        $home_sliders = array();
        foreach ($root_category->images as $image) {
            $home_sliders[] = $image;
        }

        $amazing_products = Product::query()->whereNotNull('amazing_id')->get();

        $most_visits = Product::query()->orderByDesc('visits')->limit(8)->get();
        $most_sales = Product::query()->orderByDesc('sales')->limit(10)->get();

        return view('shop.home')
            ->with('home_sliders', $home_sliders)
            ->with('amazing_products', $amazing_products)
            ->with('most_sales', $most_sales)
            ->with('most_visits', $most_visits);
    }
}
