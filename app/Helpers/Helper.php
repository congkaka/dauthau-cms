<?php

namespace App\Helpers;

use Illuminate\Support\Facades\View;

class Helper
{
    public static function cleanUrl($url)
    {
        return str_replace(['https://', 'http://', 'www.', '/'], '', $url);
    }

    public static function response($data, $statusCode = 200, $debugMode = false)
    {
        if ($debugMode) return View::make('debug', ['data' => $data]);
        return response()->json(['data' => $data], $statusCode);
    }

    public static function createCacheKey($requestUri, $method = 'GET')
    {
        return 'api_route:' . md5($requestUri . $method);
    }

    public static function print($text, $color = 'green')
    {
        $colors = [
            'red' => "\e[31m",
            'blue' => "\e[34m",
            'green' => "\e[32m",
            'yellow' => "\e[33m"
        ];

        if (array_key_exists($color, $colors)) {
            echo "{$colors[$color]}$text\e[0m" . "\n";
        } else {
            echo "Color not supported";
        }
    }

    public static function wordsCount($str)
    {
        $content = strip_tags($str);
        $content = preg_replace('/\s+/', ' ', $content);
        $content = trim($content);
        return str_word_count($content);
    }

    public static function getDiscountOff($str)
    {
        preg_match('/(\s|^)\$([\d\.]+)(\s|$)/', $str, $b);
        if (!empty($b[2])) $rs = ['value' => $b[2], 'type' => '$'];
        else {
            preg_match('/(\s|^)([\d\.]+)\s?\%/', $str, $b);
            if (!empty($b[2])) $rs = ['value' => $b[2], 'type' => '%'];
        }
        if (!isset($rs)) return;
        return $rs;
    }

    public static function printDiscountInfo($str, $default = '')
    {
        $discountInfo = static::getDiscountOff($str);
        if ($discountInfo && isset($discountInfo['type'])) {
            if ($discountInfo['type']  == '$') return '$' . $discountInfo['value'];
            return $discountInfo['value'] . $discountInfo['type'];
        }
        return $default;
    }

    public function fixedNumber($title, $limit = 6) {
        $hash = crc32($title);
        $fixedNumber = ($hash % $limit) + 1;

        return $fixedNumber;

    }
}
