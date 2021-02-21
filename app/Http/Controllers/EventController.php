<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventUser;
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

    public function registration($slug)
    {
        $event = Event::where('slug', $slug)->first();

        return view('public.event.registration', compact('event'));
    }

    public function payment($slug)
    {
        $event = Event::where('slug', $slug)->first();

        return view('public.event.payment', compact('event'));
    }

    public function userRegistration(Request $request, $slug)
    {
        $answer = json_encode($request->except('_token'));

        $event_id = Event::where('slug', $slug)->first()->id;
        $user_id = auth()->user()->id;


        EventUser::create([
            'user_id' => $user_id,
            'event_id' => $event_id,
            'answer' => $answer,
        ]);
        return redirect()->route('app.event');
    }
}
