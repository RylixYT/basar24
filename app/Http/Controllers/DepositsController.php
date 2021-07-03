<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Models\Deposit;

class DepositsController extends Controller
{
    public function index()
    {
        $deposits = Deposit::latest()->get();

        return response($deposits, 200);
    }

    public function store(DepositRequest $request)
    {
        $deposit = Deposit::create($request->all());

        return response($deposit, 201);

    }

    public function show($id)
    {
        $deposit = Deposit::findOrFail($id);

        return response($deposit, 200);
    }

    public function update(DepositRequest $request, $id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit->update($request->all());

        return response($deposit, 200);
    }

    public function destroy($id)
    {
        Deposit::destroy($id);

        return response(null, 204);
    }
}
