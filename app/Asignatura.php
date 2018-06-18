<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table ='asignaturas';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'id',
        'asignatura',
        'descripcion',
        'state',
        'user_id',
      
    ];

    public function usuario(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
        public function semestres(){
         return $this->belongsToMany(Semestre::class);
    }

  

}
