<?php

namespace App\Repositories;

use App\Models\Partner;
use App\Models\Training;

class TrainingRepository extends EloquentRepository
{
    public function getModel(): Training
    {
        return new Training();
    }
}
