<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Helpers
use Illuminate\Support\Carbon;

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
        // $users = User::all();
        // $profiles = Profile::paginate(15);
        // $rols = Rol::all();
        $tasks = Task::with('user')
                    //->where('user_id',\Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    // ->orderBy('id', 'desc')
                    ->get();        
        $messeges = Messege::with('user')
                    //->where('destino_user_id',\Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    // ->orderBy('id', 'desc')
                    ->get();

        $alerts = Alert::with('user')
                    //->where('destino_user_id',\Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    // ->orderBy('id', 'desc')
                    ->get();

        $logdbs = Logdb::with('user')
                    //->where('user_id',\Auth::user()->id)
                    ->Where('created_at','<=',Carbon::now())
                    ->Where('created_at','>=',Carbon::now()->subHours(96))
                    ->orderBy('created_at', 'desc')
                    // ->orderBy('id', 'desc')
                    ->get();

        // $loginouts = Alert::all();
        // $logdbs = Loginout::all();

        return view('admin.home',compact('users','profiles','rols','tasks','messeges','alerts','loginouts','logdbs'));
    }

}
