<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
 protected $table ='roles';
 protected $primaryKey='id';
 public $timestamps = false;
 protected $fillable=[
    'id',
     'role',
     'description',
     'state',
 ];

  public function usuarios(){
        return $this->hasMany(User::class);
    }

    
}
