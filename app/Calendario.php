<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
     protected $table ='calendario';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'id',
        'titulo',
        'descripcion',
        'hemisemestres',
        'tamanio',
        'state',
        'anio_id',
        'salon_id',

    ];

    public function anio(){
        return $this->belongsTo(Anio::class,'anio_id','id');
    }
    
    public function salon(){
    return $this->belongsTo(Salon::class,'salon_id','id');
    }

     public function asignatura_calendario(){
        return $this->hasMany(AsignaturaCalendario::class);
    }
}
