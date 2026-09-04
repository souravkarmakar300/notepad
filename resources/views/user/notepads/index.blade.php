@extends('layouts.user')

@section('title', 'My Notepads')
@section('heading', 'My Notepads')

@section('content')

{{-- <div class="mb-6 flex justify-end">
    <a href="{{ route('user.notepads.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg">
        Create Notepad
    </a>
</div> --}}

<div class="bg-white rounded-xl border border-slate-200 overflow-hidden w-full">

    <div class="w-full overflow-x-auto">

        <table class="w-full table-auto text-xs">

            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="text-left px-2 py-2 font-medium">Business</th>
                    <th class="text-left px-2 py-2 font-medium">Owner</th>
                    <th class="text-left px-2 py-2 font-medium">Mobile</th>
                    <th class="text-left px-2 py-2 font-medium">Email</th>
                    <th class="text-left px-2 py-2 font-medium">Billing</th>
                    <th class="text-left px-2 py-2 font-medium">Product</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Amount</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Callback</th>
                    <th class="text-left px-2 py-2 font-medium">Closer</th>
                    <th class="text-left px-2 py-2 font-medium">Comments</th>
                    <th class="text-left px-2 py-2 font-medium">Directory</th>
                    <th class="text-left px-2 py-2 font-medium">Notes</th>
                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">Created</th>
                    <th class="text-right px-2 py-2 font-medium whitespace-nowrap">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">

                @forelse ($notepads as $notepad)

                    <tr class="hover:bg-slate-50">

                        {{-- Business --}}
                        <td class="px-2 py-2 font-medium">
                            {{ $notepad->business_name ?: '—' }}
                        </td>

                        {{-- Owner --}}
                        <td class="px-2 py-2">
                            {{ $notepad->owner_name ?: '—' }}
                        </td>

                        {{-- Mobile --}}
                        <td class="px-2 py-2 whitespace-nowrap">
                            {{ $notepad->mobile_number ?: '—' }}
                        </td>

                        {{-- Email --}}
                        <td class="px-2 py-2">
                            {{ $notepad->email_address ?: '—' }}
                        </td>

                        {{-- Billing --}}
                        <td class="px-2 py-2">
                            {{ $notepad->billing_address ?: '—' }}
                        </td>

                        {{-- Product --}}
                        <td class="px-2 py-2">
                            {{ $notepad->product_pitched ?: '—' }}
                        </td>

                        {{-- Amount --}}
                        <td class="px-2 py-2 whitespace-nowrap">
                            {{ $notepad->amount_quoted !== null
                                ? number_format((float) $notepad->amount_quoted, 2)
                                : '—' }}
                        </td>

                        {{-- Callback --}}
                        <td class="px-2 py-2 whitespace-nowrap">
                            {{ $notepad->callback_date
                                ? $notepad->callback_date->format('d/m/Y')
                                : '—' }}
                        </td>

                        {{-- Closer --}}
                        <td class="px-2 py-2">
                            {{ $notepad->closer_name ?: '—' }}
                        </td>

                        {{-- Comments --}}
                        <td class="px-2 py-2">
                            {{ $notepad->comments ?: '—' }}
                        </td>

                        {{-- Directory --}}
                        <td class="px-2 py-2 whitespace-nowrap">
                            @if ($notepad->directory_link)

                                <a href="{{ $notepad->directory_link }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="text-blue-600 hover:text-blue-800">
                                    View
                                </a>

                            @else
                                —
                            @endif
                        </td>

                        {{-- Notes --}}
                        <td class="px-2 py-2">
                            {{ $notepad->notes ?: '—' }}
                        </td>

                        {{-- Created --}}
                        <td class="px-2 py-2 whitespace-nowrap">
                            {{ $notepad->created_at?->format('d/m/Y') ?? '—' }}
                        </td>

                        {{-- Actions --}}
                        <td class="px-2 py-2">
                            <div class="flex flex-col items-end gap-2 whitespace-nowrap">
                        
                                {{-- View --}}
                                <div class="relative group">
                                    <a href="{{ route('user.notepads.show', $notepad) }}"
                                       class="text-slate-600 hover:text-slate-900 font-medium">
                                        View
                                    </a>
                        
                                    <span class="absolute right-full top-1/2 -translate-y-1/2 mr-2
                                                 hidden group-hover:block
                                                 bg-slate-800 text-white text-xs
                                                 rounded px-2 py-1
                                                 whitespace-nowrap z-50 shadow-lg
                                                 pointer-events-none">
                                        View Notepad
                                    </span>
                                </div>
                        
                                {{-- Edit --}}
                                <div class="relative group">
                                    <a href="{{ route('user.notepads.edit', $notepad) }}"
                                       class="text-blue-600 hover:text-blue-800 font-medium">
                                        Edit
                                    </a>
                        
                                    <span class="absolute right-full top-1/2 -translate-y-1/2 mr-2
                                                 hidden group-hover:block
                                                 bg-slate-800 text-white text-xs
                                                 rounded px-2 py-1
                                                 whitespace-nowrap z-50 shadow-lg
                                                 pointer-events-none">
                                        Edit Notepad
                                    </span>
                                </div>
                        
                                {{-- Delete --}}
                                <div class="relative group">
                                    <form method="POST"
                                          action="{{ route('user.notepads.destroy', $notepad) }}"
                                          onsubmit="return confirm('Delete this notepad?')">
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-800 font-medium">
                                            Delete
                                        </button>
                                    </form>
                        
                                    <span class="absolute right-full top-1/2 -translate-y-1/2 mr-2
                                                 hidden group-hover:block
                                                 bg-slate-800 text-white text-xs
                                                 rounded px-2 py-1
                                                 whitespace-nowrap z-50 shadow-lg
                                                 pointer-events-none">
                                        Delete Notepad
                                    </span>
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