<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate();

        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
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

        return response()
            ->json([
                'message' => 'Category Created Successfully!',
                'data' => $category,
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Category $category)
    {
        if ($category->parent->id == 0) {
            $type = 'category';
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

            return response()
                ->json([
                    'type' => $type,
                    'data' => $category,
                    'sliders' => $category_sliders,
                    'amazing_products' => $amazing_products,
                    'subcategories' => $subcategories,
                    'products' => $products
                ]);
        } else {
            $type = 'subcategory';
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

            return response()
                ->json([
                    'type' => $type,
                    'data' => $category,
                    'brother_categories' => $brother_categories,
                    'products' => $products,
                ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
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

        return response()
            ->json([
                'message' => 'Category Updated Successfully!',
                'data' => $category,
            ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()
            ->json([
                'message' => 'Category Deleted Successfully!',
                'data' => $category,
            ], 201);
    }
}
