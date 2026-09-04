@extends('layouts.guest')

@section('title', 'Admin Login')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-slate-900">Admin Login</h1>
            <p class="text-sm text-slate-500 mt-2">Sign in to manage users and notepads</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                <input type="password" name="password" required
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <label class="flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="remember" class="rounded border-slate-300">
                Remember me
            </label>
            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg py-2.5 text-sm">
                Sign In
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-slate-500">
            <a href="{{ route('user.login') }}" class="text-blue-600 hover:underline">User login</a>
        </p>
    </div>
</div>
@endsection
