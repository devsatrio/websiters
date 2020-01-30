<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table='sliders';
    protected $fillable=['token','nama','deskripsi','link','selected','akftif'];
}
