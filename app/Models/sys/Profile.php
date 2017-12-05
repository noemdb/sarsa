<?php

namespace App\Models\sys;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/*Clases adicionadas*/
// use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
	use Notifiable;
  use SoftDeletes;

  /*INI relaciones entre modelos*/
	public function user()
    {
        return $this->belongsTo('App\User');
    }
    /*FIN relaciones entre modelos*/

    public function getFullNameAttribute()
    {
      return $this->firstname .' ' . $this->lastname;
    }
    public function getCountAttribute()
    {
      // return $this->firstname .' ' .$this->lastname;
      return $this->count();
    }
}