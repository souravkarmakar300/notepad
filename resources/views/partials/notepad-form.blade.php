@php
    $notepad = $notepad ?? null;
    $isAdmin = $isAdmin ?? false;
    $inputClass = 'w-full h-11 rounded-lg border border-slate-300 bg-white px-3 text-sm text-slate-800 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition';
    $textareaClass = 'w-full min-h-[6.5rem] rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-800 placeholder:text-slate-400 resize-y focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition';
@endphp

<div class="w-full bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
    <div class="px-6 py-5 border-b border-slate-200 bg-slate-50">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center font-semibold text-sm shadow-sm">
                NP
            </div>
            <div>
                <h2 class="text-lg font-semibold text-slate-900">Notepad Information</h2>
                <p class="text-sm text-slate-500 mt-0.5">Add and manage customer information</p>
            </div>
        </div>
    </div>

    <div class="p-6 w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5 w-full">
            @if ($isAdmin)
                <div class="col-span-full">
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Assigned User</label>
                    <select name="user_id" class="{{ $inputClass }}">
                        <option value="">— Select user —</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @selected(old('user_id', $notepad?->user_id) == $user->id)>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Business Name <span class="text-red-500">*</span>
                </label>
            
                <input type="text"
                       name="business_name"
                       value="{{ old('business_name', $notepad?->business_name) }}"
                       placeholder="Enter business name"
                       {{ !$isAdmin && $notepad ? 'disabled' : '' }}
                       class="{{ $inputClass }} {{ !$isAdmin && $notepad ? 'bg-slate-100 text-slate-500 cursor-not-allowed' : '' }}">
            
                @if (!$isAdmin && $notepad)
                    <span class="text-red-500 text-xs">
                        This field is locked and cannot be changed.
                    </span>
                @endif
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Owner Name <span class="text-red-500">*</span>
                </label>
            
                <input type="text"
                       name="owner_name"
                       value="{{ old('owner_name', $notepad?->owner_name) }}"
                       placeholder="Enter owner name"
                       {{ !$isAdmin && $notepad ? 'disabled' : '' }}
                       class="{{ $inputClass }} {{ !$isAdmin && $notepad ? 'bg-slate-100 text-slate-500 cursor-not-allowed' : '' }}">
            
                @if (!$isAdmin && $notepad)
                    <span class="text-red-500 text-xs">
                        This field is locked and cannot be changed.
                    </span>
                @endif
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Mobile Number <span class="text-red-500">*</span>
                </label>
            
                <input type="text"
                       name="mobile_number"
                       value="{{ old('mobile_number', $notepad?->mobile_number) }}"
                       placeholder="Enter mobile number"
                       {{ !$isAdmin && $notepad ? 'disabled' : '' }}
                       class="{{ $inputClass }} {{ !$isAdmin && $notepad ? 'bg-slate-100 text-slate-500 cursor-not-allowed' : '' }}">
            
                @if (!$isAdmin && $notepad)
                    <span class="text-red-500 text-xs">
                        This field is locked and cannot be changed.
                    </span>
                @endif
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Email Address <span class="text-red-500">*</span>
                </label>
            
                <input type="email"
                       name="email_address"
                       value="{{ old('email_address', $notepad?->email_address) }}"
                       placeholder="example@email.com"
                       {{ !$isAdmin && $notepad ? 'disabled' : '' }}
                       class="{{ $inputClass }} {{ !$isAdmin && $notepad ? 'bg-slate-100 text-slate-500 cursor-not-allowed' : '' }}">
            
                @if (!$isAdmin && $notepad)
                    <span class="text-red-500 text-xs">
                        This field is locked and cannot be changed.
                    </span>
                @endif
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Product Pitched <span class="text-red-500">*</span>
                </label>
            
                <input type="text"
                       name="product_pitched"
                       value="{{ old('product_pitched', $notepad?->product_pitched) }}"
                       placeholder="Enter product/service"
                       {{ !$isAdmin && $notepad ? 'disabled' : '' }}
                       class="{{ $inputClass }} {{ !$isAdmin && $notepad ? 'bg-slate-100 text-slate-500 cursor-not-allowed' : '' }}">
            
                @if (!$isAdmin && $notepad)
                    <span class="text-red-500 text-xs">
                        This field is locked and cannot be changed.
                    </span>
                @endif
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Amount Quoted</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-slate-500">$</span>
                    <input type="number" step="0.01" min="0" name="amount_quoted" value="{{ old('amount_quoted', $notepad?->amount_quoted) }}" placeholder="0.00" class="{{ $inputClass }} !pl-8">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Callback Date</label>
                <input type="date" name="callback_date" value="{{ old('callback_date', optional($notepad?->callback_date)->format('Y-m-d')) }}" class="{{ $inputClass }}">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Closer Name</label>
                <input type="text" name="closer_name" value="{{ old('closer_name', $notepad?->closer_name) }}" placeholder="Enter closer name" class="{{ $inputClass }}">
            </div>

            <div class="col-span-full">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Directory Link</label>
                <input type="url" name="directory_link" value="{{ old('directory_link', $notepad?->directory_link) }}" placeholder="https://example.com" class="{{ $inputClass }}">
            </div>

            <div class="col-span-full">
                <label class="block text-sm font-semibold text-slate-700 mb-1">Billing Address</label>
                <textarea name="billing_address" rows="1" placeholder="Enter billing address" class="{{ $textareaClass }}">{{ old('billing_address', $notepad?->billing_address) }}</textarea>
            </div>

            <div class="col-span-full">
                <label class="block text-sm font-semibold text-slate-700 mb-1">Comments</label>
                <textarea name="comments" rows="2" placeholder="Add customer comments..." class="{{ $textareaClass }}">{{ old('comments', $notepad?->comments) }}</textarea>
            </div>

            <div class="col-span-full">
                <label class="block text-sm font-semibold text-slate-700 mb-1">Notes</label>
                <textarea name="notes" rows="2" placeholder="Add internal notes..." class="{{ $textareaClass }}">{{ old('notes', $notepad?->notes) }}</textarea>
            </div>
        </div>
    </div>
</div>
