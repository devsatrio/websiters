<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table='barangs';
    protected $fillable=['idk','kode','produk','harg_pcs','harg_pack','deskripsi','keunggulan','penggunaan','stok','diskon'];
}
