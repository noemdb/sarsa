<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Routing\Route;
use Illuminate\Http\Request;

class CreateProfileRequest extends FormRequest
{

    private $route;

    public function __construct(Route $route){

        $this->route = $route;

    }

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

        return [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|unique:profiles,email',
            'user_id' => 'required|unique:profiles,user_id',
        ];
    }
}
