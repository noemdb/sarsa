<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Model;
// use App\User;

class Task extends Model
{
	//usada para el softdelete
 	protected $dates = ['deleted_at'];
    
    //para obtener los getAttribute
	// protected $appends = ['userlist'];

	/*INI relaciones entre modelos*/
	public function user()
    {
        return $this->belongsTo('App\User');
    }
    /*FIN relaciones entre modelos*/

   // public function getUserListAttribute()
   //  {
   //    return User::orderBy('username','desc')->has('tasks')->pluck('username', 'id');
   //    // return $this->firstname .' ' . $this->lastname;
   //  }
}
