<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    protected $primaryKey = 'id';

    public $fillable = [
        'id', 'user_id', 'product_id', 'created_at', 'updated_at'
    ];

    public function product():HasOne
    {
        return $this->hasOne(Product::class);
    }
}
