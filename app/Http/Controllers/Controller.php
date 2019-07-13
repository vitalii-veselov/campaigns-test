<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getSuccessResponse(): JsonResponse
    {
        return new JsonResponse('Okay', 200);
    }

    protected function getFailResponse(): JsonResponse
    {
        return new JsonResponse('Fail', 400);
    }
}
