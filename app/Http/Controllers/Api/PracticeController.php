<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PracticeController extends Controller
{
    public function getAll(Request $request)
    {
        $data = Practice::OrderBy('created_at', 'DESC')->get([
            'id',
            'description',
            'title',
            'link',
            'image',
            'created_at',
            'updated_at'
        ]);

        return Helper::response($data, 200);
    }

    public function checkPasswordPractice(Request $request){
        try {
            // Xác định các rules
            $rules = [
                'password' => 'required',
                'id' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $paractice = Practice::where('password', $request->password)->where('id', $request->id)->first();
            if(!$paractice) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Mật khẩu không đúng',
                ], 500);
            }

            // Trả về phản hồi thành công
            return response()->json([
                'status' => 'success',
                'message' => 'Thành công'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
