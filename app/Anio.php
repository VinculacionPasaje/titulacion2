<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anio extends Model
{
    protected $table ='anio';
 protected $primaryKey='id';
 public $timestamps = false;
 protected $fillable=[
    'id',
     'anio',
     'descripcion',
     'state',
 ];

    public function calendario(){
        return $this->hasMany(Calendario::class);
    }

 

}
