<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EventUser;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $eventUser = EventUser::where('user_id', $user_id)->get();

        return view('backend.dashboard', compact('user', 'eventUser'));
    }

    public function notifications()
    {
        return view('backend.user.notifications');
    }
}
