<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MPengeluaran extends Model
{
    protected $table="m_pengeluarans";
    protected $fillable=['tgl','admin','keterangan','jumlah','penjab'];
}
