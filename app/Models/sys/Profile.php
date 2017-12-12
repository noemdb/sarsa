<?php

namespace App\Models\sys;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/*Clases adicionadas*/

/*Clases adicionadas*/
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UserSettingsTrait;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
	use Notifiable;
  use SoftDeletes;

    protected $fillable = [
        'firstname', 'lastname','url_img','email'
    ];


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
