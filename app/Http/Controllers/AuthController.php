<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = AdminUser::where('username', $credentials['username'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Session::put('is_admin', true);
            Session::put('admin_username', $user->username);
            return redirect('/admin');
        }
        return back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        Session::forget('is_admin');
        Session::forget('admin_username');
        return redirect('/login');
    }
}
