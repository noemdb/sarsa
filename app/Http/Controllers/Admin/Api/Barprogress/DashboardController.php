<?php

namespace App\Http\Controllers\Admin\Api\Barprogress;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

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

        $ProgressDataSQL = ['labels'=>$label_month,"data"=>$values];

        return json_encode($ProgressDataSQL);
    }
}
