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

		$tasks = Task::join('users', 'users.id', '=', 'tasks.user_id')
			->groupBy('tasks.user_id')
			->orderBy('tasks.user_id', 'ASC')
		    ->get([
		    	'users.username',
			    DB::raw('COUNT(*) as value')
			])
		    ->toJSON();

		// dd($tasks);


		return $tasks;
	}
}
