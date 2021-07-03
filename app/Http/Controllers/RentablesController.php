<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentableRequest;
use App\Models\Rentable;

class RentablesController extends Controller
{
    public function index()
    {
        $rentables = Rentable::latest()->get();

        return response($rentables, 200);
    }

    public function store(RentableRequest $request)
    {
        $rentable = Rentable::create($request->all());

        return response($rentable, 201);

    }

    public function show($id)
    {
        $rentable = Rentable::findOrFail($id);

        return response($rentable, 200);
    }

    public function update(RentableRequest $request, $id)
    {
        $rentable = Rentable::findOrFail($id);
        $rentable->update($request->all());

        return response($rentable, 200);
    }

    public function destroy($id)
    {
        Rentable::destroy($id);

        return response(null, 204);
    }
}
