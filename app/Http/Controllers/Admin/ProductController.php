<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\AttTitle;
use App\Models\AttValue;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
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
        if (! Gate::allows('show-admin-panel', auth()->user())) {
            abort(403);
        }

        if(auth()->user()->isWriter())
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
        if (! Gate::allows('show-admin-panel', auth()->user())) {
            abort(403);
        }

        $categories = Category::all();

        return view('admin.shop.products.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        $special_specifications = null;

        if($request->has('mykeys') && $request->has('myvalues')) {
            $special_specifications = json_encode(
                array_combine($request->validated()['mykeys'], $request->validated()['myvalues'])
            );
        }

        $product = Product::create([
            'fa_title' => $request->validated()['fa_title'],
            'en_title' => $request->validated()['en_title'],
            'description' => $request->validated()['description'],
            'slug' => $request->validated()['slug'],
            'atts' => $special_specifications,
            'color' => $request->validated()['color'],
            'brand' =>  $request->validated()['brand'],
            'price' => $request->validated()['price'],
            'inventory' =>  $request->validated()['inventory'],
            'review' =>  $request->validated()['review'],
            'status' =>  $request->validated()['status'],
            'amazing_id' =>  $request->validated()['amazing_id'],
        ]);

        foreach ($request->categories as $category_id) {
            DB::table('category_product')->insert([
                'category_id' => $category_id,
                'product_id' => $product->id,
            ]);
        }

        if ($request->hasFile('file')) {
            $image = $request->file('file');

            $name = time() . '-' . $image->getClientOriginalName();
            $img = \Intervention\Image\Facades\Image::make($image->getRealPath());
            $img->insert(public_path('img/logo/logo.png'), 'bottom-right', 10, 10);

            if (!file_exists(storage_path("app/public/products/prd-$product->id"))) {
                mkdir(storage_path("app/public/products/prd-$product->id"), 666, true);
            }

            $spath = storage_path("app/public/products/prd-$product->id/$name");
            $img->save($spath);

            $path = "products/prd-$product->id/$name";

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
                $img = \Intervention\Image\Facades\Image::make($image->getRealPath());
                $img->insert(public_path('img/logo/logo.png'), 'bottom-right', 10, 10);

                if (!file_exists(storage_path("app/public/products/prd-$product->id"))) {
                    mkdir(storage_path("app/public/products/prd-$product->id"), 666, true);
                }

                $spath = storage_path("app/public/products/prd-$product->id/$name");
                $img->save($spath);

                $path = "products/prd-$product->id/$name";
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
        $product->visits += 1;
        $product->save();

        $latest_products = [];
        if(auth()->user() != null) {
            $user = User::find(auth()->user()->id);

            $j_latest_products = $user->latest_products;
            if($j_latest_products != null) {
                $latest_products = json_decode($j_latest_products, true);
            } else {
                $latest_products = [];
            }

            if(!in_array($product->id, $latest_products)) {
                if(count($latest_products) >= 5) {
                    array_shift($latest_products);
                }
                $latest_products[] = $product->id;
            }

            $j_latest_products = json_encode($latest_products);

            $user->latest_products = $j_latest_products;
            $user->save();

            $latest_products = Product::query()->findMany($latest_products);
        }
        return view('shop.single-product')
            ->with('product', $product)
            ->with('latest_products', $latest_products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return View
     */
    public function edit(Product $product)
    {
        if (! Gate::allows('show-admin-panel', auth()->user())) {
            abort(403);
        }

        return view('admin.shop.products.edit')
            ->with('product', $product);
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

    public function compareProduct(Product $product1, Product $product2)
    {
        return view('shop.compare-products')
            ->with('p1', $product1)
            ->with('p2', $product2);
    }
}
