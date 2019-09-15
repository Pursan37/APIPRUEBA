<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viajes extends Model
{
    protected $table = 'viajes';
    protected $fillable = ['fecha','pais','ciudad','email'];

}
