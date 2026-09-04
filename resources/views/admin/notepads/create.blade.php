@extends('layouts.admin')

@section('title', 'Create Notepad')
@section('heading', 'Create Notepad')

@section('content')
<form method="POST" action="{{ route('admin.notepads.store') }}" class="w-full space-y-6">
    @csrf
    @include('partials.notepad-form', ['isAdmin' => true, 'users' => $users])
    <div class="flex gap-3">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg">Save Notepad</button>
        <a href="{{ route('admin.notepads.index') }}" class="text-sm px-4 py-2 rounded-lg border border-slate-300 bg-white">Cancel</a>
    </div>
</form>
@endsection
