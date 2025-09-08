<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'desc',
        'user_id',
        'cat_id',
    ];

    // Relasi: Post dimiliki oleh User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Post dimiliki oleh Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
