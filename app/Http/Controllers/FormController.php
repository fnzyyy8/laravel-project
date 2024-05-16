<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function formView() :Response
    {
        return response()
            ->view('form');

    }

    public function form(Request $request):Response
    {
        $name = $request->input('name');


        return response()->view('/hello',['name'=> $name]);


    }


}
