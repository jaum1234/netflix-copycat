<?php

namespace App\Http\Controllers;

use App\service\JsonResponseOutput;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected JsonResponseOutput $response;

    public function __construct()
    {
        $this->response = new JsonResponseOutput();
    }
}
