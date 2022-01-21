<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoatRequest;
use App\Models\Boat;

class BoatsController extends Controller
{
    public function index()
    {
        $boats = Boat::latest()->get();

        return response($boats, 200);
    }

    public function store(BoatRequest $request)
    {
        $boat = Boat::create($request->all());

        return response($boat, 201);

    }

    public function show($id)
    {
        $boat = Boat::findOrFail($id);

        return response($boat, 200);
    }

    public function update(BoatRequest $request, $id)
    {
        $boat = Boat::findOrFail($id);
        $boat->update($request->all());

        return response($boat, 200);
    }

    public function destroy($id)
    {
        Boat::destroy($id);

        return response(null, 204);
    }
}
