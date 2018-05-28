<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaCalendario extends Model
{
    protected $table ='asignatura_calendario';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'id',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'state',
        'calendario_id',
        'asignatura_id',

    ];

    public function calendario(){
        return $this->belongsTo(Calendario::class,'calendario_id','id');
    }
    
    public function asignatura(){
    return $this->belongsTo(Asignatura::class,'asignatura_id','id');
    }

      public function asistencia(){
        return $this->hasMany(Asistencia::class);
    }

}
