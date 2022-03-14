<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AllowedSalesLeadTags implements Rule
{
    private const ALLOWED_SALES_LEAD_TAGS = [
        'Phone',
        'Email',
        'Warm',
        'Cold',
        'New',
        'Existing',
    ];

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value): bool
    {
        return in_array($value, self::ALLOWED_SALES_LEAD_TAGS);
    }

    public function message(): string
    {
        return 'The supplied sales lead tag is invalid.';
    }
}
