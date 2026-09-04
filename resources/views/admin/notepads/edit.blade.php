@extends('layouts.admin')

@section('title', 'Edit Notepad')
@section('heading', 'Edit Notepad')

@section('content')
<form method="POST" action="{{ route('admin.notepads.update', $notepad) }}" class="w-full space-y-6">
    @csrf
    @method('PUT')
    @include('partials.notepad-form', ['isAdmin' => true, 'users' => $users, 'notepad' => $notepad])
    <div class="flex gap-3">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg">Update Notepad</button>
        <a href="{{ route('admin.notepads.index') }}" class="text-sm px-4 py-2 rounded-lg border border-slate-300 bg-white">Cancel</a>
    </div>
</form>
@endsection
