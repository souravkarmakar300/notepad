@extends('layouts.user')

@section('title', 'User Dashboard')
@section('heading', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-xl border border-slate-200 p-6">
        <div class="text-sm text-slate-500">My Notepads</div>
        <div class="text-3xl font-semibold mt-2">{{ $notepadsCount }}</div>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 p-6 flex items-center justify-between">
        <div>
            <div class="text-sm text-slate-500">Quick Action</div>
            <div class="font-medium mt-1">Create a new lead notepad</div>
        </div>
        <a href="{{ route('user.notepads.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg">Create Notepad</a>
    </div>
</div>

<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-200">
        <h2 class="font-semibold">Recent Notepads</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="text-left px-6 py-3 font-medium">Business</th>
                    <th class="text-left px-6 py-3 font-medium">Owner</th>
                    <th class="text-left px-6 py-3 font-medium">Callback</th>
                    <th class="text-left px-6 py-3 font-medium">Created Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($recentNotepads as $notepad)
                    <tr>
                        <td class="px-6 py-3">
                            <a href="{{ route('user.notepads.show', $notepad) }}" class="text-blue-600 hover:underline">{{ $notepad->business_name }}</a>
                        </td>
                        <td class="px-6 py-3">{{ $notepad->owner_name }}</td>
                        <td class="px-6 py-3">{{ $notepad->callback_date?->format('d M, Y') ?? '—' }}</td>
                        <td class="px-6 py-3">{{ $notepad->created_at->format('d M, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-slate-500">No notepads yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
