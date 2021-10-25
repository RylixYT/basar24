<?php

namespace App\Http\Controllers;

use App\Http\Requests\VertragRequest;
use App\Models\Vertrag;

class VertragsController extends Controller
{
    public function index()
    {
        $vertrags = Vertrag::firstOrCreate(["id" => 1], ["id" => 1]);

        return response($vertrags, 200);
    }

    public function store(VertragRequest $request)
    {
        $vertrag = Vertrag::create($request->all());

        return response($vertrag, 201);
    }

    public function show($id)
    {
        $vertrag = Vertrag::findOrFail($id);

        return response($vertrag, 200);
    }

    public function update(VertragRequest $request, $id)
    {
        $vertrag = Vertrag::findOrFail($id);
        $vertrag->update($request->all());

        return response($vertrag, 200);
    }

    public function destroy($id)
    {
        Vertrag::destroy($id);

        return response(null, 204);
    }
}
