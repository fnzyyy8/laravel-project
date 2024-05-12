<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NestedViewController extends Controller
{
    public function index()
    {
        $data_view = [
            'message'=>'Nested View'
        ];

        return view('hello.world',$data_view);
    }
}
