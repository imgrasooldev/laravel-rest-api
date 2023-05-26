<?php

namespace App\Services\Api\V1;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerService
{
    public function createCustomer(Request $request): Customer
    {
        # Create a customer
        $customer = Customer::create($request->all());
        return $customer;
    }

    public function updateCustomer(Request $request, $customer): Customer
    {
        # Update a customer
        $customer->update($request->all());
        return $customer;
    }
}
