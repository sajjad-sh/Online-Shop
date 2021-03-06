<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Discount;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
        if (! Gate::allows('show-admin-panel', auth()->user())) {
            abort(403);
        }

        $discounts = Discount::paginate(15);

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
        if (! Gate::allows('show-admin-panel', auth()->user())) {
            abort(403);
        }

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

        return redirect()->route('admin.discounts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Discount  $discount
     * @return View
     */
    public function edit(Discount $discount)
    {
        if (! Gate::allows('show-admin-panel', auth()->user())) {
            abort(403);
        }

        return view('admin.discounts.edit')
            ->with('discount', $discount);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return RedirectResponse
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
        ]);

        if($validator)
            $discount->update($request->all());

        return redirect()->route('admin.discounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return RedirectResponse
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return back();
    }
}
