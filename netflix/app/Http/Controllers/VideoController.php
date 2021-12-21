<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\service\Validator\VideoValidator;
use Illuminate\Http\Request;

class VideoController extends Controller
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
        $validator = VideoValidator::validate($request->all());

        if ($validator->fails()) {
            return $this->response->errorsValidation($validator->errors());
        }

        $video = Video::create($validator->validated());

        return $this->response->set(
            true, 
            ['video' => $video],
            "Video has been created.",
            201  
        )->output();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $validator = VideoValidator::validate($request->all());

        if ($validator->fails()) {
            return $this->response->errorsValidation($validator->errors());
        }

        $video->update($validator->validated());

        return $this->response->set(
            true, 
            ['video' => $video],
            "Video has been updated.",
            200  
        )->output();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();

        return $this->response->set(
            true, 
            [],
            "Video has been deleted.",
            200  
        )->output();
    }
}
