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
use App\Models\sys\Profile;
// use App\Models\sys\Rol;
// use App\Models\sys\Task;
// use App\Models\sys\Messege;
// use App\Models\sys\Alert;
// use App\Models\sys\Loginout;
// use App\Models\sys\Logdb;


class ProfileController extends Controller
{
    //
    /*
        Constructor, verifica login del usuario - Profile
    */
    public function __construct()
    {

        $this->middleware('auth');

    }

    public function index()
    {
        
        return view('admin.profiles.chart');

    }

    public function ProfilesDominio(Request $request)
    {
    	$range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';

    	if ($range=='Todos'){
            $finicial = Carbon::now()->SubYear(10);
            $ffinal = Carbon::now()->AddYear(10);
        }else{
            $finicial = Carbon::now()->subDay($range);
            $ffinal = Carbon::now();
        }

        // dd($range, $finicial, $ffinal);

    	$profiles = Profile::Where('created_at', '>=', $finicial)
            ->Where('created_at', '<=', $ffinal)
            ->get()
            ->Toarray();

        foreach ($profiles as $key => $value) {

        	$domain = substr(strstr($value['email'], '@'),1);

        	$label[$domain] = $domain;

        	if (isset($count[$domain]))
        		$count[$domain]++;
        	else
        		$count[$domain] = 0;
        	
        }

        foreach ($label as $key => $value) {
        	$label_dom[] = $value;
        	$values[] = $count[$key];
        }

        $ChartDataSQL = [
            'labels'=>$label_dom,
            'datasets'=>[
                [
                    "label"=>"Dominios de Email",
                    "backgroundColor"=>"rgba(0,166,90,0.2)",//verde
                    "borderColor"=>"rgba(0,166,90,1)",
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);

    }

	public function ProfilesMonth(Request $request)
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

        $usersmonth = Profile::select(DB::raw('count(id) as value'),DB::raw('MONTH(created_at) as month'))
            ->Where('created_at', '>=', $finicial)
            ->Where('created_at', '<=', $ffinal)
            ->groupby('month')
            ->orderBy('month', 'asc')
            ->get();

        //dd($usersmonth);

        //INI nombre de los meses en español
        $labels = $usersmonth->pluck('month');
        foreach ($labels as $key => $value) {
            $dateObj   = Date::createFromFormat('!m', $value);
            $label_month[] = ucfirst($dateObj->format('F'));
        }
        $values = $usersmonth->pluck('value');
        //FIN nombre de los meses en español

        //dd($labels, $label_month, $values);

        $ChartDataSQL = [
            'labels'=>$label_month,
            'datasets'=>[
                [
                    "label"=>"Perfiles Registrados",
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
