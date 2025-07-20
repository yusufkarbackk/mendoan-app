<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected static function booted()
{
    static::saved(fn () => Cache::forget('setting.store_open'));
}

    protected $fillable = [
        'key',
        'value'
    ];
}
