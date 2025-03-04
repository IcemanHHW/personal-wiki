<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SessionController extends Controller
{
    /**
     * Display the login view.
     * @return View
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            throw ValidationException::withMessages([
                'username' => 'Je gebruikersnaam of wachtwoord is incorrect'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('wiki-pages.index');
    }

    /**
     * Destroy an authenticated session.
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request) : RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
