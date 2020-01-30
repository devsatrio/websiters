<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vidtube extends Model
{
    protected $table='vidtubes';
    protected $fillable=['judul','url'];
}
