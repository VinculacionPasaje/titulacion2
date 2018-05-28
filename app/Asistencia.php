<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
        protected $table ='asignatura_calendario';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'id',
        'firma',
        'fecha',
        'hora',
        'state',
        'detalle_calendario_id',
    

    ];

    public function asignatura_calendario(){
        return $this->belongsTo(AsignaturaCalendario::class,'detalle_calendario_id','id');
    }
}
