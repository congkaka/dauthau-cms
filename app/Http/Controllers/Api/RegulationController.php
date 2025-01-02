<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    public function getRegulation(Request $request)
    {
        $regulations = Regulation::query();

        if(!empty($request->title)) $regulations->where('title', 'like', '%'.$request->title.'%');
        if(!empty($request->type)) $regulations->where('type', '=', $request->type);
        if(!empty($request->validity_type)) $regulations->where('validity_type', '=', $request->validity_type);

        $regulations = $regulations
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
        // foreach($regulations as $regulation) {
        //     $regulation->download_path = $regulation->download_path;
        // }

        return Helper::response($regulations, 200);
    }

    public function getDocumentType()
    {
        $document_types = Category::where('parent_id', '=', 8)->get();

        return Helper::response($document_types, 200);
    }

    public function getValidityType()
    {
        $document_types = Category::where('parent_id', '=', 9)->get();

        return Helper::response($document_types, 200);
    }
    
}
