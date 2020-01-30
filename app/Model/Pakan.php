<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pakan extends Model
{
    protected $table='pakans';
    protected $fillable=['idk','kode','produk','harg_kg','harg_ton','deskripsi','keunggulan','penggunaan','stok','diskon'];
}
