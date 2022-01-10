<?php 

namespace App\service\Validator;


use App\service\Validator\BaseValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class VideoValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'title' => 'string|required|min:3|max:100',
            'description' => 'string|required|min:3|max:345',
        ];
    }
}