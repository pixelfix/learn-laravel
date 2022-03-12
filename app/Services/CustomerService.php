<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function store(array $customerDetails): Customer
    {
        $customer = Customer::create([
            'name' => $customerDetails['name'],
            'contact_number' => $customerDetails['contact_number'],
            'address_type' => $customerDetails['address_type'],
            'address' => $customerDetails['address'],
            'city' => $customerDetails['city'],
            'postal_code' => $customerDetails['postal_code'],
        ]);

        return $customer;
    }
}
