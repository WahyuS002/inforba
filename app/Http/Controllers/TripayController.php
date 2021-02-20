<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripayController extends Controller
{
    public function callback(Request $request)
    {
        dd($request->all());
    }
}
