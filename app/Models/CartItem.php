<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_item';

    protected $primaryKey = 'id';

    public $fillable = [
        'id', 'session_id', 'product_id', 'quantity', 'created_at', 'updated_at'
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
