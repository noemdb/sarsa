<?php

namespace App\Http\Controllers\Admin\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Helpers
use Illuminate\Support\Carbon;

//models
use App\User;

class UserController extends Controller
{


    /*
        Constructor, verifica login del usuario - Profile
    */
    public function __construct(){

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //variables del formulario de busqueda
        $arr_get = [
            // 'username'=>$request->get('username'),
            // 'is_active'=>$request->get('is_active'),
            // 'is_admin'=>$request->get('is_admin')
        ];

        $users = User::OrderBy('users.id','DESC')
            // ->username($arr_get)
            ->with('profile')
            ->with('rols')
            ->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::create($request->all());
        $messenge = trans('db_oper_result.user_create_ok');;

        if($request->ajax()){
            //return $messenge;
            return response()->json([
                "username"=>$request->username,
                "is_active"=>$request->is_active,
                "messenge"=>$messenge
            ]);
        }
        
        Session::flash('operp_ok',trans('db_oper_result.user_create_ok'));
        return redirect()->route('users.index');

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
        // dd($id,$request);
        $user = User::findOrFail($id);
        $old_user = clone $user;
        $user->fill($request->all());
        $user->save();
        // Log::info('Update user.', ['data_old' => $old_user, 'data_new' => $user]);

        $messenge = trans('db_oper_result.user_update_ok');

        if($request->ajax()){
            return response()->json([
                "username"=>$request->username,
                "email"=>$request->email,
                "is_active"=>$request->is_active,
                "messenge"=>$messenge
            ]);
        }
        Session::flash('operp_ok',trans('db_oper_result.user_update_ok'));
        return redirect()->route('users.index');
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
