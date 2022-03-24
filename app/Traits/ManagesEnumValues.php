<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait ManagesEnumValues
{
    public static function getValues(): Collection
    {
        return collect(self::cases())->pluck('value');
    }

    public static function hasValue(string $value): bool
    {
        return self::getValues()->contains($value);
    }
}
