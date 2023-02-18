<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Post extends Model
{
    use HasFactory;

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
