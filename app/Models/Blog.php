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
        'category_id',
        'image',
        'tags',
        'content',
        'status',
        'publish_date',
        'is_published'
    ];

    public function blogcategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}
