<?php

namespace App\Http\Controllers\Webmaster;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Clases adicionadas
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\sys\Profile;
use App\Models\sys\Rol;
use App\Models\sys\Task;
use App\Models\sys\Messege;
use App\Models\sys\Alert;
use App\Models\sys\Loginout;
use App\Models\sys\Logdb;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		// $users = User::with('profiles')
  //                    ->with('rols')
  //                    ->with('tasks')
  //                    ->with('messeges')
  //                    ->with('alerts')
  //                    ->with('loginouts')
  //                    ->with('logdbs')
  //                    ->get()
  //                    ->toArray();
                     // ->toArray();
                     // ->paginate();
        // $profiles = $users->profiles;
        // dd($users);

        $users = User::all();
        $profiles = Profile::paginate(15);
        $rols = Rol::all();
        $tasks = Task::all();
        $task_notdone = Task::where('estado','iniciada')->count();
        $t_nodone = $tasks()->notdone;
        dd($t_nodone);
        $messeges = Messege::all();
        $loginouts = Alert::all();
        $logdbs = Loginout::all();

        dd($task_notdone);

        return view('webmaster.home',compact('users','profiles','rols','tasks','messeges','loginouts','logdbs'));
    }
}
