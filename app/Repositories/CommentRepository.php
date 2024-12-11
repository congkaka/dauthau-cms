<?php

namespace App\Repositories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class CommentRepository extends EloquentRepository
{
    public function getModel(): Model
    {
        return new Comment();
    }
}
