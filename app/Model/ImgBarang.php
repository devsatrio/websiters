<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImgBarang extends Model
{
    protected $table='imgbarangs';
    protected $fillable=['idb','nama','token'];
}
