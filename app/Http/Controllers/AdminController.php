<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;


class AdminController extends Controller
{
    public function index(Request $request): View | RedirectResponse
    {
        return view('admin.overview');
    }

    public function login(): View | RedirectResponse
    {
        return view('admin.login');
    }

    public function challenge(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return to_route('admin.overview')->with('warning', "Nom d'utilisateur ou mot de passe invalide")
                ->onlyInput('email');
        }

        $request->session()->regenerate();
        $username = $credentials['email'];
        return redirect()->intended(route('admin.overview'))
            ->with('success', 'Vous êtes bien connecté en tant que '.$username);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->intended(route('root'))
            ->with('success', 'Vous êtes bien déconnectés');
    }
}
