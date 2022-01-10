<?php 

namespace App\service\Validator;

use Illuminate\Support\Facades\Validator;

class VideoValidator 
{
    public static function validate($request)
    {
        return Validator::make($request, self::rules(), self::messages());
    }

    private static function rules()
    {
        return [
            'title' => 'string|required|min:3|max:100',
            'description' => 'string|required|min:3|max:345',
        ];
    }

    private static function messages()
    {
        return [
            'required' => ':attribute field is required',
            'string' => ':attribute must be a valid string',
            'min' => ':attribute must have at least 3 characters',
            'max' => ':attribute must have a maximum of 100 characters'
        ];
    }
}