<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

    public function payment($slug)
    {
        $event = Event::where('slug', $slug)->first();

        return view('public.event.payment', compact('event'));
    }
}
