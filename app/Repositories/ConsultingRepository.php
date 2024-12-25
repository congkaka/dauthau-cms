<?php

namespace App\Repositories;

use App\Models\Consulting;

class ConsultingRepository extends EloquentRepository
{
    public function getModel(): Consulting
    {
        return new Consulting();
    }
}
