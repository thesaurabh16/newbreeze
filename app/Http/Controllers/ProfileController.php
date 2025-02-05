<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function index(): View
    {
        // $users = User::withTrashed()->get();
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    public function editUser(User $user): View
    {
        // Ensure the logged-in user can only edit their own data
        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('users.edit', compact('user'));
    }

    public function updateUser(ProfileUpdateRequest $request, User $user): RedirectResponse
    {
        // Ensure the logged-in user can only edit their own data
        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('users.index')->with('status', 'user-updated');
    }


    public function deleteUser(User $user): RedirectResponse
    {
        $user->delete();
        return Redirect::route('users.index')->with('status', 'user-deleted');
    }
    public function deletedUsers(): View
{
    $deletedUsers = User::onlyTrashed()->get();
    return view('users.deleted', compact('deletedUsers'));
}

public function restoreUser(User $user): RedirectResponse
    {
        dd($user);
        if ($user->trashed()) {
            $user->restore();
            return redirect()->route('users.deleted')->with('status', 'User restored successfully!');
        }

        return redirect()->route('users.deleted')->with('error', 'User not found or already restored.');
    }

}
