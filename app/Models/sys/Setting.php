<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Setting extends Model
{

	protected $fillable = ['name','value'];
	
	/*INI relaciones entre modelos*/
	public function user()
    {
        return $this->belongsTo('App\User');
    }
    /*FIN relaciones entre modelos*/
}
