<?php 

namespace App\service\Validator;


use App\service\Validator\BaseValidator;

class CategoryValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'name' => 'string|required|min:3|max:100',
        ];
    }
}