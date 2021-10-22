<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
//$ext = $image->getClientOriginalExtension();
        //$filename  = time() .'-'.$image->getClientOriginalName().'.' . $image->getClientOriginalExtension();

        //storage/categories/cat-10/1633188070-Screenshot (511).png
        //storage/categories/cat-10/1633188256-8.jpg

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
            $path = $image->storeAs("/categories/cat-$request->category_id", $name);

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

        return response()
            ->json([
                'message' => 'Slider created successfully.',
                'data' => $image,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
