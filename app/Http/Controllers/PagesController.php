<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $event = Event::latest()->take(6)->get();

        return view('public.home', compact('event'));
    }

    public function eventDetail($slug)
    {
        $event = Event::where('slug', $slug)->first();

        return view('public.event.detail', compact('event'));
    }
}
