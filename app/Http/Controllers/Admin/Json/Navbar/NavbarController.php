<?php

namespace App\Http\Controllers\Admin\Api\Navbar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Helpers
use Illuminate\Support\Carbon;

//models
use App\Models\sys\Messege;
use App\Models\sys\Task;
use App\Models\sys\Alert;
use App\Models\sys\Logdb;
use App\Models\sys\Loginout;

class NavbarController extends Controller
{
    // verificando sesion activa
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getApiMesseges(Request $request)
    {

        $model = ($request->input('model')!=null) ? $request->input('model') : 'messenges';

        $messeges = Messege::orderBy('created_at', 'desc')
                    ->with('user')
                    ->where('estado','No Visto')
                    ->where('destino_user_id',\Auth::user()->id)
                    // ->orderBy('id', 'desc')
                    ->get();

        // dd($model);

        return json_encode($messeges);
    }

    public function getApiTasks(Request $request)
    {

        $model = ($request->input('model')!=null) ? $request->input('model') : 'tasks';

        $tasks = Task::orderBy('created_at', 'desc')
                    // ->with('user')
                    ->where('estado','iniciada')
                    ->where('user_id',\Auth::user()->id)
                    // ->orderBy('id', 'desc')
                    ->get();

        return json_encode($tasks);
    }

    public function getApiAlerts(Request $request)
    {

        // $model = ($request->input('model')!=null) ? $request->input('model') : 'alerts';

        $alerts = Alert::orderBy('created_at', 'desc')
                    ->where('destino_user_id',\Auth::user()->id)
                    ->where('estado','No Visto')
                    ->with('user')
                    // ->orderBy('id', 'desc')
                    ->get();

        return json_encode($alerts);
    }

    public function getApiLogdbs(Request $request)
    {

        // $model = ($request->input('model')!=null) ? $request->input('model') : 'alerts';

        $logdbs = Logdb::orderBy('created_at', 'desc')
                    ->where('user_id',\Auth::user()->id)
                    ->Where('created_at','>=',Carbon::now()->subHours(96))
                    ->Where('created_at','<=',Carbon::now())
                    ->with('user')
                    // ->orderBy('id', 'desc')
                    ->get();

        return json_encode($logdbs);
    }

    public function getApiLoginouts(Request $request)
    {

        // $model = ($request->input('model')!=null) ? $request->input('model') : 'alerts';

        $logdbs = Loginout::orderBy('created_at', 'desc')
                    ->where('user_id',\Auth::user()->id)
                    ->Where('created_at','>=',Carbon::now()->subHours(96))
                    ->Where('created_at','<=',Carbon::now())
                    ->with('user')
                    // ->orderBy('id', 'desc')
                    ->get();

        return json_encode($logdbs);
    }

}
