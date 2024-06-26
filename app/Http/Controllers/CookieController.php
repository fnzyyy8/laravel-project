<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function createCookie(Request $request): Response
    {
        return response('Hello Coockie')
            ->cookie('User-Id', 'Farhan', 100, '/')
            ->cookie('Is-Member', 'true', 100, '/');
    }

    public function getCookie(Request $request): JsonResponse
    {
        return response()
            ->json([
                'userId'=>$request->cookie('User-Id','guest'),
                'isMember'=>$request->cookie('Is-Member',false)
            ]);

    }

    public function clearCookie(Request $request):Response
    {
        return response("Cookie Clear")
            ->withoutCookie('User-Id')
            ->withoutCookie('Is-Member');

    }
}
