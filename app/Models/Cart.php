<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'shopping_session';

    public $fillable = [
        'id', 'user_id', 'total_price', 'status'
    ];
    
    public function cartItem(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

}
