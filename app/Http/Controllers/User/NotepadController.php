<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Notepad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NotepadController extends Controller
{
    public function index(): View
    {
        $notepads = Auth::guard('web')->user()
            ->notepads()
            ->latest()
            ->paginate(10);

        return view('user.notepads.index', compact('notepads'));
    }

    public function create(): View
    {
        return view('user.notepads.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateNotepad($request);
        $validated['user_id'] = Auth::guard('web')->id();

        Notepad::create($validated);

        return redirect()
            ->route('user.notepads.index')
            ->with('success', 'Notepad created successfully.');
    }

    public function show(Notepad $notepad): View
    {
        $this->authorizeOwnership($notepad);

        return view('user.notepads.show', compact('notepad'));
    }

    public function edit(Notepad $notepad): View
    {
        $this->authorizeOwnership($notepad);

        return view('user.notepads.edit', compact('notepad'));
    }

    public function update(Request $request, Notepad $notepad): RedirectResponse
    {
        $this->authorizeOwnership($notepad);

        $validated = $this->validateNotepad($request, forUpdate: true);

        $notepad->update($validated);

        return redirect()
            ->route('user.notepads.index')
            ->with('success', 'Notepad updated successfully.');
    }

    public function destroy(Notepad $notepad): RedirectResponse
    {
        $this->authorizeOwnership($notepad);

        $notepad->delete();

        return redirect()
            ->route('user.notepads.index')
            ->with('success', 'Notepad deleted successfully.');
    }

    private function authorizeOwnership(Notepad $notepad): void
    {
        abort_unless(
            (int) $notepad->user_id === (int) Auth::guard('web')->id(),
            403
        );
    }

    private function validateNotepad(Request $request, bool $forUpdate = false): array
    {
        $rules = [
            'business_name' => ['required', 'string', 'max:255'],
            'owner_name' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:50'],
            'email_address' => ['required', 'email', 'max:255'],
            'billing_address' => ['nullable', 'string'],
            'product_pitched' => ['required', 'string', 'max:255'],
            'amount_quoted' => ['nullable', 'numeric', 'min:0'],
            'callback_date' => ['nullable', 'date'],
            'closer_name' => ['nullable', 'string', 'max:255'],
            'comments' => ['nullable', 'string'],
            'directory_link' => ['nullable', 'url', 'max:255'],
            'notes' => ['nullable', 'string'],
        ];

        if ($forUpdate) {
            unset(
                $rules['business_name'],
                $rules['owner_name'],
                $rules['mobile_number'],
                $rules['email_address'],
                $rules['product_pitched'],
            );
        }

        return $request->validate($rules);
    }
}
