<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\service\Validator\UserValidator;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{

    private UserValidator $validator;
    
    public function __construct(UserValidator $userValidator)
    {
        parent::__construct();
        $this->validator = $userValidator;
        
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        try {
            $data = $this->validator->validate($request);
        } catch (ValidationException $e) {
            return $this->response->errorsValidation($e->errors());
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        event(new Registered($user));

        return $this->response->set(
            true, 
            ['user' => ['name' => $user->name, 'email' => $user->email]],
            "User has been created.",
            201  
        )->output();

        //return redirect(RouteServiceProvider::HOME);
    }
}
