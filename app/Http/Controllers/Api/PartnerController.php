<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function getPartner(){
        $data = Partner::get();

        return Helper::response($data, 200);
    }
}
