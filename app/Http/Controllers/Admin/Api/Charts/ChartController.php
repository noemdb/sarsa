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

	public function getApiUserTaskLoad()
	{
		// $days = Input::get('days', 7);
		// $range = \Carbon\Carbon::now()->subDays($days);

		// $stats = User::where('created_at', '>=', $range)
		//   ->groupBy('date')
		//   ->orderBy('date', 'DESC')
		//   ->remember(60)
		//   ->get([
		//     DB::raw('Date(created_at) as date'),
		//     DB::raw('COUNT(*) as value')
		//   ])
		//   ->toJSON();

		// User::orderBy('username','desc')->has('tasks')->pluck('username', 'id');

		$tasks = Task::join('users', 'users.id', '=', 'tasks.user_id')
			->groupBy('tasks.user_id')
			->orderBy('tasks.user_id', 'ASC')
		    ->get([
		    	'tasks.user_id',
		    	'users.username',
			    DB::raw('COUNT(*) as value')
			]);

		$labels = $tasks->pluck('username');
		$values = $tasks->pluck('value');

		$lineChartDataSQL = [
			'labels'=>$labels,
			'datasets'=>[
				[
	                "label"=>"Tareas Asignadas",
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

		// $task_notdone = ;

		// $list_user = User::orderBy('username','asc')->has('tasks')->pluck('username', 'id');

		// dd($lineChartDataSQL);

		// dd($tasks);

		return json_encode($lineChartDataSQL);
	}
}
