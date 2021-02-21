<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('backend.dashboard', compact('user'));
    }

    public function notifications()
    {
        return view('backend.user.notifications');
    }
}
