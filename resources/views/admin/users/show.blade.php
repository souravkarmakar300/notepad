@extends('layouts.admin')

@section('title', 'User Details')
@section('heading', 'User Details')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl border border-slate-200 p-6">
        <h2 class="font-semibold mb-4">Profile</h2>
        <dl class="space-y-3 text-sm">
            <div>
                <dt class="text-slate-500">Name</dt>
                <dd class="font-medium mt-0.5">{{ $user->name }}</dd>
            </div>
            <div>
                <dt class="text-slate-500">Email</dt>
                <dd class="font-medium mt-0.5">{{ $user->email }}</dd>
            </div>
            <div>
                <dt class="text-slate-500">Created</dt>
                <dd class="font-medium mt-0.5">{{ $user->created_at->format('M d, Y H:i') }}</dd>
            </div>
        </dl>
        <div class="mt-6 flex gap-3">
            <a href="{{ route('admin.users.edit', $user) }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg">Edit</a>
            <a href="{{ route('admin.users.index') }}" class="text-sm px-4 py-2 rounded-lg border border-slate-300">Back</a>
        </div>
    </div>

    <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200">
            <h2 class="font-semibold">Notepads by this user ({{ $user->notepads->count() }})</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-600">
                    <tr>
                        <th class="text-left px-6 py-3 font-medium">Business</th>
                        <th class="text-left px-6 py-3 font-medium">Owner</th>
                        <th class="text-left px-6 py-3 font-medium">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($user->notepads as $notepad)
                        <tr>
                            <td class="px-6 py-3">
                                <a href="{{ route('admin.notepads.show', $notepad) }}" class="text-blue-600 hover:underline">{{ $notepad->business_name }}</a>
                            </td>
                            <td class="px-6 py-3">{{ $notepad->owner_name }}</td>
                            <td class="px-6 py-3">{{ $notepad->created_at->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-slate-500">No notepads for this user.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
