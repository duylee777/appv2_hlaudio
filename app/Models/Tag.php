<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    public $table = "tags";

    protected $fillable = [
        'id', 'name', 'slug', 'is_visible'
    ];

    public function posts():BelongsToMany
    {
        return $this->belongsToMany(Post::class)->withTimestamps(); 
    }
}
