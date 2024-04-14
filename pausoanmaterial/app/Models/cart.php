<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang', 'id');
    }
    use HasFactory;
}
