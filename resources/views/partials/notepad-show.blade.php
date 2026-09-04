@php
    $fields = [
        'Business Name' => $notepad->business_name,
        'Owner Name' => $notepad->owner_name,
        'Mobile Number' => $notepad->mobile_number,
        'Email Address' => $notepad->email_address,
        'Billing Address' => $notepad->billing_address,
        'Product Pitched' => $notepad->product_pitched,
        'Amount Quoted' => $notepad->amount_quoted !== null
            ? number_format((float) $notepad->amount_quoted, 2)
            : null,
        'Callback Date' => $notepad->callback_date?->format('M d, Y'),
        'Closer Name' => $notepad->closer_name,
        'Directory Link' => $notepad->directory_link,
        'Comments' => $notepad->comments,
        'Notes' => $notepad->notes,
    ];
@endphp

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

    {{-- Header --}}
    <div class="px-6 py-5 bg-gradient-to-r from-blue-600 to-blue-700">
        <div class="flex items-center justify-between">

            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-white/15 border border-white/20
                            flex items-center justify-center text-white">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>

                </div>

                <div>
                    <h2 class="text-xl font-semibold text-white">
                        Notepad Information
                    </h2>

                    <p class="text-sm text-blue-100 mt-1">
                        Complete customer information
                    </p>
                </div>
            </div>

            {{-- Created By --}}
            @if (!empty($showCreator))
                <div class="hidden sm:flex items-center gap-3
                            bg-white/10 border border-white/20
                            rounded-xl px-4 py-2.5">

                    <div class="w-9 h-9 rounded-full bg-white
                                flex items-center justify-center
                                text-sm font-bold text-blue-600">

                        {{ $notepad->user?->name
                            ? strtoupper(substr($notepad->user->name, 0, 1))
                            : '?' }}

                    </div>

                    <div>
                        <div class="text-[10px] uppercase tracking-wider text-blue-100">
                            Created By
                        </div>

                        <div class="text-sm font-semibold text-white">
                            {{ $notepad->user?->name ?? 'Unknown' }}
                        </div>
                    </div>

                </div>
            @endif

        </div>
    </div>


    {{-- Content --}}
    <div class="p-6">

        {{-- Customer Details --}}
        <div class="mb-8">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-9 h-9 rounded-lg bg-blue-50
                            flex items-center justify-center text-blue-600">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>

                    </svg>

                </div>

                <div>
                    <h3 class="text-base font-semibold text-slate-900">
                        Customer Details
                    </h3>

                    <p class="text-xs text-slate-400">
                        Basic customer information
                    </p>
                </div>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                @foreach ([
                    'Business Name',
                    'Owner Name',
                    'Mobile Number',
                    'Email Address',
                    'Product Pitched',
                    'Closer Name'
                ] as $label)

                    @php
                        $value = $fields[$label] ?? null;
                    @endphp

                    <div class="rounded-xl border border-slate-200
                                bg-slate-50/50 p-4
                                hover:bg-white hover:border-blue-200
                                transition">

                        <div class="text-[11px] font-semibold uppercase
                                    tracking-wider text-slate-400">

                            {{ $label }}

                        </div>

                        <div class="mt-2 text-sm font-semibold text-slate-800 break-words">

                            {{ $value ?: '—' }}

                        </div>

                    </div>

                @endforeach

            </div>

        </div>


        {{-- Sales Information --}}
        <div class="border-t border-slate-100 pt-7 mb-8">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-9 h-9 rounded-lg bg-emerald-50
                            flex items-center justify-center text-emerald-600">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2
                                 3 .895 3 2-1.343 2-3 2m0-8c1.11 0
                                 2.08.402 2.599 1M12 8V6m0 12v-2m0
                                 0c-1.11 0-2.08-.402-2.599-1M12 16c1.657
                                 0 3-0.895 3-2s-1.343-2-3-2-3-.895-3-2
                                 1.343-2 3-2"/>

                    </svg>

                </div>

                <div>
                    <h3 class="text-base font-semibold text-slate-900">
                        Sales Information
                    </h3>

                    <p class="text-xs text-slate-400">
                        Commercial and follow-up details
                    </p>
                </div>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                {{-- Amount --}}
                <div class="rounded-xl border border-blue-100
                            bg-blue-50 p-5">

                    <div class="flex items-center justify-between">

                        <span class="text-xs font-semibold uppercase
                                     tracking-wider text-blue-500">
                            Amount Quoted
                        </span>

                        <span class="w-8 h-8 rounded-lg bg-white
                                     flex items-center justify-center
                                     text-blue-600 font-bold">
                            $
                        </span>

                    </div>

                    <div class="mt-3 text-2xl font-bold text-blue-700">
                        {{ $fields['Amount Quoted'] ?: '—' }}
                    </div>

                </div>


                {{-- Callback --}}
                <div class="rounded-xl border border-amber-100
                            bg-amber-50 p-5">

                    <div class="flex items-center justify-between">

                        <span class="text-xs font-semibold uppercase
                                     tracking-wider text-amber-600">
                            Callback Date
                        </span>

                        <span class="w-8 h-8 rounded-lg bg-white
                                     flex items-center justify-center
                                     text-amber-600">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-4 h-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14
                                         a2 2 0 002-2V7a2 2 0 00-2-2H5
                                         a2 2 0 00-2 2v12a2 2 0 002 2z"/>

                            </svg>

                        </span>

                    </div>

                    <div class="mt-3 text-base font-bold text-slate-800">
                        {{ $fields['Callback Date'] ?: '—' }}
                    </div>

                </div>


                {{-- Directory --}}
                <div class="rounded-xl border border-slate-200
                            bg-slate-50 p-5">

                    <div class="flex items-center justify-between">

                        <span class="text-xs font-semibold uppercase
                                     tracking-wider text-slate-400">
                            Directory
                        </span>

                        <span class="w-8 h-8 rounded-lg bg-white
                                     flex items-center justify-center
                                     text-slate-500">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-4 h-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M10 6H6a2 2 0 00-2 2v10a2 2 0
                                         002 2h10a2 2 0 002-2v-4M14 4h6m0
                                         0v6m0-6L10 14"/>

                            </svg>

                        </span>

                    </div>

                    <div class="mt-3">

                        @if ($fields['Directory Link'])

                            <a href="{{ $fields['Directory Link'] }}"
                               target="_blank"
                               rel="noopener"
                               class="inline-flex items-center gap-2
                                      text-sm font-semibold text-blue-600
                                      hover:text-blue-800">

                                Open Directory

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-4 h-4"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M10 6H6a2 2 0 00-2 2v10a2 2
                                             0 002 2h10a2 2 0 002-2v-4
                                             M14 4h6m0 0v6m0-6L10 14"/>

                                </svg>

                            </a>

                        @else

                            <span class="text-sm font-semibold text-slate-400">
                                No directory link
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- Billing Address --}}
        <div class="border-t border-slate-100 pt-7 mb-8">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-9 h-9 rounded-lg bg-purple-50
                            flex items-center justify-center text-purple-600">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M17.657 16.657L13.414 21a2 2 0
                                 01-2.828 0l-4.243-4.343a8 8 0
                                 1111.314 0z"/>

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

                    </svg>

                </div>

                <div>
                    <h3 class="text-base font-semibold text-slate-900">
                        Billing Address
                    </h3>

                    <p class="text-xs text-slate-400">
                        Customer billing information
                    </p>
                </div>

            </div>

            <div class="rounded-xl bg-slate-50
                        border border-slate-200 p-1">

                <p class="text-sm text-slate-700
                          whitespace-pre-wrap leading-5">

                    {{ $fields['Billing Address'] ?: 'No billing address provided.' }}

                </p>

            </div>

        </div>


        {{-- Comments & Notes --}}
        <div class="border-t border-slate-100 pt-7">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                {{-- Comments --}}
                <div class="rounded-xl border border-orange-100
                            bg-orange-50/40 p-1">

                    <div class="flex items-center gap-3">

                        <div class="w-9 h-9 rounded-lg bg-orange-100
                                    flex items-center justify-center
                                    text-orange-600">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M8 10h8M8 14h5m-9 7
                                         l3.5-3.5H18a3 3 0
                                         003-3V6a3 3 0 00-3-3H6
                                         a3 3 0 00-3 3v8a3 3
                                         0 003 3v4z"/>

                            </svg>

                        </div>

                        <h3 class="text-sm font-semibold text-slate-900">
                            Comments
                        </h3>

                    </div>

                    <p class="text-sm text-slate-700
                              whitespace-pre-wrap leading-5">

                        {{ $fields['Comments'] ?: 'No comments added.' }}

                    </p>

                </div>


                {{-- Notes --}}
                <div class="rounded-xl border border-yellow-100
                            bg-yellow-50/40 p-1">

                    <div class="flex items-center gap-3">

                        <div class="w-9 h-9 rounded-lg bg-yellow-100
                                    flex items-center justify-center
                                    text-yellow-600">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2
                                         2 0 002 2h11a2 2 0 002-2v-5
                                         m-1.5-9.5a2.121 2.121 0
                                         113 3L12 14l-4 1 1-4
                                         8.5-8.5z"/>

                            </svg>

                        </div>

                        <h3 class="text-sm font-semibold text-slate-900">
                            Notes
                        </h3>

                    </div>

                    <p class="text-sm text-slate-700
                              whitespace-pre-wrap leading-5">

                        {{ $fields['Notes'] ?: 'No notes added.' }}

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>