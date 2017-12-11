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
// use App\Models\sys\Task;
// use App\Models\sys\Profile;
// use App\Models\sys\Rol;
// use App\Models\sys\Messege;
// use App\Models\sys\Alert;
// use App\Models\sys\Loginout;
// use App\Models\sys\Logdb;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*
        Constructor, verifica login del usuario - Profile
    */
    public function __construct(){

        $this->middleware('auth');

    }
    
    public function index()
    {
        
        return view('admin.users.chart');
    }

    public function UsersMonth(Request $request)
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

        $usersmonth = User::select(DB::raw('count(id) as value'),DB::raw('MONTH(created_at) as month'))
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
                    "label"=>"Usuarios Registrados",
                    "backgroundColor"=>"rgba(192, 57, 43,0.2)",
                    "borderColor"=>"rgba(192, 57, 43,1)",
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

    public function UserActive(Request $request)
    {

        $range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';
        $limit = ($request->input('limit')!=null) ? $request->input('limit') : 8;

        if($range=='Todos'){
            $fecha = Carbon::now();
        }else{
            $fecha = Carbon::now()->subDays($range);
        }

        $users = 
            User::select('is_active',DB::raw('count(is_active) as users_count'))
            ->Where('created_at', '<=', $fecha)
            // ->Where('created_at', '<=', $ffinal)
            ->groupby('is_active')
            ->orderBy('users_count', 'desc')
            ->get();
            // ->take($limit);

        //dd($users->toarray());

        $labels = $users->pluck('is_active');
        $values = $users->pluck('users_count');
        for ($i=0; $i < count($labels) ; $i++) { 
            $colors[] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 1)';
        }

        // dd($labels , $values, $colors);

        unset($ChartDataSQL);
        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Usuarios Act/Des",
                    "backgroundColor"=>$colors,
                    "data"=>$values
                ]
            ]
        ];

        // dd($tasks);

        return json_encode($ChartDataSQL);
    }

    public function UserConnect()
    {

        $users = 
            User::Where('last_loginout_at', '<=', Carbon::now())
                ->Where('last_login_at', '<=', Carbon::now())
                ->whereNotNull('last_loginout_at')
                ->WhereColumn('last_loginout_at', '<', 'last_login_at')
                ->get();

        // dd($users);

        $usersconnect = $users->count();
        $usersdesconnet = ( User::count() - $usersconnect );

        $labels = ['Usuarios'];
        $values = [$usersconnect, $usersdesconnet];

        unset($ChartDataSQL);
        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Conectados",
                    "backgroundColor"=>"rgba(0,166,90,1)",//verde
                    "borderColor"=>"rgba(0,166,90,1)",
                    "borderWidth"=>1,
                    "data"=>[$usersconnect]
                ],
                [
                    "label"=>"Desconectados",
                    "backgroundColor"=>"rgba(245,105,84,1)",//naranja
                    "borderColor"=>"rgba(245,105,84,1)",
                    "borderWidth"=>1,
                    "data"=>[$usersdesconnet]
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

}
