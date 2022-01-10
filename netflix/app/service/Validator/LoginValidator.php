<?php 
namespace App\service\Validator;

use App\service\Validator\BaseValidator;

class LoginValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'email' => 'required|email|string|exists:users,email',
            'password' => 'required|string|min:8' 
        ];
    }
}