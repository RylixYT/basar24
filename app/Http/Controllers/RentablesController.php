<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentableRequest;
use App\Models\Customer;
use App\Models\Rent;
use App\Models\Rentable;
use Carbon\Carbon;

class RentablesController extends Controller
{
    public function index()
    {
        $this->getExpired();

        $rentables = Rentable::with(["owner", "customer", "car"])->orderBy("name")->get();

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

    public function getExpired()
    {
        $rentables = Rentable::whereRaw("rent_id <> ''")->with("rent")->get();
        foreach ($rentables as $rentable) {
            if (($rentable->rent->end == today()->format("Y-m-d") && now()->between(today()->addHours(20), today()->addHours(24))) || $rentable->rent->end < today()->format("Y-m-d")) {
                Rentable::find($rentable->id)->update(["rent_id" => null]);
            }
        }
    }
}
