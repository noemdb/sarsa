<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	//usada para el softdelete
  protected $dates = ['deleted_at'];
    
	protected $appends = ['count','notdone','done','codeve'];

	/*INI relaciones entre modelos*/
	public function user()
    {
        return $this->belongsTo('App\User');
    }
    /*FIN relaciones entre modelos*/

    // public function getCountAttribute()
    // {
    //   // return $this->firstname .' ' .$this->lastname;
    //   return $this->count();
    // }

    public function getCodEveAttribute()
    {
        return $this->codigo.' '.$this->evento;
    }

    // public function getNotDoneAttribute()
    // {
    //   return Task::where('estado','finalizada')->count();
    // }

    // public function getDoneAttribute()
    // {
    //   return Task::where('estado','iniciada')->count();
    // }

    public function notdone()
    {
      return Task::where('estado','iniciada')->count();
    }
    // public static function done()
    // {
    //   return Task::where('estado','finalizada')->count();
    // }
}
