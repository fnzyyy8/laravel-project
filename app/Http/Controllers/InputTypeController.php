<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputTypeController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        $married_status = $request->boolean('married');
        $birthdate = date('Y-m-d');
        return json_encode([
            'name'=>$name,
            'married'=>$married_status,
            'birthdate'=>$birthdate
        ]);
    }

    public function filterOnly(Request $request) : string
    {
        $user =$request->only('name.first','name.last');

       return json_encode($user);
    }

    public function filterExcept(Request $request) : string
    {
        $user =$request->except('name.last');

        return json_encode($user);
    }
}
