<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MdetailTrx extends Model
{
    protected $table='mdetail_trxes';
    protected $fillable=['tgl','idTrx','kode_barang','barang','qty','harga','subtotal','jenis','diskon','total','admin'];
}
