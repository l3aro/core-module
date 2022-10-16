<?php

namespace App\Enums\Concerns;

trait DefineEnumValue
{
    public static function values(): array
    {
        return array_map(fn (self $case) => $case->value, self::cases());
    }
}
