<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'user_id',
    'shipping_address',
    'order_date',
    'status',   
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}