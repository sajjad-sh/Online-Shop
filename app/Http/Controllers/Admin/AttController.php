<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttTitle;
use App\Models\AttValue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AttController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (! Gate::allows('show-admin-panel', auth()->user())) {
            abort(403);
        }

        $att_titles = AttTitle::with('att_values')
            ->get();

        return view('admin.shop.attributes.index')
            ->with('att_titles', $att_titles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        if (! Gate::allows('show-admin-panel', auth()->user())) {
            abort(403);
        }

        $att_titles = AttTitle::all();

        return view('admin.shop.attributes.create')
            ->with('att_titles', $att_titles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function createTitle()
    {
        if (! Gate::allows('show-admin-panel', auth()->user())) {
            abort(403);
        }

        return view('admin.shop.attributes.create-title');
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
            'att_title_id' => '',
            'value' => 'required|min:2|max:30'
        ]);

        $att_value = new AttValue;

        $att_value->att_title_id = $validated['att_title_id'];
        $att_value->value = $validated['value'];

        $att_value->save();

        return redirect()->route('admin.shop.attributes.index');
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
            'key' => ['required', 'min:2', 'max:50', 'regex:/^[A-Za-z0-9-]+$/', 'unique:att_titles'],
            'title' => 'required|min:2|max:30'
        ]);

        $att_title = new AttTitle();

        $att_title->key = $validated['key'];
        $att_title->title = $validated['title'];

        $att_title->save();

        return redirect()->route('admin.shop.attributes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\AttTitle $att_title
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $att_value = AttValue::find($id);

        $validator = Validator::make($request->all(), [
            'value' => 'required|min:2|max:30'
        ]);

        if($validator)
            $att_value->update($request->all());

        return redirect()->route('admin.shop.attributes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\AttValue $att_value
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $att_value = AttValue::find($id);
        $att_value->delete();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\AttValue $att_title
     * @return RedirectResponse
     */
    public function destroyTitle($id)
    {
        $att_title = AttTitle::find($id);
        $att_title->delete();

        return back();
    }
}
