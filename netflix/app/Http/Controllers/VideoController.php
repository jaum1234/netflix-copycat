<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\service\Validator\VideoValidator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VideoController extends Controller
{
    private VideoValidator $validator;

    public function __construct(VideoValidator $videoValidator)
    {
        parent::__construct();
        $this->validator = $videoValidator;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response->set(
            true, 
            ['videos' => Video::all()], 
            'All videos listed', 
            200
        )->output();
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
        try {
            $data = $this->validator->validate($request);
        } catch (ValidationException $e) {
            return $this->response->errorsValidation($e->errors());
        }

        $video = Video::create($data);

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
        try {
            $data = $this->validator->validate($request);
        } catch (ValidationException $e) {
            return $this->response->errorsValidation($e->errors());
        }

        $video->update($data);

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
