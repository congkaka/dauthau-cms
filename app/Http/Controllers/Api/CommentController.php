<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        try {
            // Xác định các rules
            $rules = [
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'content' => 'required|string',
                'post_id' => 'required',
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

            // Lưu dữ liệu vào bảng Comments
            $comment = new Comment();
            $comment->name = $params['name'];
            $comment->phone = $params['phone'];
            $comment->content = $params['content'];
            $comment->post_id = $params['post_id'];
            $comment->status = 0;
            $comment->save();

            // Trả về phản hồi thành công
            return response()->json([
                'status' => 'success',
                'message' => 'Comment added successfully',
                'data' => $comment,
            ], 201);
        } catch (\Throwable $th) {
            // Xử lý các lỗi khác
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
