<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MdetailTrxPakan extends Model
{
    protected $table='mdetail_trx_pakans';
    protected $fillable=['tgl','idTrx','kode_barang','barang','qty','harga','subtotal','potongan','diskon','total','admin'];
}
