<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\service\JsonResponseOutput;
use App\service\Validator\UserValidator;
use Facade\FlareClient\Http\Response;

class UserController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validator = UserValidator::validate($request->all());


        if ($validator->fails()) {
            return $this->response->errorsValidation($validator->errors());
        }
        
        $user = User::create($request->all());

        return $this->response->set(
            true, 
            ['user' => ['name' => $user->name, 'email' => $user->email]],
            "User has been created.",
            201  
        )->output();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return $this->response->set(
            true, 
            ['user' => ['new_name' => $user->name, 'new_email' => $user->email]],
            "User has been updated.",
            200  
        )->output();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->response->set(
            true, 
            [],
            "User has been deleted.",
            200  
        )->output();
    }
}
