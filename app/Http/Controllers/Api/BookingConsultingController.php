<?php

namespace App\Http\Controllers\Api;

use App\Events\OrderSuccess;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\BookingConsulting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BookingConsultingController extends Controller
{
    public function create(Request $request)
    {
        try {
            // Xác định các rules
            $rules = [
                'fullname' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'email' => 'required|email',
                'consulting_id' => 'required',
            ];

            // Sử dụng Validator để kiểm tra dữ liệu đầu vào
            $validator = Validator::make($request->all(), $rules);

            // Nếu dữ liệu không hợp lệ, trả về lỗi
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(),
                ], 422);
            }

            // Lấy dữ liệu hợp lệ
            $params = $validator->validated();

            // Lưu dữ liệu vào bảng BookingConsulting
            BookingConsulting::create(
                [
                    'phone' => $request->phone,
                    'email' => $request->email ?? null,
                    'fullname' => $request->fullname,
                    'gender' => $request->gender ?? null,
                    'consulting_id' => $request->consulting_id,
                    'note' => $request->note ?? null
                ]
            );

            // Trả về phản hồi thành công
            return response()->json([
                'status' => 'success',
                'message' => 'booking added successfully',
                'data' => $request->input(),
            ], 201);
        } catch (\Throwable $th) {
            // Xử lý các lỗi khác
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'error' => $th->getMessage(),
            ], 500);
        }

        return Helper::response($request->input(), 200);
    }
}
