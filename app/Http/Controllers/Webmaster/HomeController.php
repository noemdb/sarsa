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
use App\Models\sys\Messeges;
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

		$users = User::with('profiles')
                     ->with('rols')
                     ->with('tasks')
                     ->with('messeges')
                     ->with('alerts')
                     ->with('loginouts')
                     ->with('logdbs')
                     ->with('rols')
                     ->get();
                     // ->toArray();
                     // ->paginate();

        
        // $users = User::all();
        // $users = User::with('profiles')->get();
        // dd($users->toArray());
        // dd($users->toArray());

        return view('webmaster.home',compact('users'));
    }
}
