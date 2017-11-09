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

        $messeges = Messege::where('destino_user_id',\Auth::user()->id)
                    ->with('user')
                    ->where('estado','No Visto')
                    ->orderBy('created_at', 'desc')
                    // ->orderBy('id', 'desc')
                    ->get();

        // dd($model);

        return json_encode($messeges);
    }

    public function getApiTasks(Request $request)
    {

        $model = ($request->input('model')!=null) ? $request->input('model') : 'tasks';

        $tasks = Task::where('user_id',\Auth::user()->id)
                    // ->with('user')
                    ->where('estado','iniciada')
                    ->orderBy('created_at', 'desc')
                    // ->orderBy('id', 'desc')
                    ->get();

        // dd($model);

        return json_encode($tasks);
    }

    public function getApiAlerts(Request $request)
    {

        // $model = ($request->input('model')!=null) ? $request->input('model') : 'alerts';

        $alerts = Alert::where('destino_user_id',\Auth::user()->id)
                    ->with('user')
                    ->where('estado','No Visto')
                    ->orderBy('created_at', 'desc')
                    // ->orderBy('id', 'desc')
                    ->get();

        // dd($model);

        return json_encode($alerts);
    }

    public function getApiLogdbs(Request $request)
    {

        // $model = ($request->input('model')!=null) ? $request->input('model') : 'alerts';

        $logdbs = Logdb::Where('created_at','>=',Carbon::now()->subHours(96))
                    ->Where('created_at','<=',Carbon::now())
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    // ->orderBy('id', 'desc')
                    ->get();

        // dd($logdbs);

        return json_encode($logdbs);
    }

    public function getApiLoginouts(Request $request)
    {

        // $model = ($request->input('model')!=null) ? $request->input('model') : 'alerts';

        $logdbs = Loginout::with('user')
                    ->Where('created_at','>=',Carbon::now()->subHours(96))
                    ->Where('created_at','<=',Carbon::now())
                    ->orderBy('created_at', 'desc')
                    // ->orderBy('id', 'desc')
                    ->get();

        // dd($logdbs);

        return json_encode($logdbs);
    }

}
