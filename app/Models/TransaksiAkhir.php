<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiAkhir extends Model
{
    use HasFactory;

    protected $fillable = ['nomorTransaksi','kasir','pembeli','tanggalPembelian','subtotal', 'bayar', 'kembalian'];
}
