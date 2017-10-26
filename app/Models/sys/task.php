<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	/*INI relaciones entre modelos*/
	public function user()
    {
        return $this->belongsTo('App\User');
    }
    /*FIN relaciones entre modelos*/

    public function getCountAttribute()
    {
      // return $this->firstname .' ' .$this->lastname;
      return Task::count();
    }
}
