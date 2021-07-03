<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Models\Ad;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->get();

        return response($ads, 200);
    }

    public function store(AdRequest $request)
    {
        $ad = Ad::create($request->all());

        return response($ad, 201);

    }

    public function show($id)
    {
        $ad = Ad::findOrFail($id);

        return response($ad, 200);
    }

    public function update(AdRequest $request, $id)
    {
        $ad = Ad::findOrFail($id);
        $ad->update($request->all());

        return response($ad, 200);
    }

    public function destroy($id)
    {
        Ad::destroy($id);

        return response(null, 204);
    }
}
