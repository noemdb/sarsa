<?php

namespace App\Http\Controllers\Admin\Api\Navbar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//models
use App\Models\sys\Messege;

class NavbarController extends Controller
{
    // verificando sesion activa
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getApiMesseges(Request $request)
    {

        $model = ($request->input('model')!=null) ? $request->input('model') : 20;

        $messeges = Messege::where('destino_user_id',\Auth::user()->id)
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    // ->orderBy('id', 'desc')
                    ->get()
                    ->take(4);

        // dd($model);

        return json_encode($messeges);

        // $range = Carbon::now()->subMonth($months);

		// $tasksmonth = Task::select(DB::raw('count(id) as value'),DB::raw('MONTH(created_at) as month'))
		// 	->Where('created_at', '>=', $range)
		// 	->Where('created_at', '<=', Carbon::now())
		// 	->groupby('month')
		// 	->orderBy('value', 'desc')
		// 	->get();

  //       // dd($tasksmonth);

  //       $labels = $tasksmonth->pluck('month');
  //       foreach ($labels as $key => $value) {
  //           $dateObj   = Date::createFromFormat('!m', $value);
  //           $label_month[] = ucfirst($dateObj->format('F'));
  //       }
  //       $values = $tasksmonth->pluck('value');

  //       // dd($labels, $label_month, $values);

  //       unset($ChartDataSQL);
  //       $ChartDataSQL = [
  //           'labels'=>$label_month,
  //           'datasets'=>[
  //               [
  //                   "label"=>"Tareas Asignadas",
  //                   "backgroundColor"=>"rgba(192, 57, 43,0.2)",
  //                   "borderColor"=>"rgba(192, 57, 43,1)",
  //                   "borderWidth"=>2,
  //                   "data"=>$values
  //               ]
  //           ]
  //       ];

  //       return json_encode($ChartDataSQL);
    }


}
