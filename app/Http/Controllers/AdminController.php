<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class AdminController extends Controller
{
    public function index(Request $request): View
    {
        //TODO: handle when user is not logged
        return view('admin.overview');
    }

    public function login(): View
    {
        //TODO: handle when user is logged
        return view('admin.login');
    }

    public function loginChallenge(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        return to_route('admin.overview')->with('success', 'Vous êtes bien connecté en tant que '.$username);
    }
}
