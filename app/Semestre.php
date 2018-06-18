<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
     protected $table ='semestres';
 protected $primaryKey='id';
 public $timestamps = false;
 protected $fillable=[
    'id',
     'semestre',
     'paralelo',
     'state',
 ];

   public function asignaturas(){
        return $this->belongsToMany(Asignatura::class);

    }
}
