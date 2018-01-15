<?php

namespace App\Http\Controllers\Admin\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//validation request
use App\Http\Requests\Admin\CreateProfileRequest;
use App\Http\Requests\Admin\UpdateProfileRequest;

//Helpers
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

//models
use App\User;
use App\Models\sys\Profile;
// use App\Models\sys\Rol;
use App\Models\sys\SelectOpt;

class ProfileController extends Controller
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
        $profiles = Profile::OrderBy('id','DESC')
            // ->username($arr_get)
            ->with('User')
            // ->with('rols')
            ->get();

        $is_active_list = SelectOpt::select('select_opts.*')
            ->where('table','users')
            ->where('name','is_active')
            ->where('view','rol.index')
            ->orderby('value')
            ->pluck('value','value')
            ->prepend('Seleccionar','');

        // dd($profiles);

        return view('admin.profiles.index', compact('profiles','is_active_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $user_list = User::select('users.*')
                ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
                ->whereNull('profiles.user_id')
                ->OrWhere('profiles.deleted_at','<>',NULL)
                // ->whereNotNull('profiles.deleted_at')
                ->orderby('users.username','asc')
                ->pluck('username', 'id');

        return view('admin.profiles.create',compact('user','user_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProfileRequest $request)
    {
        
        $profile = Profile::onlyTrashed()->Where('user_id','=',$request->user_id);

        if ($profile) {

            $profile->forceDelete();

        }

        $profile = Profile::create($request->all());

        $messenge = trans('db_oper_result.profile_create_ok');

        if($request->ajax()){

            return response()->json([
                "firstname"=>$request->firstname,
                "lastname"=>$request->lastname,
                "email"=>$request->email,
                "messenge"=>$messenge
            ]);

        }
        
        Session::flash('operp_ok',$messenge);

        return redirect()->route('profiles.index');

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
    public function update(UpdateProfileRequest $request, $id)
    {

        $profile = Profile::findOrFail($id);

        // echo $request;exit;
        
        $profile->fill($request->all());

        //echo $profile;exit;

        $profile->save();

        $messenge = 'Operación exitosa';

        if($request->ajax()){

            return response()->json([
                "firstname"=>$request->firstname,
                "lastname"=>$request->lastname,
                "email"=>$request->email,
                "messenge"=>$messenge
            ]);
            
        }

        Session::flash('operp_ok',$messenge);
        return redirect()->route('users.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        
        //echo $id;exit;

        $profile = Profile::findOrFail($id);

        $profile->delete();

        $messenge = 'Operación completada correctamente';

        if($request->ajax()){

            return $messenge;

        }
        
        Session::flash('operp_ok',$messenge.' -> ('.$profile->firstname.')');

        return redirect()->route('profile.index');
    }
}
