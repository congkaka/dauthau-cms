<?php

namespace App\Repositories;

use App\Models\BookingConsulting;

class BookingConsultingRepository extends EloquentRepository
{
    public function getModel(): BookingConsulting
    {
        return new BookingConsulting();
    }
}
