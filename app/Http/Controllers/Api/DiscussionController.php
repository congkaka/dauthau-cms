<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscussionController extends Controller
{
    // public function getBlogAlias(Request $request, $alias)
    // {
    //     $data = Post::with(['related' => function ($query) use ($alias) {
    //         $query->where('slug', '<>', $alias);
    //     }, 'comments.children'])->where(['slug' => $alias])->first();

    //     return Helper::response($data, 200);
    // }

    public function getDiscussions(Request $request)
    {
        $data = Discussion::with(['children.user'])->where('status', 1)->whereNull('parent_id')->get();

        return Helper::response($data, 200);
    }

    public function getDiscussionDetails(Request $request, $id)
    {
        $data = Discussion::with(['children.user'])
            ->where('status', 1)
            ->where('id', $id)
            ->whereNull('parent_id')
            ->first();

        return Helper::response($data, 200);
    }


    public function addDiscussion(Request $request)
    {
        try {
            // Xác định các rules
            $rules = [
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'content' => 'required|string',
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

            // Lưu dữ liệu vào bảng discussions
            $comment = new Discussion();
            $comment->name = $params['name'];
            $comment->phone = $params['phone'];
            $comment->email = !empty($params['email']) ? $params['email'] : '';
            $comment->title = !empty($params['title']) ? $params['title'] : '';
            $comment->content = $params['content'];
            $comment->status = 0;
            $comment->save();

            // Trả về phản hồi thành công
            return response()->json([
                'status' => 'success',
                'message' => 'Discussion added successfully',
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
