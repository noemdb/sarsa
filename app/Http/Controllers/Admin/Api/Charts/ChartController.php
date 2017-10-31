<?php

namespace App\Http\Controllers\Admin\Api\Charts;

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

class ChartController extends Controller
{

    // verificando qsesion activa
    public function __construct()
    {
        $this->middleware('auth');
    }


public function getApiUserTaskDone(Request $request)
	{

		$days = $request->input('days');

		$range = \Carbon\Carbon::now()->subDays($days);

		//dd($range);
		
		$tasksdone = Task::where('tasks.created_at', '>=', $range)
			->where('tasks.estado','finalizada')
			->join('users', 'users.id', '=', 'tasks.user_id')
			->groupBy('tasks.user_id')
			->orderBy('tasks.user_id', 'ASC')
		    ->get([

		    	'users.username',
			    DB::raw('COUNT(*) as value')
			]);

		$labels = $tasksdone->pluck('username');
		$values = $tasksdone->pluck('value');

		unset($lineChartDataSQL);
		$lineChartDataSQL = [
			'labels'=>$labels,
			'datasets'=>[
				[
	                "label"=>"Tareas Asignadas: Últimos ".$days.' días',
	                "fillColor"=>"rgba(103, 65, 114,0.2)",
	                "strokeColor"=>"rgba(102, 51, 153,1)",
	                "pointColor"=>"rgba(151,187,205,1)",
	                "pointStrokeColor"=>"#fff",
	                "pointHighlightFill"=>"#fff",
	                "pointHighlightStroke"=>"rgba(244, 204, 11, 1)",
	                "data"=>$values
                ]
            ]
        ];

		// dd($tasks);

		return json_encode($lineChartDataSQL);
	}


	public function getApiUserTaskLoad(Request $request)
	{

		$days = $request->input('days');

		$range = \Carbon\Carbon::now()->subDays($days);

		//dd($range);
		
		$tasks = Task::where('tasks.created_at', '>=', $range)
			->join('users', 'users.id', '=', 'tasks.user_id')
			->groupBy('tasks.user_id')
			->orderBy('tasks.user_id', 'ASC')
		    ->get([
		    	'tasks.user_id',
		    	'users.username',
			    DB::raw('COUNT(*) as value')
			]);

		$labels = $tasks->pluck('username');
		$values = $tasks->pluck('value');

		unset($lineChartDataSQL);
		$lineChartDataSQL = [
			'labels'=>$labels,
			'datasets'=>[
				[
	                "label"=>"Tareas Asignadas: Últimos ".$days.' días',
	                "fillColor"=>"rgba(151,187,205,0.2)",
	                "strokeColor"=>"rgba(151,187,205,1)",
	                "pointColor"=>"rgba(151,187,205,1)",
	                "pointStrokeColor"=>"#fff",
	                "pointHighlightFill"=>"#fff",
	                "pointHighlightStroke"=>"rgba(244, 204, 11, 1)",
	                "data"=>$values
                ]
            ]
        ];

		// dd($tasks);

		return json_encode($lineChartDataSQL);
	}


	

	public function getApiUserTaskNoDone(Request $request)
	{

		$days = $request->input('days');

		$range = \Carbon\Carbon::now()->subDays($days);

		//dd($range);
		
		$tasks = Task::where('tasks.created_at', '>=', $range)
			->join('users', 'users.id', '=', 'tasks.user_id')
			->groupBy('tasks.user_id')
			->orderBy('tasks.user_id', 'ASC')
		    ->get([
		    	'tasks.user_id',
		    	'users.username',
			    DB::raw('COUNT(*) as value')
			]);

		$labels = $tasks->pluck('username');
		$values = $tasks->pluck('value');

		unset($lineChartDataSQL);
		$lineChartDataSQL = [
			'labels'=>$labels,
			'datasets'=>[
				[
	                "label"=>"Tareas Asignadas: Últimos ".$days.' días',
	                "fillColor"=>"rgba(151,187,205,0.2)",
	                "strokeColor"=>"rgba(151,187,205,1)",
	                "pointColor"=>"rgba(151,187,205,1)",
	                "pointStrokeColor"=>"#fff",
	                "pointHighlightFill"=>"#fff",
	                "pointHighlightStroke"=>"rgba(244, 204, 11, 1)",
	                "data"=>$values
                ]
            ]
        ];

		// dd($tasks);

		return json_encode($lineChartDataSQL);
	}
}
