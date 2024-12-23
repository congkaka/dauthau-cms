<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function getAll(Request $request)
    {
        $data = Practice::all();

        return Helper::response($data, 200);
    }
}
