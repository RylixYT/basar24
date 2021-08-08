<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::with("cars")->orderBy("id", "ASC")->get();

        return response($customers, 200);
    }

    public function store(CustomerRequest $request)
    {
        $customer = Customer::create($request->all());

        return response($customer, 201);
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return response($customer, 200);
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return response($customer, 200);
    }

    public function destroy($id)
    {
        Customer::destroy($id);

        return response(null, 204);
    }
}
