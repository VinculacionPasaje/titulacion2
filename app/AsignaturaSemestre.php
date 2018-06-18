<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaSemestre extends Model
{
    protected $table ='asignatura_semestre';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'asignatura_id',
        'semestre_id',

    ];

     public function semestre(){
        return $this->belongsTo(Semestre::class,'semestre_id','id');
    }
    
    public function asignatura(){
      return $this->belongsTo(Asignatura::class,'asignatura_id','id');
    }

       public function asignatura_calendario(){
        return $this->hasMany(AsignaturaCalendario::class);
    }
}
