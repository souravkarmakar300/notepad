@extends('layouts.admin')

@section('title', 'Deleted Notepads')

@section('heading', 'Deleted Notepads')

@section('content')

<div class="mb-5 flex items-center justify-between">

    <div>
        <h2 class="text-lg font-semibold text-slate-900">
            Deleted Customer Data
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            These notepads have been moved to the recycle bin.
        </p>
    </div>

    {{-- <a href="{{ route('admin.notepads.index') }}"
       class="inline-flex items-center px-4 py-2
              rounded-lg bg-blue-600
              text-white text-sm font-medium
              hover:bg-blue-700 transition">

        Back to Notepads

    </a> --}}

</div>


<div class="bg-white rounded-xl border border-slate-200 overflow-hidden w-full">

    <div class="w-full overflow-x-auto">

        <table class="w-full table-auto text-xs">

            <!-- ================================================= -->
            <!-- TABLE HEADER -->
            <!-- ================================================= -->

            <thead class="bg-red-600 text-white">

                <tr>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Business
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Owner
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Mobile
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Email
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Billing
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Product
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Amount
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Callback
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Closer
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Comments
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Directory
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Notes
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Created
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Created By
                    </th>

                    <th class="text-left px-2 py-2 font-medium whitespace-nowrap">
                        Deleted
                    </th>

                    {{-- <th class="text-right px-2 py-2 font-medium whitespace-nowrap">
                        Actions
                    </th> --}}

                </tr>

            </thead>


            <!-- ================================================= -->
            <!-- TABLE BODY -->
            <!-- ================================================= -->

            <tbody class="divide-y divide-slate-100">

                @forelse ($notepads as $notepad)

                    <tr class="hover:bg-red-50/40">

                        <!-- Business -->
                        <td class="px-2 py-2 font-medium text-slate-800">

                            {{ $notepad->business_name ?: '—' }}

                        </td>


                        <!-- Owner -->
                        <td class="px-2 py-2">

                            {{ $notepad->owner_name ?: '—' }}

                        </td>


                        <!-- Mobile -->
                        <td class="px-2 py-2 whitespace-nowrap">

                            {{ $notepad->mobile_number ?: '—' }}

                        </td>


                        <!-- Email -->
                        <td class="px-2 py-2">

                            {{ $notepad->email_address ?: '—' }}

                        </td>


                        <!-- Billing -->
                        <td class="px-2 py-2">

                            {{ $notepad->billing_address ?: '—' }}

                        </td>


                        <!-- Product -->
                        <td class="px-2 py-2">

                            {{ $notepad->product_pitched ?: '—' }}

                        </td>


                        <!-- Amount -->
                        <td class="px-2 py-2 whitespace-nowrap">

                            {{ $notepad->amount_quoted ?: '—' }}

                        </td>


                        <!-- Callback -->
                        <td class="px-2 py-2 whitespace-nowrap">

                            {{ $notepad->callback_date
                                ? $notepad->callback_date->format('d/m/Y')
                                : '—' }}

                        </td>


                        <!-- Closer -->
                        <td class="px-2 py-2">

                            {{ $notepad->closer_name ?: '—' }}

                        </td>


                        <!-- Comments -->
                        <td class="px-2 py-2">

                            {{ $notepad->comments ?: '—' }}

                        </td>


                        <!-- Directory -->
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


                        <!-- Notes -->
                        <td class="px-2 py-2">

                            {{ $notepad->notes ?: '—' }}

                        </td>


                        <!-- Created -->
                        <td class="px-2 py-2 whitespace-nowrap">

                            {{ $notepad->created_at?->format('d/m/Y') ?? '—' }}

                        </td>


                        <!-- Created By -->
                        <td class="px-2 py-2 whitespace-nowrap">

                            {{ $notepad->user?->name ?? 'Unknown' }}

                        </td>


                        <!-- Deleted -->
                        <td class="px-2 py-2 whitespace-nowrap text-red-600">

                            {{ $notepad->deleted_at?->format('d/m/Y') ?? '—' }}

                        </td>


                        <!-- ================================================= -->
                        <!-- ACTIONS -->
                        <!-- ================================================= -->

                        <td class="px-2 py-2">

                            <div class="flex flex-col items-end gap-3 whitespace-nowrap">


                                <!-- Restore -->
                                <div class="relative group">

                                    {{-- <form method="POST"
                                          action="{{ route('admin.notepads.restore', $notepad->id) }}">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                                class="text-emerald-600
                                                       hover:text-emerald-800
                                                       font-medium">

                                            Restore

                                        </button>

                                    </form> --}}


                                    <!-- Tooltip -->
                                    <div class="absolute right-0 top-full mt-1
                                                hidden group-hover:block
                                                z-50
                                                rounded-md
                                                bg-slate-800
                                                px-2 py-1
                                                text-xs
                                                text-white
                                                shadow-lg">

                                        Restore Notepad

                                    </div>

                                </div>


                                <!-- Permanent Delete -->
                                <div class="relative group">

                                    {{-- <form method="POST"
                                          action="{{ route('admin.notepads.forceDelete', $notepad->id) }}"
                                          onsubmit="return confirm('This will permanently delete this notepad. This action cannot be undone. Continue?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="text-red-600
                                                       hover:text-red-800
                                                       font-medium">

                                            Delete Forever

                                        </button>

                                    </form> --}}


                                    <!-- Tooltip -->
                                    <div class="absolute right-0 top-full mt-1
                                                hidden group-hover:block
                                                z-50
                                                rounded-md
                                                bg-slate-800
                                                px-2 py-1
                                                text-xs
                                                text-white
                                                shadow-lg">

                                        Permanently Delete

                                    </div>

                                </div>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="16"
                            class="px-4 py-10 text-center text-slate-500">

                            <div class="text-sm font-medium">
                                No deleted notepads found.
                            </div>

                            <div class="text-xs mt-1">
                                Deleted customer records will appear here.
                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <!-- ================================================= -->
    <!-- PAGINATION -->
    <!-- ================================================= -->

    @if ($notepads->hasPages())

        <div class="px-4 py-3 border-t border-slate-200">

            {{ $notepads->links() }}

        </div>

    @endif

</div>

@endsection