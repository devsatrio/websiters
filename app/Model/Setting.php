<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table='settings';
    protected $fillable=['web','telp1','telp2','email','yt','fb','ig','twitter','alamat','kokab','provinsi','motto','keterangan','informasi','map','admin'];
}
