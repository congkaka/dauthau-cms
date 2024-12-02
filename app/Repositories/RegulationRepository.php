<?php

namespace App\Repositories;

use App\Models\Regulation;

class RegulationRepository extends EloquentRepository
{
    public function getModel(): Regulation
    {
        return new Regulation();
    }
}
