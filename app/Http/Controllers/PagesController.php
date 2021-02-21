<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function eventDetail($slug)
    {
        $event = Event::where('slug', $slug)->first();

        return view('public.event.detail', compact('event'));
    }
}
