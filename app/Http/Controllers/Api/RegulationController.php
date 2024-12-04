<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    public function getRegulation()
    {
        $regulations = Regulation::paginate(10);
        // foreach($regulations as $regulation) {
        //     $regulation->download_path = $regulation->download_path;
        // }

        return Helper::response($regulations, 200);
    }
}
