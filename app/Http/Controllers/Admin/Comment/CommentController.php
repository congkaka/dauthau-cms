<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Admin\CrudController;
use App\Models\Comment;
use App\Repositories\EloquentRepository;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends CrudController
{
    /**
     * @var CommentRepository
     */
    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @return CommentRepository
     */
    public function getRepository(): EloquentRepository
    {
        return $this->commentRepository;
    }

    public function getViewFolder(): string
    {
        return 'admin.comments';
    }

    public function index(Request $request, $data = [])
    {
        
        $query = $request->all();
        
        $items = Comment::with(['children'])->whereNull('parent_id');
        foreach ($query as $q => $v) {
            if (in_array($q, (new Comment())->getFillable()) && $v) {
                $items->where($q, 'like', '%'.$v.'%');
            }
        }
        
        $items->orderByDesc('id');

        $size = $request->size ? $request->size : 15;

        $data['items'] = $items->paginate($size);

        return view('admin.comments.index', $data);
    }

    public function show($id)
    {
        $size = 15;
        $comment = Comment::with(['blog'])->find($id);
        $replys = Comment::with(['user'])->where('parent_id', $id)->paginate($size);
        $data['items'] = $replys;
        $data['comment'] = $comment;

        return view('admin.comments.detail', $data);
    }
    

    /**
     * Validate form create
     * @param Request $request
     * @return array
     */
    // public function storeValidated(Request $request): array
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required',
    //         'image' => '',
    //         'parent_id' => '',
    //     ],
    //         [
    //             'name.required' => 'Name không được trống'
    //         ]
    //     );
    //     $validatedData['is_active'] = true;
    //     $validatedData['slug'] = makeSlug($validatedData['name']);

    //     return $validatedData;
    // }

    public function edit(int $id, $data = [])
    {
        $data['posts'] = \App\Models\Post::get(['id', 'title']);

        return parent::edit($id, $data);
    }

    public function reply(Request $request) {
        try {
            if(!empty($request->comment_id) && !empty($request->comment_reply)) {

                $comment = new Comment();
                $comment->content = $request->comment_reply;
                $comment->parent_id = (int) $request->comment_id;
                $comment->user_id = Auth::user()->id;
                $comment->status = 1;

                $comment->save();
            }

            return redirect('comments');

        } catch (\Throwable $th) {
            dd($th);
            return redirect('comments');
        }
        

    }

    public function changeStatus(Request $request) {
        try {
            $comment = Comment::find($request->commentId);
            $comment->status = (int) $request->status;
            $comment->save();

            return response()->json(['success' => 'Cập nhật trạng thái thành công']);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
