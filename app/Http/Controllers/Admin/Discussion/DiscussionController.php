<?php

namespace App\Http\Controllers\Admin\Discussion;

use App\Http\Controllers\Admin\CrudController;
use App\Models\Discussion;
use App\Repositories\EloquentRepository;
use App\Repositories\DiscussionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends CrudController
{
    /**
     * @var DiscussionRepository
     */
    private DiscussionRepository $discussionRepository;

    public function __construct(DiscussionRepository $discussionRepository)
    {
        $this->discussionRepository = $discussionRepository;
    }

    /**
     * @return DiscussionRepository
     */
    public function getRepository(): EloquentRepository
    {
        return $this->discussionRepository;
    }

    public function getViewFolder(): string
    {
        return 'admin.discussions';
    }

    public function index(Request $request, $data = [])
    {
        
        $query = $request->all();
        
        $items = Discussion::with(['children'])->whereNull('parent_id');
        foreach ($query as $q => $v) {
            if (in_array($q, (new Discussion())->getFillable()) && $v) {
                $items->where($q, 'like', '%'.$v.'%');
            }
        }
        
        $items->orderByDesc('id');

        $size = $request->size ? $request->size : 15;

        $data['items'] = $items->paginate($size);

        return view('admin.discussions.index', $data);
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

                $comment = new Discussion();
                $comment->content = $request->comment_reply;
                $comment->parent_id = (int) $request->comment_id;
                $comment->user_id = Auth::user()->id;
                $comment->status = 1;

                $comment->save();
            }

            return redirect('discussions');

        } catch (\Throwable $th) {
            dd($th);
            return redirect('discussions');
        }
        

    }
}
