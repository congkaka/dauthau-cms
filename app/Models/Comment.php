<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'content',
        'user_id',
        'post_id',
        'status',
    ];

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
