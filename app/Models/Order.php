<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public $table = 'orders';

    protected $fillable = [
        'user_id',
        'order_code',
        'total_price',
        'delivery_name',
        'delivery_phone',
        'delivery_email',
        'delivery_address',
        'note',
        'status',
        'created_at',
        'updated_at',
    ];

    public function cartItem():HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function orderUser():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
