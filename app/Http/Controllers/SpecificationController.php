<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSpecificationRequest;
use App\Models\PrimarySpecificationTitle;
use App\Models\PrimarySpecificationValue;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $primary_specification_titles = PrimarySpecificationTitle::with('primary_specification_values')
            ->get();

        return view('admin.shop.specifications.index')
            ->with('primary_specification_titles', $primary_specification_titles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $primary_specification_value = PrimarySpecificationValue::query()->find($id);

        $primary_specification_titles = PrimarySpecificationTitle::all();

        return view('admin.shop.specifications.create-value')
            ->with('primary_specification_titles', $primary_specification_titles)
            ->with('primary_specification_value', $primary_specification_value);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PrimarySpecificationTitle $primary_specification_title
     * @return \Illuminate\Http\Response
     */
    public function show(PrimarySpecificationTitle $primary_specification_title)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PrimarySpecificationTitle $specification
     * @return \Illuminate\Contracts\View\View
     */
//    public function edit($id)
//    {
//        $primary_specification_title = PrimarySpecificationValue::query()->find($id);
//
//        $primary_specification_titles = PrimarySpecificationTitle::all();
//
//        return view('admin.shop.specifications.edit')
//            ->with('primary_specification_titles', $primary_specification_titles)
//            ->with('primary_specification_value', $primary_specification_value);
//    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PrimarySpecificationTitle $specification
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $primary_specification_value = PrimarySpecificationValue::query()->find($id);

        $primary_specification_titles = PrimarySpecificationTitle::all();

        return view('admin.shop.specifications.edit')
            ->with('primary_specification_titles', $primary_specification_titles)
            ->with('primary_specification_value', $primary_specification_value);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PrimarySpecificationTitle $specification
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecificationRequest $request, $id)
    {
        $validated = $request->validated();
        $primary_specification_value = PrimarySpecificationValue::find($id);

        $title = array_values($request->safe()->only('title'))[0];
        $primary_specification_value->spec_title_id = $validated;

        $value = array_values($request->safe()->only('value'))[0];
        $primary_specification_value->value = $validated;

        $primary_specification_value->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PrimarySpecificationValue $primary_specification_value
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $primary_specification_value = PrimarySpecificationValue::find($id);
        $primary_specification_value->delete();
        return back();
    }
}
