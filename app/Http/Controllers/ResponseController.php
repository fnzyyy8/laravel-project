<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseController extends Controller
{
    public function response(Request $request): Response
    {
        return \response('Hello Response');
    }

    public function header(Request $request): Response
    {
        $body = [
            'firstname' => 'Farhan',
            'middlename' => 'Septiansyah'
        ];
        return \response(json_encode($body), 200)
            ->header('Content-Type', 'application/json')
            ->withHeaders(
                [
                    'Author' => 'Farhan Septiansyah',
                    'App' => 'Belajar-Response'
                ]
            );

    }

    public function responseView(Request $request): Response
    {
        return response()
            ->view('hello', ['name' => 'Anto'], 200);

    }

    public function responseJson(Request $request): JsonResponse
    {
        $body = [
            'first' => 'Farhan',
            'middle' => 'Septiansyah'
        ];

        return response()
            ->json($body);

    }

    public function responseFile(Request $request): BinaryFileResponse
    {
        return response()
            ->file(storage_path('app/picture/Farhan dan Aulia.jpg'));
    }

    public function responseDownload(Request $request): BinaryFileResponse
    {
        return response()
            ->download(storage_path('app/picture/Farhan dan Aulia.jpg'));
    }
}
