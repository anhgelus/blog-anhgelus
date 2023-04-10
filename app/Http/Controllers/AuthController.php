<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
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

    public function update(UpdateRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if ($credentials['update']==="password") {
            if (!isset($credentials['password'])) {
                return to_route('admin.overview')->with('alert', "La clef password est nulle");
            }
            $user = Auth::user();
            $user->password = Hash::make($credentials['password']);
            $user->save();
        } else if ($credentials['update']==="email") {
            if (!isset($credentials['email'])) {
                return to_route('admin.overview')->with('alert', "La clef email est nulle");
            }
            $user = Auth::user();
            $user->email = $credentials['email'];
            $user->save();
        } else if ($credentials['update']==='new_user') {
            if (!isset($credentials['email'])) {
                return to_route('admin.overview')->with('alert', "La clef email est nulle");
            }
            if (!isset($credentials['password'])) {
                return to_route('admin.overview')->with('alert', "La clef password est nulle");
            }
            User::create([
                'email'=>$credentials['email'],
                'password'=>Hash::make($credentials['password']),
                'name'=>$credentials['email']
            ]);
            return to_route('admin.overview')->with('success', "L'utilisateur ".$credentials['email']." a bien été ajouté");
        }
        return to_route('admin.overview')->with('success', "La clef ".$credentials['update']." a bien été modifiée");
    }
}
