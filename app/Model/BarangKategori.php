<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BarangKategori extends Model
{
    protected $table='barang_kategoris';
    protected $fillable=['kategori','isi','paket','jenis_berat'];
}
