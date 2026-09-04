<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notepad;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'usersCount' => User::count(),
            'notepadsCount' => Notepad::count(),
            'recentNotepads' => Notepad::with('user')->latest()->take(5)->get(),
        ]);
    }
}
