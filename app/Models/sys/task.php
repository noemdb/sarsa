<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Model;
// Helpers
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

// Modelos
use App\User;


class Task extends Model
{
	//usada para el softdelete
 	protected $dates = ['deleted_at'];
    
  // Para obtener los getAttribute
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

  public static function getUserTasks($range=1000,$limit=10)
  {
    $userstasks = Task::select('users.username','tasks.user_id',DB::raw('count(tasks.id) as tasks_count'))
      ->join('users', 'users.id', '=', 'tasks.user_id')
      ->Where('tasks.created_at', '>=', $range)
      ->Where('tasks.created_at', '<=', Carbon::now())
      ->groupby('users.username')
      ->orderBy('tasks_count', 'desc')
      ->get()
      ->take($limit);

    return ($userstasks) ? $userstasks : 0;
  }
  
  public static function getCountTotal($arr_user_id,$range, $estado)
  {
    //INI array con los totales de las tasks iniciadas
    foreach ($arr_user_id as $key => $value) {
      $tasks = 
        Task::where('created_at', '>=', $range)
          ->where('created_at', '<=', Carbon::now())
          ->where('estado', 'like', '%'.$estado.'%')
          ->where('user_id',$value)
          ->groupBy('user_id')
            ->get([
              DB::raw('COUNT(*) as value')
          ]);
        if( $tasks->count()>0){
            $arr_total[] = $tasks->first()->value;
        } else {
            //$arr_total[] = 0;
        }
            
    }
    //FIN array con los totales de las tasks iniciadas

    return ($arr_total) ? $arr_total : 0;
  }
}
