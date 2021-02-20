<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripayController extends Controller
{
    public function callback(Request $request)
    {
        $json = file_get_contents(url('/') . "/callback-tripay");
        dd($json);
    }
}
