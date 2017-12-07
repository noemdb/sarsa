<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

/*Clases adicionadas*/
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UserSettingsTrait;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use UserSettingsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // nuemro de registros en User getCountAttribute
    public function getCountAttribute()
    {
      return $this->count();
    }
    // nuemro de perfiles registrados
    public function getCountTasksAttribute()
    {
      return $this->tasks->count();
    }

    /*INI relaciones entre modelos*/
    public function profile()
    {
        return $this->hasOne('App\Models\sys\Profile');
    }
    public function rols()
    {
        return $this->hasMany('App\Models\sys\Rol');
    }
    public function tasks()
    {
        return $this->hasMany('App\Models\sys\Task');
    }
    public function messeges()
    {
        return $this->hasMany('App\Models\sys\Messege');
    }
    public function alerts()
    {
        return $this->hasMany('App\Models\sys\Alert');
    }
    public function loginouts()
    {
        return $this->hasMany('App\Models\sys\Loginout');
    }
    public function logdbs()
    {
        return $this->hasMany('App\Models\sys\Logdb');
    }
    public function settings()
    {
        return $this->hasMany('App\Models\sys\Setting');
    }
    /*FIN relaciones entre modelos*/


    public function setPasswordAttribute($value){
        if (! empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

}
