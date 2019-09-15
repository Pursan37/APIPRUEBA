<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
   protected $table = 'usuarios';
   protected $fillable = ['nombre','apellido1','apellido2','telefono','email','foto'];


}
