@extends('layouts.admin')

@section('title', 'Users')
@section('heading', 'Users')

@section('content')
<div class="mb-6 flex justify-end">
    <a href="{{ route('admin.users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg">Create User</a>
</div>

<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="text-left px-6 py-3 font-medium">Name</th>
                    <th class="text-left px-6 py-3 font-medium">Email</th>
                    <th class="text-left px-6 py-3 font-medium">Created</th>
                    <th class="text-right px-6 py-3 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($users as $user)
                    <tr>
                        <td class="px-6 py-3 font-medium">{{ $user->name }}</td>
                        <td class="px-6 py-3">{{ $user->email }}</td>
                        <td class="px-6 py-3">{{ $user->created_at->format('d M, Y') }}</td>
                        <td class="px-6 py-3">
                            <div class="flex justify-end gap-3">
                        
                                {{-- Edit --}}
                                <div class="relative group">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                       class="text-blue-600 hover:text-blue-800">
                                        Edit
                                    </a>
                        
                                    {{-- Tooltip --}}
                                    <span class="absolute right-full top-1/2 -translate-y-1/2 mr-2
                                                 hidden group-hover:block
                                                 bg-slate-800 text-white text-xs
                                                 rounded px-2 py-1
                                                 whitespace-nowrap z-50 shadow-lg">
                                        Edit User
                                    </span>
                                </div>
                        
                                {{-- Delete --}}
                                <div class="relative group">
                                    <form method="POST"
                                          action="{{ route('admin.users.destroy', $user) }}"
                                          onsubmit="return confirm('Delete this user?')">
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-800">
                                            Delete
                                        </button>
                                    </form>
                        
                                    {{-- Tooltip --}}
                                    <span class="absolute right-full top-1/2 -translate-y-1/2 mr-2
                                                 hidden group-hover:block
                                                 bg-slate-800 text-white text-xs
                                                 rounded px-2 py-1
                                                 whitespace-nowrap z-50 shadow-lg">
                                        Delete User
                                    </span>
                                </div>
                        
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-slate-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if ($users->hasPages())
        <div class="px-6 py-4 border-t border-slate-200">{{ $users->links() }}</div>
    @endif
</div>
@endsection
