<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::latest()->paginate();

        return view('admin.shop.categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.shop.categories.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        $category->parent_id = $request->parent_id;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = "cat-$category->id." . $image->getClientOriginalExtension();
            $path = $image->storeAs("/categories/images", $name);

            $url = '/storage/' . ($path);

            $category->image = $url;
        }

        $category->save();

        return redirect()->route('admin.shop.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(Request $request, Category $category)
    {
        if ($category->parent->id == 0) {
            $category_sliders = array();
            $subcategories = array();

            foreach ($category->images as $image)
                $category_sliders[] = $image;

            $amazing_products = $category->products()->whereNotNull('amazing_id')->latest()->take(10)->get();

            //5 ta subcategory befrest
            //baraye har kodum 4 mahsul

            $subcategories = $category->childrens;

            if($subcategories->count()>4)
                $subcategories = $subcategories->random(4);

            $products = array();

            $i=0;
            foreach ($subcategories as $subcategory) {
                $n = $subcategory->products->count();

                if($n<4)
                    $products[$i] = $subcategory->products;
                else
                    $products[$i] = $subcategory->products->random(4);

                $i++;
            }

            return view('shop.single-category')
                ->with('category', $category)
                ->with('category_sliders', $category_sliders)
                ->with('amazing_products', $amazing_products)
                ->with('subcategories', $subcategories)
                ->with('products', $products);
        } else {
            $brother_categories = Category::query()->where('parent_id', $category->parent->id)->get();
            $products = $category->products();

            if(isset($request->orderBy)) {
                switch ($request->orderBy) {
                    case 'visits':
                        $products = $products->orderBy('visits', 'desc');
                        break;
                    case 'sales':
                        $products = $products->orderBy('sales', 'desc');
                        break;
                    case 'newest':
                        $products = $products->latest();
                        break;
                    case 'cheapest':
                        $products = $products->orderBy('price');
                        break;
                    case 'expensive':
                        $products = $products->orderBy('price', 'desc');
                        break;
                }

            } else {
                $products = $products->latest();
            }
            $products = $products->paginate(12);
            $products->appends(request()->query());



            return view('shop.single-subcategory')
                ->with('category', $category)
                ->with('brother_categories', $brother_categories)
                ->with('products', $products);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category)
    {
        return view('admin.shop.categories.edit')
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'slug' => ['required', 'min:2', 'max:50'],
            'name' => 'required|min:2|max:50',
            'icon' => '',
            'description' => ''
        ]);


        if ($validator)
            $category->update($request->all());

        $category->parent_id = $request->parent_id;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = "cat-$category->id." . $image->getClientOriginalExtension();
            $path = $image->storeAs("/categories/images", $name);

            $url = '/storage/' . ($path);

            $category->image = $url;
        }

        $category->save();

        return redirect()->route('admin.shop.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
