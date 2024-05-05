<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'category_id', 'stok', 'image', 'description', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
 
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    
}