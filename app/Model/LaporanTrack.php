<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LaporanTrack extends Model
{
    protected $table='laporan_tracks';
    protected $fillable=['lat','lot','place','report','telp','foto','konsumen','idk','tgl'];
}
