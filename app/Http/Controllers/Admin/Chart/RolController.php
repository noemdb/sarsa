<?php

namespace App\Http\Controllers\Admin\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Helpers
use Illuminate\Support\Carbon;
// use Jenssegers\Date\Date;
// use Illuminate\Support\Facades\DB;

// Modelos adicionadas
// use App\User;
// use App\Models\sys\Task;
// use App\Models\sys\Profile;
use App\Models\sys\Rol;
// use App\Models\sys\Messege;
// use App\Models\sys\Alert;
// use App\Models\sys\Loginout;
// use App\Models\sys\Logdb;

class RolController extends Controller
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
        
        return view('admin.rols.chart');
    }

}
