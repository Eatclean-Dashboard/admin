<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reels extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'cover_image',
        'video',
        'status',
        'publish_date',
        'is_published'
    ];

    public function blogcategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}
