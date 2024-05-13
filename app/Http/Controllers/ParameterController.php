<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function onlyparam($id)
    {
        return "This is Product - $id";

    }

    public function doubleparam($productId, $itemId)
    {
        return "This is Product - $productId, with number $itemId";
    }

    public function regexparam($id)
    {
        return "Number - $id";

    }

    public function optionalparam($id = '404')
    {
        return "User $id";
    }

    public function namedroute()
    {
        return redirect()->route('world');
    }


}
