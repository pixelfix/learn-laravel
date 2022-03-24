<?php

namespace App\Rules;

use App\Enums\AddressTypesEnum;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;

class AllowedAddressTypes implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        // return in_array($value, self::ALLOWED_ADDRESS_TYPES);
        return AddressTypesEnum::hasValue($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The supplied address type is invalid.';
    }
}
