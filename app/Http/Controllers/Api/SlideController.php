<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function getSlides(Request $request) {
        try {
            $slides = Slide::limit($request->limit)->get(['link', 'image', 'title', 'description', 'position']);
            if ($slides === 404) return Helper::response(null, 404);
            
            return Helper::response($slides, 200);
        } catch (\Exception $e) {
            return Helper::response($e->getMessage(), 500);
        }
    }
}
