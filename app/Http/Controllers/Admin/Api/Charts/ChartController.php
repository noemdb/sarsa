<?php

namespace App\Http\Controllers\Admin\Api\Charts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Helpers
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

// Modelos adicionadas
use App\User;
use App\Models\sys\Task;
// use App\Models\sys\Profile;
// use App\Models\sys\Rol;
// use App\Models\sys\Messege;
// use App\Models\sys\Alert;
// use App\Models\sys\Loginout;
// use App\Models\sys\Logdb;

class ChartController extends Controller
{

    // verificando sesion activa
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getApiUserTaskLoad(Request $request)
	{

		$range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';
        $limit = ($request->input('limit')!=null) ? $request->input('limit') : 8;

		if($range=='Todos'){
			$finicial = Carbon::now()->SubYear(10);
			$ffinal = Carbon::now()->AddYear(10);
		}else{
			$finicial = Carbon::now()->subDays($range);
			$ffinal = Carbon::now();
		}		

		$userstasks = Task::getUserTasks($finicial,$ffinal,$limit); // return username,user_id,value

		// dd($userstasks);

        $labels = $userstasks->pluck('username');
		$users_id = $userstasks->pluck('user_id');

        // dd($userstasks->toarray(),$labels , $users_id);

        $tasks_iniciadas = Task::getCountTotal($users_id,$finicial,$ffinal,'iniciada');
        $tasks_finalizadas = Task::getCountTotal($users_id,$finicial,$ffinal,'finalizada');
        $tasks_asignadas = Task::getCountTotal($users_id,$finicial,$ffinal,'');

		// dd($tasks_iniciadas,$tasks_finalizadas,$tasks_asignadas);

		unset($ChartDataSQL);
		$ChartDataSQL = [
			'labels'=>$labels,
			'datasets'=>[
				[
	                "label"=>"Iniciadas",
	                "backgroundColor"=>"rgba(245,105,84,1)",
	                "borderColor"=>"rgba(245,105,84,1)",
                    "borderWidth"=>1,
	                "data"=>$tasks_iniciadas
                ],
                [
	                "label"=>"Finalizadas",
	                "backgroundColor"=>"rgba(0,166,90,1)",
	                "borderColor"=>"rgba(0,166,90,1)",
                    "borderWidth"=>1,
	                "data"=>$tasks_finalizadas
                ],
                [
	                "label"=>"Asignadas",
	                "backgroundColor"=>"rgba(0,192,239,1)",
	                "borderColor"=>"rgba(0,192,239,1)",
                    "borderWidth"=>1,
	                "data"=>$tasks_asignadas
                ]
            ]
        ];

		// dd($tasks);

		return json_encode($ChartDataSQL);
	}

	public function getApiUserTaskDone(Request $request)
	{

		$range  = ($request->input('range')!=null) ? $request->input('range') : 360;
        $limit = ($request->input('limit')!=null) ? $request->input('limit') : 8;

		if($range=='Todos'){
			$finicial = Carbon::now()->SubYear(10);
			$ffinal = Carbon::now()->AddYear(10);
		}else{
			$finicial = Carbon::now()->subDays($range);
			$ffinal = Carbon::now();
		}	

		$userstasks = Task::getUserTasks($finicial,$ffinal,$limit); // return username,user_id,value

		$labels = $userstasks->pluck('username');
        $users_id = $userstasks->pluck('user_id');

        // dd($labels , $users_id);

        $values_todas = Task::getCountTotal($users_id,$finicial,$ffinal,'');
        $values_done = Task::getCountTotal($users_id,$finicial,$ffinal,'finalizada');

        // dd($labels , $users_id, $values_todas, $values_done);

		unset($ChartDataSQL);
		$ChartDataSQL = [
			'labels'=>$labels,
			'datasets'=>[
				[
	                "label"=>"Asignadas",
	                "backgroundColor"=>"rgba(151,187,205,0.2)",
	                "borderColor"=>"rgba(151,187,205,1)",
                    "borderWidth"=>2,
	                "data"=>$values_todas
                ],
                [
	                "label"=>"Finalizadas",
	                "backgroundColor"=>"rgba(192, 57, 43,0.2)",
	                "borderColor"=>"rgba(192, 57, 43,1)",
                    "borderWidth"=>2,
	                "data"=>$values_done
                ]
            ]
        ];

		// dd($tasks);

		return json_encode($ChartDataSQL);
	}

	public function getApiUserTaskAsig(Request $request)
	{

		$range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';
        $limit = ($request->input('limit')!=null) ? $request->input('limit') : 8;

		if($range=='Todos'){
			$finicial = Carbon::now()->SubYear(10);
			$ffinal = Carbon::now()->AddYear(10);
		}else{
			$finicial = Carbon::now()->subDays($range);
			$ffinal = Carbon::now();
		}

		$userstasks = Task::select('users.username',DB::raw('count(tasks.id) as tasks_count'))
			->join('users', 'users.id', '=', 'tasks.user_id')
			->Where('tasks.created_at', '>=', $finicial)
			->Where('tasks.created_at', '<=', $ffinal)
			->groupby('users.username')
			->orderBy('tasks_count', 'desc')
			->get()
			->take($limit);

		// dd($userstasks->toarray());

        $labels = $userstasks->pluck('username');
        $values = $userstasks->pluck('tasks_count');
        for ($i=0; $i < count($labels) ; $i++) { 
            $colors[] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 1)';
        }

        // dd($labels , $values, $colors);

		unset($ChartDataSQL);
		$ChartDataSQL = [
			'labels'=>$labels,
			'datasets'=>[
				[
	                "label"=>"Tareas Asignadas",
                    "backgroundColor"=>$colors,
	                "data"=>$values
                ]
            ]
        ];

		// dd($tasks);

		return json_encode($ChartDataSQL);
	}

    public function getApiTaskMonth(Request $request)
    {

        $range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';


		if ($range=='Todos') {
			$finicial = Carbon::now()->SubYear(10);
			$ffinal = Carbon::now()->AddYear(10);
		}else{
			$finicial = Carbon::now()->subMonth($range);
			$ffinal = Carbon::now();
		}

        // $range = Carbon::now()->subMonth($months);

		$tasksmonth = Task::select(DB::raw('count(id) as value'),DB::raw('MONTH(created_at) as month'))
			->Where('created_at', '>=', $finicial)
			->Where('created_at', '<=', $ffinal)
			->groupby('month')
			->orderBy('value', 'desc')
			->get();

        // dd($tasksmonth);

        //INI nombre de los meses en español
        $labels = $tasksmonth->pluck('month');
        foreach ($labels as $key => $value) {
            $dateObj   = Date::createFromFormat('!m', $value);
            $label_month[] = ucfirst($dateObj->format('F'));
        }
        $values = $tasksmonth->pluck('value');
        //FIN nombre de los meses en español

        // dd($labels, $label_month, $values);

        $ChartDataSQL = [
            'labels'=>$label_month,
            'datasets'=>[
                [
                    "label"=>"Tareas Asignadas",
                    "backgroundColor"=>"rgba(192, 57, 43,0.2)",
                    "borderColor"=>"rgba(192, 57, 43,1)",
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }
	
}