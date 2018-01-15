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
        return [
            'user_id' => 'required',
            'rol' => 'required|max:16',
            'rango' => 'required|max:16',
            'descripcion' => 'required|max:255',
            'finicial' => 'required|date|date_format:"Y-m-d"',
            // 'ffinal' => 'required|date|date_format:"Y-m-d"|after:'.$request['finicial'],
            'ffinal' => 'required|date|date_format:"Y-m-d"'.empty($request['finicial'])? '' : '|after:'.$request['finicial'],
        ];
    }
}
