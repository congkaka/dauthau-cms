<?php

namespace App\Repositories;

use App\Models\Discussion;
use Illuminate\Database\Eloquent\Model;

class DiscussionRepository extends EloquentRepository
{
    public function getModel(): Model
    {
        return new Discussion();
    }
}
