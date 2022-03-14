<?php

namespace App\Http\Requests;

use App\Rules\AllowedSalesLeadTags;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSalesLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'min:5', 'max:255'],
            'message' => ['sometimes', 'min:5'],
            'tags' => ['required', 'array'],
            'tags.*' => ['required', 'numeric'],
        ];
    }
}
