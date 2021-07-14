<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscountRequest;
use App\Models\Discount;

class DiscountsController extends Controller
{
    public function index()
    {
        $discount = Discount::firstOrCreate(["id" => 1], ["id" => 1]);
        return response($discount, 200);
    }

    public function update(DiscountRequest $request, $id)
    {
        $discount = Discount::findOrFail($id);
        $discount->update($request->all());

        return response($discount, 200);
    }
}
