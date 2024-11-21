<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository extends EloquentRepository
{
    public function getModel(): Booking
    {
        return new Booking();
    }
}
