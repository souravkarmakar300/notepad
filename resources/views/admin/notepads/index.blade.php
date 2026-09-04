@extends('layouts.admin')

@section('title', 'Notepads')
@section('heading', 'All Notepads')

@section('content')
{{-- <div class="mb-6 flex justify-end">
    <a href="{{ route('admin.notepads.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg">Create Notepad</a>
</div> --}}

<div class="bg-white rounded-xl border border-slate-200 overflow-hidden w-full">
    <div class="w-full overflow-x-auto">
        <table class="w-full table-auto text-xs">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Business</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Owner</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Mobile</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Email</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Billing</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Product</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Amount</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Callback</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Closer</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Comments</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Directory</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Notes</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Created</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Created by</th>
                    <th class="text-right px-2 py-2 font-medium whitespace-nowrap">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse ($notepads as $notepad)
                    <tr class="hover:bg-slate-50">

                        <td class="px-2 py-2 font-medium">
                            {{ $notepad->business_name ?: '—' }}
                        </td>

                        <td class="px-2 py-2">
                            {{ $notepad->owner_name ?: '—' }}
                        </td>

                        <td class="px-2 py-2 whitespace-nowrap">
                            {{ $notepad->mobile_number ?: '—' }}
                        </td>

                        <td class="px-2 py-2">
                            {{ $notepad->email_address ?: '—' }}
                        </td>

                        <td class="px-2 py-2">
                            {{ $notepad->billing_address ?: '—' }}
                        </td>

                        <td class="px-2 py-2">
                            {{ $notepad->product_pitched ?: '—' }}
                        </td>

                        <td class="px-2 py-2 whitespace-nowrap">
                            {{ $notepad->amount_quoted ?: '—' }}
                        </td>

                        <td class="px-2 py-2 whitespace-nowrap">
                            {{ $notepad->callback_date
                                ? $notepad->callback_date->format('d/m/Y')
                                : '—' }}
                        </td>

                        <td class="px-2 py-2">
                            {{ $notepad->closer_name ?: '—' }}
                        </td>

                        <td class="px-2 py-2">
                            {{ $notepad->comments ?: '—' }}
                        </td>

                        <td class="px-2 py-2 whitespace-nowrap">
                            @if ($notepad->directory_link)
                                <a href="{{ $notepad->directory_link }}"
                                   target="_blank"
                                   class="text-blue-600 hover:text-blue-800">
                                    View
                                </a>
                            @else
                                —
                            @endif
                        </td>

                        <td class="px-2 py-2">
                            {{ $notepad->notes ?: '—' }}
                        </td>

                        <td class="px-2 py-2 whitespace-nowrap">
                            {{ $notepad->created_at?->format('d/m/Y') ?? '—' }}
                        </td>

                        <td class="px-2 py-2 whitespace-nowrap">
                            {{ $notepad->user?->name ?? 'Unknown' }}
                        </td>

                        <td class="px-2 py-2">
                            <div class="flex flex-col items-end gap-3 whitespace-nowrap">
                        
                                {{-- View --}}
                                <div class="relative group">
                                    <a href="{{ route('admin.notepads.show', $notepad) }}"
                                       class="text-blue-600 hover:text-blue-800">
                                        View
                                    </a>
                        
                                    <div class="absolute right-0 top-full mt-1
                                                hidden group-hover:block
                                                z-50
                                                rounded-md
                                                bg-slate-800
                                                px-2 py-1
                                                text-xs
                                                text-white
                                                shadow-lg
                                                pointer-events-none">
                                        View Notepad
                                    </div>
                                </div>
                        
                                {{-- Edit --}}
                                <div class="relative group">
                                    <a href="{{ route('admin.notepads.edit', $notepad) }}"
                                       class="text-blue-600 hover:text-blue-800">
                                        Edit
                                    </a>
                        
                                    <div class="absolute right-0 top-full mt-1
                                                hidden group-hover:block
                                                z-50
                                                rounded-md
                                                bg-slate-800
                                                px-2 py-1
                                                text-xs
                                                text-white
                                                shadow-lg
                                                pointer-events-none">
                                        Edit Notepad
                                    </div>
                                </div>
                        
                                {{-- Delete --}}
                                <div class="relative group">
                                    <form method="POST"
                                          action="{{ route('admin.notepads.destroy', $notepad) }}"
                                          onsubmit="return confirm('Delete this notepad?')">
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-800">
                                            Delete
                                        </button>
                                    </form>
                        
                                    <div class="absolute right-0 top-full mt-1
                                                hidden group-hover:block
                                                z-50
                                                rounded-md
                                                bg-slate-800
                                                px-2 py-1
                                                text-xs
                                                text-white
                                                shadow-lg
                                                pointer-events-none">
                                        Delete Notepad
                                    </div>
                                </div>
                        
                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="14"
                            class="px-2 py-8 text-center text-slate-500">
                            No notepads found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($notepads->hasPages())
        <div class="px-4 py-3 border-t border-slate-200">
            {{ $notepads->links() }}
        </div>
    @endif
</div>
@endsection
