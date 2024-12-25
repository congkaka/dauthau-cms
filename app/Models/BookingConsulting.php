<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingConsulting extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'gender',
        'note',
        'email',
        'phone',
        'consulting_id'
    ];
}
