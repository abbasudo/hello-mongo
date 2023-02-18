<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
