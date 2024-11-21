<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function getTraining(){
        $data = Training::get();

        return Helper::response($data, 200);
    }

    public function getTrainingWithCate() {
        $data = Category::with(['training'])
        ->where('name', '<>', 'Tin Tức')
        ->whereHas('training')
        ->get();

        return Helper::response($data, 200);
    }
}
