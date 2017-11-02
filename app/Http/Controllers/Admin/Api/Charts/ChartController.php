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


public function getApiUserTaskLoad(Request $request)
	{

		$days = ($request->input('days')!=null) ? $request->input('days') : 360;

		$range = \Carbon\Carbon::now()->subDays($days);

		$userstasks = User::has('tasks')->get(['id','username']);
        // dd($userstasks->pluck('username'));

        $labels = $userstasks->pluck('username');
		$users_id = $userstasks->pluck('id');

        // dd($labels , $users_id);

        $tasks_iniciadas = Task::geCountTotal($users_id,$range,'iniciada');
        $tasks_finalizadas = Task::geCountTotal($users_id,$range,'finalizada');
        $tasks_asignadas = Task::geCountTotal($users_id,$range,'');

		// dd($tot_iniciadas,$tot_finalizadas);

		unset($lineChartDataSQL);
		$lineChartDataSQL = [
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

		return json_encode($lineChartDataSQL);
	}


	public function getApiUserTaskDone(Request $request)
	{

		$days = $request->input('days');

		$range = \Carbon\Carbon::now()->subDays($days);

        $userstasks = User::has('tasks')->get(['id','username']);

		$labels = $userstasks->pluck('username');

        $users_id = $userstasks->pluck('id');

        $values_todas = Task::geCountTotal($users_id,$range,'');
        $values_done = Task::geCountTotal($users_id,$range,'finalizada');

        // dd($labels , $values);

		unset($lineChartDataSQL);
		$lineChartDataSQL = [
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

		return json_encode($lineChartDataSQL);
	}

	public function getApiUserTaskAsig(Request $request)
	{

		$days = $request->input('days');

		$range = \Carbon\Carbon::now()->subDays($days);

        $userstasks = User::has('tasks')->get(['id','username']);

		$labels = $userstasks->pluck('username');

        $users_id = $userstasks->pluck('id');

        $values = Task::geCountTotal($users_id,$range,'');

        // dd($labels , $values);

		unset($lineChartDataSQL);
		$lineChartDataSQL = [
			'labels'=>$labels,
			'datasets'=>[
				[
	                "label"=>"Tareas Asignadas",
	                "backgroundColor"=>"rgba(151,187,205,0.2)",
	                "borderColor"=>"rgba(151,187,205,1)",
                    "borderWidth"=>2,
	                "data"=>$values
                ]
            ]
        ];

		// dd($tasks);

		return json_encode($lineChartDataSQL);
	}

	
}
