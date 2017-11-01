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

		$days = ($request->input('days')!=null) ? $request->input('days') : 360;

		$range = \Carbon\Carbon::now()->subDays($days);

		$userstasks = User::has('tasks')->get(['id','username']);
        // dd($userstasks->pluck('username'));

        $labels = $userstasks->pluck('username');
		$users_id = $userstasks->pluck('id');

        // dd($labels , $users_id);

        $tot_iniciadas = Task::geCountTotal($users_id,$range,'iniciada');
        $tot_finalizadas = Task::geCountTotal($users_id,$range,'finalizada');

		// dd($tot_iniciadas,$tot_finalizadas);

		unset($lineChartDataSQL);
		$lineChartDataSQL = [
			'labels'=>$labels,
			'datasets'=>[
				[
	                "label"=>"Iniciadas",
	                "fillColor"=>"rgba(103, 65, 114,0.2)",
	                "strokeColor"=>"rgba(102, 51, 153,1)",
	                "pointColor"=>"rgba(151,187,205,1)",
	                "pointStrokeColor"=>"#fff",
	                "pointHighlightFill"=>"#fff",
	                "pointHighlightStroke"=>"rgba(244, 204, 11, 1)",
	                "data"=>$tot_iniciadas
                ],

                [
	                "label"=>"Finalizadas",
	                "fillColor"=>"rgba(151,187,205,0.2)",
	                "strokeColor"=>"rgba(151,187,205,1)",
	                "pointColor"=>"rgba(151,187,205,1)",
	                "pointStrokeColor"=>"#fff",
	                "pointHighlightFill"=>"#fff",
	                "pointHighlightStroke"=>"rgba(244, 204, 11, 1)",
	                "data"=>$tot_finalizadas
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
