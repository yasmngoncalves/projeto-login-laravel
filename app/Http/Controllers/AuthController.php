<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tela de cadastro
    public function showRegister() {
        return view('register');
    }

    // Cadastro com validação
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('user.edit');
    }

    // Tela de login
    public function showLogin() {
        return view('login');
    }

    // Login com validação
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            return redirect()->route('user.edit');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    // Tela de edição (só logado)
    public function showEdit() {
        return view('edit', ['user' => Auth::user()]);
    }

    // Atualizar usuário
    public function edit(Request $request) {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email'));

        return back()->with('success', 'Dados atualizados com sucesso!');
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('home');
    }
}
