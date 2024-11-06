<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'seo_title',
        'excerpt',
        'body',
        'image',
        'meta_description',
        'meta_keywords',
        'status',
        'featured'
    ];
}
