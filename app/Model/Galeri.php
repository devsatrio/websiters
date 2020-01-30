<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table='galeris';
    protected $fillable=['token','nama','admin'];
}
