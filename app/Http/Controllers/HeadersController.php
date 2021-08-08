<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeaderRequest;
use App\Models\Header;

class HeadersController extends Controller
{
    public function index()
    {
        $headers = Header::latest()->get();

        return response($headers, 200);
    }

    public function store(HeaderRequest $request)
    {
        $header = Header::create($request->all());

        return response($header, 201);

    }

    public function show($id)
    {
        $header = Header::findOrFail($id);

        return response($header, 200);
    }

    public function update(HeaderRequest $request, $id)
    {
        $header = Header::findOrFail($id);
        $header->update($request->all());

        return response($header, 200);
    }

    public function destroy($id)
    {
        Header::destroy($id);

        return response(null, 204);
    }
}
