<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'alias',
        'store_url',
        'logo_url',
        'meta_title',
        'meta_description',
        'title',
        'description',
        'affiliate_url',
        'category_id',
        'status'

    ];
}
