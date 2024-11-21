<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fullname',
        'gender',
        'phone',
        'email',
        'training_id',
        'traffic',
        'position',
        'company',
        'experience',
        'note',
    ];
}
