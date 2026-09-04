<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AllowSpecificIp;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(function ($request) {
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }

            return route('user.login');
        });

        $middleware->redirectUsersTo(function ($request) {
            if ($request->is('admin') || $request->is('admin/*') || auth()->guard('admin')->check()) {
                return route('admin.dashboard');
            }

            return route('user.dashboard');
        });

        $middleware->alias([
            'allow-specific-ip' => AllowSpecificIp::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
