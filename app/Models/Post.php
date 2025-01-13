<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'seo_title',
        'excerpt',
        'body',
        'meta_keywords',
        'meta_description',
        'slug',
        'created_at',
        'updated_at',
        'author_id',
        'category_id',
        'store_id',
        'image',
        'featured',
        'status',
        'position'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function related()
    {
        return $this->hasMany(Post::class, 'category_id', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
