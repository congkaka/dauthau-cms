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
        'parent_id',
        'status',
    ];

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function blog()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
