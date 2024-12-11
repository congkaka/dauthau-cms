<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function getExpert(){
        $data = Expert::whereNull('type')->get();

        return Helper::response($data, 200);
    }

    public function groupExpert() {
        $data = Expert::whereIn('type', [23, 24])
        ->orderBy('position', 'asc')
        ->get()
        ->groupBy('type')
        ->mapWithKeys(function ($item, $key) {
            $newKey = $key == 23 ? 'group1' : ($key == 24 ? 'group2' : $key);
            return [$newKey => $item];
        });

        return Helper::response($data, 200);
    } 
}
