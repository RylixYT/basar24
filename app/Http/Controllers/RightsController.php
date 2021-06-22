<?php

namespace App\Http\Controllers;

use App\Http\Requests\RightRequest;
use App\Models\Right;

class RightsController extends Controller
{
    public function index()
    {
        $rights = Right::latest()->get();

        return response($rights, 200);
    }

    public function store(RightRequest $request)
    {
        $right = Right::create($request->all());

        return response($right, 201);

    }

    public function show($id)
    {
        $right = Right::findOrFail($id);

        return response($right, 200);
    }

    public function update(RightRequest $request, $id)
    {
        $right = Right::findOrFail($id);
        $right->update($request->all());

        return response($right, 200);
    }

    public function destroy($id)
    {
        Right::destroy($id);

        return response(null, 204);
    }
}
