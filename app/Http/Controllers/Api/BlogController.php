<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlogs(Request $request) {
        try {
            $blogs = Post::with(['categories'])->limit($request->limit);
            if ($request->search) $blogs->where('title', 'like', "%{$request->search}%");
            $blogs = $blogs->orderBy('created_at', $request->sort??'Desc')
            ->paginate(10);
            if ($blogs === 404) return Helper::response(null, 404);
            
            return Helper::response($blogs, 200);
        } catch (\Exception $e) {
            return Helper::response($e->getMessage(), 500);
        }
    }

    public function getBlogAlias(Request $request, $alias)
    {
        $data = Post::with(['related' => function ($query) use ($alias) {
            $query->where('slug', '<>', $alias);
        }, 'comments.children.user'])->where(['slug' => $alias])->first();

        return Helper::response($data, 200);
    }
}
