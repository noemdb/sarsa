<?php

namespace App\Models\sys;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/*Clases adicionadas*/
// use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
	
	use Notifiable;
	use SoftDeletes;

    protected $fillable = [
        'user_id','rol', 'rango','descripcion','finicial','ffinal'
    ];

	/*INI relaciones entre modelos*/
	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function profile()
    {
        return $this->belongsTo('App\Models\sys\Profile','user_id','user_id');
    }
    /*FIN relaciones entre modelos*/
}
