<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'alias',
        'category_id',
        'time',
        'link',
        'file',
        'author_id',
        'status',
        'title', 'intro', 'price', 'description', 'lesson', 'content',
        'benefits', 'participants', 'experts', 'businesses'
    ];

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
