<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function auth(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'email.required' => 'O campo email é obrigatório!',
            'password.required' => 'O campo senha é obrigatório!'
        ]);

        if (Auth::attempt($credentials, $request['remember'])) {
            $request->session()->regenerate();

            $id = Auth::id();

            if ($id == 1) {
                return redirect()->intended(route('admin.dashboard', compact('id')));
            } else {
                return redirect()->intended(route('site.index', compact('id')));
            }

        } else {
            return redirect()->back()->with('erro', 'Email ou senha inválida');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('site.index'));
    }

    public function create() {
        return view('login.create');
    }
}
