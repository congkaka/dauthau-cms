<?php

namespace App\Repositories;

use App\Models\Partner;

class PartnerRepository extends EloquentRepository
{
    public function getModel(): Partner
    {
        return new Partner();
    }
}
