<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Discount;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $discounts = Discount::all();

        return view('admin.discounts.index')
            ->with('discounts', $discounts);
    }

    # TODO: Refactor CRUD Methods with latest laravel doc
    /**
     * Show the form for creating a new discount.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDiscountRequest $request
     * @return RedirectResponse
     */
    public function store(StoreDiscountRequest $request)
    {
        Discount::create($request->validated());

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Discount  $discount
     * @return View
     */
    public function edit(Discount $discount)
    {
        return view('admin.discounts.edit')
            ->with('discount', $discount);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */

    # TODO: Fix unique ignore
    public function update(Request $request, Discount $discount)
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
            $discount->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        //
    }
}
