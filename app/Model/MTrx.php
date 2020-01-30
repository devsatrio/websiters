<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MTrx extends Model
{
    protected $table='m_trxes';
    protected $fillable=['inv','po','sj','tgl','pembeli','pengirim','penerima','subtotal','potongan','diskon','total','Total','Bayar','Kurang','Kembali','admin','status'];
}
