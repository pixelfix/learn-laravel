<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(StoreCustomerRequest $request, CustomerService $customerService)
    {
        $customer = $customerService->store($request->validated());

        return new CustomerResource($customer);
    }
}
