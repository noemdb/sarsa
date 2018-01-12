<?php

namespace App\Http\Controllers\Admin\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//validation request
use App\Http\Requests\Admin\CreateRolRequest;
use App\Http\Requests\Admin\UpdateRolRequest;

//Helpers
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

//models
use App\User;
use App\Models\sys\Profile;
use App\Models\sys\Rol;
use App\Models\sys\SelectOpt;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = Rol::OrderBy('id','DESC')
            // ->username($arr_get)
            ->with('User')
            ->with('Profile')
            ->get();

        // dd($rols->toarray());

        return view('admin.rols.index', compact('rols'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // $user = new User;
        $user_list = User::select('users.*')
                // ->leftJoin('rols', 'users.id', '=', 'rols.user_id')
                // ->whereNull('rols.user_id')
                // ->OrWhere('rols.deleted_at','<>',NULL)
                ->orderby('users.username','asc')
                ->pluck('username', 'id');

        $opt_list_rol = SelectOpt::select('select_opts.*')
            ->where('table','rols')
            ->where('view','rol.create')
            ->where('name','rol')
            ->orderby('value')
            ->pluck('value','value');

        $opt_list_rango = SelectOpt::select('select_opts.*')
            ->where('table','rols')
            ->where('view','rol.create')
            ->where('name','rango')
            ->orderby('value')
            ->pluck('value','value');

        // dd($user_list,$sel_opt_list);

        return view('admin.rols.create',compact('user_list','opt_list_rol','opt_list_rango'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRolRequest $request)
    {
        
        // dd($request->all());

        $rol = Rol::onlyTrashed()->Where('user_id','=',$request->user_id);

        // dd($rol);

        if ($rol) {

            $rol->forceDelete();

        }

        $rol = Rol::create($request->all());

        $messenge = trans('db_oper_result.profile_create_ok');

        if($request->ajax()){

            return response()->json([
                "rol"=>$request->rol,
                "rango"=>$request->rango,
                "descripcion"=>$request->descripcion,
                "finicial"=>$request->finicial,
                "ffinal"=>$request->ffinal,
            ]);

        }
        
        Session::flash('operp_ok',$messenge);

        Session::flash('class_panel','success');

        return redirect()->route('rols.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
