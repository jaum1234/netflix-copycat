<?php 

namespace App\service\Validator;

use App\service\Validator\BaseValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'name' => 'sometimes|string|required|min:3|max:100',
            'email' => 'string|email|required|max:100|unique:users,email',
            'password' => 'confirmed|string|sometimes|min:8|max:100',
        ];
    }
}