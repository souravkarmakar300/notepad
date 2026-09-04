<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Notepad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::guard('web')->user();

        return view('user.dashboard', [
            'notepadsCount' => $user->notepads()->count(),
            'recentNotepads' => $user->notepads()->latest()->take(5)->get(),
        ]);
    }
}
