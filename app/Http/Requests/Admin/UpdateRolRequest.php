<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Routing\Route;
use Illuminate\Http\Request;

class UpdateRolRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $request = Request::All();

        // print_r($request);
        
        //INI validando que finicial no esté vacio
        $date_after = '';
        if(isset($request['finicial'])){
            $date_after = "|after:".$request['finicial'];
        }
        
        //FIN validando que finicial no esté vacio
        
        return [
            'user_id' => 'required',
            'rol' => 'required|max:16',
            'rango' => 'required|max:16',
            'descripcion' => 'required|max:255',
            'finicial' => 'required|date|date_format:"Y-m-d"',
            'ffinal' => 'required|date|date_format:"Y-m-d"'.$date_after,
        ];
    }
}
