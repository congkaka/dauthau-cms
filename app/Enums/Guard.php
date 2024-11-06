<?php

namespace App\Enums;

enum Guard: string
{
    case WEB = 'web';

    public static function getMap(): array
    {
        return [
            self::WEB->value => 'Web'
        ];
    }
}
