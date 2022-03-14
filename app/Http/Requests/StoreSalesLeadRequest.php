<?php

namespace App\Http\Requests;

use App\Rules\AllowedSalesLeadTags;
use Illuminate\Foundation\Http\FormRequest;

class StoreSalesLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:5', 'max:255'],
            'message' => ['required', 'min:5'],
            'tags' => ['required', 'array'],
            'tags.*' => [new AllowedSalesLeadTags]
        ];
    }
}
