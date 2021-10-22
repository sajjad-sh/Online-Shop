<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AttTitle;
use App\Models\AttValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return AttTitle::with('att_values')->paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
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

        return response()
            ->json([
                'message' => 'Attribute Value Created Successfully.',
                'data' => $att_value
            ]);
    }

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

        return response()
            ->json([
                'message' => 'Attribute Title Created Successfully.',
                'data' => $att_title
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $att_value = AttValue::find($id);

        $validator = Validator::make($request->all(), [
            'value' => 'required|min:2|max:30'
        ]);

        if($validator)
            $att_value->update($request->all());

        return response()
            ->json([
                'message' => 'Attribute Value Updated Successfully.',
                'data' => $att_value,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $att_value = AttValue::find($id);
        $att_value->delete();

        return response()
            ->json([
                'message' => 'Attribute Value Deleted Successfully.',
                'data' => $att_value,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\AttValue $att_title
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyTitle($id)
    {
        $att_title = AttTitle::find($id);
        $att_title->delete();

        return response()
            ->json([
                'message' => 'Attribute Title Deleted Successfully.',
                'data' => $att_title,
            ]);
    }
}
