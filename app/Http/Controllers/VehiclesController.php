<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;

class VehiclesController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::latest()->get();

        return response($vehicles, 200);
    }

    public function store(VehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->all());

        return response($vehicle, 201);

    }

    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return response($vehicle, 200);
    }

    public function update(VehicleRequest $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());

        return response($vehicle, 200);
    }

    public function destroy($id)
    {
        Vehicle::destroy($id);

        return response(null, 204);
    }
}
