<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::paginate(15);

        return $discounts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $discount = Discount::create($request->validated());

        return response()
            ->json([
                'message' => 'Discount Created Successfully.',
                'data' => $discount,
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
        $validator = Validator::make($request->all(), [
            'code' => ['required','min:3', 'max:50', 'regex:/^[A-Za-z0-9-]+$/', Rule::unique('discounts')->ignore($discount->code, 'code')],
            'title' => 'required', 'min:3', 'max:25',
            'type' => 'required|integer|between:0,1',
            'amount' => 'required|integer',
            'inventory' => 'required|integer',
            'sales' => 'required|integer',
        ]);

        if($validator)
            $discount = $discount->update($request->all());

        return response()
            ->json([
                'message' => 'Discount Updated Successfully.',
                'data' => $discount,
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
        $discount->delete();

        return response()
            ->json([
                'message' => 'Discount Deleted Successfully.'
            ]);
    }
}
