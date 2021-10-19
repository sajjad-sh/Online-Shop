<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\AttTitle;
use App\Models\AttValue;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        if(\auth()->user()->isWriter())
            $products = auth()->user()->products()->withTrashed();
        else
            $products = Product::withTrashed();

        $products = $products->paginate(15);

        return view('admin.shop.products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        $titles = AttTitle::all();
        $values = AttValue::all();

        return view('admin.shop.products.create')
            ->with('titles', $titles)
            ->with('values', $values);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        $special_specifications = json_encode(
            array_combine($request->validated()['s_titles'], $request->validated()['s_values'])
        );

        $product = Product::create([
            'fa_title' => $request->validated()['fa_title'],
            'en_title' => $request->validated()['en_title'],
            'slug' => $request->validated()['slug'],
            'description' => $request->validated()['description'],
            'price' => $request->validated()['price'],
            'inventory' =>  $request->validated()['inventory'],
            'review' =>  $request->validated()['review'],
            'status' =>  $request->validated()['status'],
            'amazing_id' =>  $request->validated()['amazing_id'],
            'special_specifications' =>  $special_specifications,
        ]);

//        $product->amazing()->associate($request->validated()['amazing_id']);

        if($request->validated()['p_values']) {
            foreach ($request->validated()['p_values'] as $p_value)
                $product->att_values()->attach($p_value);
        }

        if ($request->hasFile('file')) {
            $image = $request->file('file');

            $name = time() . '-' . $image->getClientOriginalName();
            $path = $image->storeAs("/public/products/prd-$product->id", $name);

            $url = Storage::url($path);
            $alt = $request->alt;

            if (empty($alt))
                $alt = $image->getClientOriginalName();

            $image = new Image([
                'url' => $url,
                'alt' => $alt,
                'is_primary' => 1,
            ]);

            $product->images()->save($image);
        }
        if ($request->hasFile('files')) {
            $images = $request->file('files');

            foreach ($images as $image) {
                $name = time() . '-' . $image->getClientOriginalName();
                $path = $image->storeAs("/public/products/prd-$product->id", $name);

                $url = Storage::url($path);
                $alt = $request->alt;

                if (empty($alt))
                    $alt = $image->getClientOriginalName();

                $image = new Image([
                    'url' => $url,
                    'alt' => $alt,
                    'is_primary' => 0,
                ]);

                $product->images()->save($image);
            }
        }

        $product->save();

        return redirect()->route('admin.shop.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return View
     */
    public function show(Product $product)
    {
        return view('shop.single-product')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return View
     */
    public function edit(Product $product)
    {
        $all_titles = AttTitle::all();
        $all_values = AttValue::all();

        return view('admin.shop.products.edit')
            ->with('product', $product)
            ->with('all_titles', $all_titles)
            ->with('all_values', $all_values);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        foreach ($request->att_values as $att_value)
            $product->att_values()->attach($att_value);

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

    public function delete($id)
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
