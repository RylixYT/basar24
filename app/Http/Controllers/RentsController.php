<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentRequest;
use App\Models\Rent;

class RentsController extends Controller
{
    public function index()
    {
        $rents = Rent::with(["owner", "customer"])->orderBy("id", "DESC")->get();

        return response($rents, 200);
    }

    public function store(RentRequest $request)
    {
        $rent = Rent::create($request->all());

        return response($rent->id, 201);
    }

    public function show($id)
    {
        $rent = Rent::findOrFail($id);

        return response($rent, 200);
    }

    public function update(RentRequest $request, $id)
    {
        $rent = Rent::findOrFail($id);
        $rent->update($request->all());

        return response($rent, 200);
    }

    public function destroy($id)
    {
        Rent::destroy($id);

        return response(null, 204);
    }
}
