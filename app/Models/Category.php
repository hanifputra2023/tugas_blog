<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'desc',
    ];

    // Relasi: Category memiliki banyak Post
    public function posts()
    {
        return $this->hasMany(Post::class, 'cat_id');
    }
}
