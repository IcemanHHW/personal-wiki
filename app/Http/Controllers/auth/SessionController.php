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
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => 'Deze gegevens zijn niet incorrect'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('pages.index');
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
