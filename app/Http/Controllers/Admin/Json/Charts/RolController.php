<?php

namespace App\Http\Controllers\Admin\Json\Charts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Helpers
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

// Modelos adicionadas
use App\User;
// use App\Models\sys\Profile;
use App\Models\sys\Rol;
// use App\Models\sys\Task;
// use App\Models\sys\Messege;
// use App\Models\sys\Alert;
// use App\Models\sys\Loginout;
// use App\Models\sys\Logdb;

class RolController extends Controller
{
    //
    /*
        Constructor, verifica login del usuario - Rol
    */
    public function __construct()
    {

        $this->middleware('auth');

    }

    public function index()
    {
        
        return view('admin.rols.chart');

    }

	public function RolsMonth(Request $request)
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

        $rolsmonth = Rol::select(DB::raw('count(id) as value'),DB::raw('MONTH(created_at) as month'))
            ->Where('created_at', '>=', $finicial)
            ->Where('created_at', '<=', $ffinal)
            ->groupby('month')
            ->orderBy('month', 'asc')
            ->get();

        //dd($usersmonth);

        //INI nombre de los meses en español
        $labels = $rolsmonth->pluck('month');
        foreach ($labels as $key => $value) {
            $dateObj   = Date::createFromFormat('!m', $value);
            $label_month[] = ucfirst($dateObj->format('F'));
        }
        $values = $rolsmonth->pluck('value');
        //FIN nombre de los meses en español

        // dd($labels, $label_month, $values);

        $ChartDataSQL = [
            'labels'=>$label_month,
            'datasets'=>[
                [
                    "label"=>"Roles Registrados",
                    "backgroundColor"=>"rgba(192, 57, 43,0.2)",
                    "borderColor"=>"rgba(192, 57, 43,1)",
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }


    public function RolsType(Request $request)
    {

        $range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';
        $limit = ($request->input('limit')!=null) ? $request->input('limit') : 8;

        if($range=='Todos'){
            $finicial = Carbon::now()->SubYear(1000);
            $ffinal = Carbon::now()->AddYear(1000);
        }else{
            $finicial = Carbon::now()->subMonth($range);
            $ffinal = Carbon::now();
        }       

        // $label_rol = Rol::pluck('rol','rol'); // return username,user_id,value

        $rols = Rol::select('rol', DB::raw('count(rol) as value'))
            ->Where('created_at', '>=', $finicial)
            ->Where('created_at', '<=', $ffinal)
            ->groupby('rol')
            ->orderBy('rol', 'asc')
            ->get()
            ->take($limit);

        $labels = $rols->pluck('rol');
        $values = $rols->pluck('value');

        // dd($rols,$labels,$values);

        unset($ChartDataSQL);
        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Tipos de Roles",
                    "backgroundColor"=>"rgba(151,187,205,0.2)",
                    "borderColor"=>"rgba(151,187,205,1)",
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        // dd($tasks);

        return json_encode($ChartDataSQL);
    }

    public function RangeType(Request $request)
    {

        $range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';
        $limit = ($request->input('limit')!=null) ? $request->input('limit') : 8;

        if($range=='Todos'){
            $finicial = Carbon::now()->SubYear(1000);
            $ffinal = Carbon::now()->AddYear(1000);
        }else{
            $finicial = Carbon::now()->subMonth($range);
            $ffinal = Carbon::now();
        }       

        // $label_rol = Rol::pluck('rol','rol'); // return username,user_id,value

        $rols = Rol::select('rango', DB::raw('count(rango) as value'))
            ->Where('created_at', '>=', $finicial)
            ->Where('created_at', '<=', $ffinal)
            ->groupby('rango')
            ->orderBy('rango', 'asc')
            ->get()
            ->take($limit);

        $labels = $rols->pluck('rango');
        $values = $rols->pluck('value');

        // dd($rols,$labels,$values);

        unset($ChartDataSQL);
        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Tipos de Roles",
                    "backgroundColor"=>"rgba(151,187,205,0.2)",
                    "borderColor"=>"rgba(151,187,205,1)",
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        // dd($tasks);

        return json_encode($ChartDataSQL);
    }
}
