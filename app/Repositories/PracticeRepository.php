<?php

namespace App\Repositories;

use App\Models\Practice;

class PracticeRepository extends EloquentRepository
{
    public function getModel(): Practice
    {
        return new Practice();
    }
}
