<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.site.sliders.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$ext = $image->getClientOriginalExtension();
        //$filename  = time() .'-'.$image->getClientOriginalName().'.' . $image->getClientOriginalExtension();

        //storage/categories/cat-10/1633188070-Screenshot (511).png
        //storage/categories/cat-10/1633188256-8.jpg

        $validated = $request->validate([
            'alt' => '',
            'extra' => '',
            'file' => 'required',
            'category_id' => 'integer',
        ]);

        $is_primary = isset($request->is_primary);
        $extra = $request->extra ? $request->extra : null;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '-' . $image->getClientOriginalName();
            $path = $image->storeAs("/public/categories/cat-$request->category_id", $name);

            $url = Storage::url($path);

            $alt = $request->alt;

            if (empty($alt))
                $alt = $image->getClientOriginalName();

            $image = new Image([
                'url' => $url,
                'alt' => $alt,
                'is_primary' => $is_primary,
                'extra' => $extra
            ]);

            $category = Category::find($request->category_id);
            $image = $category->images()->save($image);
        }

        else
            abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
