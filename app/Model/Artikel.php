<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table='artikels';
    protected $fillable=['judul','link','deskripsi','isi','tgl','foto','idsk','counter'];
}
