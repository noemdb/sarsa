<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	//usada para el softdelete
  protected $dates = ['deleted_at'];
    
	// protected $appends = ['count','notdone','done','codeve'];

	/*INI relaciones entre modelos*/
	public function user()
    {
        return $this->belongsTo('App\User');
    }
    /*FIN relaciones entre modelos*/

    

}
