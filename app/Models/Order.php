<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'payment_method',
        'status',
        'total',
        'nomor',
        'alamat',
        'catatan',
    ];
    public function user()
    {
        return $this->belongsTo(Customer::class);
    }
}
