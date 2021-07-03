<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscountRequest;
use App\Models\Discount;

class DiscountsController extends Controller
{
    public function index()
    {
        $discounts = Discount::latest()->get();

        return response($discounts, 200);
    }

    public function store(DiscountRequest $request)
    {
        $discount = Discount::create($request->all());

        return response($discount, 201);

    }

    public function show($id)
    {
        $discount = Discount::findOrFail($id);

        return response($discount, 200);
    }

    public function update(DiscountRequest $request, $id)
    {
        $discount = Discount::findOrFail($id);
        $discount->update($request->all());

        return response($discount, 200);
    }

    public function destroy($id)
    {
        Discount::destroy($id);

        return response(null, 204);
    }
}
