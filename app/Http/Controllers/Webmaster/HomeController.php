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
        $users = User::all();
        $profiles = Profile::paginate(15);
        $rols = Rol::all();
        $tasks = Task::where('user_id',\Auth::user()->id)
                    ->with('user')
                    ->orderBy('estado', 'asc')
                    ->orderBy('created_at', 'desc')
                    ->get();        
        $messeges = Messege::where('destino_user_id',\Auth::user()->id)
                    ->with('user')
                    ->orderBy('estado', 'asc')
                    ->orderBy('created_at', 'desc')
                    ->get();

        $alerts = Alert::where('destino_user_id',\Auth::user()->id)
                    ->with('user')
                    ->orderBy('estado', 'asc')
                    ->orderBy('created_at', 'desc')
                    ->get();

        $loginouts = Alert::all();
        $logdbs = Loginout::all();

        return view('webmaster.home',compact('users','profiles','rols','tasks','messeges','alerts','loginouts','logdbs'));
    }
}
