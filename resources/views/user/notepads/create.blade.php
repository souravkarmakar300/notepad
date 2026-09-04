@extends('layouts.user')

@section('title', 'Create Notepad')
@section('heading', 'Create Notepad')

@section('content')
<form method="POST" action="{{ route('user.notepads.store') }}" class="w-full space-y-6">
    @csrf
    {{-- <p class="text-sm text-slate-500">This notepad will be saved under your account automatically.</p> --}}
    @include('partials.notepad-form', ['isAdmin' => false])
    <div class="flex gap-3">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg">Save Notepad</button>
        <a href="{{ route('user.notepads.index') }}" class="text-sm px-4 py-2 rounded-lg border border-slate-300 bg-white">Cancel</a>
    </div>
</form>
@endsection
