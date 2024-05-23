<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPembelian extends Model
{
    use HasFactory;
    protected $table = 'history_pembelian';
    protected $fillable = [
        'order_id',
        'user_id',
        'total_price',
        'status',
        'address',
        'nama',
        'namaproduk',
        'city',
        'phone' // Menyimpan nama pengguna yang melakukan pembelian
    ];
 public function user()
    {
        return $this->belongsTo(User::class);
    }
}
