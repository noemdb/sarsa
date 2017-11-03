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

		$range = ($request->input('range')!=null) ? $request->input('range') : 1000;
        $limit = ($request->input('limit')!=null) ? $request->input('limit') : 8;

		$range = Carbon::now()->subDays($range);

		$userstasks = 
            User::withCount(['tasks' => function ($query) use ($range)  {
                $query->where('created_at', '>=', $range)
                ->where('created_at', '<=', Carbon::now());
            }])
            ->OrderBy('tasks_count', 'desc')
            ->get()
            ->take($limit);

        // dd($userstasks);

        $labels = $userstasks->pluck('username');
		$users_id = $userstasks->pluck('id');

        // dd($labels , $users_id);

        $tasks_iniciadas = Task::geCountTotal($users_id,$range,'iniciada');
        $tasks_finalizadas = Task::geCountTotal($users_id,$range,'finalizada');
        $tasks_asignadas = Task::geCountTotal($users_id,$range,'');

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

		$range = Carbon::now()->subDays($range);

        $userstasks = 
            User::withCount(['tasks' => function ($query) use ($range)  {
                $query->where('created_at', '>=', $range)
                ->where('created_at', '<=', Carbon::now());
            }])
            ->orderBy('tasks_count', 'desc')
            ->get()
            ->take($limit);

		$labels = $userstasks->pluck('username');

        $users_id = $userstasks->pluck('id');

        $values_todas = Task::geCountTotal($users_id,$range,'');
        $values_done = Task::geCountTotal($users_id,$range,'finalizada');

        // dd($labels , $values_todas, $values_done);

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

		$range = ($request->input('range')!=null) ? $request->input('range') : 360;
        $limit = ($request->input('limit')!=null) ? $request->input('limit') : 8;

		$range = Carbon::now()->subDays($range);

        $userstasks = 
            User::withCount(['tasks' => function ($query) use ($range)  {
                $query->where('created_at', '>=', $range)
                    ->where('created_at', '<=', Carbon::now());
            }])
            ->OrderBy('tasks_count', 'desc')
            // ->WhereNotNull('tasks_count')
            ->get()
            ->take($limit);

        // dd($userstasks);

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

        // $ChartDataSQL = [
        //     'labels'=>$labels,
        //     'datasets'=>[
        //         [
        //             "label"=>"Tareas Asignadas",
        //             "backgroundColor"=>"rgba(151,187,205,0.2)",
        //             "borderColor"=>"rgba(151,187,205,1)",
        //             "borderWidth"=>2,
        //             "data"=>$values
        //         ]
        //     ]
        // ];

		// dd($tasks);

		return json_encode($ChartDataSQL);
	}

    public function getApiTaskMonth(Request $request)
    {

        $months = ($request->input('range')!=null) ? $request->input('range') : 20;

        $range = Carbon::now()->subMonth($months);

		$tasksmonth = Task::select(DB::raw('count(id) as value'),DB::raw('MONTH(created_at) as month'))
			->Where('created_at', '>=', $range)
			->Where('created_at', '<=', Carbon::now())
			->groupby('month')
			->orderBy('value', 'desc')
			->get();

        // dd($tasksmonth);

        $labels = $tasksmonth->pluck('month');
        foreach ($labels as $key => $value) {
            $dateObj   = Date::createFromFormat('!m', $value);
            $label_month[] = ucfirst($dateObj->format('F'));
        }
        $values = $tasksmonth->pluck('value');

        // dd($labels, $label_month, $values);

        unset($ChartDataSQL);
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