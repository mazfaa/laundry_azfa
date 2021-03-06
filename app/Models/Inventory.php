<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'merk_barang', 'qty', 'kondisi', 'tanggal_pengadaan'];
}
