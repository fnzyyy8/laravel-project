<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createSession(Request $request): string
    {
        $request->session()->put('userId', 'Farhan');
        $request->session()->put('isMember', true);

        return "Ok";

    }

    public function getSession(Request $request) :JsonResponse
    {
        $getSessionId = $request->session()->get('userId','guest');
        $getMember = $request->session()->get('isMember',false);

        $body = [
            'userId' => $getSessionId,
            'isMember'=>$getMember
        ];

        return response()->json($body);

    }

    public function clearSession(Request $request):string
    {
        $request->session()->flush();

        return "Session in flush";

    }
}
