<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\PrimarySpecificationTitle;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::withTrashed()->get();

        return view('admin.shop.products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $special_specifications = json_decode($product->special_specifications, true);

        $primary_specification_titles = PrimarySpecificationTitle::with(['primary_specification_values'])
            ->get();

        return view('admin.shop.products.edit')
            ->with('product', $product)
            ->with('special_specifications', $special_specifications)
            ->with('primary_specification_titles', $primary_specification_titles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($product->update($request->validated()))
            return redirect()->route('admin.shop.products.index');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return back();
    }

    public function forceDelete($id)
    {
        $product = Product::withTrashed()->find($id);

        $product->forceDelete();

        return back();
    }

    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();

        return back();
    }
}
