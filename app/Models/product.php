<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = ['stok'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            if ($product->stok === 0) {
                $product->status = false;
            }
        });
    }

}


