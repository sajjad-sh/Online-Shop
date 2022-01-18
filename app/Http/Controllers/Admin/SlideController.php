<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $root_category = Category::find(0);

        $home_sliders = array();
        foreach ($root_category->images as $image)
            $home_sliders[] = $image;

        return view('admin.site.sliders.index')
            ->with('sliders', $home_sliders);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'alt' => '',
            'link' => '',
            'title' => '',
            'subtitle' => '',
            'description' => '',
            'file' => 'required',
            'category_id' => 'integer',
        ]);

        $is_primary = isset($request->is_primary);
        $description = $request->description ? $request->description : null;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '-' . $image->getClientOriginalName();
            $image->storeAs("/public/categories/cat-$request->category_id", $name);
            $path = "categories/cat-$request->category_id/" . $name;

            $url = '/storage/'.$path;
            $alt = $request->alt;
            $link = $request->link;
            $title = $request->title;
            $subtitle = $request->subtitle;

            if (empty($alt))
                $alt = $image->getClientOriginalName();

            $image = new Image([
                'url' => $url,
                'alt' => $alt,
                'link' => $link,
                'is_primary' => $is_primary,
                'title' => $title,
                'subtitle' => $subtitle,
                'description' => $description
            ]);

            $category = Category::find($request->category_id);
            $image = $category->images()->save($image);
        }

        return redirect()->route('admin.site.sliders.index');
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
        $categories = Category::all();

        $slider = DB::table('images')->find($id);

        return view('admin.site.sliders.edit')
            ->with('categories', $categories)
            ->with('slider', $slider);
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
        $validated = $request->validate([
            'alt' => '',
            'link' => '',
            'title' => '',
            'subtitle' => '',
            'description' => '',
            'file' => '',
            'category_id' => '',
        ]);

        $is_primary = isset($request->is_primary);
        $description = $request->description ? $request->description : null;

        $alt = $request->alt;
        $link = $request->link;
        $title = $request->title;
        $subtitle = $request->subtitle;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '-' . $image->getClientOriginalName();
            $image->storeAs("/public/categories/cat-$request->category_id", $name);
            $path = "categories/cat-$request->category_id/" . $name;

            $url = '/storage/'.$path;

            if (empty($alt))
                $alt = $image->getClientOriginalName();

            Image::query()->find($id)->update([
                'url' => $url,
                'alt' => $alt,
                'link' => $link,
                'is_primary' => $is_primary,
                'title' => $title,
                'subtitle' => $subtitle,
                'description' => $description
            ]);

        } else {
            Image::query()->find($id)->update([
                'alt' => $alt,
                'link' => $link,
                'is_primary' => $is_primary,
                'title' => $title,
                'subtitle' => $subtitle,
                'description' => $description
            ]);
        }

        return redirect()->route('admin.site.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Image::query()->find($id)->delete();

        return back();
    }
}
