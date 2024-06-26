<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    public $table = 'posts';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'description',
        'detail',
        'cover_image',
        'is_visible',
        'category_id',
        'created_at',
        'updated_at'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps(); 
    }
}
