<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        $category->parent_id = $request->parent_id;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = "cat-$category->id.".$image->getClientOriginalExtension();
            $path = $image->storeAs("/categories/images", $name);

            $url = '/storage/'.($path);

            $category->image = $url;
        }

        $category->save();

        return redirect()->route('admin.shop.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'slug' => ['required','min:2', 'max:50'],
            'name' => 'required|min:2|max:50',
            'icon' => '',
            'description' => ''
        ]);


        if($validator)
            $category->update($request->all());

        $category->parent_id = $request->parent_id;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = "cat-$category->id.".$image->getClientOriginalExtension();
            $path = $image->storeAs("/categories/images", $name);

            $url = '/storage/'.($path);

            $category->image = $url;
        }

        $category->save();

        return redirect()->route('admin.shop.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
