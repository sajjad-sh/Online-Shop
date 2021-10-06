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
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
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
            'price' => $request->validated()['price'],
            'inventory' =>  $request->validated()['inventory'],
            'review' =>  $request->validated()['review'],
            'status' =>  $request->validated()['status'],
            'special_specifications' =>  $special_specifications,
        ]);

        $product->amazing()->associate($request->validated()['amazing_id']);

        foreach ($request->validated()['p_values'] as $p_value)
            $product->att_values()->attach($p_value);

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

//        foreach ($all_titles as $title)
//            echo $title->title.'<br>';

//        dd($product->primary_specification_values[0]->value);
//        dd($product->primary_specification_values[0]->primary_specification_title->title);

//        $p_values = $product->primary_specification_values;
//        $p_titles = $product->primary_specification_values->primary_specification_title;


//        $p_values = [];

//        dd($product->primary_specification_values[1]->primary_specification_title->id);

//        foreach ($product->primary_specification_values as $p_value) {
//            $p_values[] = $p_value->pivot->att_id;
//            $p_titles[] = $p_value->primary_specification_title->id;
//        }

//        dd(array_combine($p_titles, $p_values));

        $s_values = json_decode($product->special_specifications, true);
//        dd($s_values);

        return view('admin.shop.products.edit')
            ->with('product', $product)
            ->with('all_titles', $all_titles)
            ->with('all_values', $all_values)
//            ->with('p_titles', $p_titles)
//            ->with('p_values', $p_values)
            ->with('s_values', $s_values);
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
