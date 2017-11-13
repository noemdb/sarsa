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

        $users = User::select('users.*','rols.rol','rols.rango')
            ->orderBy('users.id','DESC')
        // select('users.*','profiles.id as id_profile','profiles.url_img','profiles.created_at as pcreated_at','profiles.updated_at as pupdated_at','profiles.deleted_at as pdeleted_at', \DB::raw('CONCAT(firstname, " ", lastname) AS fullname'))
            ->leftjoin('rols', 'rols.user_id', '=', 'users.id')
            // ->where('rols.finicial','<=',Carbon::now())
            // ->where('rols.ffinal','>=',Carbon::now())
            // ->username($arr_get)
            ->with('profile')
            ->with('rols')
            ->get();
            // ->paginate(15);
        dd($users);
        // 
        $roles = User::find(1)->rols;
        //dd($roles);


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
        //
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
