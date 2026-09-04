@extends('layouts.user')

@section('title', 'Notepad Details')
@section('heading', 'Notepad Details')

@section('content')
<div class="mb-6 flex gap-3">
    <a href="{{ route('user.notepads.edit', $notepad) }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg">Edit</a>
    <a href="{{ route('user.notepads.index') }}" class="text-sm px-4 py-2 rounded-lg border border-slate-300 bg-white">Back</a>
</div>

@include('partials.notepad-show', ['showCreator' => false])
@endsection
