<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function getTraining($alias, Request $request){

        $data = Training::where('alias', $alias);

        if($request->has('training_apk')) $data->where('id', $request->get('training_apk'));

        $data = $data->first();

        return Helper::response($data, 200);
    }

    public function getAllTraining(){
        $data = Training::get();

        return Helper::response($data, 200);
    }

    public function getTrainingWithCate() {
        $data = Category::with(['training'])
        ->where('name', '<>', 'Tin Tức')
        ->whereHas('training')
        ->orderBy('id')
        ->get();

        return Helper::response($data, 200);
    }

    public function getAllTrainingUpComing() {
        $cate = Category::where('slug', 'sap-khai-giang')->first();
        if(empty($cate)) return Helper::response([], 200);
        $data = Training::where('category_id', $cate->id)->get();

        return Helper::response($data, 200);
    }

    public function getTrainingRelated($alias) {
        $data = Training::where('alias', $alias)->first();
        if(empty($data)) return Helper::response([], 200);
        $related = Training::where('category_id', $data->category_id)->where('id', '!=', $data->id)->get();

        return Helper::response($related, 200);
    }
}
