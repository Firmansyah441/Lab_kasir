<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 't_keranjang';
    protected $fillable = [
      'kode_barang',
      'nama_barang',
      'harga',
      'qty',
      'subtotal',
        ];
}
