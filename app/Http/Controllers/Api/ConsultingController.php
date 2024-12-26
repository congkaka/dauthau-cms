<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Consulting;
use Illuminate\Http\Request;

class ConsultingController extends Controller
{
    public function getAll() {
        $data = Consulting::get();

        return Helper::response($data, 200);
    }

    public function getConsultingDetails($alias, Request $request) {
        $data = Consulting::where('alias', $alias)->first();

        return Helper::response($data, 200);
    }


}
