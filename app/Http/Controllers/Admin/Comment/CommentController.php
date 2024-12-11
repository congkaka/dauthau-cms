<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Admin\CrudController;
use App\Repositories\EloquentRepository;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

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
}
