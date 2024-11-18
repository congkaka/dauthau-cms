<?php

namespace App\Repositories;

use App\Models\Expert;

class ExpertRepository extends EloquentRepository
{
    public function getModel(): Expert
    {
        return new Expert();
    }
}
