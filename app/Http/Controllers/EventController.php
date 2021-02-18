<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('backend.event.index');
    }

    public function create()
    {
        return view('backend.event.create');
    }

    public function registration()
    {
        return view('public.event.registration');
    }
}
