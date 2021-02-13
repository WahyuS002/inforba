<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function eventDetail()
    {
        return view('public.event.detail');
    }
}
