<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RedirectController extends Controller
{
    public function redirectTo(): string
    {
        return "Redirect To";

    }

    public function redirectFrom(Request $request): RedirectResponse
    {
        return redirect()->route('redirectTo');

    }


    public function redirectHello(string $name): string
    {
        return "Hello $name";

    }

    public function redirectName(Request $request): RedirectResponse
    {
        return redirect()->route('redirectName', ['name' => 'Farhan']);

    }

    public function redirectAction(): RedirectResponse
    {
        return redirect()->action([RedirectController::class, 'redirectHello'], ['name' => 'Anto']);
    }

    public function redirectAway(): RedirectResponse
    {
        return redirect()->away('https://www.youtube.com/watch?v=mHONNcZbwDY&list=RDmHONNcZbwDY&start_radio=1');
    }
}
