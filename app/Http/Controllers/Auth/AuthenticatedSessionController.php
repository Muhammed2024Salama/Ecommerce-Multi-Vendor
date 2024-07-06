<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();


        /** Updating Login Logic */

        if($request->user()->status === 'inactive'){
            Auth::guard('web')->logout();
            $request->session()->regenerateToken();
            toastr('account has been banned from website please connect with support!', 'error', 'Account Banned!');
            return redirect('/');
        }

        /** End Logic */

        /** Multi Auth
         Check if he logged in with
            . Admin
            . Vendor
            . User
         */
        if ($request->user()->role == 'admin') {
            return redirect()->intended('/admin/dashboard');
        } elseif ($request->user()->role == 'vendor') {
            return redirect()->intended('/vendor/dashboard');
        }
        /** End Multi Auth */

           return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
