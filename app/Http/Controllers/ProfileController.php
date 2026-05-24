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

    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $genres = \App\Models\MediaItem::select('genre')
                    ->distinct()
                    ->whereNotNull('genre')
                    ->pluck('genre');

        return view('pages.profile', [
            'user' => $user,
            'genres' => $genres
            ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        
        $validated = $request->validated(); 

        if ($request->hasFile('pp')) {
            $validated['pp'] = $request->file('pp')->store('profile_photos', 'public');
        } else {
            unset($validated['pp']);
        }
        
        $user->fill($validated);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('profile.show', ['username' => $user->username])
            ->with('status', 'profile-updated');
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
}
