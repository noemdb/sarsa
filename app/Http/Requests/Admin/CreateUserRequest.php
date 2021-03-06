<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
        //$request = Request::All();
        //dd($request);
        return [
            'username' => 'required|min:6|max:255|unique:users',
            'password' => 'required|min:6',
            //'is_active' => '',
            //
        ];
    }
}
