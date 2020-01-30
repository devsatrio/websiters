<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Moduls extends Model
{
    protected $table='moduls';
    protected $fillable=['idrole','idmodul','view','c','r','u','d'];    
}
