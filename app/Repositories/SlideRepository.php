<?php

namespace App\Repositories;

use App\Models\Slide;

class SlideRepository extends EloquentRepository
{
    public function getModel(): Slide
    {
        return new Slide();
    }
}
