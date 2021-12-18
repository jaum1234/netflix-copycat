<?php 

namespace App\service\Validator;

use Illuminate\Support\Facades\Validator;

class UserValidator 
{
    public static function validate($request)
    {
        return Validator::make($request, self::rules(), self::messages());
    }

    private static function rules()
    {
        return [
            'name' => 'string|required|min:3|max:100',
            'email' => 'string|email|required|max:100|unique:users,email',
            'password' => 'string|required|min:8|max:100',
        ];
    }

    private static function messages()
    {
        return [
            'required' => ':attribute field is required',
            'string' => ':attribute must be a valid string',
            'email' => 'the email is not a valid email',
            'min' => ':attribute must have at least 3 characters',
            'max' => ':attribute must have a maximum of 100 characters'
        ];
    }
}