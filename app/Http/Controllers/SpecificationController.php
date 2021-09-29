<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecificationRequest;
use App\Http\Requests\UpdateSpecificationRequest;
use App\Models\PrimarySpecificationTitle;
use App\Models\PrimarySpecificationValue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

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
     * @return View
     */
    public function create()
    {
        $primary_specification_titles = PrimarySpecificationTitle::all();

        return view('admin.shop.specifications.create')
            ->with('primary_specification_titles', $primary_specification_titles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function createTitle()
    {
        return view('admin.shop.specifications.create-title');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'spec_title_id' => '',
            'value' => 'required|min:2|max:30'
        ]);

        $primary_specification_value = new PrimarySpecificationValue;

        $primary_specification_value->spec_title_id = $validated['spec_title_id'];
        $primary_specification_value->value = $validated['value'];

        $primary_specification_value->save();

        return redirect()->route('admin.shop.specifications.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function storeTitle(Request $request)
    {
        $validated = $request->validate([
            'key' => ['required', 'min:2', 'max:50', 'regex:/^[A-Za-z0-9-]+$/', 'unique:primary_specification_titles'],
            'title' => 'required|min:2|max:30'
        ]);

        $primary_specification_title = new PrimarySpecificationTitle();

        $primary_specification_title->key = $validated['key'];
        $primary_specification_title->title = $validated['title'];

        $primary_specification_title->save();

        return redirect()->route('admin.shop.specifications.index');
    }

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
    public function update(Request $request, $id)
    {
        $primary_specification_value = PrimarySpecificationValue::find($id);

        $validator = Validator::make($request->all(), [
            'value' => 'required|min:2|max:30'
        ]);

        if($validator)
            $primary_specification_value->update($request->all());

        return redirect()->route('admin.shop.specifications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PrimarySpecificationValue $primary_specification_value
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $primary_specification_value = PrimarySpecificationValue::find($id);
        $primary_specification_value->delete();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PrimarySpecificationValue $primary_specification_value
     * @return RedirectResponse
     */
    public function destroyTitle($id)
    {
        $primary_specification_title = PrimarySpecificationTitle::find($id);
        $primary_specification_title->delete();
        return back();
    }
}
