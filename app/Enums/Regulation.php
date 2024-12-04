<?php

namespace App\Enums;

enum Regulation: string
{
    case PUBLISHED = 'PUBLISHED';
    case DRAFT = 'DRAFT';
    case PENDING = 'PENDING';

    public static function getMap(): array
    {
        return [
            1 => 'Published',
            0 => 'Draft',
            2 => 'Pending'
        ];
    }

    public static function list(): array
    {
        return [
            'Bộ Kế hoạch và Đầu tư',
            'Chính phủ',
            'Quốc hội',
            'Thủ tướng Chính phủ',
            'Bộ Tài chính',
            'Bộ Kế hoạch và Đầu tư và Bộ Tài chính',
            'ADB&WB',
            'Bộ Lao động, Thương binh và Xã hội'
        ];
    }

    public static function type(): array
    {
        return [
            'Luật pháp',
            'Nghị Định',
            'Nghị Quyết'
        ];
    }
}
