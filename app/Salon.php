<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
     protected $table ='salon_clases';
 protected $primaryKey='id';
 public $timestamps = false;
 protected $fillable=[
    'id',
     'salon_clase',
     'ubicacion',
     'descripcion',
     'tamanio',
     'disponibilidad',
     'state',
 ];

    public function calendario(){
        return $this->hasMany(Calendario::class);
    }


          

}
