<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesLeadRequest;
use App\Http\Requests\UpdateSalesLeadRequest;
use App\Http\Resources\SalesLeadResource;
use App\Models\SalesLead;
use App\Services\SalesLeadService;
use Illuminate\Http\Request;

class SalesLeadController extends Controller
{
    public function store(StoreSalesLeadRequest $request, SalesLeadService $salesLeadService)
    {
        $salesLead = $salesLeadService->store($request->validated());

        return new SalesLeadResource($salesLead);
    }

    public function update(UpdateSalesLeadRequest $request, SalesLead $salesLead, SalesLeadService $salesLeadService)
    {
        $salesLead = $salesLeadService->update($request->validated(), $salesLead);

        return new SalesLeadResource($salesLead);
    }
}
