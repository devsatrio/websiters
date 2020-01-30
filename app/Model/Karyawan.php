<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Karyawan extends Authenticatable
{
    use Notifiable;
    protected $table='karyawans';
    protected $fillable=['nip','nama','telp','alamat','kecamatan','kot_kab','provinsi','provinsi','username','password','api_token','status','tgl_masuk','tgl_kotrak','tgl_kotrak_habis','foto'];
    protected $hidden=['password'];
}
