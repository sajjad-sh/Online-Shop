<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isWriter())
            $products = auth()->user()->products()->withTrashed();
        else
            $products = Product::withTrashed();

        $products = $products->with(['categories', 'att_values', 'comments'])->paginate(15);

        return $products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
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

        return response()
            ->json([
                'message' => 'Product Created Successfully!',
                'data' => $product
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Product
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        foreach ($request->att_values as $att_value)
            $product->att_values()->attach($att_value);

        if ($product->update($request->validated()))
            return response()
                ->json([
                    'message' => 'Product Updated Successfully!',
                    'data' => $product
                ], 200);

        return response()
            ->json([
                'message' => 'Deleted Failed!',
            ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()
            ->json([
                'message' => 'Soft Deleted Successfully!',
            ], 200);
    }

    public function delete($id)
    {
        $product = Product::withTrashed()->find($id);

        $product->forceDelete();

        return response()
            ->json([
                'message' => 'Force Deleted Successfully!',
            ], 200);
    }

    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();

        return response()
            ->json([
                'message' => 'Restore Successfully!',
            ], 200);
    }
}
