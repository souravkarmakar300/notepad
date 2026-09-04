<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notepad;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NotepadController extends Controller
{
    public function index(): View
    {
        $notepads = Notepad::with('user')->latest()->paginate(10);

        return view('admin.notepads.index', compact('notepads'));
    }

    public function create(): View
    {
        $users = User::orderBy('name')->get();

        return view('admin.notepads.create', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateNotepad($request);
        $validated['user_id'] = $request->input('user_id');

        Notepad::create($validated);

        return redirect()
            ->route('admin.notepads.index')
            ->with('success', 'Notepad created successfully.');
    }

    public function show(Notepad $notepad): View
    {
        $notepad->load('user');

        return view('admin.notepads.show', compact('notepad'));
    }

    public function edit(Notepad $notepad): View
    {
        $users = User::orderBy('name')->get();

        return view('admin.notepads.edit', compact('notepad', 'users'));
    }

    public function update(Request $request, Notepad $notepad): RedirectResponse
    {
        $validated = $this->validateNotepad($request);
        $validated['user_id'] = $request->input('user_id');

        $notepad->update($validated);

        return redirect()
            ->route('admin.notepads.index')
            ->with('success', 'Notepad updated successfully.');
    }

    public function destroy(Notepad $notepad): RedirectResponse
    {
        $notepad->delete();

        return redirect()
            ->route('admin.notepads.index')
            ->with('success', 'Notepad deleted successfully.');
    }

    public function deleted_data(Notepad $notepad): View
    {
        $notepads = Notepad::onlyTrashed()->with('user')->latest('deleted_at')->paginate(10);
        return view('admin.notepads.deleted_data', compact('notepads'));
    }

    private function validateNotepad(Request $request): array
    {
        return $request->validate([
            'user_id' => ['nullable', 'exists:users,id'],
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
        ]);
    }
}
