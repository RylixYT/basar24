<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoRequest;
use App\Models\Info;

class InfosController extends Controller
{
    public function index()
    {
        $infos = Info::firstOrCreate(["id" => 1], ["id" => 1]);

        return response($infos, 200);
    }

    public function store(InfoRequest $request)
    {
        $info = Info::create($request->all());

        return response($info, 201);
    }

    public function show($id)
    {
        $info = Info::findOrFail($id);

        return response($info, 200);
    }

    public function update(InfoRequest $request, $id)
    {
        $info = Info::findOrFail($id);
        $info->update($request->all());

        return response($info, 200);
    }

    public function destroy($id)
    {
        Info::destroy($id);

        return response(null, 204);
    }
}
