<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Docente extends Authenticatable
{
    use Notifiable;

    protected $table='docentes';

    protected $fillable = [
        'nick', 'nombre', 'apellido',
        'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    //un docente puede impartir varias asignaturas
    public function asignaturas(){
        return $this->belongsToMany('App\Asignatura');
    }

    //un docente puede estar en varios grupos
    public function grupos(){
      return $this->belongsToMany('App\Grupo')->withPivot('responsable');
    }

    //un docente hace parte de un chat
    public function chat(){
      return $this->belongsTo('App\Chat');
    }
}
