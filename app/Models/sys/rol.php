<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
	/*INI relaciones entre modelos*/
	public function user()
    {
        return $this->belongsTo('App\User');
    }
    /*FIN relaciones entre modelos*/
}
