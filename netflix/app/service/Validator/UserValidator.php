<?php 

namespace App\service\Validator;

use Illuminate\Support\Facades\Validator;

class UserValidator 
{
    public static function validate($request)
    {
        return Validator::make($request, self::rules());
    }

    private static function rules()
    {
        return [
            'name' => 'string|required|min:3|max:100',
            'email' => 'string|email|required|max:100|unique:users,email',
            'password' => 'string|required|min:8|max:100',
        ];
    }
}